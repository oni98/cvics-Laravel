@extends('backend.layout.app')
@section('title', 'user Management')
@push('custom_style')
    <style>
        .card-header {
            border-bottom: none !important;
        }

        .invoice-details {
            width: 90%;
            height: 80%;
            font-size: 0.9rem;
        }
    </style>
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <div class="mt-5">
                        <img src="{{ asset('assets/backend/dist/img/quotation_header.png') }}" alt="" width="100%">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="invoice">
                    @include('backend.partials.message')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">Name</div>
                                <div class="col-md-9">: {{ $applicant->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Passport No</div>
                                <div class="col-md-9">: {{ $applicant->passport }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Address</div>
                                <div class="col-md-9">: {{ $applicant->address }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Phone</div>
                                <div class="col-md-9">: {{ $applicant->mobile }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Email</div>
                                <div class="col-md-9">: {{ $applicant->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">Quotation Date</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.q_date"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Status</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.q_status"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Quotation No</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.q_id"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Customer ID</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8">{{ $applicant->code }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Due Date</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.q_due_date"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Currency</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.currency"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Grand Amount</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8"><input type="text" class="form-control invoice-details"
                                        v-model="form_data.q_grand_amount" readonly></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-md-6">Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Tax (%)</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row,index) in invoiceItems" :key="index">
                                    <td>@{{ index + 1 }}</td>
                                    <td><input v-model="invoiceItems[index].description" class="form-control" type="text"
                                            style="min-width:150px;height:65px;"></td>
                                    <td><input v-model="invoiceItems[index].quantity" class="form-control" type="text"
                                            style="min-width:150px;height:65px;"></td>
                                    <td><input v-model="invoiceItems[index].price" class="form-control" type="text"
                                            style="min-width:150px;height:65px;" @keyup="calculateAmount"></td>
                                    <td><input v-model="invoiceItems[index].tax" class="form-control" type="text"
                                            style="min-width:150px;height:65px;" @keyup="calculateAmount"></td>
                                    <td><input v-model="invoiceItems[index].amount" class="form-control" type="text"
                                            readonly="" style="min-width:150px; height:65px;"></td>
                                    <td>
                                        <button type="button" class=" btn text-success font-20" title="Add"
                                            @click="addRow(index)"><i class="fas fa-plus"></i></button>
                                        <button type="button" class=" btn text-danger font-20" title="Remove"
                                            @click="removeRow(index)"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-white">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Total</td>
                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                        @{{ form_data.currency + ' ' + form_data.total }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        Discount (%)
                                    </td>
                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                        <input v-model="form_data.discount" class="form-control text-right"
                                            type="text" @keyup="calculateAmount">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right; font-weight: bold">
                                        Grand Total
                                    </td>
                                    <td
                                        style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                        @{{ form_data.currency + ' ' + form_data.q_grand_amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="my-5">
                            <label for="tnc">Terms and Conditions</label>
                            <textarea v-model="form_data.tnc" id="tnc" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <button type="button" v-on:click="addInvoice"
                        class="btn btn-primary submit-btn float-right">Generate Quotation</button>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    @include('backend.partials.message')
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Quotation (Click to Download)</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($quotations as $quot)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $quot->created_at }}</td>
                                        <td> 
                                            <a href="{{ asset('storage/applications/' . $applicant->code . '/' . $quot->quotation_pdf) }}"
                                                download title="Click to Download">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                            href="{{ route('quotation.destroy', $quot->id) }}" class="nav-link"
                                            title="Delete"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $quot->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $quot->id }}"
                                            action="{{ route('quotation.destroy', $quot->id) }}" method="POST"
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
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('custom_script')
    <script>
        let app = new Vue({
            el: '#invoice',
            data: {
                form_data: {
                    q_date: "",
                    q_status: "",
                    q_id: "",
                    q_due_date: '',
                    q_grand_amount: 0,
                    total: 0,
                    discount: '',
                    currency: '',
                    tnc: ''
                },
                invoiceItems: [{
                    description: '',
                    quantity: '',
                    price: '',
                    tax: '',
                    amount: ''
                }],
                id: '{{ $applicant->id }}'

            },
            methods: {
                addRow: function(index) {
                    this.invoiceItems.push({
                        description: '',
                        quantity: '',
                        price: '',
                        tax: '',
                        amount: ''
                    });
                },
                removeRow: function(index) {
                    this.invoiceItems.splice(index, 1);
                },

                calculateAmount: function() {
                    let ref = this;
                    for (let i = 0; i < ref.invoiceItems.length; i++) {
                        if (ref.invoiceItems[i].price != '') {

                            if ((ref.invoiceItems[i].price != '') && (ref.invoiceItems[i].tax != '')) {

                                let calculatedTax = ((ref.invoiceItems[i].price) * (ref.invoiceItems[i].tax)) /
                                    100;
                                let realPrice = parseFloat(ref.invoiceItems[i].price);
                                ref.invoiceItems[i].amount = realPrice + calculatedTax;

                            } else {
                                ref.invoiceItems[i].amount = ref.invoiceItems[i].price;
                            }

                        } else {
                            ref.invoiceItems[i].amount = 0;
                        }
                        //calculate total
                        ref.form_data.total = 0;
                        for (let i = 0; i < ref.invoiceItems.length; i++) {
                            ref.form_data.total += parseFloat(ref.invoiceItems[i].amount);
                        }
                        if (ref.form_data.discount > 0) {
                            let discount = ((ref.form_data.total * ref.form_data.discount) / 100);
                            ref.form_data.q_grand_amount = ref.form_data.total - discount;
                        } else {
                            ref.form_data.q_grand_amount = ref.form_data.total;
                        }

                    }
                },

                addInvoice: function() {
                    let ref = this;
                    let url = '/api/invoices/' + ref.id;

                    //storing invoice
                    let form_data = ref.form_data;
                    form_data['invoiceItems'] = ref.invoiceItems;
                    axios.post(url, form_data).then(function(response) {
                        //invoice validation

                    });
                },
            }
        });
    </script>
@endpush
