@extends('layouts.master')

@section('content')
    <div class="content">
        <br>

        @if((Auth::user()->role)!="Reader")                                                                
        <div class="container">                
            <h3> Add New Storage: </h3>
            <form name="storageform" id="storageform" onsubmit="return validateStorageInput()" action="{{route('storage.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="storageid"> Enter ID: </label>
                    <input type="number" id="storageid" name="storageid" class="form-control" maxlength = "5" placeholder="Enter a number, no more than 5 digits...">
                </div>
                <div class="form-group">
                    <label for="name"> Enter Name:  </label>
                    <input id="name" name="name" class="form-control" maxlength = "30" placeholder="Enter storage name...">
                </div>
                <div class="form-group">
                    <label for="description"> Enter Description:  </label>
                    <input id="description" name="description" class="form-control" maxlength = "150" placeholder="Enter a short description...">
                </div>
                <div class="form-group">
                    <label for="office_id"> Select An Office:  </label>
                    <select name="office_id" id="office_id">
                        @foreach($office as $of)
                            <option value="{{$of->id}}"> {{$of->name}} </option>
                        @endforeach
                    </select>

                    <h6>                        
                        If you cannot find the office, you can register new office,                            
                        <b>
                            <a href="{{route('office.create')}}">
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
        <br>
        @endif  

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <b> Storage List: </b>
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Description</th>
                                <th> Office </th>
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Description</th>
                                <th> Office </th>
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($storage as $s)
                            <tr>
                                <td> {{$s->storageid}} </td>
                                <td> {{$s->name}} </td>
                                <td> {{$s->description}} </td>
                                <td> {{$s->office_id}} </td>
                                @if((Auth::user()->role)!="Reader")  
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('storage.edit',$s->id)}}">
                                        <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('storage.destroy',$s->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input style="background-color:#b00000;" type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>                                           
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                                
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/storagevalidation.js')}}"></script>
@endsection


