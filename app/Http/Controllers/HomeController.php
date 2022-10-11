<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Application;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applications = Application::all()->count();
        $agentApplications = Application::where('referrer',Auth::id())->count();
        $agents = Agent::where('status',1)->get()->count();
        $pendingAgents = Agent::where('status',0)->get()->count();
        $tasks = Task::orderBy('task_date','ASC')->paginate(7);
        $pendingTasks = Task::where('status',0)->count();
        return view('backend.dashboard',['applications'=>$applications, 'agents'=>$agents, 'pendingAgents'=>$pendingAgents, 'tasks'=>$tasks, 'pendingTasks'=>$pendingTasks, 'agentApplications'=>$agentApplications]);
    }
}
