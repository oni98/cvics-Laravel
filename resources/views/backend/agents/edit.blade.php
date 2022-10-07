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
                        <img src="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" alt=""
                            width="100%">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    @include('backend.partials.message')
                    <form action="{{route('agent.update', $agent->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <td class="col-md-3 font-weight-bold">Agent ID</td>
                            <td class="col-md-4">{{ $agent->code }}</td>
                            {{-- <td class="col-md-4" rowspan="4" colspan="2"><img
                                    src="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" alt=""
                                    width="50%" class="float-right"></td> --}}

                            <td class="col-md-3 font-weight-bold">Agency Name</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="agency_name" value="{{ $agent->agency_name }}"></td>
                            
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Email</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="email" value="{{ $agent->email }}"></td>

                            <td class="col-md-3 font-weight-bold">Contact Person</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="contact_person" value="{{ $agent->contact_person }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Designation</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="designation" value="{{ $agent->designation }}"></td>

                            <td class="col-md-3 font-weight-bold">Web Address</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="web_address" value="{{ $agent->web_address }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Contact No</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="phone" value="{{ $agent->phone }}"></td>

                            <td class="col-md-3 font-weight-bold">Skype</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="skype" value="{{ $agent->skype }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Address</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="address" value="{{ $agent->address }}"></td>

                            <td class="col-md-3 font-weight-bold">City</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="city" value="{{ $agent->city }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Country</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="country" value="{{ $agent->country }}"></td>

                            <td class="col-md-3 font-weight-bold">Zipcode</td>
                            <td class="col-md-4"><input type="text" class="form-control" name="zipcode" value="{{ $agent->zipcode }}"></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->nid_or_passport) }}"
                                    download> Click to download NID/Passport
                                </a>
                                <input type="file" class="file-form-control" name="nid_or_passport">
                            </td>

                            <td>
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" download>
                                    Click to download Logo/Photo
                                </a>
                                <input type="file" class="file-form-control" name="logo">
                            </td>
                            <td colspan="2">
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->license) }}" download>
                                    Click to download License
                                </a>
                                <input type="file" class="file-form-control" name="license">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit"
                                    class="btn btn-success btn-block">Update</button></td>
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('custom_script')
@endpush
