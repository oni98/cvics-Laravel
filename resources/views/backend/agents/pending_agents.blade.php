@extends('backend.layout.app')
@section('title','user Management')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
              <div class="col-md-6"><h3 class="card-title">Pending Agents</h3></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('backend.partials.message')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Agent ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($agents as $agent)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $agent->code }}</td>
                        <td>{{ $agent->agency_name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>
                            <a href="{{url('/admin/agent/approve', $agent->id)}}" class="btn btn-info" title="Approve"><i class="fas fa-check"></i></a>
                            <a class="btn btn-danger" href="{{ route('agents.destroy', $agent->id) }}" title="Cancel" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$agent->id}}').submit();">
                                <i class="fas fa-window-close"></i>
                            </a>
                            <form id="delete-form-{{$agent->id}}" action="{{ route('agents.destroy', $agent->id) }}" method="POST" style="display: none;">
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