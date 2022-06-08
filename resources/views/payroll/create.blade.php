@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> 
                <font color="black">
                    Add New Payroll:
                </font>  
            </h3>
            <form name="payrollform" id="payrollform" onsubmit="return validatePayrollInput()" action="{{route('payroll.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="holder"> Enter Holder Name:  </label>
                    <input id="holder" name="holder" class="form-control" maxlength="50" placeholder="Enter account holder name...">
                </div>
                <div class="form-group">
                    <label for="accno"> Enter Account Number:  </label>
                    <input type="number" id="accno" name="accno" class="form-control" maxlength="10" placeholder="Enter bank account number... (Only Digits)">
                </div>
                <div class="form-group">
                    <label for="bank"> Enter Bank Name:  </label>
                    <input id="bank" name="bank" class="form-control" maxlength="30" placeholder="Enter bank name..">
                </div>
                <br>
                <h6> Enter Full Address Of Bank:</h6>
                <div class="form-group">
                    <label for="line1"> Enter Address Line 1 </label>
                    <input id="line1" name="line1" class="form-control" maxlength = "200" placeholder="Enter room num, building num...">
                </div>
                <div class="form-group">
                    <label for="line2"> Enter Address Line 2  </label>
                    <input id="line2" name="line2" class="form-control" maxlength = "200" placeholder="Enter stree name, road name...">
                </div>
                <div class="form-group">
                    <label for="subdistrict_id"> Select Sub-district:  </label>
                    <select name="subdistrict_id" id="subdistrict_id">
                        @foreach($subdistrict as $sd)
                        <option value="{{$sd->id}}"> {{$sd->name}} </option>
                        @endforeach
                    </select>
                    <font color="green">
                        {Distirct & Postal Code will be automatically saved.}
                    </font>

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
                    <input id="ifsc" name="ifsc" class="form-control" maxlength = "11" placeholder="Enter ifsc code...">
                </div>
                <div class="form-group">
                    <label for="code"> Enter Swift Code:  </label>
                    <input id="code" name="code" class="form-control" maxlength = "11" placeholder="Enter swift code...">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Add A Payroll') }}
                </button>
                <hr>    
            </form>
        </div>

        <br>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                <font size="5" color="black"> 
                    <b> Payroll Database: </b>
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
                                <th colspan="2"> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Holder Full Name: </th>
                                <th> Account Number: </th>
                                <th> Bank Name: </th>
                                <th> IFSC Code: </th>
                                <th> Swift Code: </th>
                                <th colspan="2"> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($payroll as $pr)
                            <tr>
                                <td> {{$pr->holder}} </td>
                                <td> {{$pr->accno}} </td>
                                <td> {{$pr->bank}} </td>
                                <td> {{$pr->ifsc}} </td>
                                <td> {{$pr->code}} </td>
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('payroll.edit',$pr->id)}}">
                                            <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('payroll.destroy',$pr->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input style="background-color:#b00000;" type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>                                           
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                                
    </div>  
    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/payrollvalidation.js')}}"></script> 
@endsection


