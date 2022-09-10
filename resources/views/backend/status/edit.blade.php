@extends('backend.layout.app')
@section('title', 'user Management')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card col-md-6 m-auto">
                <div class="card-header row">
                    <div class="">
                        <h3 class="card-title">Edit Status Name</h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('backend.partials.message')
                    <form action="{{route('status.update', $status->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group ">
                        <input type="text" name="name" class="form-control" placeholder="Enter Status Name" value="{{$status->name}}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
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
