<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class applicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject('CVICS')->view('emails.application_email');

        // $attachments is an array with file paths of attachments
        $email->attach('storage/applications/'.$this->application->code.'/ApplicationForm.pdf');
        
        if (!empty($this->application->photo)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->photo);
        }
        if (!empty($this->application->passport_info)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->passport_info);
        }
        if (!empty($this->application->academic_docs)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->academic_docs);
        }
        if (!empty($this->application->resume)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->resume);
        }
        if (!empty($this->application->language_proficiency)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->language_proficiency);
        }
        if (!empty($this->application->personal_statement)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->personal_statement);
        }
        if (!empty($this->application->research_proposal)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->research_proposal);
        }
        if (!empty($this->application->other1)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->other1);
        }
        if (!empty($this->application->other2)) {
            $email->attach('storage/applications/'.$this->application->code.'/'.$this->application->other2);
        }

        return $email;
    }
}
