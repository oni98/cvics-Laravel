@extends('backend.layout.app')
@section('title', 'user Management')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h3 class="card-title">Application List</h3>
                    </div>
                    @role('agent')
                    <div class="float-right">
                        <a href="{{ route('referred.application', [base64_encode(Auth::user()->id), Auth::user()->name]) }}" class="btn btn-info">Create Application</a>
                    </div>
                    @endrole
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    @include('backend.partials.message')
                    @role('admin')
                    <a class="btn btn-success" href="{{route('application.excel')}}" title="Export as Excel"><i class="fas fa-file-excel"></i></a>
                    @endrole
                    @role('agent')
                    <a class="btn btn-success" href="{{route('agent.application.excel')}}" title="Export as Excel"><i class="fas fa-file-excel"></i></a>
                    @endrole
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Application Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Passport No</th>
                                <th>Referrer</th>
                                <th>Intake</th>
                                <th>University</th>
                                <th>Country</th>
                                <th>Applied at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $application->code }}</td>
                                    <td>{{ $application->name }}</td>
                                    <td>{{ $application->email }}</td>
                                    <td>{{ $application->mobile }}</td>
                                    <td>{{ $application->passport }}</td>
                                    <td>{{ !empty($agents[$application->referrer - 1]->name)? $agents[$application->referrer - 1]->name : '' }}</td>
                                    <td>{{ $application->intake_month . ', ' . $application->intake_year }}</td>
                                    <td>{{ $application->prepared_institution1 }}</td>
                                    <td>{{ $application->study_destination }}</td>
                                    <td>{{ date('d-m-Y | g:i a', strtotime($application->created_at)) }}</td>
                                    <td>
                                        @foreach ($status as $st)
                                            @if ($st->id == $application->status)
                                                {{ $st->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('application.show', $application->id) }}" class="btn btn-success"
                                            title="Show Details"><i class="fas fa-eye"></i></a>
                                    @role('admin')
                                        <a href="{{ route('application.edit', $application->id) }}" class="btn btn-info"
                                            title="Edit"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger"
                                            href="{{ route('application.destroy', $application->id) }}" class="nav-link"
                                            title="Delete"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $application->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $application->id }}"
                                            action="{{ route('application.destroy', $application->id) }}" method="POST"
                                            style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endrole
                                    </td>
                                </tr>
                            @endforeach
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "buttons": ["Create user"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
