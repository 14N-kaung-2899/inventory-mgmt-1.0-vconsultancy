@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> View Item <font color="#D4A953"> <b> {{$item->itemid}} </b> </font> </h3>
            <br>
            <div class="card-body">
                <div class="table-responsive">
                    <table border="0" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>
                                <font color="#D4A953">
                                    <h4>
                                        <b>
                                            Name:
                                        </b>  
                                    </h4>
                                </font>
                            </th>
                            <th >
                                <font color="#D4A953">
                                    <h4>
                                        <b>
                                            Description:
                                        </b>  
                                    </h4>
                                </font>
                            </th>
                            <th >
                                <font color="#D4A953">
                                    <h4>
                                        <b>
                                            Category:
                                        </b>  
                                    </h4>
                                </font>
                            </th>
                            <th >
                                <font color="#D4A953">
                                    <h4>
                                        <b>
                                            Owner:
                                        </b>  
                                    </h4>
                                </font>
                            </th>
                            <th >                        
                                <font color="#D4A953">
                                    <h4>
                                        <b>
                                            Storage:
                                        </b>  
                                    </h4>
                                </font>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    @if(($item->description)=="N/A")
                                        This item has no description...
                                    @else
                                        {{$item->description}}
                                    @endif
                                </td>
                                <td>
                                    {{$item->cid}}
                                </td>
                                <td>
                                    {{$item->owner}}
                                </td>
                                <td>
                                    {{$item->sid}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center">
                                    <font color="#D4A953">
                                        <h4>
                                            <b>
                                                QR Code:
                                            </b>  
                                        </h4>
                                    </font>
                                    <hr>
                                    
                                    <img src="data:image/png;base64, {{
                                            base64_encode(
                                                QrCode::format('png')
                                                ->size(200)
                                                ->style('round')
                                                ->eyeColor(0, 0, 0, 0, 224, 175, 61)
                                                ->eyeColor(1, 0, 0, 0, 224, 175, 61)
                                                ->eyeColor(2, 0, 0, 0, 224, 175, 61)
                                                ->color(0, 0, 0)
                                                ->generate('A')
                                            )
                                        }}"/>  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
@endsection



