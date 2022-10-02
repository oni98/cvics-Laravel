@extends('backend.layout.app2')
@section('title', 'Application Form')
@section('content')
    <div class="application-form">
        <div class="card-title">
            <h2>Check Application Status</h2>
        </div>
        <div id="checkStatus">
            <div class="form-row justify-content-between">
                <div class="form-group col-md-5">
                    <label for="Name">Application ID </label>
                    <input type="text" v-model="search.code" class="form-control" id="Name" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="mobile">Passport No </label>
                    <input type="text" v-model="search.passport" class="form-control" id="mobile" required>
                </div>
                <div class="form-group col-md-2 my-auto">
                    <button v-on:click="statusSearch" class="btn btn-submit btn-block">Check</button>
                </div>
            </div>

            <p class="text-bold font-italic">
                <span class="text-danger">**</span> Search by Application Id <span class="text-danger">and</span> Passport No <span
                    class="text-danger">**</span>
            </p>
            <div v-if="!isHidden">
                <table id="example1" class="table table-responsive table-bordered table-striped check-status">
                    <tbody  v-if="application != null">
                        <tr>
                            <td class="check-status1 check-status1 font-weight-bold">Application Id</td>
                            <td class="check-status2">@{{ application.code }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Name</td>
                            <td class="check-status2">@{{ application.name }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Date of Birth</td>
                            <td class="check-status2">@{{ application.birth_date }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Passport No</td>
                            <td class="check-status2">@{{ application.passport }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Prepared Institution </td>
                            <td class="check-status2">@{{ application.prepared_institution1 }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Subject of Interest</td>
                            <td class="check-status2">@{{ application.subject_of_interest1 }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Destination</td>
                            <td class="check-status2">@{{ application.study_destination }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Applied at</td>
                            <td class="check-status2">@{{ applied_date }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Status</td>
                            <td class="check-status2">@{{ application.status.name }}</td>
                        </tr>
                        <tr>
                            <td class="check-status1 font-weight-bold">Comments</td>
                            <td class="check-status2">@{{ application.comments }}</td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td class="text-center" width="1%">No Record Found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('custom_script')
    <script>
        let app = new Vue({
            el: '#checkStatus',
            data: {
                application: [],
                search: {
                    code: '',
                    passport: '',
                },
                isHidden: true,
                applied_date: ''
            },
            methods: {
                statusSearch: function() {
                    let ref = this;
                    ref.getApplication();
                },

                getApplication: function() {
                    let ref = this;
                    let url = '/api/application/list'
                    axios.get(url, {
                        params: {
                            code: ref.search.code,
                            passport: ref.search.passport,
                        }
                    }).then(function(response) {
                        let data = response.data.data;
                        ref.application = data;
                        ref.isHidden = false;

                        ref.applied_date = moment(ref.application.created_at).format('DD-MM-YYYY');
                    });
                },
            },
            created: function() {
                this.getApplication();
            }
        });
    </script>
@endpush
