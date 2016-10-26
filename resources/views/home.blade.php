@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>

                    <div id="status">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
