@extends('layouts.app')

@section('content')
    <div class="container bg-light p-4 rounded">
        <h1>Show Job</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                #:{{ $jobs->id}}
            </div>
            <div>
                Role Name: {{ $jobs->name }}
            </div>
            <div>
                Salary: {{$jobs->salary}}
            </div>
            <div>
                Work Hours:: {{$jobs->work_hours}}
            </div>
            <div>
                Members:
                @foreach($jobs->week as $week)
                    <ul>
                        <li>{{$week->employee->id}}</li>
                        <li><img width="25%" class="img-circle" src="{{asset('public/Image/'.$week->employee->photo) }}"></li>
                        <li>{{$week->employee->name}}</li>
                        <li>{{$week->employee->email}}</li>
                    </ul>
                @endforeach
            </div>  
        </div>
    </div>
    <div class=" container mt-4">
        <a href="{{ route ('jobs.customize',$jobs->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('jobs.view') }}" class="btn btn-success">Back</a>
    </div>
@endsection