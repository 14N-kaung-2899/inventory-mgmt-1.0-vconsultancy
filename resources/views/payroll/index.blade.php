@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                                    
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>                     
                    <font size="5" color="black"> 
                        <b> Payroll Database: </b>
                    </font>
                </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Holder Full Name: </th>
                                    <th> Account Number: </th>
                                    <th> Bank Name: </th>
                                    <th> IFSC Code: </th>
                                    <th> Swift Code: </th>
                                    <th colspan="2"> Action </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Holder Full Name: </th>
                                    <th> Account Number: </th>
                                    <th> Bank Name: </th>
                                    <th> IFSC Code: </th>
                                    <th> Swift Code: </th>
                                    <th colspan="2"> Action </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($payroll as $pr)
                                <tr>
                                    <td> {{$pr->holder}} </td>
                                    <td> {{$pr->accno}} </td>
                                    <td> {{$pr->bank}} </td>
                                    <td> {{$pr->ifsc}} </td>
                                    <td> {{$pr->code}} </td>
                                    <td align="center">  
                                        <a style="color:blue; text-decoration:none" href="{{route('payroll.edit',$pr->id)}}">
                                                <i class="ph-note-pencil"> </i> <b> Edit </b>
                                        </a>
                                    </td>
                                    <td align="center"> 
                                        <form method="POST" action="{{ route('payroll.destroy',$pr->id) }}">
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


