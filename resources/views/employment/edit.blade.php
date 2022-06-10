@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Register A New Employment: </h3>
            <form name="employmentform" id="employmentform" onsubmit="return valideEmploymentInput()" action="{{route('employment.update', $oldemployment->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="link"> Upload Link:  </label>
                    <font color="green"> File Uploading Will Be Avilable Soon </font>
                    <input type="text" id="link" name="link" value="{{$oldemployment->link}}" hidden>
                </div>

                <div class="form-group">
                    <label for="empid"> Employment ID: {{$oldemployment->empid}} </label>
                    <font color="orange"> (Employment ID cannot be changed.) </font>                    
                    <input type="text" id="empid" name="empid" value="{{$oldemployment->empid}}" hidden>
                </div>
                

                <div class="form-group">
                    <label for="salary"> Salary:  </label>
                    <input type="number" id="salary" name="salary" class="form-control" value="{{$oldemployment->salary}}" class="form-control" placeholder="Enter salary...">
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                <hr>    
            </form>
        </div>

        <br>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>
                    <font size="5" color="black"> 
                        <i class="ph-identification-badge-bold"></i>
                        &nbsp
                        <b> Employment List: </b>                     
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Salary </th>
                                <th> Details </th>
                                <th colspan="2"> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Salary </th>
                                <th> Details </th>
                                <th colspan="2"> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td> {{$oldemployment->salary}} </td>
                                <td> {{$oldemployment->link}} </td>
                                <td align="center">  
                                    <a style="color:orange; text-decoration:none" href="{{route('employment.create')}}">
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
    <script src="{{asset('admin/js/validation/employmentvalidation.js')}}"></script>
@endsection


