@extends('layout.master')

@section('additionalCSS')
{{ HTML::style('/public/assets/css/landing.css') }}
@stop

@section('content')
<div class="div-color-dark">
  <div class="welcome-announcement container">
    <h2 class="text-muted">This site is currently under development<br/>please check back later</h2>

    <div class="welcome-announcement">
      <h1>Step by Step PLC Education</h1>
      <img src="{{URL::asset('/public/assets/img/logo.png') }}" width="200" height="200"></img>
      <p class="lead">For home or classroom use, <br/> your day zero experience starts here</p>
    </div>
  </div> <!-- /container -->
</div> <!-- /div-color-dark -->

<div class="div-color-yellow">
  <div class="container">
    <br/>
    <div class="row">
      <div class="col-lg-1">
        <span class="glyphicon glyphicon-pencil" style="font-size: 60px;"></span>
      </div>
      <div class="col-lg-10">
        <h2 class="descriptions">Start from the basics. Dive into <br/>binary conversions and logic circuits</h2><br/><br/>
      </div>
    </div> <!-- row -->

    
    <div class="row">
      <div class="col-lg-11">
        <h2 class="descriptions" style="text-align: right">Use an intuitive simulator to learn <br/>the ladder logic that controls PLC's</h2><br/><br/>
      </div>
      <div class="col-lg-1">
        <span class="glyphicon glyphicon-refresh" style="font-size: 60px;"></span>
      </div>        
    </div> <!-- row -->

    <div class="row">
      <div class="col-lg-1">
        <span class="glyphicon glyphicon-hdd" style="font-size: 60px;"></span>
      </div>
      <div class="col-lg-10">
        <h2 class="descriptions">Discover how PLC's are used to <br/>solve real world problems</h2><br/><br/>   
      </div>
    </div> <!-- row -->


  </div>
</div> <!-- /div-color-yellow -->

<!-- Login box -->
<div class="div-color-dark">
  <div class="container">
   <div class="centered-box">
    <h2>Get involved today</h2>
    <p class="lead">Sign in below to begin</p>
    {{ Form::open(array('url'=>'account/login')) }}
    <div class="div-color-dark">
      <div class="form col-md-12 center-block text-center">
        <div class="form-group">
          {{ Form::text('email', null, array('class'=>'form-control input', 'placeholder'=>'Email Address')) }}
        </div>
        <div class="form-group">
          {{ Form::password('password', array('class'=>'form-control input', 'placeholder'=>'Password')) }}
        </div>
        <div class="form-group">
          {{ Form::submit('Log In', array('class'=>'btn btn-large btn-primary btn-block', 'onclick'=>'submit();'))}}
        </div>
        <div class="form-group">
          {{ HTML::link('/account/register', 'New? Register Here') }} <br/>
          {{ HTML::link('/account/recover', 'Forgot password?') }}
        </div>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div> <!-- /container -->
</div>
<!-- end login box -->
@stop