<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $data= DB::table('Companies')->get();
        return view('Employer/employee', ['data'=>$data] );
    }
    public function Read(){

           $record = $users = DB::select('SELECT employees.*, Companies.name FROM employees AS employees INNER JOIN Companies AS Companies ON employees.Company = Companies.ID ');
    
      return view('Employer/employeelist', ['data'=>$record]);
    }


    public function Create(Request $request){
        $validate = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'CompanyName' => 'required',
            'Employemail' => 'required',
            // 'phoneNumber' => 'required|regex:/(01)[0-9]{9}/',
    
        ],
        [
            'firstName.required' => 'Please Enter company website',
            'lastName.required' => 'Please Enter company email',
            'companyName.required' => 'Please Enter company name',
            'Employemail.required' => 'Please Upload company image',
            // 'phoneNumber.required' => 'Please Upload company image',
    
        ]);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }
          $storedata = Employee::create([
            "firstname"=>$request->firstName,
            "lastname"=> $request->lastName,
            "Company"=> $request->CompanyName,
            "email"=> $request->Employemail,
            "phonenumber"=> $request->phoneNumber,
          ]);
        
           if(!$storedata ){
            return back()->with("failed", "You have successfully your record");
           }else{
            return back()->with("success", "You have successfully your record");
           }
             
     }

    public function Edit($id){
       // var_dump($id);
        $employees = Employee::find($id);
        // var_dump($employees);
        $data= DB::table('Companies')->get();
      //  ['employees'=>$employees],['data'=>$data]
       return view('Employer/employeeedit',['employees'=>$employees],['data'=>$data]);  
    }
    public function Update(Request $request, $id){
        
        $validate = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'CompanyName' => 'required',
            'Employemail' => 'required',
            'phoneNumber' => 'required|regex:/(01)[0-9]{10}/',
    
        ],
        [
            'firstName.required' => 'Please Enter company website',
            'lastName.required' => 'Please Enter company email',
            'companyName.required' => 'Please Enter company name',
            'Employemail.required' => 'Please enter email',
            'phoneNumber.required' => 'Please enter phonenuber',
    
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
            }else{

               $file=$request->file('CompanyLogo');
              $file_dd=$file->getClientOriginalExtension();
               $title= uniqid() .'.'. $file_dd;
               $imagepath = $file->move(public_path('images'),$file_dd);
               $storedata = Employees::where('id',$id)->update([
                "website"=>$request->companyWebsite,
                "email"=> $request->companyEmail,
                "name"=> $request->companyName,
                "logo"=> $title,
               ]);
    
               if(!$storedata ){
                return back()->with("failed", "You have successfully your record");
               }else{
                return redirect()->route('ListingEmployee')->with("success", "Your have Updated record successfully");
               }
           }
    }

    public function Destroy($id){
        $storedata = Employee::find($id)->delete();
        return redirect()->route('ListingEmployee')->with("success", "record  deleted successfully");
    }

}
