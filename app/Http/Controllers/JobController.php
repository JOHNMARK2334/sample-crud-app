<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use App\Models\Week;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showAll()
    {
        $employees = Employee::orderBy('id','asc')->paginate(9);
        return view('employees.view',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addEmployee()
    {
        $jobs = Job::all();
        return view('employees.make',compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEmployee(Request $request)
    {
        $request -> validate([
            'photo'=>'required',
            'name' =>'required|max:250',
            'email'=>'required|unique:users',
            'address'=>'required',
        ]);
        if($request->file('photo'))
        {
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
        }
        else
        {
            echo "Please select file";
        }
        $employee = Employee::create([
            'photo'=>$filename,
            'name'=>$request->name,
            'email'=>$request->email,
            "address"=>$request->address,
        ]);
        foreach($request->job as $job){
            Week::create([
                "employee_id"=>$employee->id,
                "job_id"=>$job
            ]);
        }
        return redirect()->route('employees.view')->with('success','employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function showEmployee($id)
    {
        $employees = Employee::query()->where('id',$id)->first();
        return view('employees.detailed',compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editEmployee($id)
    {
        $employee = Employee::query()->where('id',$id)->first();
        return view('employees.customize',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEmployee(Request $request, Employee $employee)
    {
        $request -> validate([
            'photo'=>'required',
            'name' =>'required|max:250',
            'email'=>'required|unique:users',
            'address'=>'required',
        ]);
        if($request->file('photo'))
        {
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
        }
        Employee::query()->where('id',$employee->id)->update([
            'photo'=>$filename,
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return redirect()->route('employees.view')->with('success','employee details updated successfully');
    }
    public function addJob()
    {
        //dd("hi");
        $employees = Employee::all();
        return view('jobs.make',compact('employees'));
    }
    public function storeJob(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'salary' =>'required|numeric',
            'work_hours'=>'required',
        ]);
        $job = Job::create([
            "name"=>$request->name,
            "salary"=>$request->salary,
            "work_hours"=>$request->work_hours
        ]);
        foreach($request->employee as $employee){
            Week::create([
                "job_id"=>$job->id,
                "employee_id"=>$employee
            ]);
        }
        return redirect()->route('jobs.view')->with('success','job created successfully');
    }
    public function editJob($id)
    {
        $jobs = Job::query()->where('id',$id)->first();
        return view('jobs.customize',compact('jobs'));

    }
    public function updateJob(Request $request,Job $job)
    {
        $request -> validate([
            'name'=>'required',
            'salary' =>'required|numeric',
            'work_hours'=>'required',
        ]);
        Job::query()->where('id',$job->id)->update([
            "name"=>$request->name,
            "salary"=>$request->salary,
            "work_hours"=>$request->work_hours,
        ]);
        return redirect()->route('jobs.view')->with('success',"job details updated successfully");

    }
    public function showJob($id)
    {
        $jobs = Job::query()->where('id',$id)->first();
        return view('jobs.detailed',compact('jobs'));
    }
    public function showJobs()
    {
        $jobs = Job::orderBy('id','asc')->paginate(10);
        return view('jobs.view',compact('jobs'));
    }

}
