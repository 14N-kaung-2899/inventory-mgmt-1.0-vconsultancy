@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Office: </h3>
            <form name="officeform" id="officeform" onsubmit="return validateOfficeInput()" action="{{route('office.update',$office->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name"> Office Name: </label>
                    <input id="name" name="name" class="form-control" value="{{$office->name}}" maxlength = "50" placeholder="Enter office name...">
                </div>
                <div class="form-group">
                    <label for="description"> Description:  </label>
                    <input id="description" name="description" class="form-control" value="{{$office->description}}" maxlength = "150" placeholder="Enter a short description...">
                </div>
                <div class="form-group">
                    <label for="eno"> Number Of Employee:  </label>
                    <input id="eno" name="eno" class="form-control" value="{{$office->empno}}" disabled>
                    <input type="text" id="empno" name="empno" value="{{$office->empno}}" hidden>

                    <font color="red">
                        (Employee Number Cannot Be Changed Manually.)
                    </font>
                    <br>
                </div>
                <div class="form-group">
                    <label for="lid"> Select Location:  </label>
                    <select name="lid" id="lid">
                        @foreach($location as $l)
                            @if(($office->lid)==($l->id))
                                <option value="{{$l->id}}" selected> {{"$l->line1"."$l->line2"}} </option>
                            @else
                                <option value="{{$l->id}}"> {{"$l->line1"."$l->line2"}} </option>
                            @endif
                            
                        @endforeach
                    </select>

                    <br>

                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                <hr>   
                <a style="color:orange; text-decoration:none" href="{{route('office.index')}}">
                    <i class="ph-prohibit-bold"></i> <b> Cancel Editing </b>
                </a>                                  
            </form>
        </div>
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/officevalidation.js')}}"></script>
@endsection


