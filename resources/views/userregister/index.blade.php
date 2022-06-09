@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">
            <h3 align="right"> Update User Role: </h3>
            <form align="right" name="registerform" id="registerform" action="{{route('userregister.update',$users[0]->id)}}" method="POST">
                @csrf
                @method('PUT')
                Choose User Account:
                <select name="email" id="email">
                    @foreach($emails as $e)
                        @if((Auth::user()->id)!=($e->id))
                            <option value="{{$e->email}} "> {{$e->email}} </option>
                        @endif
                    @endforeach
                </select> 
                <br> <br>
                Choose New Role:
                <select name="role" id="role">
                    <option value="Admin"> Admin Level </option>
                    <option value="Manager"> Manager Level </option>
                    <option value="Reader"> Reader Level </option>   
                    <optgroup>                      
                        <option value="Delete" style="color:red">                          
                            <b> <u> !! DELETE ACCOUNT !! </u> </b>
                        </option>
                    </optgroup>                 
                </select>

                <br> <br>
                
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Role') }}
                </button>
                <br> <br>
                <font size="3">
                    <a style="color:green; text-decoration:none" href="{{route('userregister.create')}}">
                        <i class="ph-user-circle-plus-bold"></i> <b> Create New User Account </b>
                    </a>
                </font>
            </form>

            <br>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>                     
                        <font size="5" color="black"> 
                            <i class="ph-database-bold"></i> <b> User Account Database: </b>
                        </font>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Role</th>                                      
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Role</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $u)
                                <tr>
                                    <td> {{$u->name}} </td>

                                    <td> {{$u->email}} </td>

                                    <td>
                                        @if((Auth::user()->id)==($u->id))
                                            <center>
                                            You're logged in as this
                                            <font color="#D4A953">
                                                <b> {{$u->role}} </b>
                                            </font> 
                                            <br>
                                            <font color="red"> <i class="ph-warning-circle-bold"> &nbsp "User cannot change the active user's role." </i> </font>
                                            </center>
                                        @else
                                            {{$u->role}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>  



    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/locationvalidation.js')}}"></script>
@endsection