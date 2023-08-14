@extends('layouts.app')

@section('content')
<div class="app">
    Add new employee:
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="file" name="photo" id="photo" class="form-control"accept=".jpg/.jpeg/.png" required>
                    @error('photo')
                    <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" id="email" class="form-control" placeholder="user@example.org" required>
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="address" name="address" id="address" class="form-control" placeholder="908 Tyme Suites Rongai" required>
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Job</label><br />
                    @foreach($jobs as $job)
                    <div class="form-check-inline">
                        <label for="form-check-label">
                            <input type="checkbox" class="form-check-input"name="job[]"  value="{{$job->id}}">{{$job->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection