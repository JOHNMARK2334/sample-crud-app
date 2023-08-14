@extends('layouts.app')

@section('content')
<div class="app">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 class="text-capitalise text-info">Employee viewer</h4>
            </div>
        </div>
    </div>
    <div class="pull-left">
        <a class="btn btn-secondary" href="{{ route('jobs.view') }}">Jobs</a>
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
                <th width="15%">Photo</th>
                <th width=>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td><img src="{{asset('public/Image/'.$employee->photo) }}" alt="" style="width:70px; height=auto;"></td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->address}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('employees.detailed',$employee->id)}}">View employee</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees -> links() }}  <!-- to display pagination -->
@endsection