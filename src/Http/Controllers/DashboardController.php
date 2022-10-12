<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view("project-management::dashboard");
    }
}
