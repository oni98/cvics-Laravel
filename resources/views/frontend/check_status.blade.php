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
                    <input type="text" v-model="search.code" class="form-control" id="Name">
                </div>
                <div class="form-group col-md-5">
                    <label for="mobile">Passport No </label>
                    <input type="text" v-model="search.passport" class="form-control" id="mobile">
                </div>
                <div class="form-group col-md-2 my-auto">
                    <button v-on:click="statusSearch" class="btn btn-submit btn-block">Check</button>
                </div>
            </div>

            <p class="text-bold font-italic">
                <span class="text-danger">**</span> Search by Application Id <span class="text-danger">or</span> Passport No
                <span class="text-danger">or</span> Date of Birth <span class="text-danger">or</span> combining them <span
                    class="text-danger">**</span>
            </p>
            <div v-if="!isHidden">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Application Id</th>
                            <th>Name</th>
                            <th>Passport No</th>
                            <th>Date of Birth</th>
                            <th>Status</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="applications.length > 0" v-for="application in applications" v-bind:key="application.id">
                            <td>@{{ application.code }}</td>
                            <td>@{{ application.name }}</td>
                            <td>@{{ application.passport }}</td>
                            <td>@{{ application.birth_date }}</td>
                            <td>@{{ application.status.name }}</td>
                            <td>@{{ application.comments }}</td>
                        </tr>
                        <tr v-if="applications.length == 0">
                            <td class="text-center" colspan="5">There is no Such Data</td>
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
                applications: [],
                search: {
                    code: '',
                    passport: '',
                },
                isHidden: true
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
                        ref.applications = data;
                        ref.isHidden = false;
                    });
                },
            },
            created: function() {
                this.getApplication();
            }
        });
    </script>
@endpush
