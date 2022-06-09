@extends('layouts.master')

@section('content')
    <div class="content">
        <br>

        @if((Auth::user()->role)!="Reader")                        
        <div class="container">                
            <h3> Add New Category: </h3>
            <form name="categoryform" id="categoryform" onsubmit="return validateCategoryInput()" action="{{route('category.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name">Enter Category Name: </label>
                    <input id="name" name="name" class="form-control" maxlength = "50" placeholder="Enter a category name...">
                </div>
                <div class="form-group">
                <label for="description">Enter Category Description: </label>
                    <input id="description" name="description" class="form-control" maxlength = "100" placeholder="Enter a short description...">
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
                        <b> Category List: </b>
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Abbr </th>
                                <th> Description</th>
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Name </th>
                                <th> Abbr </th>
                                <th> Description</th>
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($category as $c)
                            <tr>
                                <td> {{$c->name}} </td>
                                <td> {{$c->abbr}} </td>
                                <td> {{$c->description}} </td>
                                @if((Auth::user()->role)!="Reader")  
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('category.edit',$c->id)}}">
                                        <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('category.destroy',$c->id) }}">
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
    <script src="{{asset('admin/js/validation/categoryvalidation.js')}}"></script>
@endsection



