@extends('backend.layout.app')
@section('title','user Management')
@push('custom_style')
    <style>
      .card-header{
        border-bottom: none !important;
      }
    </style>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center">
              
              <div class="col-md-12">
                <img src="{{asset('assets/backend/dist/img/application_header.png')}}" alt="" width="100%">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('backend.partials.message')
              <table id="example1" class="table table-responsive table-bordered table-striped">
                      <tr>
                        <td class="col-md-3 font-weight-bold">Application Id</td>
                        <td class="col-md-4">{{ $application->code }}</td>
                        <td class="col-md-4" rowspan="4" colspan="2"><img src="{{ asset('storage/'.$application->name.'/'.$application->photo) }}" alt="" width="100%"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Name</td>
                        <td class="col-md-4">{{ $application->name }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Mobile No</td>
                        <td class="col-md-4">{{ $application->mobile }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Email</td>
                        <td class="col-md-4">{{ $application->email }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Date of Birth</td>
                        <td class="col-md-4">{{ $application->birth_date }}</td>

                        <td class="col-md-3 font-weight-bold">Maritial Status</td>
                        <td class="col-md-4">{{ $application->maritial_status }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Passport No</td>
                        <td class="col-md-4">{{ $application->passport }}</td>

                        <td class="col-md-3 font-weight-bold">Passport Expire Date</td>
                        <td class="col-md-4">{{ $application->passport_expire }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Nationality</td>
                        <td class="col-md-4">{{ $application->nationality }}</td>

                        <td class="col-md-3 font-weight-bold">Country of Residence</td>
                        <td class="col-md-4">{{ $application->country_of_residence }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Address</td>
                        <td class="col-md-4" colspan="3">{{ $application->address }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">SSC/Equivalent/</td>
                        <td class="col-md-4">{{ $application->ssc }}</td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4">{{ $application->ssc_year }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4">{{ $application->ssc_institute }}</td>

                        <td class="col-md-3 font-weight-bold">CGPA </td>
                        <td class="col-md-4">{{ $application->ssc_cgpa }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">HSC/Diploma/Equivalent</td>
                        <td class="col-md-4">{{ $application->hsc }}</td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4">{{ $application->hsc_year }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute </td>
                        <td class="col-md-4">{{ $application->hsc_institute }}</td>

                        <td class="col-md-3 font-weight-bold">CGPA </td>
                        <td class="col-md-4">{{ $application->hsc_cgpa }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Bachelor/Equivalent</td>
                        <td class="col-md-4">{{ $application->bachelor }}</td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4">{{ $application->bachelor_year }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4">{{ $application->bachelor_institute }}</td>

                        <td class="col-md-3 font-weight-bold">CGPA</td>
                        <td class="col-md-4">{{ $application->bachelor_cgpa }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Master/Equivalent</td>
                        <td class="col-md-4">{{ $application->master }}</td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4">{{ $application->master_year }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4">{{ $application->master_institute }}</td>

                        <td class="col-md-3 font-weight-bold">CGPA</td>
                        <td class="col-md-4">{{ $application->master_cgpa }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">IELTS Score (if any)</td>
                        <td class="col-md-4">{{ $application->ielts }}</td>

                        <td class="col-md-3 font-weight-bold">Study Destination (if any)</td>
                        <td class="col-md-4">{{ $application->study_destination }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Intake Month</td>
                        <td class="col-md-4">{{ $application->intake_month }}</td>

                        <td class="col-md-3 font-weight-bold">Intake Year</td>
                        <td class="col-md-4">{{ $application->intake_year }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Prepared Institution 1 (if any)</td>
                        <td class="col-md-4">{{ $application->prepared_institution1 }}</td>

                        <td class="col-md-3 font-weight-bold">Subject of Interest (if any)</td>
                        <td class="col-md-4">{{ $application->subject_of_interest1 }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Prepared Institution 2 (if any)</td>
                        <td class="col-md-4">{{ $application->prepared_institution2 }}</td>

                        <td class="col-md-3 font-weight-bold">Subject of Interest (if any)</td>
                        <td class="col-md-4">{{ $application->subject_of_interest2 }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">How do you know about us?</td>
                        <td class="col-md-4">{{ $application->source }}</td>

                        <td class="col-md-3 font-weight-bold">Referrer Name</td>
                        <td class="col-md-4">{{ $application->referrer }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Remarks</td>
                        <td class="col-md-12" colspan="4">{{ $application->remarks }}</td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Work Experience</td>
                        <td class="col-md-12" colspan="4">{{ $application->experience }}</td>
                      </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div><!-- /.container-fluid -->
  </section>
@endsection

@push('custom_script')
@endpush