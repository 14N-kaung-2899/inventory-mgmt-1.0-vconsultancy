@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Payroll: </h3>
            <form name="payrollform" id="payrollform" onsubmit="return validatePayrollInput()" action="{{route('payroll.update', $oldpayroll->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="holder"> Enter Holder Name:  </label>
                    <input id="holder" name="holder" class="form-control" value="{{$oldpayroll->holder}}" maxlength="50" placeholder="Enter account holder name...">
                </div>
                <div class="form-group">
                    <label for="accno"> Enter Account Number:  </label>
                    <input id="accno" name="accno" class="form-control" value="{{$oldpayroll->accno}}" maxlength="10" placeholder="Enter bank account number... (Only Digits)">
                </div>
                <div class="form-group">
                    <label for="bank"> Enter Bank Name:  </label>
                    <input id="bank" name="bank" class="form-control" value="{{$oldpayroll->bank}}" maxlength="30" placeholder="Enter bank name..">
                </div>
                <br>
                <h6> Enter Full Address Of Bank:</h6>
                <div class="form-group">
                    <label for="line1"> Enter Address Line 1 </label>
                    <input id="line1" name="line1" class="form-control" value="{{$oldpayroll->line1}}" maxlength = "200" placeholder="Enter room num, building num...">
                </div>
                <div class="form-group">
                    <label for="line2"> Enter Address Line 2  </label>
                    <input id="line2" name="line2" class="form-control" value="{{$oldpayroll->line2}}" maxlength = "200" placeholder="Enter stree name, road name...">
                </div>
                <div class="form-group">
                    <label for="subdistrict_id"> Select Sub-district:  </label>
                    <select name="subdistrict_id" id="subdistrict_id">
                        @foreach($subdistrict as $sd)
                            @if(($oldpayroll->subdistrict_id)==($sd->id))
                                <option value="{{$sd->id}}" selected> {{$sd->name}} </option>
                            @else
                                <option value="{{$sd->id}}"> {{$sd->name}} </option>
                            @endif
                        @endforeach
                    </select>
                    <font color="green">
                        {Distirct & Postal Code will be automatically saved.}
                    </font>

                    <!-- Pulling Distirct -->
                    <!-- <b> 
                        <font> 
                            District:
                        </font> 
                    </b> 
                        Data | -->

                    <!-- Pulling City -->
                    <!-- <b> 
                        <font> 
                            City:
                        </font> 
                    </b> 
                        Bangkok. | -->

                    <!-- Pulling Country -->
                    <!-- <b> 
                        <font> 
                            Country:
                        </font> 
                    </b> 
                        Thailand. -->

                    <br>

                    <h6>                        
                        <font color="red">
                            <b>
                                (Currently, ONLY banks form Bangkok, Thailand can be registered.)
                            </b>
                        </font>
                    </h6>
                </div>

                <div class="form-group">
                    <label for="ifsc"> Enter IFSC:  </label>
                    @if(($oldpayroll->ifsc)=="N/A")
                        <input id="ifsc" name="ifsc" class="form-control" maxlength = "11" placeholder="Enter IFSC code...">      
                    @else
                        <input id="ifsc" name="ifsc" class="form-control" value="{{$oldpayroll->ifsc}}" maxlength = "11" placeholder="Enter IFSC code...">                    
                    @endif
                </div>
                <div class="form-group">
                    <label for="code"> Enter Swift Code:  </label>
                    <input id="code" name="code" class="form-control" value="{{$oldpayroll->code}}" maxlength = "11" placeholder="Enter swift code...">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Payroll') }}
                </button>
                <hr>    
            </form>
        </div>

        <br>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <i class="ph-wallet-bold"></i>
                        &nbsp
                        <b> Payroll List: </b>      
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Holder Full Name: </th>
                                <th> Account Number: </th>
                                <th> Bank Name: </th>
                                <th> IFSC Code: </th>
                                <th> Swift Code: </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Holder Full Name: </th>
                                <th> Account Number: </th>
                                <th> Bank Name: </th>
                                <th> IFSC Code: </th>
                                <th> Swift Code: </th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td> {{$oldpayroll->holder}} </td>
                                <td> {{$oldpayroll->accno}} </td>
                                <td> {{$oldpayroll->bank}} </td>
                                <td> {{$oldpayroll->ifsc}} </td>
                                <td> {{$oldpayroll->code}} </td>
                                <td>  
                                    <a style="color:orange; text-decoration:none" href="{{route('payroll.create')}}">
                                        <i class="ph-prohibit-bold"></i> <b> Cancel Editing </b>
                                    </a>
                                </td>                                         
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                                
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/payrollvalidation.js')}}"></script> 
@endsection


