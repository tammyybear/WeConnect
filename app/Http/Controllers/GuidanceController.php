<?php

namespace App\Http\Controllers;

use App\IncidentReport;
use App\Student;
use Illuminate\Http\Request;
use Session;

class GuidanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = IncidentReport::all();
        $students = Student::where('is_verified', 1)->get();
        return view('modules.guidance.index', compact('reports', 'students'));
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
        $id = (int) explode('-', $request->student)[0];
        $check = Student::where('lrn', $id)->first();
        if (!empty($check)) {
            $report = new IncidentReport;
            $request->request->add(['student_id' => $id]);
            $report->fill($request->all())->save();
            Session::flash('flash_message', 'Reported!');
            return redirect()->back();
        } else {
            Session::flash('flash_message', 'Error student not found!');
            return redirect()->back();
        }
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
}
