@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        @if((Auth::user()->role)!="Reader")  
        <div class="container">                
            <h3> Add New Role & Responsibility: </h3>
            <form name="roleform" id="roleform" onsubmit="return validateRoleInput()" action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name"> Enter Role:  </label>
                    <input id="name" name="name" class="form-control" maxlength = "50" placeholder="Enter a role title...">
                </div>
                <div class="form-group">
                    <label for="respons"> Enter Responsibility:  </label>
                    <input id="respons" name="respons" class="form-control" maxlength = "250" placeholder="Describe a responsibility...">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
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
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Name </th>
                                <th> Responsibility</th>
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($role as $r)
                            <tr>
                                <td> {{$r->name}} </td>
                                <td> {{$r->respons}} </td>
                                @if((Auth::user()->role)!="Reader")  
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('role.edit',$r->id)}}">
                                        <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('role.destroy',$r->id) }}">
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
    <script src="{{asset('admin/js/validation/rolevalidation.js')}}"></script> 
@endsection


