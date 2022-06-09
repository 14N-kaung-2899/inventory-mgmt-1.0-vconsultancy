@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Register New Item: </h3>
            <br>
            <form name="itemform" id="itemform" onsubmit="return validateItemInput()" action="{{route('item.update',$item->id)}}" method="POST">
            @csrf
            @method('PUT')
                <h4> Item Information: </h4>
                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">
                        <input id="itemid" name="itemid" class="form-control" value="{{$item->itemid}}" hidden>

                        <label for="name"> Name: </label>
                        <input id="name" name="name" class="form-control" maxlength = "25" placeholder="Enter item name..." value="{{$item->name}}">
                        
                        <br>

                        <label for="description"> Description: </label>
                        @if($item->description == 'N/A')
                            <input id="description" name="description" class="form-control" maxlength = "200" placeholder="Enter short description... (Optional)">
                        @else
                            <input id="description" name="description" class="form-control" maxlength = "200" placeholder="Enter short description... (Optional)" value="{{$item->description}}">
                        @endif

                        <br>
                        <input type="text" id="qrcode" name="qrcode" value="{{$item->qrcode}}" hidden>

                        <div class="form-group">
                            <label for="storage"> Choose Storage: </label>
                            <br>
                            <select name="storage" id="storage">
                                @foreach($storage as $s)
                                    @if($s->id==$item->sid)
                                        <option value="{{$s->id}}" selected> {{$s->name}} </option>
                                    @else
                                        <option value="{{$s->id}}"> {{$s->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category"> Choose Category: </label>
                            <br>
                            <select name="category" id="category">
                                @foreach($category as $c)
                                    @if($c->id==$item->cid)
                                        <option value="{{$c->id}}" selected> {{$c->name}} </option>
                                    @else
                                        <option value="{{$c->id}}"> {{$c->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>                

                        <div class="form-group">
                            <label for="owner"> Choose Owner: </label>
                            <br>
                            <select name="owner" id="owner">
                                @if(($item->owner)=="Owned By Office")
                                    <option value="Owned By Office" selected> Office </option>
                                    @for($loop=0; $loop<count($empname); $loop++)
                                        <option value="{{$empname[$loop]}}"> {{$empname[$loop]}} </option>
                                    @endfor                                        
                                @else
                                    @for($loop=0; $loop<count($empname); $loop++)
                                        @if(($empname[$loop])==($item->owner))
                                            <option value="{{$empname[$loop]}}" selected> {{$empname[$loop]}} </option>
                                        @else
                                            <option value="{{$empname[$loop]}}"> {{$empname[$loop]}} </option>
                                        @endif
                                        <option value="Owned By Office"> Office </option>
                                    @endfor     
                                @endif                            
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="employee"> Choose Current User: </label>
                            <br>
                            <select name="employee" id="employee">
                                @foreach($employee as $emp)
                                    @if($emp->id==$item->eid)
                                        @if($emp->mname=="N/A")
                                            <option value="{{$emp->id}}" selected> {{($emp->fname)." ".($emp->lname)}} </option>
                                        @else
                                            <option value="{{$emp->id}}" selected> {{($emp->fname)." ".($emp->mname)." ".($emp->lname)}} </option>
                                        @endif  
                                    @else
                                        @if($emp->mname=="N/A")
                                            <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->lname)}} </option>
                                        @else
                                            <option value="{{$emp->id}}"> {{($emp->fname)." ".($emp->mname)." ".($emp->lname)}} </option>
                                        @endif  
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
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


