@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Add New Office Location: </h3>
            <form name="locationform" id="locationform" onsubmit="return validateLocationInput()" action="{{route('location.update',$location->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="line1"> Edit New Address Line 1 </label>
                    <input id="line1" name="line1" class="form-control" value="{{$location->line1}}">
                </div>
                <div class="form-group">
                    <label for="line2"> Enter Address Line 2  </label>
                    <input id="line2" name="line2" class="form-control" value="{{$location->line2}}">
                </div>
                <div class="form-group">
                    <label for="subdistrict_id"> Select Sub-district:  </label>
                    <select name="subdistrict_id" id="subdistrict_id">
                        @foreach($subdistrict as $sd)
                            @if(($location->subdistrict_id)==($sd->id))
                                <option value="{{$sd->id}}" selected> {{$sd->name}} </option>
                            @else
                                <option value="{{$sd->id}}"> {{$sd->name}} </option>
                            @endif
                        @endforeach
                    </select>

                    <!-- Pulling Distirct -->
                    <b> 
                        <font> 
                            District:
                        </font> 
                    </b> 
                        Data |

                    <!-- Pulling City -->
                    <b> 
                        <font> 
                            City:
                        </font> 
                    </b> 
                        Bangkok. |

                    <!-- Pulling Country -->
                    <b> 
                        <font> 
                            Country:
                        </font> 
                    </b> 
                        Thailand.

                    <br>

                    <h6>                        
                            <font color="red">
                                <b>
                                    (Currently, ONLY office form Bangkok, Thailand can be registered.)
                                </b>
                            </font>
                    </h4>
                </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                <hr>  

                <a style="color:orange; text-decoration:none" href="{{route('location.index')}}">
                    <i class="ph-prohibit-bold"></i> <b> Cancel Editing </b>
                </a>
                      
            </form>
        </div>
    </div>  

    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/locationvalidation.js')}}"></script>
@endsection


