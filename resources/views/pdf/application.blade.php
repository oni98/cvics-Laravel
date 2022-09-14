<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ @config('app.name') }}</title>
    <style>
        table {
            border: 1px solid #dee2e6;
        }

        tr:nth-child(odd) {
            background: #dee2e6;
        }

        .fw-bold {
            font-weight: bold;
        }
        td{
            padding: 2px 0px 2px 2px;
        }
        .float-right{
            text-align: right;
        }
    </style>
</head>

<body>
    <div>
        <img src="{{ asset('assets/backend/dist/img/application_header.png') }}" alt="" width="100%">
    </div>
    <div>
        <table class="table-striped">
            <tr>
                <td class="fw-bold">Application Id</td>
                <td>: {{ $application->code }}</td>
                <td class="float-right" rowspan="4" colspan="2"><img
                        src="{{ asset('storage/' . $application->code . '/' . $application->photo) }}" alt=""
                        width="60%"></td>
            </tr>
            <tr>
                <td class="fw-bold">Name</td>
                <td>: {{ $application->name }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Mobile No</td>
                <td>: {{ $application->mobile }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Email</td>
                <td>: {{ $application->email }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Date of Birth</td>
                <td>: {{ $application->birth_date }}</td>

                <td class="fw-bold">Maritial Status</td>
                <td>: {{ $application->maritial_status }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Passport No</td>
                <td>: {{ $application->passport }}</td>

                <td class="fw-bold">Passport Expire Date</td>
                <td>: {{ $application->passport_expire }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Nationality</td>
                <td>: {{ $application->nationality }}</td>

                <td class="fw-bold">Country of Residence</td>
                <td>: {{ $application->country_of_residence }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Address</td>
                <td>: {{ $application->address }}</td>
            </tr>
            <tr>
                <td class="fw-bold">SSC/Equivalent/</td>
                <td>: {{ $application->ssc }}</td>

                <td class="fw-bold">Year of Completion</td>
                <td>: {{ $application->ssc_year }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Institute</td>
                <td>: {{ $application->ssc_institute }}</td>

                <td class="fw-bold">CGPA </td>
                <td>: {{ $application->ssc_cgpa }}</td>
            </tr>
            <tr>
                <td class="fw-bold">HSC/Diploma/Equivalent</td>
                <td>: {{ $application->hsc }}</td>

                <td class="fw-bold">Year of Completion</td>
                <td>: {{ $application->hsc_year }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Institute </td>
                <td>: {{ $application->hsc_institute }}</td>

                <td class="fw-bold">CGPA </td>
                <td>: {{ $application->hsc_cgpa }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Bachelor/Equivalent</td>
                <td>: {{ $application->bachelor }}</td>

                <td class="fw-bold">Year of Completion</td>
                <td>: {{ $application->bachelor_year }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Institute</td>
                <td>: {{ $application->bachelor_institute }}</td>

                <td class="fw-bold">CGPA</td>
                <td>: {{ $application->bachelor_cgpa }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Master/Equivalent</td>
                <td>: {{ $application->master }}</td>

                <td class="fw-bold">Year of Completion</td>
                <td>: {{ $application->master_year }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Institute</td>
                <td>: {{ $application->master_institute }}</td>

                <td class="fw-bold">CGPA</td>
                <td>: {{ $application->master_cgpa }}</td>
            </tr>
            <tr>
                <td class="fw-bold">IELTS Score (if any)</td>
                <td>: {{ $application->ielts }}</td>

                <td class="fw-bold">Study Destination (if any)</td>
                <td>: {{ $application->study_destination }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Intake Month</td>
                <td>: {{ $application->intake_month }}</td>

                <td class="fw-bold">Intake Year</td>
                <td>: {{ $application->intake_year }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Prepared Institution 1 (if any)</td>
                <td>: {{ $application->prepared_institution1 }}</td>

                <td class="fw-bold">Subject of Interest (if any)</td>
                <td>: {{ $application->subject_of_interest1 }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Prepared Institution 2 (if any)</td>
                <td>: {{ $application->prepared_institution2 }}</td>

                <td class="fw-bold">Subject of Interest (if any)</td>
                <td>: {{ $application->subject_of_interest2 }}</td>
            </tr>
            <tr>
                <td class="fw-bold">How do you know about us?</td>
                <td>: {{ $application->source }}</td>

                <td class="fw-bold">Referrer Name</td>
                <td>
                    @foreach ($agents as $agent)
                        @if ($agent->id == $application->referrer)
                            : {{ $agent->name }}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="fw-bold">Work Experience</td>
                <td>: {{ $application->experience }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
