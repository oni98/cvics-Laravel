@extends('backend.layout.app')
@section('title','user Management')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
              <div class="col-md-6"><h3 class="card-title">Application List</h3></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('backend.partials.message')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Application Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Passport No</th>
                  <th>Source</th>
                  <th>Intake</th>
                  <th>University</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $application->code }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->mobile }}</td>
                        <td>{{ $application->passport }}</td>
                        <td>{{ $application->source }}</td>
                        <td>{{ $application->intake_month.', '.$application->intake_year }}</td>
                        <td>{{ $application->prepared_institution1 }}</td>
                        <td>{{ $application->study_destination }}</td>
                        <td>{{ $application->status }}</td>
                        <td>
                            <a href="{{route('application.show', $application->id)}}" class="btn btn-success" title="Show Details"><i class="fas fa-eye"></i></a>

                            <a href="{{route('application.edit', $application->id)}}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>

                            <a class="btn btn-danger" href="{{ route('application.destroy', $application->id) }}" class="nav-link" title="Delete"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$application->id}}').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-form-{{$application->id}}" action="{{ route('application.destroy', $application->id) }}" method="POST" style="display: none;">
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
          </div>
          <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@push('custom_script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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