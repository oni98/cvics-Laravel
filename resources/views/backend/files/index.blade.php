@extends('backend.layout.app')
@section('title', 'user Management')
@section('content')
    <section class="content">
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-6">
                            <h3 class="card-title">Necessary Files</h3>
                        </div>
                        @role('admin')
                        <div class="col-md-6">
                            <button type="button" class="btn btn-info float-right" data-toggle="modal"
                                data-target="#modal-create">
                                Upload file
                            </button>
                        </div>
                        @endrole
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('backend.partials.message')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>File Name</th>
                                    <th>Uploaded At</th>
                                    <th>File</th>
                                    @role('admin')
                                    <th>Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $file->name }}</td>
                                        <td>{{ $file->date }}</td>
                                        <td>
                                            <a href="{{ asset('storage/files/' . $file->file) }}" download>
                                                Click here to download
                                            </a>
                                        </td>
                                        @role('admin')
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('file.destroy', $file->id) }}"
                                                class="nav-link" title="Delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $file->id }}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $file->id }}"
                                                action="{{ route('file.destroy', $file->id) }}" method="POST"
                                                style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    @role('admin')
                    {{-- Status Create Modal --}}
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create New file</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter file Name" required>
                                    </div>
                                    <div class="modal-body">
                                        <input class="datepicker form-control" name="date" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required autocomplete="off">
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" name="file" class="form-control-file" placeholder="" required>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    @endrole

                <!-- /.card -->
            </div><!-- /.container-fluid -->
    </section>
@endsection

@push('custom_script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
