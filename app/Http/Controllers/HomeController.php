<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\payroll;
use App\Models\Appointment;
use App\Models\prescription;
use Illuminate\Http\Request;
use App\Mail\ApprovedPayment;
use App\Mail\ApprovedAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{ 
    // function __construct(){$this->middleware('auth');}

    public function index(){
        if(Auth::id()){
            return redirect('home');

        }else{
            
            $doctors = Doctor::all();
    
            return view('user.home',compact('doctors'));
        }
    }


    public function redirect( ){
        if(Auth::id()){
             //if its normal user 
            if(Auth::user()->usertype == 1){
                $doctors = Doctor::all();
               
                


                return view('user.home',compact('doctors'));
            }//if its doctor
            elseif(Auth::user()->usertype == 2 ){
                $docId = Auth::user()->id;
                $filter =  Doctor::where('user_id',$docId)->get();
		$doc=Doctor::where('user_id',$docId)->get()->all();
		  if($doc == []){
                    $doctor = [];

                    return view('doctor.home',compact('doctor'));

		  }
		 $doct = $doc[0];
                $taskAccum = count(payroll::where('doc_id',$doct->id)->get()->all());
                $filtered = $filter->all();
                
                $salary = $taskAccum * 100 ;

                // dd($doc,$salary,$filter[0]->salary);
                
                // if($filter != []){
                    // }
                    if($filtered !=[]){
                        $doctor = $filter[0];
                        $doctor->salary = $taskAccum * 100;
                        $doctor->save();
                        // dd($doctor);

                    return view('doctor.home',compact('doctor'));
                }else{
                    return view('doctor.home');

                }
            } 
            //if its admin 0 usertype
            elseif(Auth::user()->usertype == 0){
                $pays = payroll::all();
                $prescrip = prescription::all();
                $appoints = Appointment::all();

                $pres = count($prescrip);
                $jobs = count($appoints);
		$revenue = count($pays) * 100;
		if($jobs == 0){
                  return view('admin.home');

		}else{

                $precentage = $revenue / $jobs ;
                // dd($revenue,$precentage);
                return view('admin.home',compact('revenue', 'pres','jobs','precentage'));
                        }    
		}

        }

        elseif(!Auth::id()){
            return redirect('/');

        }else{
            redirect()->back();

        }
            
        
    }

    public function appointment(){
        $appointment = new Appointment;
        $data = request()->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'date'=>'required',
            'phone'=>'required',
            'doctor'=>'required',
            'message'=>'required',
            'status'=>'',
            'user_id'=>''
        ]);
        //get doctors to filter the department doctor

        $requestedDoctor = request('doctor');
        // dd(auth()->user()->id);
        
        $docid = 0;
        $doctors = Doctor::all();
        
        foreach($doctors as $doctor){
            if(strripos($requestedDoctor,$doctor->name) == 0 && $doctor->user_id != '--Select doctor') {
                // dd(strripos($requestedDoctor,$doctor->name), $requestedDoctor,$doctor,'id '.$doctor->user_id,'check');
                $docid = $doctor->user_id;
                break;
                // $appointment->save();
            }
        }
        $appointment->save();
        $appointment->update(array_merge($data,['status'=>'in progress']));
        $appointment->update(['doc_id'=>$docid]);
        
            // dd($appointment);
            // $appointment->update(['price' => '100']);
        
        if(Auth::id()){
            $appointment->update(['user_id' =>Auth::user()->id]) ;
        }
        // dd($appointment ,$data);
        // Mail::send(new ApprovedAppointment);
        return redirect()->back()->with('message','Appointment request is done, we will contact you soon');
    }

    public function myappointment(){
        // $this->middleware('auth');
        if(Auth::id()){
            $userid = Auth::user()->id;

            $prescription = prescription::where('user_id',$userid)->get();
            $prescription = $prescription->all();
            // $prescription = prescription::all();
            
            $appointments = Appointment::where('user_id',$userid)->get();
            // $appointments =  $appointments->all();


            
            // dd($appointments);
            return view('user.myappointment',compact('appointments','prescription'));}
        // else{
        //     return redirect()->back();
        // }
    }
    //CANECL AND DELETE APPOINTMENT BY USER OR ADMIN
    public function cancel_appoint($id){

        $appointment = Appointment::find($id);
        $appointment->delete();
        
        return redirect()->back();

    }
   
}
