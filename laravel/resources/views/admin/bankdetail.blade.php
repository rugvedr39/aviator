@extends('Layout.admindashboard')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper" style="background-color:color-mix(in oklch increasing hue, #e1ff00, #cdde7d 50%);">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Bank Setup
            </h3>
        </div>
        <div class="row">
            <div class="col grid-margin stretch-card" style="background-color:yellow;">
                <div class="card" style="background-color:yellow;">
                    <div class="card-body" style="background-color:yellow;">
                        <h4 class="card-title">Set Your UPI , QR Code , Bank detail</h4>
                        <form class="forms-sample" id="bankdetail">
                            @csrf
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Bank Name" value="{{ $bank->bank_name }}">
                            </div>
                            <div class="form-group">
                                <label for="account_no">Account No</label>
                                <input type="text" class="form-control" id="account_no" name="account_no"
                                    placeholder="Account No" value="{{ $bank->account_no }}">
                            </div>
                            <div class="form-group">
                                <label for="holdername">Account holder name</label>
                                <input type="text" class="form-control" id="holdername" name="holdername"
                                    placeholder="Account holder name" value="{{ $bank->account_holder_name }}">
                            </div>
                            <div class="form-group">
                                <label for="ifsccode">IFSC Code</label>
                                <input type="text" class="form-control" id="ifsccode" name="ifsccode"
                                    placeholder="IFSC Code" value="{{ $bank->ifsc_code }}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_no">Mobile no</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                                    placeholder="Mobile No." value="{{ $bank->mobile_no }}">
                            </div>
                            <div class="form-group">
                                <label for="upi_id">UPI Id</label>
                                <input type="text" class="form-control" id="upi_id" name="upi_id"
                                    placeholder="UPI Id" value="{{ $bank->upi_id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="value">Bar code</label>
                                <input type="file" class="form-control" id="barcode" name="barcode" readonly>
                            </div>
                            @if ($bank->barcode != '')
                                <img src="{{ $bank->barcode }}" alt="" style="width:260px;"> <br>
                            @endif
                            <button type="submit" class="btn btn-gradient-primary me-2" disabled >Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

@section('js')
    <script>
        $("#bankdetail").on('submit', function(e) {
            e.preventDefault();
        });
        $("#bankdetail").validate({
            submitHandler: function(form) {
                apex("POST", "{{ url('admin/api/bankdetail') }}", new FormData(form), form,
                    "/admin/bank-detail", "#");
            }
        });
    </script>
@endsection
