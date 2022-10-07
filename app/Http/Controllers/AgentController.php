<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Application;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use PDF;

class AgentController extends Controller
{
    private $i = 0;

    public function index()
    {
        $users = Agent::where('status',1)->get();
        return view('backend.agents.agents', with(['users'=>$users]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new Agent();
        do {
            $code = random_int(100000, 999999);
        } while (Application::where("code", "=", $code)->first());
        $code = 'CVIA-'. $code;

        $user = $this->patch($user, $request, $code);
        $user->save();

        // $user->assignRole('agent');

        session()->flash('success', 'Registration Form submitted Successfully');
        return back();
    }

    public function generateAgentPdf($id)
    {
        $agent = Agent::find($id);

        $data = [
            'agent' => $agent
        ];

        $pdf = PDF::loadView('pdf.agent', $data);
        return $pdf->download('Agent-'.$agent->code.'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);
        return view('backend.agents.view', ['agent'=> $agent]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('backend.agents.edit', ['agent'=> $agent]);
    }

    
    public function applicationList()
    {
        $applications = Application::where('referrer',Auth::id())->get();
        $status = Status::all();
        $agents = User::all();
        return view('backend.application.application_list', ['applications' => $applications, 'status' => $status, 'agents'=>$agents]);
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
        $agent = Agent::find($id);
        

        // Validation
        $request->validate([
            'email' => 'required|email|unique:agents,email,'.$id,
        ]);

        $agent = $this->patch($agent, $request, $agent->code);

        if($agent->save()){
            $user = User::where('agent_id',$id)->first();
            $user->email = $agent->email;
            $user->save();
            session()->flash('success', 'Agent has been Updated');
            return back();
        }
    }

    /**
     * @param $request
     * @param $application
     * @param $code
     * @return object
     */
    private function patch($user, $request, $code): object
    {
        $user->code = $code;
        $user->agency_name = $request->agency_name;
        $user->email = $request->email;
        $user->contact_person = $request->contact_person;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->skype = $request->skype;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zipcode = $request->zipcode;
        $user->web_address = $request->web_address;

        $user->logo = $this->image($user, $request->logo, 1);
        $user->license = $this->image($user, $request->license, 2);
        $user->nid_or_passport = $this->image($user, $request->nid_or_passport, 3);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        return $user;
    }

    /**
     * @param $application->name
     * @param $request->image
     */
    private function image($user, $image, $image_type)
    {
        $this->i++;
        if (!empty($image)) {
            if ($image_type == 1 && (!empty($user->logo))) {
                if (file_exists(public_path('storage/agents/' . $user->code . '/' . $user->logo))) {
                    unlink(public_path('storage/agents/' . $user->code . '/' . $user->logo));
                }
            } elseif ($image_type == 2 && (!empty($user->license))) {
                if (file_exists(public_path('storage/agents/' . $user->code . '/' . $user->license))) {
                    unlink(public_path('storage/agents/' . $user->code . '/' . $user->license));
                }
            } elseif ($image_type == 2 && (!empty($user->nid_or_passport))) {
                if (file_exists(public_path('storage/agents/' . $user->code . '/' . $user->nid_or_passport))) {
                    unlink(public_path('storage/agents/' . $user->code . '/' . $user->nid_or_passport));
                }
            } else {}

            $image_name = $this->i . '-' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/agents/' . $user->code . '/', $image_name);
            return $image_name;
        } else {
            if ($image_type == 1) {
                return $user->logo;
            } elseif ($image_type == 2) {
                return $user->license;
            } else {
                return $user->nid_or_passport;
            }
        }
    }

    public function pendingAgent(){
        $agents = Agent::where('status', '0')->get();
        return view('backend.agents.pending_agents', with(['agents'=>$agents]));
    }

    public function approveAgent($id){

        $agent = Agent::find($id);
        $agent->status = 1;
        if($agent->save()){
            $user = new User();
            $user->name = $agent->agency_name;
            $user->email = $agent->email;
            $user->password = $agent->password;
            $user->agent_id = $agent->id;
            $user->assignRole('agent');
            $user->save();
        }
        return redirect('/admin/agent/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);

        if (!is_null($agent)) {
            if($agent->delete()){
                $user = User::where('agent_id', $id);
                if (!is_null($user)) {
                    $user->delete();
                }
                session()->flash('success', 'Agent has been Deleted');
            }

        }

        return back();
    }
}
