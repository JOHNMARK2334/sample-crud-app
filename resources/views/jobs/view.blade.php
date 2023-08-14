@extends('layouts.app')

@section('content')
<div class="app">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 class="text-capitalise text-info">Job viewer</h4>
            </div>
        </div>
    </div>
    <div class="pull-left">
        <a class="btn btn-secondary" href="{{ route('employees.view') }}">Employees</a>
    </div>
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-primary" href="{{ route('jobs.make') }}">Add New Job</a>
        <a class="btn btn-info" href="{{ route('employees.make') }}">Add New Employee</a>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th width=>Name</th>
                <th width=>Salary</th>
                <th>Work Hours</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->name}}</td>
                    <td>{{$job->salary}}</td>
                    <td>{{$job->work_hours}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('jobs.detailed',$job->id)}}">View Role</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jobs -> links() }}  <!-- to display pagination -->
@endsection