@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Office: </h3>
            <form name="officeform" id="officeform" onsubmit="return validateOfficeInput()" action="{{route('office.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name"> Office Name: </label>
                    <input id="name" name="name" class="form-control" maxlength = "50" placeholder="Enter office name...">
                </div>
                <div class="form-group">
                    <label for="description"> Description:  </label>
                    <input id="description" name="description" class="form-control" maxlength = "150" placeholder="Enter a short description...">
                </div>
                <div class="form-group">
                    <label for="empno"> Number Of Employee:  </label>
                    <input id="empno" name="empno" class="form-control" value= "0" disabled>
                    <font color="red">
                        (Employee Number Will Be Automatically Updated When Someone Is Register.)
                    </font>
                    <br>
                </div>
                <div class="form-group">
                    <label for="location"> Select Location:  </label>
                    <select name="location" id="location">
                        @foreach($location as $l)
                            <option value="{{$l->id}}"> {{"$l->line1"."$l->line2"}} </option>
                        @endforeach
                    </select>
                    
                    <br>

                    <h6>                        
                        If you cannot find the location, you can register new place,                            
                        <b>
                            <a href="{{route('location.create')}}">
                                here.
                            </a>
                        </b>
                    </h6>
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                <hr>                                    
            </form>
        </div>
    </div>  
    
    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/officevalidation.js')}}"></script>
@endsection


