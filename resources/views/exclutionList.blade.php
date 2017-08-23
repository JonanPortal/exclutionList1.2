@extends('layouts.app')

@section('content')

    <!-- Start Formoid form-->
    <link rel="stylesheet" href="css/solid-blue.css" type="text/css"/>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <div class="alert alert-{{ $msg }} alert-dismissable">

                    <strong>Info!</strong> {{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <form enctype="multipart/form-data" class="formoid-solid-blue"
          style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px"
          method="post">
        {{ csrf_field() }}
        <div class="title"><h2>Exclusion List</h2></div>
        <div class="element-separator" title="Employee List">
            <hr>
            <h3 class="section-break-title">Employee List and OIG</h3></div>
        <div class="element-file"><label class="title"></label>
            <div class="item-cont"><label class="large">
                    <div class="button">Choose File</div>
                    <input type="file" class="file_input" name="file[]" multiple="true"/>
                    <div class="file_text">No file selected</div>
                    <span class="icon-place"></span></label></div>
        </div>
        <div class="element-separator" title="Exclution List Destination File">
            <hr>
            <h3 class="section-break-title">Exclusion List Period</h3></div>
        <div class="element-select"><label class="title"></label>
            <div class="item-cont">
                <div class="medium"><span><select name="Period">

		<option value="01">January</option>
		<option value="02">February</option>
        <option value="03">March</option>
		<option value="04">April</option>
        <option value="05">May</option>
		<option value="06">June</option>
        <option value="07">July</option>
		<option value="08">August</option>
        <option value="09">September</option>
		<option value="10">October</option>
        <option value="11">November</option>
		<option value="12">December</option></select><i></i><span class="icon-place"></span></span></div>
            </div>
        </div>
        <div class="submit"><input type="submit" value="Submit"/></div>
    </form><p class="frmd"><a href="http://formoid.com/v29.php">php contact form</a> Formoid.com 2.9</p>

    <script src="{{ asset('js/formoid-solid-blue.js') }}"></script>
    <!-- Stop Formoid form-->

@endsection


