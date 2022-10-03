<?php

namespace App\Http\Controllers;

use App\Mail\applicationConfirmMail;
use App\Mail\applicationEmail;
use App\Mail\statusEmail;
use App\Models\Agent;
use App\Models\Application;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class ApplicationController extends Controller
{
    private $i = 0;

    public function index()
    {
        $agents = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'agent');
            }
        )->get();

        $earliest_year = Carbon::now()->format('Y');
        return view('frontend.application_form', with(['agents' => $agents, 'earliest_year' => $earliest_year]));
    }

    public function store(Request $request)
    {
 
        $application = new Application();

        do {
            $code = random_int(100000, 999999);
        } while (Application::where("code", "=", $code)->first());

        $date = Carbon::now()->format('y');
        $code = 'CVI-' . $date . $code;

        $application = $this->patch($application, $request, $code);
       
        $admin = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->get();

        $agents = User::whereHas('roles', function ($q) {
            $q->where('name', 'agent');
        })->get();

        $data = [
            'application' => $application,
            'agents' => $agents
        ];

        $pdf = PDF::loadView('pdf.application', $data);
       
        $pdf->download('ApplicationForm.pdf'); 
        
        Storage::put('public/applications/' . $application->code . '/ApplicationForm.pdf', $pdf->output());
        if ($application->save()) {
            Mail::to($admin[0]->email)->send(new applicationEmail($application));
            Mail::to($application->email)->send(new applicationConfirmMail($application));

            session()->flash('success', 'Application submitted Successfully');
            return back();
        }
    }

    public function generatePdf($id)
    {
        $application = Application::find($id);
        $agents = User::whereHas('roles', function ($q) {
            $q->where('name', 'agent');
        })->get();

        $data = [
            'application' => $application,
            'agents' => $agents
        ];

        $pdf = PDF::loadView('pdf.application', $data);
        return $pdf->download('ApplicationForm.pdf');
    }

    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        $prevStatus = $application->status;
        $application = $this->patch($application, $request, $application->code);
        $application->status = $request->status ?? $prevStatus;
        $application->comments = $request->comments;

        if ($application->save()) {
            if (!empty($request->status)) {
                if ($prevStatus != $request->status) {
                    $status = Status::find($request->status);
                    $email = [
                        'application' => $application,
                        'status' => $status->name
                    ];
                    Mail::to($request->email)->send(new statusEmail($email));
                }
            }
            return redirect('/application/' . $application->id . '/show');
        }
    }

    /**
     * @param $request
     * @param $application
     * @param $code
     * @return object
     */
    private function patch($application, $request, $code): object
    {
        $application->code = $code;
        $application->name = $request->name;
        $application->mobile = $request->mobile;
        $application->email = $request->email;
        $application->birth_date = $request->birth_date;
        $application->passport = $request->passport;
        $application->passport_expire = $request->passport_expire;
        $application->maritial_status = $request->maritial_status;
        $application->nationality = $request->nationality;
        $application->country_of_residence = $request->country_of_residence;
        $application->address = $request->address;
        $application->ssc = $request->ssc;
        $application->ssc_year = $request->ssc_year;
        $application->ssc_institute = $request->ssc_institute;
        $application->ssc_cgpa = $request->ssc_cgpa;
        $application->hsc = $request->hsc;
        $application->hsc_year = $request->hsc_year;
        $application->hsc_institute = $request->hsc_institute;
        $application->hsc_cgpa = $request->hsc_cgpa;
        $application->bachelor = $request->bachelor;
        $application->bachelor_year = $request->bachelor_year;
        $application->bachelor_institute = $request->bachelor_institute;
        $application->bachelor_cgpa = $request->bachelor_cgpa;
        $application->master = $request->master;
        $application->master_year = $request->master_year;
        $application->master_institute = $request->master_institute;
        $application->master_cgpa = $request->master_cgpa;
        $application->proof_of_language = $request->proof_of_language;
        $application->ielts = $request->ielts;
        $application->study_destination = $request->study_destination;
        $application->intake_month = $request->intake_month;
        $application->intake_year = $request->intake_year;
        $application->prepared_institution1 = $request->prepared_institution1;
        $application->subject_of_interest1 = $request->subject_of_interest1;
        $application->prepared_institution2 = $request->prepared_institution2;
        $application->subject_of_interest2 = $request->subject_of_interest2;
        $application->source = $request->source;
        $application->referrer = $request->referrer;
        $application->remarks = $request->remarks;
        $application->experience = $request->experience;
        $application->working_position = $request->working_position;
        $application->working_place = $request->working_place;

        $application->photo = $this->image($application, $request->photo, 1);
        $application->passport_info = $this->image($application, $request->passport_info, 2);
        $application->academic_docs = $this->image($application, $request->academic_docs, 3);

        $application->resume = $this->image($application, $request->resume, 4);
        $application->language_proficiency = $this->image($application, $request->language_proficiency, 5);
        $application->personal_statement = $this->image($application, $request->personal_statement, 6);

        $application->research_proposal = $this->image($application, $request->research_proposal, 7);
        $application->other1 = $this->image($application, $request->other1, 8);
        $application->other2 = $this->image($application, $request->other2, 9);

        return $application;
    }

    /**
     * @param $application->name
     * @param $request->image
     */
    private function image($application, $image, $image_type)
    {
        $this->i++;
        if (!empty($image)) {
            if ($image_type == 1 && (!empty($application->photo))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->photo))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->photo));
                }
            } elseif ($image_type == 2 && (!empty($application->passport_info))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->passport_info))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->passport_info));
                }
            } elseif ($image_type == 3 && (!empty($application->academic_docs))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->academic_docs))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->academic_docs));
                }
            } elseif ($image_type == 4 && (!empty($application->resume))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->resume))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->resume));
                }
            } elseif ($image_type == 5 && (!empty($application->language_proficiency))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->language_proficiency))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->language_proficiency));
                }
            } elseif ($image_type == 6 && (!empty($application->personal_statement))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->personal_statement))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->personal_statement));
                }
            } elseif ($image_type == 7 && (!empty($application->research_proposal))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->research_proposal))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->research_proposal));
                }
            } elseif ($image_type == 8 && (!empty($application->other1))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->other1))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->other1));
                }
            } elseif ($image_type == 9 && (!empty($application->other2))) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $application->other2))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $application->other2));
                }
            } else {
            }

            $image_name = $this->i . '-' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/applications/' . $application->code . '/', $image_name);
            return $image_name;
        } else {
            if ($image_type == 1) {
                return $application->photo;
            } elseif ($image_type == 2) {
                return $application->passport_info;
            } elseif ($image_type == 3) {
                return $application->academic_docs;
            } elseif ($image_type == 4) {
                return $application->resume;
            } elseif ($image_type == 5) {
                return $application->language_proficiency;
            } elseif ($image_type == 6) {
                return $application->personal_statement;
            } elseif ($image_type == 7) {
                return $application->research_proposal;
            } elseif ($image_type == 8) {
                return $application->other1;
            } else {
                return $application->other2;
            }
        }
    }


    public function applicationList()
    {
        $applications = Application::all();
        $status = Status::all();
        $agents = User::all();
        return view('backend.application.application_list', ['applications' => $applications, 'status' => $status, 'agents'=>$agents]);
    }

    public function showApplication($id)
    {
        $application = Application::find($id);
        $status = Status::all();
        $agents = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'agent');
            }
        )->get();
        return view('backend.application.application_view', ['application' => $application, 'agents' => $agents, 'status' => $status]);
    }

    public function editApplication($id)
    {
        $application = Application::find($id);
        $agents = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'agent');
            }
        )->get();

        $status = Status::all();

        $earliest_year = Carbon::now()->format('Y');
        return view('backend.application.application_edit', ['application' => $application, 'status' => $status, 'agents' => $agents, 'earliest_year' => $earliest_year]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::find($id);

        if (!is_null($application)) {
            $application->delete();
        }

        session()->flash('success', 'Application has been Deleted');
        return back();
    }

    public function checkStatus()
    {
        return view('frontend.check_status');
    }

    public function searchList(Request $request)
    {

        $code = !empty($request->code) ? $request->code : '';
        $passport = !empty($request->passport) ? $request->passport : '';

        $application = Application::with(['status'])->where([['code', $code], ['passport', $passport]])->first();

        $data = [
            'data' => $application,
            'status' => 'ok',
            'code' => 200
        ];
        return response()->json($data);
    }

    public function referredApplication($id){
        $user_id = User::find(base64_decode($id));
        $agent = Agent::find($user_id->agent_id);
        $earliest_year = Carbon::now()->format('Y');
        return view('frontend.referred_application_form', with(['agent' => $agent, 'user'=>$user_id, 'earliest_year' => $earliest_year]));
    
    }
}
