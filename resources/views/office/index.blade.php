@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3>                     
                    <font size="5" color="black"> 
                        <b> Office Database: </b>
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Office Name: </th>
                                <th> Office Location: </th>
                                <th> Number Of Employee: </th>   
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Office Name: </th>
                                <th> Office Location: </th>
                                <th> Number Of Employee: </th>                                
                                @if((Auth::user()->role)!="Reader")  
                                <th colspan="2"> Action </th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($office as $o)
                            <tr>
                                <td> {{$o->name}} </td>
                                <td> {{$o->lid}} </td>
                                <td> {{$o->empno}} </td>
                                @if((Auth::user()->role)!="Reader")  
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('office.edit',$o->id)}}">
                                            <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('office.destroy',$o->id) }}">
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
@endsection


