@extends('layouts.master')

@section('content')
    <div class="content">
        <br>
        <div class="container">                
            <h3> Register New Employee: </h3>
            <br>
            <form name="empform" id="empform" onsubmit="return validateEmployeeInput()" action="{{route('employee.store')}}" method="POST">
            @csrf
                <h4> Personal Information: </h4>
                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">
                        <label for="fname"> First Name: </label>
                        <input id="fname" name="fname" class="form-control" maxlength = "25" placeholder="Enter first name...">
                        
                        <label for="mname"> Middle Name: </label>
                        <input id="mname" name="mname" class="form-control" maxlength = "25" placeholder="Enter middle name... (Optional)">
                        
                        <label for="lname"> Last Name: </label>
                        <input id="lname" name="lname" class="form-control" maxlength = "25" placeholder="Enter last name...">
                        
                        <br>

                        <label for="gender"> Select Gender:  </label>
                        <select name="gender" id="gender">
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Other"> Not To Spicify </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12">
                        <label for="gender"> Choose Birthdate:  </label>
                        <select name="day" id="day" >
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                            <option value="6"> 6 </option>
                            <option value="7"> 7 </option>
                            <option value="8"> 8 </option>
                            <option value="9"> 9 </option>
                            <option value="10"> 10 </option>
                            <option value="11"> 11 </option>
                            <option value="12"> 12 </option>
                            <option value="13"> 13 </option>
                            <option value="14"> 14 </option>
                            <option value="15"> 15 </option>
                            <option value="16"> 16 </option>
                            <option value="17"> 17 </option>
                            <option value="18"> 18 </option>
                            <option value="19"> 19 </option>
                            <option value="20"> 20 </option>
                            <option value="21"> 21 </option>
                            <option value="22"> 22 </option>
                            <option value="23"> 23 </option>
                            <option value="24"> 24 </option>
                            <option value="25"> 25 </option>
                            <option value="26"> 26 </option>
                            <option value="27"> 27 </option>
                            <option value="28"> 28 </option>
                            <option value="29"> 29 </option>
                            <option value="30"> 30 </option>
                            <option value="31"> 31 </option>
                    </select>

                    Month:
                    <select name="month" id="month">
                            <option value="Jan"> January </option>
                            <option value="Feb"> February </option>
                            <option value="Mar"> March </option>
                            <option value="Apr"> April </option>
                            <option value="May"> May </option>
                            <option value="Jun"> June </option>
                            <option value="Jul"> July </option>
                            <option value="Aug"> August </option>
                            <option value="Sept"> September </option>
                            <option value="Oct"> October </option>
                            <option value="Nov"> November </option>
                            <option value="Dec"> December </option>
                    </select>

                    | Year:
                    <select name="year" id="year">
                        @for($chkyear=(date("Y") - 46); $chkyear < ((date("Y") - 45)+(date("Y") - 18)-(date("Y") - 45)); $chkyear++)
                            <option value="{{$chkyear+1}}"> {{$chkyear+1}} </option>
                        @endfor                        
                    </select>

                    </div>
                </div>

                <hr>

                <h4> Contact Information: </h4>

                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">
                        <label for="pmail"> Personal Email:  </label>
                        <input id="pmail" name="pmail" class="form-control" maxlength = "100" placeholder="Enter personal email..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    
                    <div class="form-group">
                        <label for="wmail"> Company Email:  </label>
                        <input id="wmail" name="wmail" class="form-control" maxlength = "100" placeholder="Enter company email... (Optional)" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>

                <br>

                <div class="col-lg-5 col-sm-12">
                    <font color="green"> 
                        <i class="ph-phone-bold"></i>
                        <b> 
                            (Phone Format: 00-123-12-123) 
                        </b> 
                    </font>
                    <font color="orange">
                        <i class="ph-warning-bold"></i>
                    </font>

                    <div class="form-group">
                        <label for="mobile"> Primary Phone:  </label>
                        <input id="mobile" name="mobile" class="form-control" maxlength = "13" placeholder="Enter primary phone..."  pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{3}">                   
                    </div>
                    
                    <div class="form-group">
                        <label for="home"> Home Phone:  </label>
                        <input id="home" name="home" class="form-control" maxlength = "13" placeholder="Enter primary phone..."  pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{3}">
                    </div>
                    
                </div>
               
                <hr>

                <h4> Address: </h4>

                <div class="form-group">
                    <label for="line1"> Enter Address Line 1 </label>
                    <input id="line1" name="line1" class="form-control" maxlength = "200" placeholder="Enter room num, building num...">
                </div>
                <div class="form-group">
                    <label for="line2"> Enter Address Line 2  </label>
                    <input id="line2" name="line2" class="form-control" maxlength = "200" placeholder="Enter stree name, road name...">
                </div>
                <div class="form-group">
                    <label for="subdistrict_id"> Select Sub-district:  </label>
                    <select name="subdistrict_id" id="subdistrict_id">
                        @foreach($subdistrict as $sd)
                            <option value="{{$sd->id}}"> {{$sd->name}} </option>
                        @endforeach
                    </select>
                    <font color="green">
                        {Distirct & Postal Code will be automatically saved.}
                    </font>

                    <h6>                        
                            <font color="red">
                                <b>
                                    (Currently, ONLY employee form Bangkok can be registered.)
                                </b>
                            </font>
                    </h6>
                </div>

                <hr>

                <h4> Employment Information: </h4>
                <br>
                <div class="form-group">
                    <label for="role"> Choose Role: </label>
                    <br>
                    <select name="role" id="role">
                        @foreach($role as $r)
                        <option value="{{$r->id}}"> {{$r->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="office"> Choose Office: </label>
                    <br>
                    <select name="office" id="office">
                        @foreach($office as $o)
                        <option value="{{$o->id}}"> {{$o->name}} </option>
                        @endforeach
                    </select>
                </div>                

                <div class="form-group">
                    <label for="employment"> Choose Employment: </label>
                    <br>
                    <select name="employment" id="employment">
                        @foreach($employment as $emp)
                        <option value="{{$emp->id}}"> {{$emp->empid}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="payroll"> Choose Payroll: </label>
                    <br>
                    <select name="payroll" id="payroll">
                        @foreach($payroll as $p)
                        <option value="{{$p->id}}"> {{$p->holder}} ({{$p->accno}}) </option>
                        @endforeach
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <hr>                                    
            </form>
        </div>
    </div>  
    <!-- Checking Null JS -->
    <script src="{{asset('admin/js/validation/employeevalidation.js')}}"></script>
@endsection


