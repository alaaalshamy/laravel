<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class Emp extends Controller
{
    
    public function index(){
        $emp = Employee::all();

        return response()->json($emp);
    }
      public function employee($id){
        $emp = Employee::find($id);

        return response()->json($emp);
    }



    public function employeeSearch(Request $request){
        $search= $request->search;
        $emp = Employee::where('FirstName', 'LIKE',"%{$search}%")->get();
        
// response()->json($emp);
       return view("listEmp")->with(array('employee'=> $emp ));
    }
  
}
