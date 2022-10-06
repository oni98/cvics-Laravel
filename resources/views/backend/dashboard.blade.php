@extends('backend.layout.app')
@section('title', 'Dashboard')
@push('custom_style')
    <style>
        .urlbox {
            margin: 50px auto 20px auto;
            max-width: 758px;
            box-shadow: 0 1px 4px #ccc;
            border-radius: 2px;
            padding: 20px 30px 15px;
            background: rgb(248 249 250);
            text-align: center;
        }

        .urlbox .heading {
            color: #007bff;
            font-weight: bold;
        }

        .input-group {
            padding-top: 30px px;
        }

        input.copy-url,
        textarea.copy-url,
        input.copy-url:focus,
        textarea.copy-url:focus {
            height: 46px;
            width: 50%;
            outline: none;
            border: 1px solid #e8e8ff;
            border-radius: 5px 0px 0px 5px;
            box-shadow: inset 1px 1px 3px 0px rgb(108 115 145);
        }

        .copy-button,
        .copy-button:focus {
            color: white;
            background: #007bff;
            border: 1px solid #007bff;
            outline: none;
            border-radius: 0px 5px 5px 0px;
            padding: 10px;
            transition: box-shadow .4s cubic-bezier(.25, .8, .25, 1), transform .4s cubic-bezier(.25, .8, .25, 1);
            box-shadow: 0px 2px 5px 0px rgb(20 25 199 / 43%);
            cursor: pointer;
        }

        .copy-button:active {
            background: #4796eb;
        }

        .copy-button:before {
            content: "Copied";
            position: absolute;
            top: -15px;
            right: 140px;
            background: #2288f5;
            padding: 8px 10px;
            border-radius: 20px;
            font-size: 15px;
            display: none;
        }

        .copy-button:after {
            content: "";
            position: absolute;
            top: 15px;
            right: 165px;
            width: 10px;
            height: 10px;
            background: #2288f5;
            transform: rotate(45deg);
            display: none;
        }

        .copy-text.active button:before,
        .copy-text.active button:after {
            display: block;
        }

        .copy_short_url:before {
            content: "Copied";
            background: #2288f5;
            color: #fff;
            padding: 8px 10px;
            border-radius: 20px;
            font-size: 15px;
            display: none;
            margin-top: -8px;
            position: relative;
        }

        .copy_short_url:after {
            content: "";
            margin-left: 150px;
            margin-top: -30px;
            width: 10px;
            height: 10px;
            background: #2288f5;
            transform: rotate(45deg);
            display: none;
        }

        .copy_short_url:active:before,
        .copy_short_url:active:after {
            display: block;
        }
    </style>
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            @role('admin')
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $applications }}</h3>

                                <p>Total Applications</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('application.list') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $agents }}</h3>

                                <p>Total Agents</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('agents') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $pendingAgents }}</h3>

                                <p>Pending Agents</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('pendingAgents') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $pendingTasks }}</h3>

                                <p>Pending Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                @include('backend.task')
                <!-- /.row (main row) -->
            @endrole
            @role('agent')
            <div class="row justify-content-center">
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $agentApplications }}</h3>

                            <p>Total Applications</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('agent.application.list') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
                    <div class="urlbox">
                        <h1 class="heading">Refer to Applicant</h1>
                        <h6>Refer Link</h6>
                        <div class="input-group justify-content-center copy-text">
                            <input type="text" class="text copy-url"
                                value="{{ route('referred.application', [base64_encode(Auth::user()->id), Auth::user()->name]) }}" />
                            <div class="input-group-append">
                                <button class="copy-button" title="Click to Copy"><i class="fa fa-clone"></i></button>
                            </div>
                        </div>
                    </div>
            @endrole
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('custom_script')
    <script>
        //copy input text
        let copyText = document.querySelector(".copy-text");
        copyText.querySelector("button").addEventListener("click", function() {
            let input = copyText.querySelector("input.text");
            input.select();
            document.execCommand("copy");
            copyText.classList.add("active");
            window.getSelection().removeAllRanges();
            setTimeout(function() {
                copyText.classList.remove("active");
            }, 2500);
        });
    </script>
@endpush
