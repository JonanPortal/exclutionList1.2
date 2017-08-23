
@extends('layouts.app')
<link rel="stylesheet" href="css/solid-blue.css" type="text/css" />
@section('content')
<div class="container">
    <div class="row">
    <!-- Start Formoid form-->




    <form enctype="multipart/form-data" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
        {{ csrf_field() }}
        <div class="title"><h2>Exclusion List Export Record</h2></div>
        <div class="element-separator" title="OutPut Format"><hr><h3 class="section-break-title">OutPut Format</h3></div>
        <div class="element-select" title= "Select"><label class="title"></label><div class="item-cont"><div class="medium"><span><select name="selectOutputFormat" >

		<option value="csv">Excel(CSV)</option>
		<option value="pdf">PDF</option>
		</select><i></i><span class="icon-place"></span></span></div></div></div>
        <div class="element-separator" title="Exclution List Destination File"><hr><h3 class="section-break-title">Exclusion List Record by Months</h3></div>
        <div class="element-select" ><label class="title"></label><div class="item-cont"><div class="medium"><span><select name="Period"  >

        @foreach($data as $key => $result)
		<option value="{{$result}}">{{$result}}</option>
        @endforeach

		</select><i></i><span class="icon-place"></span></span></div></div></div>
        <div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">php contact form</a> Formoid.com 2.9</p>

    <script src="{{ asset('js/formoid-solid-blue.js') }}"></script>
    <!-- Stop Formoid form-->
    </div>
</div>
@endsection

