@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">                
                <h3>                     
                    <font size="5" color="black"> 
                        @if((Auth::user()->role)!="Reader")  
                            <i class="ph-atom-bold"> 
                            </i>  
                            &nbsp
                            <b> Inventory List: </b>                              
                        @else
                            <i class="ph-database-bold"> 
                            </i>  
                            &nbsp
                            <b> Inventory Database: </b> 
                        @endif                     
                    </font>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Item ID: </th>
                                <th> Item Name: </th>
                                <th> Category: </th>                                    
                                <th> Storage: </th>     
                                @if((Auth::user()->role)!="Reader")  
                                    <th colspan="3"> Action </th>                                
                                @else
                                    <th> Action </th>
                                @endif   
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> Item ID: </th>
                                <th> Item Name: </th>
                                <th> Category: </th>                                    
                                <th> Storage: </th>      
                                @if((Auth::user()->role)!="Reader")  
                                    <th colspan="3"> Action </th>                                
                                @else
                                    <th> Action </th>
                                @endif    
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($item as $i)
                            <tr>
                                <td> {{$i->itemid}} </td>
                                
                                <td>
                                    {{$i->name}} 
                                </td>

                                <!-- <td> {{$i->owner}} </td> -->
                                
                                <td> 
                                    @for($cloop=0; $cloop<(count($category)); $cloop++)
                                        @if(($i->cid)==$category[$cloop]->id)
                                            {{$category[$cloop]->name}} 
                                        @endif
                                    @endfor
                                </td>
                                
                                <td> 
                                    
                                    @for($sloop=0; $sloop<(count($storage)); $sloop++)
                                        @if(($i->sid)==$storage[$sloop]->id)
                                            {{$storage[$sloop]->name}} 
                                        @endif
                                    @endfor 
                                </td>

                                <td align="center">  
                                    <a style="color:green; text-decoration:none" href="{{route('item.show',$i->id)}}">
                                        <i class="ph-clipboard-text-bold"></i> <b> View </b>
                                    </a>
                                </td>
                                
                                @if((Auth::user()->role)!="Reader")  
                                <td align="center">  
                                    <a style="color:blue; text-decoration:none" href="{{route('item.edit',$i->id)}}">
                                        <i class="ph-note-pencil"> </i> <b> Edit </b>
                                    </a>
                                </td>
                                <td align="center"> 
                                    <form method="POST" action="{{ route('item.destroy',$i->id) }}">
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


