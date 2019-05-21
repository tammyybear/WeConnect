<?php

namespace App\Http\Controllers;

use App\Room;
use App\Section;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function showEnrollment(Request $request)
    {
        $faculty = User::all();
        $rooms = Room::all();
        $sections = Section::all();
        $students = Student::where('is_verified', 1)->get();
        return view('modules.enrollment.index', compact('faculty', 'rooms', 'sections', 'students'));
    }

    public function enrollStudent(Request $request)
    {
        $section = Section::find($request->section_id);
        $student = Student::find($request->student_id);

        if ($student->sections()->where('school_year', $section->school_year)->count()) {
            return response()->json(['error' => 'invalid request'], 403);
        }
        if (empty($section) || empty($student)) {
            return response()->json(['error' => 'invalid request'], 403);
        }
        if ($section->students()->where('id', $student->id)->count()) {
            return response()->json(['error' => 'invalid request'], 403);
        }
        $section->students()->attach($student->id);
        return $section;
    }

    public function viewSection($id)
    {
        $section = Section::find($id);
        $students = $section->students()->get();
        return view('modules.enrollment.section', compact('section', 'students'));
    }

    public function removeStudentFromSection(Request $request)
    {
        $section = Section::find($request->section_id);
        $student = Student::find($request->student_id);
        if (empty($section) || empty($student)) {
            return response()->json(['error' => 'invalid request'], 403);
        }
        if (!$section->students()->where('id', $student->id)->count()) {
            return response()->json(['error' => 'invalid request'], 403);
        }
        $section->students()->detach($student->id);
        return redirect()->back();
    }
}
