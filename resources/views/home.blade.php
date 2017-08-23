@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Imformation</div>

                <div class="panel-body">
                    {{ Auth::user()->name }} you are logged in!<br />

                    If you whant to Logout please select the link below<br />
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a><br /><br />

                    If you whant to run the Exclusion List please read carefully the specifications below<br /><br />

                    1. Selecte the OIG file and the eployee list file. The OIG and the employee list have to be from the same month.
                    <br />
                    It can only be run one month at the time<br /><br />

                    2. Selecte the month for the eclusion list.<br /><br />

                    3. Click on the submint to run the exclusion list process.<br /><br />


                    <a href="{{ route('exclutionList') }}">Exclusion List</a><br /><br />

                    If you whant to see the exclusion list record please select ead carefully the specifications beloww<br /><br />

                    1. Selecte from the list of out put format ones for make the report.
                    <br /><br />


                    2. Selecte the month that ypu whant to obtain the report.<br /><br />

                    3. Click on the submint to run the report.<br /><br />

                    <a href="{{ route('oig_result') }}">Exclusion List Record</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
