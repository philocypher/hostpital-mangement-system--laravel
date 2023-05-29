<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\prescription;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function __construct(){$this->middleware('auth');}

  public function show(){
      $myid = auth()->user()->id;
      $appointments = Appointment::all()->where('doc_id',$myid);
    //   dd($myid,$appointments);
    
    return view('doctor.myappoint',compact('appointments','myid'));
  }

  public function accept($appoint){
   $appointment = Appointment::find($appoint);
    $users = User::all()->where('usertype',1);
    // $appointment->user_id = $patientId;

    
    if($appointment->user_id == null){
        $appointment->status = 'accepted';
        $appointment->save();
        return view('doctor.prescripe',compact('appointment','users'));
    } elseif($appointment->user_id != null){
        $userId = $appointment->user_id;
        $patient =User::find($userId);
        // dd($patient);
        $appointment->status = 'Prescribed';
        $appointment->save();
    
        return view('doctor.prescripe',compact('patient','appointment'));
    }

}
public function cancel($id){

    $appointment = Appointment::find($id);
    $appointment->status = 'CANCELED';
    $appointment->save();
    
    return redirect()->back();

    }


    public function prescripes($patient){
        $pres = new prescription;
        $data = request()->validate(
            [
                'name'=>'required',
                'medication'=>'required',
                'amount'=>'required',
                'refills'=>'required',
                'user_id'=>''
            ]
        );
        // $pres->update([
        //     'name'=>$data['name'],
        //     'medication'=>$data['medication'],
        //     'amount'=>$data['amount'],
        //     'refills'=>$data['refills'],
        //     'user_id'=>$data['user_id'],
        // ]);
        $pres->name = $data['name'];
        $pres->medication = $data['medication'];
        $pres->amount = $data['amount'];
        $pres->refills = $data['refills'];
        $pres->doc_id=auth()->user()->id;
        $pres->paid = 'no';
        $pres->user_id = $patient;
        $pres->save();
        // dd($pres);

            return redirect('/prescriptions')->with('message',$pres->name.' '.$pres->medication.' '.'successful!');
        }

        
    
    public function prescriptions(){
        $all = prescription::where("doc_id",auth()->user()->id)->get();
        // dd($all);

        return view('doctor.prescriptions',compact('all'));

    }
    //edit profile of doctor
    public function profile($id){
        if($id == 'no'){
            return redirect()->back();
        }else{

            $doctor = Doctor::find($id);

          //  dd($doctor);
      
            return view('doctor.edit_profile',compact('doctor'));
        }
    }
    public function store_profile($id){
        $doc = Doctor::find($id);
        $data = request()->validate([
            'name'=>'',
            'phone'=>'',
            'image'=>''
        ]);
        $imagePath = request('image')->store('uploads/doctor','public');

        $doc->update(array_merge($data,['image'=>$imagePath]));


        // dd($doc);
        return redirect('/home')->with('message','profile updated succesfully!');

    }
}
