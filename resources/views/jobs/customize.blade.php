@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('jobs.view') }}" enctype="multipart/form-data">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('jobs.update', $jobs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Name:</strong>
                        <input type="text" name="name" value="{{ $jobs->name }}" class="form-control" placeholder="Enter job name here" required>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Salary:</strong>
                        <input type="number" name="salary" value="{{ $jobs->salary}}" class="form-control" placeholder="00"required>
                        @error('salary')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Work Hours:</strong>
                        <input type="number" name="work_hours" value="{{ $jobs->work_hours}}" class="form-control" placeholder="00"required>
                        @error('work_hours')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                     Employees:
                        @foreach($jobs->week as $week)
                        <ul>
                            <li>{{$week->employee->id}}</li>
                            <li><img src="{{asset('public/Image/'.$week->employee->photo) }}" alt="" style="width:70px; height=auto;"></li>
                            <li>{{$week->employee->name}}</li>
                            <li>{{$week->employee->email}}</li>
                        </ul>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection

