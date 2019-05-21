<?php

namespace App\Http\Controllers;

use App\Nonacad;
use App\RequestForm;
use App\Schedule;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function asd()
    {
        $xafasasfasg = Nonacad::where('user_id', auth()->user()->id)->get();
        return view('xx', compact('xafasasfasg'));
    }

    public function qwe(Request $request)
    {
        $asd = new Nonacad;
        $asd->fill($request->all())->save();
        return back();
    }

    public function xaxaxaxaxax(Request $request)
    {
        $asd = Nonacad::find($request->id);
        $asd->delete();
        return back();
    }

    public function checkheck(Request $request)
    {
        if ($request->is_checked == 'on') {
            $request->merge(['is_checked' => true]);
        }
        RequestForm::find($request->id)->fill($request->all())->save();
        return redirect()->back();
    }

    public function xxx(Request $request)
    {
        $tarantado = str_random(8);
        if ($request->request_text == null) {
            $data = [
                'name' => $request->name,
                'request' => $request->get('request'),
                'code' => $tarantado,
            ];
            $user = new RequestForm;
            $user->fill($data)->save();

        } else {
            $data = [
                'name' => $request->name,
                'request' => $request->request_text,
                'code' => $tarantado,
            ];
            $user = new RequestForm;
            $user->fill($data)->save();
        }

        \Session::flash('flash_message', 'CODE: ' . $tarantado);
        return redirect()->back();
    }

    public function fuckshit()
    {
        return view('modules.forms.student');
    }

    public function grades()
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $sections = $student->sections()->get();
        $grades = [];
        foreach ($sections as $key => $value) {
            $grades[$value->id]['schedules'] = Schedule::where('section_id', $value['id'])->get();
            $grades[$value->id]['section'] = $value;

            foreach ($grades[$value->id]['schedules'] as $k => $v) {
                $grades[$value->id]['schedules'][$k]['grade'] = $v->grades()->where('student_id', $student->id)->first();
            }
        }
        return view('modules.student.grades', compact('grades'));
    }

    public function schedule()
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $sections = $student->sections()->get();
        $scheds = [];
        foreach ($sections as $key => $value) {
            $scheds[$value->id]['schedules'] = Schedule::where('section_id', $value['id'])->get();
            $scheds[$value->id]['section'] = $value->toArray();
        }
        return view('modules.student.schedule', compact('scheds'));
    }
}
