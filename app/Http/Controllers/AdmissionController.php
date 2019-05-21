<?php

namespace App\Http\Controllers;

use App\Role;
use App\Room;
use App\Section;
use App\Student;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Session;

class AdmissionController extends Controller
{
    public function index()
    {
        $students_count = Student::where('is_verified', 0)->count();
        $old_stud = Student::where('is_verified', 1)->count();
        $room_count = Room::count();
        $subject_count = Subject::count();
        $section_count = Section::count();
        return view('modules.admission.index', compact('old_stud', 'students_count', 'room_count', 'subject_count', 'section_count'));
    }

    public function unverifiedStudent()
    {
        $students = Student::where('is_verified', 0)->get();
        return view('modules.admission.unverified_student_list', compact('students'));
    }

    public function oldstud()
    {
        $students = Student::where('is_verified', 1)->get();
        return view('modules.admission.old_students', compact('students'));
    }

    public function getUnverifiedStudent(Request $request)
    {
        return Student::find($request->id);
    }

    public function deleteUnverified(Request $request)
    {
        Student::find($request->id)->delete();
        Session::flash('flash_message', 'Student has been deleted!');
        return redirect()->back();
    }

    public function verifyStudent(Request $request)
    {
        $this->validate($request, [
            'email' => 'sometimes|required|max:191|email',
            'contact_number' => 'numeric',
            'guardian_contact' => 'numeric',
        ]);
        $student = Student::find($request->id);
        if ($request->has_birthcert === 'on' && $request->has_form137 === 'on' && $request->has_goodmoral === 'on') {
            $request->merge(['has_birthcert' => true]);
            $request->merge(['has_form137' => true]);
            $request->merge(['has_goodmoral' => true]);
        } else {
            return redirect()->back();
        }
        if ($student->verification_code === $request->verification_code) {
            $username = str_random(8);
            $user = new User;
            $request->request->add(['username' => $username]);
            $request->request->add(['password' => bcrypt($username)]);
            $request->request->add(['status' => 'Active']);
            $user->fill($request->all())->save();
            $role_student = Role::where('name', 'Student')->first();
            $user->roles()->attach($role_student);

            $last_student = Student::where('lrn', '!=', null)->latest()->first();
            if ($last_student == null) {
                $student_new = 1000001;
            } else {
                $student_new = (int) $last_student->lrn += 1;
            }
            $request->request->add(['user_id' => $user->id]);
            $request->request->add(['is_verified' => true]);
            $request->request->add(['lrn' => $student_new]);
            $student->update($request->all());
            Session::flash('flash_message', 'Student has been verified. Credentials: ' . $username);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function roomShow()
    {
        $rooms = Room::all();
        return view('modules.admission.rooms', compact('rooms'));
    }

    public function createRoom(Request $request)
    {
        $exists = Room::where('name', $request->room_name);
        if ($exists->count()) {
            return redirect()->route('get.admission.rooms');
        }
        $room = new Room;
        $room->name = $request->room_name;
        $room->save();
        return redirect()->route('get.admission.rooms');
    }

    public function getRoom(Request $request)
    {
        return Room::find($request->id);
    }

    public function editRoom(Request $request)
    {
        $room = Room::find($request->id);
        $room->name = $request->room_name;
        $room->save();
        return redirect()->back();
    }

    public function deleteRoom(Request $request)
    {
        $room = Room::find($request->id);
        $room->delete();
        return;
    }

    public function subjectShow()
    {
        $subjects = Subject::all();
        return view('modules.admission.subjects', compact('subjects'));
    }

    public function createSubjects(Request $request)
    {
        $exists = Subject::where('name', $request->subject_name);
        if ($exists->count()) {
            return redirect()->route('get.admission.subjects');
        }
        $subject = new Subject;
        $subject->name = $request->subject_name;
        $subject->save();
        return redirect()->route('get.admission.subjects');
    }

    public function getSubjects(Request $request)
    {
        return Subject::find($request->id);
    }

    public function editSubjects(Request $request)
    {
        $subject = Subject::find($request->id);
        $subject->name = $request->subject_name;
        $subject->save();
        return redirect()->back();
    }

    public function deleteSubjects(Request $request)
    {
        $subject = Subject::find($request->id);
        $subject->delete();
        return;
    }

    public function sectionShow(Request $request)
    {
        $role = Role::where('name', 'Faculty')->first();
        $faculty = $role->users()->get();
        $rooms = Room::all();
        $sections = Section::all();
        return view('modules.admission.sections', compact('faculty', 'rooms', 'sections'));
    }

    public function sectionAdd(Request $request)
    {
        $faculty = User::find($request->adviser_id);

        $sections = Section::where('grade_level', $request->grade_level)->where('school_year', $request->school_year)->where('room_id', $request->room_id)->first();

        if (!empty($faculty->sections()->where('grade_level', $request->grade_level)->where('school_year', $request->school_year)->where('room_id', $request->room_id)->first())) {
            return redirect()->route('get.admission.sections');
        }

        if (!empty($faculty->sections()->where('grade_level', $request->grade_level)->where('school_year', $request->school_year)->first())) {
            return redirect()->route('get.admission.sections');
        }

        if ($sections) {
            return redirect()->route('get.admission.sections');

        }

        $data = $request->all();
        $section = new Section;
        $section->fill($data)->save();
        return redirect()->route('get.admission.sections');
    }

    public function getSection(Request $request)
    {
        return Section::find($request->id);
    }

    public function sectionEdit(Request $request)
    {
        $section = Section::find($request->id);
        $section->fill($request->all())->save();
        return redirect()->route('get.admission.sections');
    }

    public function sectionDelete(Request $request)
    {
        $section = Section::find($request->id);
        $section->delete();
        return;
    }

    public function manualAddStudent(Request $request)
    {
        $this->validate($request, [
            'email' => 'sometimes|required|max:191|email|unique:users',
            'contact_number' => 'numeric',
            'guardian_contact' => 'numeric',
        ]);

        if ($request->has_birthcert === 'on' && $request->has_form137 === 'on' && $request->has_goodmoral === 'on') {
            $request->merge(['has_birthcert' => true]);
            $request->merge(['has_form137' => true]);
            $request->merge(['has_goodmoral' => true]);
        } else {
            return redirect()->back()->withErrors('Error Requirements');
        }
        $username = str_random(8);
        $user = new User;
        $request->request->add(['username' => $username]);
        $request->request->add(['password' => bcrypt($username)]);
        $request->request->add(['status' => 'Active']);
        $user->fill($request->all())->save();
        $role_student = Role::where('name', 'Student')->first();
        $user->roles()->attach($role_student);

        $student = new Student;
        $last_student = Student::where('lrn', '!=', null)->latest()->first();
        if (empty($last_student)) {
            $student_new = 1000001;
        } else {
            $student_new = (int) $last_student->lrn += 1;
        }
        $request->request->add(['is_verified' => true]);
        $request->request->add(['lrn' => $student_new]);
        $request->request->add(['user_id' => $user->id]);
        $student->fill($request->all())->save();
        return redirect()->back();
    }
}
