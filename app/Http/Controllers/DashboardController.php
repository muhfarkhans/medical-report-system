<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = User::where('role', 'user')->count();
        $total_admin = User::where('role', 'admin')->count();
        $total_report = Report::count();
        $total_report_today = Report::whereDate('created_at', now()->format('Y-m-d'))->count();
        return view("dashboard.index", [
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'total_report' => $total_report,
            'total_report_today' => $total_report_today,
        ]);
    }

    public function queue()
    {
        return view("dashboard.queue");
    }
}
