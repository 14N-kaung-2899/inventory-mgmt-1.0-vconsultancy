@extends('layouts.master')

@section('content')
<div class="container">
    <h3> 
        <b>
            <font color="#000">
                Admin Panel: 
            </font>
        </b> 
    </h3>

    <div class="row">

        <!-- Employee Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-identification-badge-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Total Employee:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                {{count($employee)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('employee.index')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>        
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-user-circle-gear-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Job Role:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                 {{count($role)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('role.create')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Office Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-buildings-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Total Office:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                 {{count($office)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('office.index')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                            </center>  
                            <hr> 
                            <i class="ph-map-pin-bold"></i> Location: 
                            <a href="{{route('office.index')}}">   
                                <input type="button" class="btn-primary" value="View All">          
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if((Auth::user()->role)=="Admin")
        <!-- Account Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-shield-check-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Accounts:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                {{count($user)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('userregister.index')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>

    <hr>

    <h3> 
        <b>
            <font color="#000">
                Office Panel: 
            </font>
        </b> 
    </h3>

    <div class="row">

        <!-- Storage Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-package-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Total Strage:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                {{count($storage)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('storage.create')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>        
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-tree-structure-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Total Category:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                 {{count($category)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('category.create')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-codesandbox-logo-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Total Item:
                                </b>
                            </font>     
                            <br>
                            <center> 
                                 {{count($item)}}
                            </center>
                            <hr>
                            <center>
                                <a href="{{route('item.index')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if((Auth::user()->role)!="Reader")
        <!-- Document Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <font size="7">
                                <i class="ph-stack-overflow-logo-bold" style="color:#D4A953"></i>
                            </font>
                            <font color="#D4A953">
                                <b>
                                    Documents:
                                </b>
                            </font>   
                            <hr>
                            <center>
                                Payroll:
                                <br>
                                <a href="{{route('payroll.index')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>
                                <br>
                                Employment:
                                <br>
                                <a href="{{route('employment.create')}}">   
                                    <input type="button" class="btn-primary" value="View Database">          
                                </a>      
                            </center>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <hr>
</div>
@endsection
