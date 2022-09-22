<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Companies;



class CompaniesController extends Controller
{
    public function index()
    {
        return view('Company/company');
    }

    public function Create(Request $request){
    //  $record = $request->all();
      $validate = Validator::make($request->all(), [
        'companyWebsite' => 'required|min:10',
        'companyEmail' => 'required',
        'companyName' => 'required',
        'CompanyLogo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

    ],[
        'companyWebsite.required' => 'Please Enter company website',
        'companyEmail.required' => 'Please Enter company email',
        'companyName.required' => 'Please Enter company name',
        'CompanyLogo.required' => 'Please Upload company image',

    ]);
    // $path = $request->file('image')->store('public/images');
        if($validate->fails()){
        return back()->withErrors($validate->errors())->withInput();
        }else{
            $file= $request->file('CompanyLogo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/image'), $filename);
            $image= $filename;
           $storedata = Companies::create([
            "website"=>$request->companyWebsite,
            "email"=> $request->companyEmail,
            "name"=> $request->companyName,
            "logo"=> $image,
           ]);
           

           if(!$storedata ){
            return back()->with("failed", "You have successfully your record");
           }else{
            return back()->with("success", "You have successfully your record");
           }
        }
    }

    public function Read(){
        $data= DB::table('Companies')->get();
        return view('Company/companylist', ['data'=>$data] );
    }
    public function Edit($id){
        $company = Companies::find($id);
        return view('Company/CompanyEdit', compact('company'));  
    }
    public function Update(Request $request, $id){
        
        $validate = Validator::make($request->all(), [
            'companyWebsite' => 'required|min:10',
            'companyEmail' => 'required',
            'companyName' => 'required',
            'CompanyLogo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    
        ],
        [
            'companyWebsite.required' => 'Please Enter company website',
            'companyEmail.required' => 'Please Enter company email',
            'companyName.required' => 'Please Enter company name',
            'CompanyLogo.required' => 'Please Upload company image',
    
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
            }else{

                
                $file= $request->file('CompanyLogo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/image'), $filename);
                $image= $filename;
               $storedata = Companies::where('id',$id)->update([
                "website"=>$request->companyWebsite,
                "email"=> $request->companyEmail,
                "name"=> $request->companyName,
                "logo"=> $image,
               ]);
    
               if(!$storedata ){
                return back()->with("failed", "You have successfully your record");
               }else{
                return redirect()->route('CompanyListing')->with("success", "Your have Updated record successfully");
               }
           }
    }

    public function Destroy($id){
        $storedata = Companies::find($id)->delete();
        return redirect()->route('CompanyListing')->with("success", "record  deleted successfully");
    }

}
 
