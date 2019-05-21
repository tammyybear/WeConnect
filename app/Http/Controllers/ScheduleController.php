<?php

namespace App\Http\Controllers;

use App\RequestForm;
use App\Role;
use App\Schedule;
use App\Section;
use App\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function requestForms()
    {
        $fuckshit = RequestForm::all();
        return view('modules.forms.request_form', compact('fuckshit'));
    }

    public function showSchedules(Request $request)
    {
        $faculty = Role::where('name', 'Faculty')->first()->users()->get();
        $sections = Section::all();
        $subjects = Subject::all();
        $schedules = Schedule::all();
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        return view('modules.schedule.index', compact('faculty', 'sections', 'subjects', 'days', 'schedules'));
    }

    public function addSchedule(Request $request)
    {

        $data = $request->all();
        $datas = [];
        unset($data['_token']);
        $time = $data['shour'] . ":" . $data['sminute'] . " " . $data['sampm'];
        $time = new \DateTime($time);
        $time2 = $data['ehour'] . ":" . $data['eminute'] . " " . $data['eampm'];
        $time2 = new \DateTime($time2);
        $days = null;
        $check = Schedule::query();
        if (!isset($data['days'])) {
            return redirect()->route('get.schedules');
        }
        foreach ($data['days'] as $key => $value) {
            if ($key === 0) {
                $check->orWhere('days', 'like', '%' . $value . '%');
                $days = $value;
                continue;
            }
            $check->orWhere('days', 'like', '%' . $value . '%');
            $days .= "," . $value;
        }
        $data['days'] = $days;
        $data['start_time'] = $time->format('H:i:s');
        $data['end_time'] = $time2->format('H:i:s');
        if ($data['start_time'] >= $data['end_time']) {
            return redirect()->route('get.schedules');
        }
        $exist = true;
        // foreach ($check->get() as $key => $value2) {

        //     $dtime = new \DateTime($value2->start_time);
        //     $dtime2 = new \DateTime($value2->end_time);
        //     if ($dtime <= $time && $time < $dtime2) {

        //         $exist = false;

        //     }
        //     if ($dtime <= $time2 && $time2 < $dtime2) {
        //         $exist = false;
        //     }

        //     if ($dtime <= $time && $time < $dtime2 && $value2->user_id == $data['user_id']) {
        //         $exist = false;
        //     }

        //     if ($dtime <= $time2 && $time < $dtime2 && $value2->user_id == $data['user_id']) {
        //         $exist = false;
        //     }
        //     if ($value2->section_id != $data['section_id']) {
        //         continue;
        //     }
        // }

        if ($exist) {
            $sched = new Schedule;
            $sched->fill($data)->save();
        }

        return redirect()->route('get.schedules');
    }

    public function getSchedule(Request $request)
    {
        $schedule = Schedule::find($request->id);
        if (empty($schedule)) {
            return null;
        }
        $days = explode(',', $schedule->days);

        $time = new \DateTime($schedule->start_time);
        $time2 = new \DateTime($schedule->end_time);
        $time = $time->format('h:i A');
        $time2 = $time2->format('h:i A');

        $time = explode(':', $time);
        $hour = $time[0];
        $min = explode(' ', $time[1]);
        $schedule->shour = (int) $hour;
        $schedule->sminute = $min[0];
        $schedule->sampm = $min[1];

        $time = explode(':', $time2);
        $hour = $time[0];
        $min = explode(' ', $time[1]);
        $schedule->ehour = (int) $hour;
        $schedule->eminute = $min[0];
        $schedule->eampm = $min[1];

        $schedule->days = $days;
        return $schedule;
    }

    public function editSchedule(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $data = $request->all();
        $datas = [];
        unset($data['_token']);
        $time = $data['shour'] . ":" . $data['sminute'] . " " . $data['sampm'];
        $time = new \DateTime($time);
        $time2 = $data['ehour'] . ":" . $data['eminute'] . " " . $data['eampm'];
        $time2 = new \DateTime($time2);
        $check = Schedule::query();
        $days = null;
        if (!isset($data['days'])) {
            return redirect()->route('get.schedules');
        }
        foreach ($data['days'] as $key => $value) {
            if ($key === 0) {
                $check->orWhere('days', 'like', '%' . $value . '%');
                $days = $value;
                continue;
            }
            $check->orWhere('days', 'like', '%' . $value . '%');
            $days .= "," . $value;
        }
        $data['days'] = $days;
        if ($time >= $time2) {
            return redirect()->route('get.schedules');
        }
        $exist = true;
        foreach ($check->get() as $key => $value) {
            $dtime = new \DateTime($value->start_time);
            $dtime2 = new \DateTime($value->end_time);
            if ($dtime <= $time && $time < $dtime2) {
                $exist = false;
            }
            if ($dtime <= $time2 && $time2 < $dtime2) {
                $exist = false;
            }

            if ($dtime <= $time && $time < $dtime2 && $value2->user_id == $data['user_id']) {
                $exist = false;
            }

            if ($dtime <= $time2 && $time < $dtime2 && $value2->user_id == $data['user_id']) {
                $exist = false;
            }
            if ($value->id == $request->id) {
                continue;
            }
            if ($value->section_id != $data['section_id']) {
                continue;
            }
        }
        if ($exist) {
            $data['start_time'] = $time->format('H:i:s');
            $data['end_time'] = $time2->format('H:i:s');
            $schedule->fill($data)->save();
        }
        return redirect()->route('get.schedules');
    }

    public function deleteSchedule(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        return;
    }
}
