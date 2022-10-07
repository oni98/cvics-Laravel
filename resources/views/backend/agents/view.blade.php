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
                    {!! Form::open(['route'=> ['generateAgentPdf', $agent->id], 'method' => 'POST']) !!}
                    <div class="float-left"><button type="submit" class="btn btn-info" title="Download PDF"><i class="fas fa-file-pdf"></i></button>
                        </div>
                    {!! Form::close() !!}
                    <div class="float-right">
                        @if ($agent->status == 1)
                            <a href="{{ route('agent.edit', $agent->id) }}" class="btn btn-info" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        @else
                            <a href="{{ url('/admin/agent/approve', $agent->id) }}" class="btn btn-info" title="Approve"><i
                                    class="fas fa-check"></i></a>
                            <a class="btn btn-danger" href="{{ route('agents.destroy', $agent->id) }}" title="Cancel"
                                class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $agent->id }}').submit();">
                                <i class="fas fa-window-close"></i>
                            </a>
                            <form id="delete-form-{{ $agent->id }}" action="{{ route('agents.destroy', $agent->id) }}"
                                method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        @endif
                    </div>
                    <div class="col-md-12 mt-5">
                        <img src="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" alt=""
                            width="100%">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    @include('backend.partials.message')
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <td class="col-md-3 font-weight-bold">Agent ID</td>
                            <td class="col-md-4">{{ $agent->code }}</td>
                            {{-- <td class="col-md-4" rowspan="4" colspan="2"><img
                                    src="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" alt=""
                                    width="50%" class="float-right"></td> --}}

                            <td class="col-md-3 font-weight-bold">Agency Name</td>
                            <td class="col-md-4">{{ $agent->agency_name }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Email</td>
                            <td class="col-md-4">{{ $agent->email }}</td>

                            <td class="col-md-3 font-weight-bold">Contact Person</td>
                            <td class="col-md-4">{{ $agent->contact_person }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3 font-weight-bold">Designation</td>
                            <td class="col-md-4">{{ $agent->designation }}</td>

                            <td class="col-md-3 font-weight-bold">Web Address</td>
                            <td class="col-md-4">{{ $agent->web_address }}</td>
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
                            <td>
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->nid_or_passport) }}"
                                    download> Click to download NID/Passport
                                </a>
                            </td>

                            <td>
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" download>
                                    Click to download Logo/Photo
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="{{ asset('storage/agents/' . $agent->code . '/' . $agent->license) }}" download>
                                    Click to download License
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
