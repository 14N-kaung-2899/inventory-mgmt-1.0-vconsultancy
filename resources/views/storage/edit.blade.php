@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Office Location: </h3>
            <form name="storageform" id="storageform" onsubmit="return validateStorageInput()" action="{{route('storage.update',$oldstorage->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="storageid"> Enter ID: </label>
                    <input id="storageid" name="storageid" class="form-control" value="{{
                        substr(($oldstorage->storageid),4)
                    }}" maxlength = "5" placeholder="Enter a number, no more than 5 digits...">
                </div>
                <div class="form-group">
                    <label for="name"> Enter Name:  </label>
                    <input id="name" name="name" class="form-control" value="{{$oldstorage->name}}" maxlength = "30" placeholder="Enter storage name...">
                </div>
                <div class="form-group">
                    <label for="description"> Enter Description:  </label>
                    <input id="description" name="description" class="form-control" value="{{$oldstorage->description}}" maxlength = "150" placeholder="Enter a short description...">
                </div>
                <div class="form-group">
                    <label for="office_id"> Office:  </label>
                    <select name="office_id" id="office_id" disabled>
                        @foreach($office as $of)
                            @if(($oldstorage->office_id)==($of->id))
                                <option value="{{$of->id}}"> {{$of->name}} </option>
                            @endif
                        @endforeach
                    </select>

                    <h6>                        
                        Office location of a storage cannot be changed once it is registered,                            
                        <b>
                            <a href="#">
                                learn more.
                            </a>
                        </b>
                    </h6>
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                <hr>    
            </form>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black">                         
                            <i class="ph-package-bold"></i> 
                            &nbsp
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
                                <th colspan="2"> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Description</th>
                                <th> Office </th>
                                <th colspan="2"> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($storage as $s)
                            <tr>
                                <td> {{$s->storageid}} </td>
                                <td> {{$s->name}} </td>
                                <td> {{$s->description}} </td>
                                <td> {{$s->office_id}} </td>
                                <td>  
                                    <a style="color:orange; text-decoration:none" href="{{route('storage.create')}}">
                                        <i class="ph-prohibit-bold"></i> <b> Cancel Editing </b>
                                    </a>
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
    <script src="{{asset('admin/js/validation/storagevalidation.js')}}"></script>
@endsection


