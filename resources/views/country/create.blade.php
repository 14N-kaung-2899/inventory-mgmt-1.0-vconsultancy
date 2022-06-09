@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h2> Import New Country File: </h2>            
            <br>
            <form action="{{route('country.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <font size="4">
                        <b>
                            <img src="https://www.pngall.com/wp-content/uploads/9/Thailand-Flag-PNG-Free-Image.png" width="15" height="15">    
                            Import Bangkok City, Thailand 
                            <img src="https://www.pngall.com/wp-content/uploads/9/Thailand-Flag-PNG-Free-Image.png" width="15" height="15">
                            :
                        </b>
                    </font>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Import') }}
                    </button>    
                </div>  
            </form>
        </div>
    </div>  
@endsection


