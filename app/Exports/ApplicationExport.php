<?php

namespace App\Exports;

use App\Models\Application;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Application::all();
    }

    public function headings(): array
    {
        return ["Application ID", "Name", "Phone", "Email", "Date of Birth", "Passport No", "Passport Expire Date", "Maritial Status", "Nationality", "Country of Residence", "Address", "Degree Name", "SSC Year", "SSC Institute", "SSC CGPA", "Degree Name", "HSC Year", "HSC Institute", "HSC CGPA", "Degree Name", "Bachelor Year", "Bachelor Institute", "Bachelor CGPA", "Degree Name", "Master's Year", "Master's Institute", "Master's CGPA", "Proof Of Language", "Language Score", "Study Destination", "Intake Month", "Intake Year", "Prepared Institution 1", "Subject of Interest 1", "Prepared Institution 2", "Subject of Interest 2", "Source", "Referrer", "Remarks", "Working Place", "Working Position",  "Working Duration", "Comments", "Applied At"];
    }

    public function map($application): array{
        $user = User::find($application->referrer);

        $fields = [
        $application->code ,
        $application->name ,
        $application->mobile ,
        $application->email,
        $application->birth_date ,
        $application->passport,
        $application->passport_expire ,
        $application->maritial_status ,
        $application->nationality ,
        $application->country_of_residence ,
        $application->address ,
        $application->ssc ,
        $application->ssc_year ,
        $application->ssc_institute ,
        $application->ssc_cgpa,
        $application->hsc ,
        $application->hsc_year ,
        $application->hsc_institute ,
        $application->hsc_cgpa ,
        $application->bachelor ,
        $application->bachelor_year ,
        $application->bachelor_institute ,
        $application->bachelor_cgpa ,
        $application->master ,
        $application->master_year ,
        $application->master_institute ,
        $application->master_cgpa ,
        $application->proof_of_language ,
        $application->ielts ,
        $application->study_destination ,
        $application->intake_month ,
        $application->intake_year ,
        $application->prepared_institution1 ,
        $application->subject_of_interest1 ,
        $application->prepared_institution2 ,
        $application->subject_of_interest2 ,
        $application->source,
        $user->name,
        $application->remarks ,
        $application->working_place ,
        $application->working_position ,
        $application->experience ,
        $application->comment ,
        $application->created_at ,
      ];
     return $fields;
 }
}
