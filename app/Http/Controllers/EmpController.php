<?php

namespace App\Http\Controllers;

use App\empdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmpController extends Controller
{
    //
    public function employeeForm()
    {
        $employees = DB::table('empdata')->join('company_data', 'empdata.company_id', '=', 'company_data.id')->select('empdata.*', 'company_data.companyName')->get();
        return view('employeeForm')->with('employees', $employees);;
    }

    public function addEmp(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'firstName' => 'required|string:value|regex:/[a-zA-Z]{2,}$/|min:3',
            'lastName' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'email' => 'required|min:25',
            'password' => 'required|min:8',
            'company_id' => 'required|integer',
        ]);

        // dd($validation->fails());
        if ($validation->fails()) {
            // dd($errors);
            $error = $validation->errors();
            $errors = $error->toArray();
            $response =  response()->json(['errors' => $errors, 'sussess' => false]);
        }
        else {
            $empData = empdata::create([
                'firstName' => $request->firstName,
                'lastName'  => $request->lastName,
                'city' => $request->city,
                'state' => $request->state,
                'email' => $request->email,
                'password' => $request->password,
                'company_id' => $request->company_id,
            ]);
            $response = response()->json(["data" => $empData, 'success'=>true]);
        }
        return response()->json(['data'=>$response]);
    }

    public function getEmp()
    {
        $employees = DB::table('empdata')->join('company_data', 'empdata.company_id', '=', 'company_data.id')->select('empdata.*', 'company_data.companyName')->get();
        // return response()->json(['employee' => $employee]);
        return view('employeeForm')->with('employees', $employees);
        // return Datatables()->of($employees)->make(true);
    }

    public function getEditData(Request $request)
    {
        $id = $request->id;
        $emp = empdata::find($id);
        return response()->json(['emp' => $emp, 'status' => 200]);
    }

    public function updateEmpData(Request $request)
    {
        $emp = new empdata();
        $id = $request->input('id');
        $emp = empdata::find($id);
        $emp->firstName = $request->input('firstName');
        $emp->lastName = $request->input('lastName');
        $emp->city = $request->input('city');
        $emp->state = $request->input('state');
        $emp->email = $request->input('email');
        $emp->password = $request->input('password');
        $emp->company_id = $request->input('company_id');
        $emp->save();
        return response()->json(["message" => "data updated"]);
    }

    public function deleteEmp(Request $request)
    {
        $id = $request->id;
        $emp = DB::table('empdata')->where('id', $id)->delete();
        return response()->json(['message' => "data deleted"]);
    }
}
