@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Register New Item: </h3>
            <br>
            <form name="itemform" id="itemform" onsubmit="return validateItemInput()" action="{{route('item.store')}}" method="POST">
            @csrf
                <h4> Item Information: </h4>
                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">
                        <label for="name"> Name: </label>
                        <input id="name" name="name" class="form-control" maxlength = "25" placeholder="Enter item name...">
                        
                        <br>

                        <label for="description"> Description: </label>
                        <input id="description" name="description" class="form-control" maxlength = "200" placeholder="Enter short description... (Optional)">
                        
                        <br>
                        <div class="form-group">
                            <label for="storage"> Choose Storage: </label>
                            <br>
                            <select name="storage" id="storage">
                                @foreach($storage as $s)
                                    <option value="{{$s->id}}"> {{$s->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category"> Choose Category: </label>
                            <br>
                            <select name="category" id="category">
                                @foreach($category as $c)
                                    <option value="{{$c->id}}"> {{$c->name}} </option>
                                @endforeach
                            </select>
                        </div>                

                        <div class="form-group">
                            <label for="owner"> Choose Owner: </label>
                            <br>
                            <select name="owner" id="owner">
                                <option value="0"> Office </option>
                                @foreach($employee as $emp)
                                    @if($emp->mname=="N/A")
                                        <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->lname)}} </option>
                                    @else
                                        <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->mname)." ".($emp->lname)}} </option>
                                    @endif                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="employee"> Choose Current User: </label>
                            <br>
                            <select name="employee" id="employee">
                                @foreach($employee as $emp)
                                    @if($emp->mname=="N/A")
                                        <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->lname)}} </option>
                                    @else
                                        <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->mname)." ".($emp->lname)}} </option>
                                    @endif  
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <hr>                                    
            </form>
        </div>
    </div>  
    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/itemvalidation.js')}}"></script>
@endsection


