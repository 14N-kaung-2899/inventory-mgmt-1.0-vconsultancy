@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="container">                
            <h3> Edit Category: </h3>
            <form name="categoryform" id="categoryform" onsubmit="return validateCategoryInput()"action="{{route('category.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name">Enter New Name: </label>
                    <input id="name" name="name" class="form-control" value="{{$category->name}}" maxlength = "50" placeholder="Enter a category name...">
                </div>
                <div class="form-group">
                <label for="name">Enter New Description: </label>
                    <input id="description" name="description" class="form-control" value="{{$category->description}}" maxlength = "100" placeholder="Enter a short description...">
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                <hr>                                    
            </form>
        </div>

        <br>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <i class="ph-tree-structure-bold"> </i> 
                        &nbsp
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
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Name </th>
                                <th> Abbr </th>
                                <th> Description</th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td> {{$category->name}} </td>
                                <td> {{$category->abbr}} </td>
                                <td> {{$category->description}} </td>
                                <td>  
                                    <a style="color:orange; text-decoration:none" href="{{route('category.create')}}">
                                        <i class="ph-prohibit-bold"></i> <b> Cancel Editing </b>
                                    </a>
                                </td>                                     
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/categoryvalidation.js')}}"></script>
@endsection