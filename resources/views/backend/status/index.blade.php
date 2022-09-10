@extends('backend.layout.app')
@section('title', 'user Management')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-6">
                        <h3 class="card-title">Status List</h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info float-right" data-toggle="modal"
                            data-target="#modal-create">
                            Create Status
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('backend.partials.message')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $st)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $st->name }}</td>
                                    <td>
                                        <a href="{{ route('status.edit', $st->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger" href="{{ route('status.destroy', $st->id) }}"
                                            class="nav-link" title="Delete"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $st->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $st->id }}"
                                            action="{{ route('status.destroy', $st->id) }}" method="POST"
                                            style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                {{--Status Create Modal --}}
                <div class="modal fade" id="modal-create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('status.store') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Create New Status</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Status Name">
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
