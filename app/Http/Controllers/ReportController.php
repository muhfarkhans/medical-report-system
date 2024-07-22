<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;

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

    public function export_excel()
    {
        $reports = Report::select(
            'd.name as doctor_name',
            'p.name as patient_name',
            'reports.diagnosis',
            'reports.treatment',
            'reports.prescription',
            'reports.medical_condition',
            'reports.medical_history',
            'reports.family_history',
            'reports.immunizations',
            'reports.lab_results',
            'reports.blood_pressure',
            'reports.created_at',
            'reports.updated_at'
        )
        ->join('users as d', 'reports.doctor_id', '=', 'd.id')
        ->join('users as p', 'reports.patient_id', '=', 'p.id')
        ->orderBy('reports.created_at', 'desc')
        ->get();

        $number = 1;

        $numberedReports = $reports->map(function ($report) use (&$number) {
            return [
                'No. ' => $number++,
                'Doctor' => $report['doctor_name'],
                'Patient' => $report['patient_name'],
                'Diagnosis' => $report['diagnosis'],
                'Treatment' => $report['treatment'],
                'Prescription' => $report['prescription'],
                'Medical Condition' => $report['medical_condition'],
                'Medical History' => $report['medical_history'],
                'Family History' => $report['family_history'],
                'Immunizations' => $report['immunizations'],
                'Lab Results' => $report['lab_results'],
                'Blood Pressure' => $report['blood_pressure'],
                'created_at' => $report['created_at']->format('Y-m-d H:i'),
                'updated_at' => $report['updated_at']->format('Y-m-d H:i'),
            ];
        });

        return (new FastExcel($numberedReports))->download('reports.xlsx');
    }
}
