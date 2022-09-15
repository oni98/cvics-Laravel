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
              <table id="example2" class="table table-responsive table-bordered table-striped">
                <thead></thead>
                <form action="{{route('application.update',$application->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                <tbody>
                      <tr>
                        <td class="font-weight-bold">Application Id <span class="text-danger">*</span></td>
                        <td>{{ $application->code }}</td>

                        <td class="font-weight-bold">Name <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="name" value="{{ $application->name }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Mobile No <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="mobile" value="{{ $application->mobile }}" required></td>

                        <td class="font-weight-bold">Email <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="email" value="{{ $application->email }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Date of Birth <span class="text-danger">*</span></td>
                        <td><input class="datepicker form-control" name="birth_date" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $application->birth_date }}" required></td>

                        <td class="font-weight-bold">Maritial Status <span class="text-danger">*</span></td>
                        <td>
                          <select id="maritial_status" name="maritial_status" class="form-control" required>
                            <option value="Single" {{ ($application->maritial_status == 'Single')? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ ($application->maritial_status == 'Married')? 'selected' : '' }}>Married</option>
                            <option value="Other" {{ ($application->maritial_status == 'Other')? 'selected' : '' }}>Other</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Passport No <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="passport" value="{{ $application->passport }}" required></td>

                        <td class="font-weight-bold">Passport Expire Date <span class="text-danger">*</span></td>
                        <td><input class="datepicker form-control" name="passport_expire" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $application->passport_expire }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Nationality <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="nationality" value="{{ $application->nationality }}" required></td>

                        <td class="font-weight-bold">Country of Residence <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="country_of_residence" value="{{ $application->country_of_residence }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Address <span class="text-danger">*</span></td>
                        <td colspan="3"><input class="form-control" type="text" name="address" value="{{ $application->address }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">SSC/Equivalent <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="ssc" value="{{ $application->ssc }}" required></td>

                        <td class="font-weight-bold">Year of Completion <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="ssc_year" value="{{ $application->ssc_year }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Institute</td>
                        <td><input class="form-control" type="text" name="ssc_institute" value="{{ $application->ssc_institute }}"></td>

                        <td class="font-weight-bold">CGPA  <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="ssc_cgpa" value="{{ $application->ssc_cgpa }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">HSC/Diploma/Equivalent <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="hsc" value="{{ $application->hsc }}" required></td>

                        <td class="font-weight-bold">Year of Completion <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="hsc_year" value="{{ $application->hsc_year }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Institute </td>
                        <td><input class="form-control" type="text" name="hsc_institute" value="{{ $application->hsc_institute }}"></td>

                        <td class="font-weight-bold">CGPA  <span class="text-danger">*</span></td>
                        <td><input class="form-control" type="text" name="hsc_cgpa" value="{{ $application->hsc_cgpa }}" required></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Bachelor/Equivalent</td>
                        <td><input class="form-control" type="text" name="bachelor" value="{{ $application->bachelor }}"></td>

                        <td class="font-weight-bold">Year of Completion</td>
                        <td><input class="form-control" type="text" name="bachelor_year" value="{{ $application->bachelor_year }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Institute</td>
                        <td><input class="form-control" type="text" name="bachelor_institute" value="{{ $application->bachelor_institute }}"></td>

                        <td class="font-weight-bold">CGPA</td>
                        <td><input class="form-control" type="text" name="bachelor_cgpa" value="{{ $application->bachelor_cgpa }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Master/Equivalent</td>
                        <td><input class="form-control" type="text" name="master" value="{{ $application->master }}"></td>

                        <td class="font-weight-bold">Year of Completion</td>
                        <td><input class="form-control" type="text" name="master_year" value="{{ $application->master_year }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Institute</td>
                        <td><input class="form-control" type="text" name="master_institute" value="{{ $application->master_institute }}"></td>

                        <td class="font-weight-bold">CGPA</td>
                        <td><input class="form-control" type="text" name="master_cgpa" value="{{ $application->master_cgpa }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">IELTS Score (if any)</td>
                        <td><input class="form-control" type="text" name="ielts" value="{{ $application->ielts }}"></td>

                        <td class="font-weight-bold">Study Destination (if any)</td>
                        <td><input class="form-control" type="text" name="study_destination" value="{{ $application->study_destination }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Intake Month</td>
                        <td>
                            <select id="intake_month" name="intake_month" class="form-control">
                                <option disabled selected></option>
                                <option value="February" {{($application->intake_month == 'February')? 'selected' : ''}}>February</option>
                                <option value="September" {{($application->intake_month == 'September')? 'selected' : ''}}>September</option>
                            </select>
                        </td>

                        <td class="font-weight-bold">Intake Year</td>
                        <td>
                            <select id="intake_year" name="intake_year" class="form-control">
                                <option disabled selected></option>
                                @foreach (range((date('Y')+5), $earliest_year) as $x)
                                <option value="{{$x}}" {{($x == $application->intake_year)? 'selected' : ''}}>{{$x}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Prepared Institution 1 (if any)</td>
                        <td><input class="form-control" type="text" name="prepared_institution1" value="{{ $application->prepared_institution1 }}"></td>

                        <td class="font-weight-bold">Subject of Interest (if any)</td>
                        <td><input class="form-control" type="text" name="subject_of_interest1" value="{{ $application->subject_of_interest1 }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Prepared Institution 2 (if any)</td>
                        <td><input class="form-control" type="text" name="prepared_institution2" value="{{ $application->prepared_institution2 }}"></td>

                        <td class="font-weight-bold">Subject of Interest (if any)</td>
                        <td><input class="form-control" type="text" name="subject_of_interest2" value="{{ $application->subject_of_interest2 }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">How do you know about us?</td>
                        <td>
                          <select id="source" name="source" class="form-control">
                            <option value="" {{($application->source == '')? 'selected' : ''}}></option>
                            <option value="Social Media" {{($application->source == 'Social Media')? 'selected' : ''}}>Social Media</option>
                            <option value="Google" {{($application->source == 'Google')? 'selected' : ''}}>Google</option>
                            <option value="Agent" {{($application->source == 'Agent')? 'selected' : ''}}>Agent</option>
                            <option value="Newspaper" {{($application->source == 'Newspaper')? 'selected' : ''}}>Newspaper</option>
                        </select>
                        </td>

                        <td class="font-weight-bold">Referrer Name</td>
                        <td>
                            <select id="referrer" name="referrer" class="form-control">
                                <option disabled selected></option>
                                @foreach ($agents as $agent)
                                    <option value="{{$agent->id}}" {{($agent->id == $application->referrer)? 'selected' : ''}}>{{$agent->name}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Work Experience</td>
                        <td><input class="form-control" type="text" name="experience" value="{{ $application->experience }}"></td>

                        <td class="font-weight-bold">Status</td>
                        <td>
                          <select id="status" name="status" class="form-control">
                            <option disabled selected></option>
                            @foreach ($status as $st)
                                <option value="{{$st->id}}" {{($st->id == $application->status)? 'selected' : ''}}>{{$st->name}}</option>
                            @endforeach
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Remarks</td>
                        <td colspan="3"><input class="form-control" type="text" name="remarks" value="{{ $application->remarks }}"></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Comments</td>
                        <td colspan="3"><input class="form-control" type="text" name="comments" value="{{ $application->comments }}"></td>
                      </tr>
                      <tr>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->photo) }}" download> Click to download Photo
                          </a>
                          <input type="file" name="photo">
                        </td>
                        <td colspan="2">
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->passport_info) }}" download> Click to download Passport Info
                          </a>
                          <input type="file" name="passport_info">
                        </td>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->academic_docs) }}" download> Click to download Academic Docs
                          </a>
                          <input type="file" name="academic_docs">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->resume) }}" download> Click to download Resume
                          </a>
                          <input type="file" name="resume">
                        </td>
                        <td colspan="2">
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->language_proficiency) }}" download> Click to download Language Proficiency
                          </a>
                          <input type="file" name="language_proficiency">
                        </td>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->personal_statement) }}" download> Click to download Personal Statement
                          </a>
                          <input type="file" name="personal_statement">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->research_proposal) }}" download> Click to download Research Proposal
                          </a>
                          <input type="file" name="research_proposal">
                        </td>
                        <td colspan="2">
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->other1) }}" download> Click to download Other1
                          </a>
                          <input type="file" name="other1">
                        </td>
                        <td>
                          <a href="{{ asset('storage/'.$application->name.'/'.$application->other2) }}" download> Click to download Other2
                          </a>
                          <input type="file" name="other2">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><button type="submit" class="btn btn-success btn-block">Update</button></td>
                      </tr>
                </tbody>
              </form>
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