@extends('layout.master')
@section('title','PLC Course Details')

@section('content')
<div class="container">
  <div class="well">
    <h4>Student Progress</h4>
      <table class="table">
        <thead>
          <tr>
            <th> email </th>
            @foreach ($modules as $module)
            <th>{{$module->name}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>

          @foreach($students as $student)
          <tr>
            <td>{{$student['user']->email}}</td>
            @foreach($student['modules'] as $module)
            <td>{{$module}}</td>
            @endforeach
          </tr>
          @endforeach
         
        </tbody>
      </table>
  </div>
</div>
@stop