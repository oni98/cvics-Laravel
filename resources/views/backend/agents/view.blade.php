@extends('backend.layout.app')
@section('title', 'user Management')
@push('custom_style')
    <style>
        .card-header {
            border-bottom: none !important;
        }
    </style>
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <div class="col-md-12 mt-5">
                        <img src="{{ asset('assets/backend/dist/img/application_header.png') }}" alt=""
                            width="100%">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    @include('backend.partials.message')
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <td class="col-md-3 font-weight-bold">Agency Name</td>
                            <td class="col-md-4">{{ $agent->agency_name }}</td>
                            <td class="col-md-4" rowspan="4" colspan="2"><img
                                    src="{{ asset('storage/agents/' . $agent->email . '/' . $agent->logo) }}"
                                    alt="" width="50%" class="float-right"></td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Email</td>
                            <td class="col-md-4">{{ $agent->email }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Contact Person</td>
                            <td class="col-md-4">{{ $agent->contact_person }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Designation</td>
                            <td class="col-md-4">{{ $agent->designation }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Contact No</td>
                            <td class="col-md-4">{{ $agent->phone }}</td>

                            <td class="col-md-3 font-weight-bold">Skype</td>
                            <td class="col-md-4">{{ $agent->skype }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Address</td>
                            <td class="col-md-4">{{ $agent->address }}</td>

                            <td class="col-md-3 font-weight-bold">City</td>
                            <td class="col-md-4">{{ $agent->city }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Country</td>
                            <td class="col-md-4">{{ $agent->country }}</td>

                            <td class="col-md-3 font-weight-bold">Zipcode</td>
                            <td class="col-md-4">{{ $agent->zipcode }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Web Address</td>
                            <td class="col-md-4">{{ $agent->web_address }}</td>

                            <td colspan="2">
                                <a href="{{ asset('storage/agents/' . $agent->email . '/' . $agent->nid_or_passport) }}"
                                    download> Click to download NID/Passport
                                </a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <a href="{{ asset('storage/agents/' . $agent->email . '/' . $agent->logo) }}" download>
                                    Click to download Logo/Photo
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="{{ asset('storage/agents/' . $agent->email . '/' . $agent->license) }}"
                                    download> Click to download License
                                </a>
                            </td>
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
