@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> 
                <i class="ph-atom-bold"> 
                    <b> View Item_</b> 
                    <font color="#D4A953"> 
                        <b> {{$item->itemid}} </b> 
                    </font> 
                </i>  
            </h3>
            <hr>
            
            <div class="row">
                <!-- Item Information -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <h5> <font color="#D4A953"> <b> Item Information: </b> </font>  </h5> </div>
                                    <div class="mb-0 font-weight-bold text-gray-800">
                                        <table width="100%" border="0" cellspacing="5" cellpadding="2">
                                            <tr>
                                                <td> 
                                                    <font color="#D4A953"> 
                                                        <b> Item ID: </b>
                                                    </font> 
                                                </td>
                                                <td>
                                                    {{$item->itemid}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 
                                                    <font color="#D4A953"> 
                                                        <b> Item Name: </b>
                                                    </font> 
                                                </td>
                                                <td>
                                                    {{$item->name}} 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 
                                                    <font color="#D4A953"> 
                                                        <b> Category: </b>
                                                    </font> 
                                                </td>
                                                <td>
                                                    {{$category->name}}
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="100%" border="0" cellspacing="5" cellpadding="2">
                                            <tr>
                                                <td colspan="2"> 
                                                    <font color="#D4A953">  
                                                        <b> Owner: </b>
                                                    </font> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> 
                                                    {{$item->owner}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> 
                                                    <font color="#D4A953">  
                                                        <b> Description: </b>
                                                    </font> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> 
                                                    {{$item->name}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Storage Information -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <h5> <font color="#D4A953"> <b> Storage Detail: </b> </font>  </h5> </div>
                                    <div class="mb-0 font-weight-bold text-gray-800">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td colspan="2"> 
                                                    <font color="#D4A953"> 
                                                        <b> Storage Name: </b>
                                                    </font> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{$storage->name}}
                                                </td>
                                            </tr> 
                                        </table>
                                        <hr>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td colspan="2"> 
                                                    <font color="#D4A953"> 
                                                        <b> Office Name: </b>
                                                    </font> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                        {{$office->name}}
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td colspan="2"> 
                                                    <font color="#D4A953"> 
                                                        <b> Address: </b>
                                                    </font> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{$location->line1}}, {{$location->line2}} {{$subdistrict->name}}, {{$district->name}}, {{$city->name}}, {{$country->name}}, , {{$district->postcode}}.
                                                </td>
                                            </tr> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR CODE -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <center>
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <font color="#D4A953"> <b> <i class="ph-qr-code-bold"></i>Auto-generated QR Code: </b> </font> 
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <img src="data:image/png;base64, {{
                                                base64_encode(
                                                    QrCode::format('png')
                                                    ->size(200)
                                                    ->style('round')
                                                    ->eyeColor(0, 0, 0, 0, 212, 169, 83)
                                                    ->eyeColor(1, 0, 0, 0, 212, 169, 83)
                                                    ->eyeColor(2, 0, 0, 0, 212, 169, 83)
                                                    ->color(0, 0, 0)
                                                    ->generate(Request::url())
                                                )
                                            }}"/> 
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection



