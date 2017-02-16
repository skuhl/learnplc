@extends('layout.master')
@section('title','Confirm')

@section('content')

<!-- Welcome -->
<div class='div-color-dark'>
    <div class='container welcome-announcement'>
        <h3>Confirm Account</h3>
    </div>
</div>
<!-- End Welcome -->

<div class='div-color-yellow'>
    <div class='container'>

        <div class='container'>

            @include('layout.alert')

            @if($success == 'true')
            <div class='alert alert-success' style="text-align: center">
                <p>Account Confirmed. You may now sign in.</p>
            </div>
            @elseif($success == 'conf')
            <div class='alert alert-success' style="text-align: center">
                <p>Account has already been confirmed. You may sign in above</p>
            </div>
            @elseif($success == 'resend')
            <div class='alert alert-danger' style="text-align: center">
                <p>Account has already been created, but you have not responded to the confirmation email sent to your inbox.</p>
                <p>Send Another?</p>
                <form action="{{ action('AccountController@postConfirm') }}" method="POST">
                    <div class='centered-box'>
                        <div class='form-group'>
                            <input class='form-control' type="email" name="email" placeholder='email'>
                        </div>
                        <div class='form-group'>
                            <input class='btn btn-primary' type="submit" value="Send Reminder">
                        </div>
                    </div>
                </form>
            </div>            
            @elseif($success == 'false')
            <div class='alert alert-danger' style="text-align: center">
                <p>Failed to confirm account. Resend confirmation email?</p>
                <form action="{{ action('AccountController@postConfirm') }}" method="POST">
                    <div class='centered-box'>
                        <div class='form-group'>
                            <input class='form-control' type="email" name="email" placeholder='email'>
                        </div>
                        <div class='form-group'>
                            <input class='btn btn-primary' type="submit" value="Send Reminder">
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

@stop