<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

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
        )->where('status', '=', '1')->get();

        $earliest_year = 1950;
        return view('frontend.application_form', with(['agents' => $agents, 'earliest_year' => $earliest_year]));
    }

    public function store(Request $request)
    {
        $application = new Application();
        $application = $this->patch($request, $application);

        if($application->save()){
            return redirect('/apply');
        }
    }

     /**
     * @param $request
     * @param $application
     * @return object
     */
    private function patch($request, $application): object
    {
        do {
            $code = random_int(100000, 999999);
        } while (Application::where("code", "=", $code)->first());

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

        $application->photo = $this->image($application->name, $request->photo);
        $application->passport_info = $this->image($application->name, $request->passport_info);
        $application->academic_docs = $this->image($application->name, $request->academic_docs);

        $application->resume = $this->image($application->name, $request->resume);
        $application->language_proficiency = $this->image($application->name, $request->language_proficiency);
        $application->personal_statement = $this->image($application->name, $request->personal_statement);

        $application->research_proposal = $this->image($application->name, $request->research_proposal);
        $application->other1 = $this->image($application->name, $request->other1);
        $application->other2 = $this->image($application->name, $request->other2);

        return $application;
    }

    /**
     * @param $application->name
     * @param $request->image
     */
    private function image($name, $image)
    {
        $this->i++;
        if(!empty($image)){
            if(!file_exists('public/'.$name.'/'.$image)){
                $image_name = $this->i.'-'.time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/'.$name.'/', $image_name);
                return $image_name;
            }
        }
    }


    public function applicationList(){
        $applications = Application::all();
        return view('backend.application.application_list', ['applications' => $applications]);
    }

    public function showApplication($id){
        $application = Application::find($id);
        return view('backend.application.application_view', ['application' => $application]);
    }

    public function editApplication($id){
        $application = Application::find($id);
        $agents = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'agent');
            }
        )->where('status', '=', '1')->get();

        $earliest_year = 1950;
        return view('backend.application.application_edit', ['application' => $application, 'agents' => $agents, 'earliest_year' => $earliest_year]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $application = Application::find($id);

        if(!is_null($application)){
            $application->delete();
        }

        session()->flash('success', 'Application has been Deleted');
        return back();
    }
}
