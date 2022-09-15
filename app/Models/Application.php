<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['name',
    'mobile',
    'email',
    'birth_date',
    'passport',
    'passport_expire',
    'maritial_status',
    'nationality',
    'country_of_residence',
    'address',
    'ssc',
    'ssc_year',
    'ssc_institute',
    'ssc_cgpa',
    'hsc',
    'hsc_year',
    'hsc_institute',
    'hsc_cgpa',
    'bachelor',
    'bachelor_year',
    'bachelor_institute',
    'bachelor_cgpa',
    'master',
    'master_year',
    'master_institute',
    'master_cgpa',
    'ielts',
    'study_destination',
    'intake_month',
    'intake_year',
    'prepared_institution1',
    'subject_of_interest1',
    'prepared_institution2',
    'subject_of_interest2',
    'source',
    'referrer',
    'remarks',
    'experience',
    'photo',
    'passport_info',
    'academic_docs',
    'resume',
    'language_proficiency',
    'personal_statement',
    'research_proposal',
    'other1',
    'other2'];

    public function status(){
        return $this->belongsTo(Status::class, 'status');
    }
}
