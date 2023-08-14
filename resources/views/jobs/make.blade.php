@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add New Job</h2>
                </div>
                <div class="d-box justify-content-end">
                    <a class="btn btn-primary" href="{{ route('jobs.view') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Job Name:</strong>
                        <input type="text"name="name" id="name" class="form-control" placeholder="Enter job title here" required>
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
                        <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter salary here" required></textarea>
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
                        <input type="number" name="work_hours" id="work_hours" class="form-control" required>
                        @error('work_hours')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Add Employee:</label><br />
                        @foreach($employees as $employee)
                        <div class="form-check-inline">
                            <label for="form-check-label">
                                <input type="checkbox" class="form-check-input"name="employee[]"  value="{{$employee->id}}">{{$employee->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-6 mt-2 mb-2 mr-6">Submit</button>
            </div>
        </form>
    </div>
@endsection

