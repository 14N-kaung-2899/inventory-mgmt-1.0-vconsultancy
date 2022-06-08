@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Import New Country File: </h3>            
            <form action="{{route('country.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Import') }}
                    </button>    
                </div>  
            </form>
        </div>
    </div>  
@endsection


