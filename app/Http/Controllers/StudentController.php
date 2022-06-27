<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Http\Resources\StudentResource;
use App\Models\Package;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $store = Student::create($input);
        return response()->json($store);
    }
    public function index()
    {
        return StudentResource::collection(Student::all());
    }
    public function show($nim)
    {
        $student = Student::where('nim',$nim)->get('package_id');
        $package = Package::find($student);
        return PackageResource::collection($package);
    }
}
