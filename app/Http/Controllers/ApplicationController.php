<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $agents = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'agent');
            }
        )->where('status', '=', '1')->get();

        $earliest_year = 1950;
        return view('backend.application_form', with(['agents' => $agents, 'earliest_year' => $earliest_year]));
    }

    public function store(Request $request)
    {
        $application = new Application();
        $application->fill($request->all());
        if($application->save()){
            if(!empty($request->photo)){
                if(!file_exists(public_path($application->id.'-'.$application->name.'/'.$request->photo))){
                    $image_name = $request->photo->getClientOriginalName();
                    $path = $request->photo->store('public/'.$application->id.'-'.$application->name.'/'.$image_name);
                }
            }
            return redirect('/apply');
        }
        // $application->name = $request->name;
        // $application->mobile;
        // $application->email;
        // $application->birth_date;
        // $application->passport;
        // $application->passport_expire;
        // $application->maritial_status;
        // $application->nationality;
        // $application->country_of_residence;
        // $application->address;
        // $application->ssc;
        // $application->ssc_year;
        // $application->ssc_institute;
        // $application->ssc_cgpa;
        // $application->hsc;
        // $application->hsc_year;
        // $application->hsc_institute;
        // $application->hsc_cgpa;
        // $application->bachelor;
        // $application->bachelor_year;
        // $application->bachelor_institute;
        // $application->bachelor_cgpa;
        // $application->master;
        // $application->master_year;
        // $application->master_institute;
        // $application->master_cgpa;
        // $application->ielts;
        // $application->study_destination;
        // $application->intake_month;
        // $application->intake_year;
        // $application->prepared_institution1;
        // $application->subject_of_interest1;
        // $application->prepared_institution2;
        // $application->subject_of_interest2;
        // $application->source;
        // $application->referrer;
        // $application->remarks;
        // $application->photo;
        // $application->passport_info;
        // $application->academic_docs;
        // $application->resume;
        // $application->language_proficiency;
        // $application->personal_statement;
        // $application->research_proposal;
        // $application->other1;
        // $application->other2;
    }
}
