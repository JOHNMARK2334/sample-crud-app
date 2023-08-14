@extends('layouts.app')

@section('content')
    <div class="container bg-light p-4 rounded">
        <h1>Employee Details</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                #:{{ $employees->id }}
            </div>
            <div>
                Name: {{ $employees->name }}
            </div>
            <div>
                Photo: <img width="25%" class="img-circle" src="{{asset('public/Image/'.$employees->photo) }}">
            </div>
            <div>
                Email: {{ $employees->email }}
            </div>
            <div>
                Address: {{ $employees->address }}
            </div>
            <div>
                Jobs:
                @foreach($employees->week as $week)
                    <ul>
                        <li>{{$week->job->id}}</li>
                        <li>{{$week->job->name}}</li>
                        <li>{{$week->job->salary}}</li>
                        <li>{{$week->job->work_hours}}</li>
                    </ul>
                @endforeach
            </div>  
        </div>
    </div>
    <div class=" container mt-4">
        <a href="{{ route ('employees.customize',$employees->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('employees.view') }}" class="btn btn-success">Back</a>
    </div>
@endsection