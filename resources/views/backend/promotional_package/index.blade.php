@extends('backend.layout.app')
@section('title', 'user Management')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @role('admin')
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-6">
                            <h3 class="card-title">Promotional Packages</h3>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-info float-right" data-toggle="modal"
                                data-target="#modal-create">
                                Create Package
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
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>
                                            <a href="{{ asset('storage/promotional_packages/' . $package->image) }}"
                                                data-toggle="lightbox" data-max-width="600">
                                                <img src="{{ asset('storage/promotional_packages/' . $package->image) }}"
                                                    alt="" width="10%">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('package.destroy', $package->id) }}"
                                                class="nav-link" title="Delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $package->id }}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $package->id }}"
                                                action="{{ route('package.destroy', $package->id) }}" method="POST"
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

                    {{-- Status Create Modal --}}
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create New Package</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Package Name">
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" name="image" class="form-control-file" placeholder="">
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

                @role('agent')
                    @foreach ($packages as $package)
                        <div class="card col-md-3 p-2">
                            <a href="{{ asset('storage/promotional_packages/' . $package->image) }}" data-toggle="lightbox"
                                data-max-width="600">
                                <img class="card-img-top" src="{{ asset('storage/promotional_packages/' . $package->image) }}"
                                    alt="" height="250px">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->name }}</h5>
                            </div>
                        </div>
                    @endforeach
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
