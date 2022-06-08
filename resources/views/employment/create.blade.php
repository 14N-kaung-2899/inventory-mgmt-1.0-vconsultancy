@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Register A New Employment: </h3>
            <form name="employmentform" id="employmentform" onsubmit="return validateEmploymentInput()" action="{{route('employment.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="link"> Upload Link:  </label>
                    <font color="green"> File Uploading Function Will Be Avilable Soon </font>
                    <input id="link" name="link" class="form-control" value="Employment.pdf" hidden>
                </div>
                <div class="form-group">
                    <label for="empid"> Employment ID:  </label>
                    <input id="empid" name="empid" class="form-control" pattern="[a-z]+" maxlength = "15" placeholder="Enter employee nickname...">
                    <font color="orange"> (Employment ID must be only <b> LOWER CASE LETTER </b> & no more than <b> 15 </b> characters without <b> SPACE, NUM & SPECIALS </b>.) </font>
                </div>
                <div class="form-group">
                    <label for="salary"> Salary:  </label>
                    <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter salary...">
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                <hr>    
            </form>
        </div>

        <br>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <b> Employment Database: </b>
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
                            @foreach ($employment as $e)
                            <tr>
                                <td> {{$e->salary}} </td>
                                <td> {{$e->link}} </td>
                                <td align="center">  
                                    <a href="{{route('employment.edit',$e->id)}}">
                                        EDIT
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('employment.destroy',$e->id) }}">
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
    <script src="{{asset('admin/js/validation/employmentvalidation.js')}}"></script>
@endsection


