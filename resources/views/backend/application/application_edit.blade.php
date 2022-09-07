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
                        <td class="col-md-4 form-group" rowspan="4" colspan="2">
                            <div class="col-4"><input type="file"></div>
                            <div class="col-8"><img src="{{ asset('storage/'.$application->name.'/'.$application->photo) }}" alt="" width="100%"></div>
                            
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Name <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->name }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Mobile No <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->mobile }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Email <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->email }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Date of Birth <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="datepicker form-control" name="birth_date" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $application->birth_date }}" required></td>

                        <td class="col-md-3 font-weight-bold">Maritial Status <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->maritial_status }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Passport No <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->passport }}" required></td>

                        <td class="col-md-3 font-weight-bold">Passport Expire Date <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="datepicker form-control" name="passport_expire" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $application->passport_expire }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Nationality <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->nationality }}" required></td>

                        <td class="col-md-3 font-weight-bold">Country of Residence <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->country_of_residence }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Address <span class="text-danger">*</span></td>
                        <td class="col-md-4" colspan="3"><input class="form-control" type="text" value="{{ $application->address }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">SSC/Equivalent <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->ssc }}" required></td>

                        <td class="col-md-3 font-weight-bold">Year of Completion <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->ssc_year }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->ssc_institute }}"></td>

                        <td class="col-md-3 font-weight-bold">CGPA  <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->ssc_cgpa }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">HSC/Diploma/Equivalent <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->hsc }}" required></td>

                        <td class="col-md-3 font-weight-bold">Year of Completion <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->hsc_year }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute </td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->hsc_institute }}"></td>

                        <td class="col-md-3 font-weight-bold">CGPA  <span class="text-danger">*</span></td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->hsc_cgpa }}" required></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Bachelor/Equivalent</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->bachelor }}"></td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->bachelor_year }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->bachelor_institute }}"></td>

                        <td class="col-md-3 font-weight-bold">CGPA</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->bachelor_cgpa }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Master/Equivalent</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->master }}"></td>

                        <td class="col-md-3 font-weight-bold">Year of Completion</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->master_year }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Institute</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->master_institute }}"></td>

                        <td class="col-md-3 font-weight-bold">CGPA</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->master_cgpa }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">IELTS Score (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->ielts }}"></td>

                        <td class="col-md-3 font-weight-bold">Study Destination (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->study_destination }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Intake Month</td>
                        <td class="col-md-4">
                            <select id="intake_month" name="intake_month" class="form-control">
                                <option disabled selected></option>
                                <option value="February" {{($application->intake_month == 'February')? 'selected' : ''}}>February</option>
                                <option value="September" {{($application->intake_month == 'September')? 'selected' : ''}}>September</option>
                            </select>
                        </td>

                        <td class="col-md-3 font-weight-bold">Intake Year</td>
                        <td class="col-md-4">
                            <select id="intake_year" name="intake_year" class="form-control">
                                <option disabled selected></option>
                                @foreach (range((date('Y')+2), $earliest_year) as $x)
                                <option value="{{$x}}" {{($x == $application->intake_year)? 'selected' : ''}}>{{$x}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Prepared Institution 1 (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->prepared_institution1 }}"></td>

                        <td class="col-md-3 font-weight-bold">Subject of Interest (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->subject_of_interest1 }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Prepared Institution 2 (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->prepared_institution2 }}"></td>

                        <td class="col-md-3 font-weight-bold">Subject of Interest (if any)</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->subject_of_interest2 }}"></td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">How do you know about us?</td>
                        <td class="col-md-4"><input class="form-control" type="text" value="{{ $application->source }}"></td>

                        <td class="col-md-3 font-weight-bold">Referrer Name</td>
                        <td class="col-md-4">
                            <select id="referrer" name="referrer" class="form-control">
                                <option disabled selected></option>
                                @foreach ($agents as $agent)
                                    <option value="{{$agent->name}}" {{($agent->name == $application->referrer)? 'selected' : ''}}>{{$agent->name}}</option>
                                @endforeach
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3 font-weight-bold">Remarks</td>
                        <td class="col-md-12" colspan="4"><input class="form-control" type="text" value="{{ $application->remarks }}"></td>
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