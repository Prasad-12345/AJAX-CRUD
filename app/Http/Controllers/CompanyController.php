<?php

namespace App\Http\Controllers;

use App\Company_data as AppCompany_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\app\Company_data;
use App\Model\companyData;

class CompanyController extends Controller
{
    public function addCompany(Request $request){
        //  dd($request->all());
        $companyData = new AppCompany_data();
        // $company['companyName'] = $request->input('companyName');
       
        // $company['companyAddress'] = $request->input('companyAddress');
       
        // $company['companyLandmark'] = $request->input('companyLandmark');
        
        // $company['companyCity'] = $request->input('companyCity');
        
        // $company['companystate'] = $request->input('companystate');
       
        // $company['pincode'] = $request->input('pincode');

        $companyData->companyName = $request->companyName;
    
        $companyData->companyAddress = $request->companyAddress;
        
        $companyData->companyLandmark = $request->companyLandmark;
        $companyData->companyCity = $request->companyCity;
        $companyData->companystate = $request->companystate;
        $companyData->pincode = $request->pincode;
       
        $companyData->save();
        // $companies=json_decode($company,true);
        return response()->json(
            [
                'status' => true,
                'message' => 'Data inserted successfully',
                'data'=>$companyData
            ]
        );
    }

    public function getCompanies(){
        $company = DB::table('company_data')->get();
        // return View::make("companyView", compact('companies'));
        // return view('companyForm')->with('companies',$companies);
        return response()->json(['company'=>$company]);
    }

    public function editCompanyData(Request $request){
        $compData = new AppCompany_data();
        // dd($request->all());
        $id = $request->input('id');
        $compData = AppCompany_data::find($id);
        
        $compData->companyName = $request->input('companyName');
        $compData->companyAddress = $request->input('companyAddress');
        $compData->companyLandmark = $request->input('companyLandmark');
        $compData->companyCity = $request->input('companyCity');
        $compData->companystate = $request->input('companystate');
        $compData->pincode = $request->input('pincode');
        $compData->save();

        return response()->json(["data"=>$compData, "message"=>"data updated"]);
    }

    public function editGet(Request $request){
        $id = $request->id;
        $comp = DB::table('company_data')->where('id', $id)->first();
        // $returnHTML = view('editCompany')->with('company', $company);
        return response()->json( ['company'=>$comp, 'status'=>200] );
        // return view('companyForm')->with('comp', $comp);
    }

    public function delete(Request $request){
        $id = $request->id;
        $company = DB::table('company_data')->where('id', $id)->delete();
        return response()->json(['message'=>"company deleted"]);
    }
}
