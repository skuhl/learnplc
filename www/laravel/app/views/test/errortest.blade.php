error = {{ isset($error) ? $error : 'not set' }}<br/>
error2 through php var = {{ isset($error2) ? $error2 : 'not set' }} <br/>
error2 through session = {{ Session::has('error2') ? Session::get('error2') : 'not set'}}

{{ Form::open(array('url'=>'test/redi')) }}

{{ Form::submit('click') }}

{{ Form::close() }}


@include('test.subviewtest')

<p>footer</p>