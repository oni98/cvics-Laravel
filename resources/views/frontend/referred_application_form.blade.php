<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ @config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style + Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/backend/dist/img/full-logo.png') }}" alt="CVICS"
                height="60" width="250">
        </div>

        {{-- Navbar --}}
        <div>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('storage/agents/' . $agent->code . '/' . $agent->logo) }}" class=""
                            alt="CVICS" height="100px" width="200px">
                    </a>
                </div>
            </nav>
        </div>
        <!-- Main content -->
        <div class="container-fluid background-image">
            <div class="container py-5">
                <div class="application-form">
                    <div class="card-title">
                        <h2>Application Form</h2>
                    </div>
                    @include('backend.partials.message')
                    <div>
                        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Name">Name (as per NRIC/Passport) <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control" id="Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile">Mobile No <span class="text-danger">*</span> </label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="birth_date">Date of Birth <span class="text-danger">*</span> </label>
                                    <input class="datepicker form-control" name="birth_date"
                                        data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required
                                        autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passport">Passport No <span class="text-danger">*</span> </label>
                                    <input type="text" name="passport" class="form-control" id="passport" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passport_expire">Passport Expire Date <span class="text-danger">*</span>
                                    </label>
                                    <input class="datepicker form-control" name="passport_expire"
                                        data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="maritial_status">Maritial Status <span class="text-danger">*</span>
                                    </label>
                                    <select id="maritial_status" name="maritial_status" class="form-control" required>
                                        <option value="Single" selected>Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nationality">Nationality <span class="text-danger">*</span> </label>
                                    <input type="text" name="nationality" class="form-control" id="nationality"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="country_of_residence">Country of Residence <span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="country_of_residence" class="form-control"
                                        id="country_of_residence" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="ssc">SSC/Equivalent <span class="text-danger">*</span> </label>
                                    <input type="text" name="ssc" class="form-control" id="ssc"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ssc_year">Year of Completion <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="ssc_year" class="form-control" id="ssc_year"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ssc_institute">Institute </label>
                                    <input type="text" name="ssc_institute" class="form-control"
                                        id="ssc_institute">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ssc_cgpa">CGPA <span class="text-danger">*</span> </label>
                                    <input type="text" name="ssc_cgpa" class="form-control" id="ssc_cgpa"
                                        required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="hsc">HSC/Diploma/Equivalent <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="hsc" class="form-control" id="hsc"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hsc_year">Year of Completion <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="hsc_year" class="form-control" id="hsc_year"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hsc_institute">Institute </label>
                                    <input type="text" name="hsc_institute" class="form-control"
                                        id="hsc_institute">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="hsc_cgpa">CGPA <span class="text-danger">*</span> </label>
                                    <input type="text" name="hsc_cgpa" class="form-control" id="hsc_cgpa"
                                        required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="bachelor">Bachelor/Equivalent </label>
                                    <input type="text" name="bachelor" class="form-control" id="bachelor">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bachelor_year">Year of Completion </label>
                                    <input type="text" name="bachelor_year" class="form-control"
                                        id="bachelor_year">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bachelor_institute">Institute </label>
                                    <input type="text" name="bachelor_institute" class="form-control"
                                        id="bachelor_institute">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bachelor_cgpa">CGPA </label>
                                    <input type="text" name="bachelor_cgpa" class="form-control"
                                        id="bachelor_cgpa">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="master">Master/Equivalent </label>
                                    <input type="text" name="master" class="form-control" id="master">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="master_year">Year of Completion </label>
                                    <input type="text" name="master_year" class="form-control" id="master_year">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="master_institute">Institute </label>
                                    <input type="text" name="master_institute" class="form-control"
                                        id="master_institute">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="master_cgpa">CGPA </label>
                                    <input type="text" name="master_cgpa" class="form-control" id="master_cgpa">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="study_destination">Study Destination (if any) </label>
                                    <input type="text" name="study_destination" class="form-control"
                                        id="study_destination">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="proof_of_language">Proof of Language (IELTS/TOEFL/etc) </label>
                                    <input type="text" name="proof_of_language" class="form-control"
                                        id="proof_of_language">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ielts">Language Score (if any) </label>
                                    <input type="text" name="ielts" class="form-control" id="ielts">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="intake_month">Intake Month</label>
                                    <select id="intake_month" name="intake_month" class="form-control">
                                        <option disabled selected></option>
                                        <option value="February">February</option>
                                        <option value="September">September</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="intake_year">Intake Year</label>
                                    <select id="intake_year" name="intake_year" class="form-control">
                                        <option disabled selected></option>
                                        @foreach (array_reverse(range(date('Y') + 5, $earliest_year)) as $x)
                                            <option value="{{ $x }}">{{ $x }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prepared_institution1">Prepared Institution 1 (if any)</label>
                                    <input type="text" name="prepared_institution1" class="form-control"
                                        id="prepared_institution1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subject_of_interest1">Subject of Interest (if any)</label>
                                    <input type="text" name="subject_of_interest1" class="form-control"
                                        id="subject_of_interest1">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prepared_institution2">Prepared Institution 2 (if any)</label>
                                    <input type="text" name="prepared_institution2" class="form-control"
                                        id="prepared_institution2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subject_of_interest2">Subject of Interest (if any)</label>
                                    <input type="text" name="subject_of_interest2" class="form-control"
                                        id="subject_of_interest2">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="source">How do you know about us? </label>
                                    <select id="source" name="source" class="form-control">
                                        <option value="Agent">Agent</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="referrer">Referrer Name</label>
                                    <select id="referrer" name="referrer" class="form-control">
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" id="remarks" name="remarks">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="working_place">Working Place</label>
                                    <input type="text" name="working_place" class="form-control" id="working_place">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="working_position">Worked As (Position)</label>
                                    <input type="text" name="working_position" class="form-control"
                                        id="working_position">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="experience">Duration (Experience)</label>
                                    <input type="text" name="experience" class="form-control" id="experience">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="photo">Photo <span class="text-danger">*</span></label>
                                    <input type="file" name="photo" class="form-control-file" id="photo"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passport_info">Passport Info Page <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="passport_info" class="form-control-file"
                                        id="passport_info" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="academic_docs">Academic Docs <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="academic_docs" class="form-control-file"
                                        id="academic_docs" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="resume">Resume</label>
                                    <input type="file" name="resume" class="form-control-file" id="resume">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="language_proficiency">Language Proficiency </label>
                                    <input type="file" name="language_proficiency" class="form-control-file"
                                        id="language_proficiency">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="personal_statement">Personal Statement</label>
                                    <input type="file" name="personal_statement" class="form-control-file"
                                        id="personal_statement">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="research_proposal">Research Proposal </label>
                                    <input type="file" name="research_proposal" class="form-control-file"
                                        id="research_proposal">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="other1">Other 1 </label>
                                    <input type="file" name="other1" class="form-control-file" id="other1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="other2">Other 2</label>
                                    <input type="file" name="other2" class="form-control-file" id="other2">
                                </div>
                            </div>

                            <p class="text-bold font-italic">
                                <span class="text-danger">**</span> We believe the above information given by you is
                                True and Correct. Hence, we will be using the
                                above given information in further process. <span class="text-danger">**</span>
                            </p>
                            <p class="text-bold font-italic">
                                <span class="text-danger">**</span> The above-mentioned particulars are for our basic
                                information only. We will do preliminary
                                Assessment Report once we receive your updated Resume. <span
                                    class="text-danger">**</span>
                            </p>

                            <button type="submit" class="btn btn-submit btn-block">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer mx-auto">
        <strong>Copyright &copy; 2022 <a href="https://cvics.org">CVICS</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/backend/plugins/moment/moment.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/dist/js/adminlte.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.datepicker').datepicker();
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
