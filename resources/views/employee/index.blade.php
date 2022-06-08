@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">      
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>                     
                        <font size="5" color="black"> 
                            <b> Employee Database: </b>
                        </font>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Gender </th>
                                    <th> DoB</th>
                                    <th> Primary Mail </th>
                                    <th> Primary Phone </th>
                                    <th> Office </th>
                                    <th colspan="3"> Action </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Name </th>
                                    <th> Gender </th>
                                    <th> DoB</th>
                                    <th> Primary Mail </th>
                                    <th> Primary Phone </th>
                                    <th> Office </th>
                                    <th colspan="3"> Action </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($employee as $e)
                                <tr>
                                    <td> {{$e->fname}} {{$e->mname}} {{$e->lname}} </td>
                                    <td> {{$e->gender}} </td>
                                    <td> {{$e->dob}} </td>
                                    <td> {{$e->pmail}} </td>
                                    <td> {{$e->mobile}} </td>
                                    <td> {{$e->oid}} </td>
                                    <td align="center">  
                                        <a href="{{route('employee.show',$e->id)}}">
                                            View Details
                                        </a>
                                    </td>
                                    <td align="center">  
                                        <a href="{{route('employee.edit',$e->id)}}">
                                            EDIT
                                        </a>
                                    </td>
                                    <td align="center"> 
                                        <form method="POST" action="{{ route('employee.destroy',$e->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <input style="background-color:#b00000;" type="submit" class="btn btn-danger" value="Delete">
                                        </form>
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
@endsection

