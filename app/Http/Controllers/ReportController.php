<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('created_at', 'desc')->get();

        return view('report.index', [
            'reports' => $reports
        ]);
    }

    public function create()
    {
        $users = User::with('profile')->where('role', 'user')->orderBy('created_at','desc')->get();
        // return $users;
        return view('report.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $rules = [
            'patient_id' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'blood_pressure' => 'required',
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Report::create([
            'doctor_id'         => Auth::user()->id,
            'patient_id'        => $request->input('patient_id'),
            'diagnosis'         => $request->input('diagnosis'),
            'treatment'         => $request->input('treatment'),
            'prescription'      => $request->input('prescription'),
            'medical_condition' => $request->input('medical_condition'),
            'medical_history'   => $request->input('medical_history'),
            'family_history'    => $request->input('family_history'),
            'immunizations'     => $request->input('immunizations'),
            'lab_results'       => $request->input('lab_results'),
            'blood_pressure'    => $request->input('blood_pressure'),
        ]);

        return redirect()->route('report.index')->with('success', 'Report created successfully.');
    }

    public function edit($id)
    {
        $report = Report::where('id', $id)->first();
        $users = User::where('role', 'user')->orderBy('created_at','desc')->get();
        return view('report.edit', [
            'report'=> $report,
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'patient_id' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'blood_pressure' => 'required',
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Report::where('id', $id)->update([
            'doctor_id'         => Auth::user()->id,
            'patient_id'        => $request->input('patient_id'),
            'diagnosis'         => $request->input('diagnosis'),
            'treatment'         => $request->input('treatment'),
            'prescription'      => $request->input('prescription'),
            'medical_condition' => $request->input('medical_condition'),
            'medical_history'   => $request->input('medical_history'),
            'family_history'    => $request->input('family_history'),
            'immunizations'     => $request->input('immunizations'),
            'lab_results'       => $request->input('lab_results'),
            'blood_pressure'    => $request->input('blood_pressure'),
        ]);

        return redirect()->route('report.index')->with('success', 'Report updated successfully.');
    }

    public function delete($id)
    {
        Report::where('id', $id)->delete();
        return redirect()->route('report.index')->with('success', 'Report deleted successfully');
    }
}
