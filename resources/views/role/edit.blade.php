@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Role & Responsibility: </h3>
            <form name="roleform" id="roleform" onsubmit="return validateRoleInput()" action="{{ route('role.update',$oldrole->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name"> Enter Role:  </label>
                    <input id="name" name="name" class="form-control" value="{{$oldrole->name}}" maxlength = "50" placeholder="Enter a role title...">
                </div>
                <div class="form-group">
                    <label for="respons"> Enter Responsibility:  </label>
                    <input id="respons" name="respons" class="form-control" value="{{$oldrole->respons}}" maxlength = "250" placeholder="Describe a responsibility...">
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                <hr>    
            </form>
        </div>

        <br>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <i class="ph-star-bold"></i> 
                        &nbsp
                        <b> Role & Responsibility: </b>                
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Responsibility</th>
                                <th colspan="2"> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Name </th>
                                <th> Responsibility</th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($role as $r)
                            <tr>
                                <td> {{$r->name}} </td>
                                <td> {{$r->respons}} </td>
                                <td>  
                                    <a style="color:orange; text-decoration:none" href="{{route('role.create')}}">
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
    <script src="{{asset('admin/js/validation/rolevalidation.js')}}"></script> 
@endsection


