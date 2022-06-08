<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> View Employee </title>

        <style>
            /* Responsive Template (Start) */
            {
                box-sizing: border-box;
            }

            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #b48000;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
            background-color: #b48000;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            }

            input[type=submit]:hover {
                background-color: #9e7000;
            }

            .container {
                border-radius: 5px;
                background-color: #fff2d1;
                padding: 20px;
            }

            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }


            @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            /* Responsive Template (End) */

            /* Responsive Sidebar (Start) */
            .sidebar {
                margin: 0;
                padding: 0;
                width: 200px;
                background-color: #ffdf8e;
                position: fixed;
                height: 100%;
                overflow: auto;
            }

            .sidebar a {
                display: block;
                color: black;
                padding: 16px;
                text-decoration: none;
            }
            
            .sidebar a.active {
                background-color: #b48000;
                color: white;
            }

            .sidebar a:hover:not(.active) {
                background-color: #b48000;
                color: white;
            }

            div.content {
                margin-left: 200px;
                padding: 1px 16px;
                height: 1000px;
            }

            @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            div.content {margin-left: 0;}
            }

            @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
            }                                                    
            /* Responsive Sidebar (End) */
                                                                
            /* Responsive Tov Nav (Start) */
            .topnav {
                    overflow: hidden;
                    background-color: #ffdf8e;
            }

            .topnav a {
                float: left;
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .topnav a:hover {
                background-color: #b48000;
                color: white;
            }

            .topnav a.active {
                background-color: #b48000;
                color: white;
            }

            .topnav .icon {
                display: none;
            }

            @media screen and (max-width: 600px) {
                .topnav a:not(:first-child) {display: none;}
                .topnav a.icon {
                    float: right;
                    display: block;
            }
            }

            @media screen and (max-width: 600px) {
                .topnav.responsive {position: relative;}
                .topnav.responsive .icon {
                    position: absolute;
                    right: 0;
                    top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
            }
            /* Responsive Tov Nav (End) */                                                
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    </head>
    
    <body class="antialiased">
    <div>
        <img src="{{ URL::to('/') }}/images/logo.png" alt="">
    </div>
    
    <div class="topnav" id="myTopnav">    
        <a href="{{route('dashboard')}}"> Dashboard </a>    
        <a href="{{route('category.create')}}"> Timetable </a>
        <a href="{{route('employee.create')}}"> Staff </a>
        <a href="{{route('item.create')}}"  class="active"> Inventory </a>        
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <br>
    
    <div class="sidebar">
        <a class="active"> Employee Data </a>
        <a href="{{route('item.index')}}"> Back To Inventory </a>
    </div>     
    
    <div class="content">
        <div style="overflow-x:auto;">
        <br>
            <center>
                <h2> <font face="Calisto MT" color="#b48000"> Employee Details Information </font> </h2>
                <img src="{{ URL::to('/') }}/images/profile.png" alt="" width="100px" height="100px">
                <br>
                <font size="5" face="Calisto MT"> <b> <u> Personal Data </u> </b> </font>
                <br>
                <font size="4" face="Calisto MT"> <b> Name: </b> </font> {{$foundemployee->name}}
                <br>
                <font size="4" face="Calisto MT"> <b> Gender: </b> </font> {{$foundemployee->gender}}
                <br>
                <font size="4" face="Calisto MT"> <b> Birthday: </b> </font> {{$foundemployee->dob}}
                <br>
                <font size="4" face="Calisto MT" color="red"> <b> Other: </b> Other Data We Want To Add  </font>
                <hr>
            </center>            

                <font size="4" face="Calisto MT"> <b> <u> Employment Data </u> </b> </font>
                <br>
                <font size="4" face="Calisto MT"> <b> Email: </b> </font> {{$foundemployee->email}}
                <br>
                <font size="4" face="Calisto MT"> <b> Employment Date: </b> </font> 16.5.2022 (Sample Data)
                <br>
                <font size="4" face="Calisto MT" color="red"> <b> Other: </b>  Other Data We Want To Add </font>
                <br> <br>
                <table border="1" cell-padding:"3px">
                <tr>
                    <td width="150px" align="center" colspan='3'> <b> <font size="4" face="Calisto MT"> Document </font> </b>  </td>
                </tr>
                <tr>
                    <td width="150px" align="center"> <b> <font size="3" face="Calisto MT"> KPI </font> </b>  </td>
                    <td width="150px" align="center"> <b> <font size="3" face="Calisto MT"> CV From </font> </b>  </td>
                    <td width="150px" align="center"> <b> <font size="3" face="Calisto MT"> Cover Letter </font> </b>  </td>
                </tr>
                <tr>
                    <td width="150px" align="center"> <a href="#"> {{$foundemployee->name}}_KPI.pdf </a> </td>
                    <td width="150px" align="center"> <a href="#"> {{$foundemployee->name}}_Curriculum.pdf </a> </td>
                    <td width="150px" align="center"> <a href="#"> {{$foundemployee->name}}_CLetter.pdf </a> </td>
                </tr>
            </table>
        </div>
        <br>
    </div>  

        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
    </body>
</html>