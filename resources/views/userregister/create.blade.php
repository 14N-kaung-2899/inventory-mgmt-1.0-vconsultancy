@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">
            <h3> Register New User Account: </h3>

            <form method="POST" action="{{ route('userregister.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                                    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                    <div class="col-md-6">
                        <select name="role" id="role">
                            <option value="Admin"> Admin Level </option>
                            <option value="Manager"> Manager Level </option>
                            <option value="Reader"> Reader Level </option>
                        </select>
                    </div>
                </div>
                <font color="#D4A953"> <b> Admin: </b> </font> <br> Can manage the whole system & create a new account. <br>
                <font color="#D4A953"> <b> Manager: </b> </font> <br> Can manage the whole system. <br>
                <font color="#D4A953"> <b> Reader: </b> </font> <br> Can view the whole database, but they cannot manage.                            
                <hr>
                <div class="form-group">                            
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>                            
            </form> 
        </div>
    </div>  

    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <b> User Account List: </b>
                    </font>
                    |
                    <font size="3">
                        <a style="color:black; text-decoration:none" href="{{route('userregister.index',0)}}">
                            <b> <i class="ph-gear-bold"> &nbsp Manage User Accounts </i></b>
                        </a>
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Role</th>
                                <th> Name </th>
                                <th> Email </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Role</th>
                                <th> Name </th>
                                <th> Email </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                <td> {{$u->role}} </td>
                                <td> {{$u->name}} </td>
                                <td> {{$u->email}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/locationvalidation.js')}}"></script>
@endsection