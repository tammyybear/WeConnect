<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\GradeRequest;
use App\Schedule;
use App\User;

class TeacherController extends Controller
{
    public function sections()
    {
        $classes = auth()->user()->schedules()->get();
        return view('modules.teacher.index', compact('classes'));
    }

    public function grades($sched)
    {
        $schedule = Schedule::find($sched);
        $section = $schedule->section()->first();
        $students = $section->students()->get();
        return view('modules.teacher.students', compact('schedule', 'students'));
    }

    public function gradeSave(GradeRequest $request)
    {
        if (empty($request->grade_id)) {
            $grade = new Grade;
            $grade->fill($request->all())->save();
            return redirect()->back();
        } else {
            $grade = Grade::find($request->grade_id);
            $grade->update($request->all());
            return redirect()->back();
        }
    }

    public function schedule()
    {
        $classes = auth()->user()->schedules()->get();
        return view('modules.teacher.schedule', compact('classes'));
    }
}
