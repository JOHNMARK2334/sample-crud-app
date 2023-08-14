@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Employee details</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('employees.view') }}" enctype="multipart/form-data">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Photo:</strong>
                        <?php if($employee['photo']!= ''):?>
                            <img width="20%" height="10%" class="img-circle" src="{{asset('public/Image/'.$employee->photo) }}">
                            <input type="file" name="photo" value="{{ $employee->photo }}" class="form-control" required>
                        <?php endif;?>
                        @error('photo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" value="{{ $employee->email}}" class="form-control" required>
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
                        <input type="address" name="address" value="{{ $employee->address}}" class="form-control"required>
                        @error('salary')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                     Jobs:
                        @foreach($employee->week as $week)
                        <ul>
                            <li>{{$week->job->id}}</li>
                            <li>{{$week->job->name}}</li>
                            <li>{{$week->job->email}}</li>
                        </ul>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection

