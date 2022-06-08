@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Office Location: </h3>
            <form name="locationform" id="locationform" onsubmit="return validateLocationInput()" action="{{route('location.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="line1"> Enter Address Line 1 </label>
                    <input id="line1" name="line1" class="form-control" maxlength = "200" placeholder="Enter room num, building num...">
                </div>
                <div class="form-group">
                    <label for="line2"> Enter Address Line 2  </label>
                    <input id="line2" name="line2" class="form-control" maxlength = "200" placeholder="Enter stree name, road name...">
                </div>
                <div class="form-group">
                    <label for="line2"> Select Sub-district:  </label>
                    <select name="sdis" id="sdis">
                        @foreach($subdistrict as $sd)
                        <option value="{{$sd->id}}"> {{$sd->name}} </option>
                        @endforeach
                    </select>
                    <font color="green">
                        {Distirct & Postal Code will be automatically saved.}
                    </font>

                    <h6>                        
                            <font color="red">
                                <b>
                                    (Currently, ONLY office form Bangkok, Thailand can be registered.)
                                </b>
                            </font>
                    </h6>
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                <hr>
                Want to register a new office?  
                <a href="{{route('office.create')}}">
                    Register Here
                </a>                                  
            </form>
        </div>
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/locationvalidation.js')}}"></script>
@endsection


