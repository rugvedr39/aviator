@extends('Layout.admindashboard')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper" style="background-color:color-mix(in oklch increasing hue, #e1ff00, #cdde7d 50%);">
    <div class="page-header"> 
          
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Amount setup Rule 
            </h3>
        </div>  <div class="row">
              @if (isset($id) && $id != null && $specificdata != null)
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Amount setup</h4>
                            <form class="forms-sample" id="editamountsetup">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="settingname">Setting Name</label>
                                    <input type="text" class="form-control" id="settingname" name="settingname"
                                        placeholder="Setting Name" value="{{$specificdata->category}}">
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="text" class="form-control" id="value" name="value"
                                        placeholder="Min. Withdrawal" value="{{$specificdata->value}}">
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        <div class="row">
           <div class="col grid-margin stretch-card" style="background-color:yellow;">
                <div class="card" style="background-color:yellow;">
                    <div class="card-body" style="background-color:yellow;">
                        <h4 class="card-title">Plan Crashed Time Set</h4>
                        </p>
                        <table class="table table-bordered table-primary">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Setting name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($setting as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        <label class="badge badge-warning" onclick="window.location.href='plan-crash-time/{{$item->id}}'">Action</label>
                                        {{-- <label class="badge badge-danger" onclick="window.location.href='amount-setup/delete/{{$item->id}}'">Delete</label> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                 <p><b>Rule 1.- </b>Set Value 10 means 1.0 to 1.9   <b>Rule 2.- </b>Set Value 20 means 2.0 to 2.9</p>
            <p> <b>Rule 3.- </b>Set Value 30 means 3.0 to 3.9   <b>Rule 4.- </b>Set Value 40 means 4.0 to 4.9</p>
             <p><b>Rule 5.- </b>Set Value 1.1 to 10.1 anyOther means Enter Value is result     <b>Rule 6.- </b>Set Value 100  means Random result </p>
       
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

@section('js')
    <script>
        $("#editamountsetup").on('submit', function(e) {
            e.preventDefault();
        });
        $("#editamountsetup").validate({
            submitHandler: function(form) {
                apex("POST", "{{ url('admin/api/editamountsetup') }}", new FormData(form), form,
                    "/admin/plan-crash-time", "#");
            }
        });
    </script>
@endsection
