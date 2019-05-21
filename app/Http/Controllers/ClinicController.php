<?php

namespace App\Http\Controllers;

use App\BMI;
use App\ClinicChecking;
use App\ClinicGeneral;
use App\Inventory;
use App\Room;
use App\Section;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files_count = ClinicGeneral::where('type', 'file')->count();
        $logs_count = ClinicGeneral::where('type', 'log')->count();
        $seminars_count = ClinicGeneral::where('type', 'seminar')->count();

        return view('modules.clinic.index', compact('files_count', 'logs_count', 'seminars_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFiles()
    {
        $files = ClinicGeneral::where('type', 'file')->get();

        return view('modules.clinic.file', compact('files'));
    }

    public function uploadFiles(Request $request)
    {
        $dbfile = new ClinicGeneral;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $data = [
                'description' => $name,
                'type' => 'file',
            ];
            $file->move("uploads/", $file->getClientOriginalName());
            $dbfile->create($data);
        }
        return redirect()->back();
    }

    public function delteFiles(Request $request)
    {
        $end = ClinicGeneral::find($request->id);
        if (empty($end)) {
            return;
        }
        $end->delete();
        return;
    }

    public function showLogs()
    {
        $logs = ClinicGeneral::where('type', 'log')->get();

        return view('modules.clinic.log', compact('logs'));
    }

    public function addLogs(Request $request)
    {
        $data = $request->all();
        $dbfile = new ClinicGeneral;
        $dbfile->create($data);
        if ($data['type'] === 'log') {
            return redirect(url('clinic/logs'));
        } else {
            return redirect(url('clinic/seminar'));
        }
    }

    public function showSeminar()
    {
        $seminars = ClinicGeneral::where('type', 'seminar')->get();
        return view('modules.clinic.seminar', compact('seminars'));
    }

    public function showDeworming(Request $request)
    {
        $faculty = User::all();
        $rooms = Room::all();
        $secs = Section::all();
        $students = Student::where('is_verified', '1')->get();
        $sections = [];
        foreach ($secs as $key => $value) {
            $value->check_count = ClinicChecking::where('type', 'deworm')->where('section_id', $value->id)->where('answer', 'yes')->where('date', $value->school_year)->count();
            $sections[] = $value;
        }
        return view('modules.clinic.deworming', compact('faculty', 'rooms', 'sections', 'students'));
    }

    public function showStudents($id)
    {
        $section = Section::find($id);
        $check_count = ClinicChecking::where('type', 'deworm')->where('section_id', $section->id)->where('answer', 'yes')->where('date', $section->school_year)->count();

        $students = [];
        foreach ($section->students()->get() as $key => $value) {
            $check = ClinicChecking::where('type', 'deworm')->where('section_id', $section->id)->where('user_id', $value->id)->first();
            if ($check) {
                $value->deworm_id = $check->id;
                $value->answer = $check->answer;
            }
            $students[] = $value;
        }

        return view('modules.clinic.viewSection', compact('section', 'modelCheck', 'students', 'check_count'));

    }

    public function dewormStudent(Request $request)
    {
        $data = $request->all();
        if ($request->checking_id) {
            $modelCheck = ClinicChecking::find($data['checking_id']);
        } else {
            $modelCheck = new ClinicChecking;
        }
        $section = Section::find($data['section_id']);
        $data['date'] = $section->school_year;
        $modelCheck->fill($data)->save();
        return redirect()->back();
    }

    public function showFolic(Request $request)
    {
        $faculty = User::all();
        $rooms = Room::all();
        $secs = Section::all();
        $students = Student::where('is_verified', '1')->get();
        $sections = [];
        foreach ($secs as $key => $value) {
            $value->check_count = ClinicChecking::where('type', 'folic')->where('section_id', $value->id)->where('answer', 'yes')->where('date', $value->school_year)->count();
            $sections[] = $value;
        }
        return view('modules.clinic.folic', compact('faculty', 'rooms', 'sections', 'students'));
    }

    public function showFolicStudents($id)
    {
        $section = Section::find($id);
        $check_count = ClinicChecking::where('type', 'folic')->where('section_id', $section->id)->where('answer', 'yes')->where('date', $section->school_year)->count();

        $students = [];
        foreach ($section->students()->get() as $key => $value) {
            $check = ClinicChecking::where('type', 'folic')->where('section_id', $section->id)->where('user_id', $value->id)->first();
            if ($check) {
                $value->deworm_id = $check->id;
                $value->answer = $check->answer;
            }
            $students[] = $value;
        }

        return view('modules.clinic.folicSection', compact('section', 'modelCheck', 'students', 'check_count'));

    }

    public function folicStudent(Request $request)
    {
        $data = $request->all();
        if ($request->checking_id) {
            $modelCheck = ClinicChecking::find($data['checking_id']);
        } else {
            $modelCheck = new ClinicChecking;
        }
        $section = Section::find($data['section_id']);
        $data['date'] = $section->school_year;
        $modelCheck->fill($data)->save();
        return redirect()->back();
    }

    public function showFeeding(Request $request)
    {
        $faculty = User::all();
        $rooms = Room::all();
        $secs = Section::all();
        $students = Student::where('is_verified', '1')->get();
        $sections = [];
        foreach ($secs as $key => $value) {
            $value->check_count = ClinicChecking::where('type', 'feed')->where('section_id', $value->id)->where('answer', 'yes')->where('date', $value->school_year)->count();
            $sections[] = $value;
        }
        return view('modules.clinic.feed', compact('faculty', 'rooms', 'sections', 'students'));
    }

    public function showFeedingStudents($id)
    {
        $section = Section::find($id);
        $check_count = ClinicChecking::where('type', 'feed')->where('section_id', $section->id)->where('answer', 'yes')->where('date', $section->school_year)->count();

        $students = [];
        foreach ($section->students()->get() as $key => $value) {
            $check = ClinicChecking::where('type', 'feed')->where('section_id', $section->id)->where('user_id', $value->id)->first();
            if ($check) {
                $value->deworm_id = $check->id;
                $value->answer = $check->answer;
            }
            $students[] = $value;
        }

        return view('modules.clinic.feedSection', compact('section', 'modelCheck', 'students', 'check_count'));

    }

    public function feedingStudent(Request $request)
    {
        $data = $request->all();
        if ($request->checking_id) {
            $modelCheck = ClinicChecking::find($data['checking_id']);
        } else {
            $modelCheck = new ClinicChecking;
        }
        $section = Section::find($data['section_id']);
        $data['date'] = $section->school_year;
        $modelCheck->fill($data)->save();
        return redirect()->back();
    }

    public function showNutritional(Request $request)
    {
        $faculty = User::all();
        $rooms = Room::all();
        $secs = Section::all();
        $students = Student::where('is_verified', '1')->get();
        $sections = [];
        foreach ($secs as $key => $value) {
            $value->check_count = ClinicChecking::where('type', 'feed')->where('section_id', $value->id)->where('answer', 'yes')->where('date', $value->school_year)->count();
            $sections[] = $value;
        }
        return view('modules.clinic.nutritional', compact('faculty', 'rooms', 'sections', 'students'));
    }

    public function showNutritionalStudents($id)
    {
        $section = Section::find($id);
        $check_count = ClinicChecking::where('type', 'nutrition')->where('section_id', $section->id)->where('answer', 'yes')->where('date', $section->school_year)->count();

        $students = [];
        foreach ($section->students()->get() as $key => $value) {
            $check = ClinicChecking::where('type', 'nutrition')->where('section_id', $section->id)->where('user_id', $value->id)->first();
            if ($check) {
                $value->deworm_id = $check->id;
                $value->answer = $check->answer;
            }
            $students[] = $value;
        }

        return view('modules.clinic.nutritionSection', compact('section', 'modelCheck', 'students', 'check_count'));

    }

    public function nutritionalStudent(Request $request)
    {
        $data = $request->all();
        if ($request->checking_id) {
            $modelCheck = ClinicChecking::find($data['checking_id']);
        } else {
            $modelCheck = new ClinicChecking;
        }
        $section = Section::find($data['section_id']);
        $data['date'] = $section->school_year;
        $modelCheck->fill($data)->save();
        return redirect()->back();
    }

    public function showBMI(Request $request)
    {
        $students = Student::where('is_verified', '1')->get();

        return view('modules.clinic.bmi', compact('students'));
    }

    public function showBMIStudents($id)
    {
        $bmis = BMI::where('student_id', $id)->get();
        $student = Student::find($id);
        $sections = $student->sections()->get();
        return view('modules.clinic.bmiSection', compact('bmis', 'sections', 'id', 'student'));

    }

    public function bmiStudent(Request $request)
    {
        $data = $request->all();
        $data['year'] = $data['month'] . " - " . $data['years'];
        if (isset($data['id'])) {
            $bmi = BMI::find($data['id']);
        } else {
            $bmi = new BMI;
        }
        $bmi->fill($data);
        $bmi->save();
        return redirect()->route('clinic.bmi.section', $bmi->student_id);
    }

    public function getBMIStudents(Request $request)
    {
        $data = $request->all();
        $bmi = BMI::where('student_id', $data['student_id'])->where('section_id', $data['section_id'])->first();
        if (empty($bmi)) {
            $bmi = new BMI;
            $bmi->fill($data);
            $bmi->save();
        }
        return $bmi;
    }

    public function bmiDetail(Request $request)
    {
        $bmi = BMI::find($request->id);
        $sep = explode(" - ", $bmi->year);
        $bmi->month = $sep[0];
        $bmi->years = $sep[1];
        return $bmi;
    }

    public function bmiSections(Request $request)
    {
        $sections = Section::all();

        return view('modules.clinic.sectionsBmi', compact('sections'));
    }

    public function bmiStudents($id)
    {
        $section = Section::find($id);
        $students = $section->students()->get();
        $data = [
            'total' => 0,
            'underweight' => 0,
            'normal' => 0,
            'overweight' => 0,
        ];
        foreach ($students as $student) {
            $bmi = $student->bmis()->orderBy('created_at', 'desc')->first();
            if ($bmi) {
                if ($bmi->result === 'underweight') {
                    $data['underweight']++;
                } elseif ($bmi->result === 'normal') {
                    $data['normal']++;

                } elseif ($bmi->result === 'overweight') {
                    $data['overweight']++;
                }
                $data['total']++;
            }
        }
        return view('modules.clinic.bmiStudent', compact('section', 'students', 'data'));
    }

    public function inventoryGet()
    {
        $inventories = Inventory::all();
        return view('modules.clinic.inventory', compact('inventories'));
    }

    public function inventoryCreate(Request $request)
    {
        $data = $request->all();
        $inven = new Inventory;
        $inven->fill($data);
        $inven->save();
        return redirect()->back();
    }

    public function inventoryEditView(Request $request)
    {
        $inventories = Inventory::find($request->id);

        return response()->json($inventories);
    }

    public function inventoryUpdate(Request $request)
    {
        $data = $request->all();
        $inven = Inventory::find($data['id']);
        $inven->fill($data);
        $inven->save();
        return redirect()->back();
    }

    public function inventoryDelete(Request $request)
    {
        $invent = Inventory::find($request->id);
        if (empty($invent)) {
            return;
        }
        $invent->delete();
        return;
    }

}
