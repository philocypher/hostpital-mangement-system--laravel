<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\payroll;
use App\Models\Appointment;
use App\Models\prescription;
use App\Mail\ApprovedPayment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    //add / create doctor
    public function create(){
        $doctors = User::all()->where('usertype',2);
        return view("admin.add_doctor",compact('doctors'));
    }
    //store doctor info from form
    public function store(){
        $doctor = new Doctor;
        $data = request()->validate([
            'name'=>'required',
            'phone'=>'required',
            'room'=>'required',
            'department'=>'required',
            'image'=> ['required','image'],
            'user_id'=>'required',
        ]);
        $imagePath = request('image')->store('uploads/doctor','public');
        $doctor->save();
        $doctor->update(array_merge($data,['image'=>$imagePath]));
        // dd($data,$doctor);

        return redirect()->back()->with('message',$doctor->name .' Added Successfully');

    }
    //show all appointments
    public function show(){
        $appoints = Appointment::paginate(5);
        return view('admin.show_appoints',compact("appoints"));
    }

    //aprrove appointment
    public function approve($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back();

    }
    public function canceled($id){

        $appointment = Appointment::find($id);
        $appointment->delete();
        
        return redirect()->back();

    }
    public function show_docs(){

        $doctors = Doctor::paginate(5);

        // $prescriptions =prescriptions::where()

        return view('admin.show_doctors',compact('doctors'));

    }
    //update doctor info edit
    public function update_doc($id){
        $doctor = Doctor::find($id);
        $filtereddocs = User::all()->where('usertype',2);
      

        return view('admin.update_docs',compact('doctor','filtereddocs'));

    }
    //delete doctor
    public function delete_doc($id){
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back();
    }
     public function update_info($id, Request $req){
        $doctor = Doctor::find($id);
        $data = request()->validate([
            'name'=>'required',
            'department'=>'required',
            'room'=>'required',
            'phone'=>'required',
            'image'=>'',
            'user_id'=>'',
        ]);

        if(request('image') != null){
            $imagePath = request('image')->store('uploads/doctor','public');
            $doctor->update(array_merge($data ,['image'=>$imagePath]));

            $doctor->save();

        }else{
            $doctor->update(array_merge($data));
            $doctor->save();
            
        }
        // dd($doctor);



        return redirect()->back()->with('message',$doctor->name ." ". 'info has been updated!');



    }
    // listing all users
    public function users(){
        $users = User::paginate(3);
        return view('admin.allusers',compact('users'));
    }
    //delete users
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back();

    }
    //edit users
    public function edit_user($id){
        $user = User::find($id);

        return view('admin.edituser',compact('user'));

    }//upadting users info
    public function edit_user_info($id,Request $req){
        $user = User::find($id);
        // dd(request('usertype'));
        
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'usertype'=>'required',
        ]);
        if(request('user')){

        }
       
        $user->update(array_merge($data));
        $user->save();
        

        return redirect()->back()->with('message',$user->name.' '.'information has been upadted');

    }

    //payrolls
    public function show_payrolls(){
        $payrolls =payroll::paginate(5);


        return view('admin.payrolls',compact('payrolls'));
    }

    public function add_payrolls($id){
       
        $doctor =Doctor::where('user_id',$id)->get()[0];
        $notPaid =false;

        $doctors = Doctor::all();
        $users = User::all();
        // $prescriptions = prescription::all();
        $payrolls = collect([]);
        // dd($doctor->name);
            $prescriptions =prescription::where('doc_id',$id)->get()->all();
                foreach($prescriptions as $prescribed){
                    if($prescribed->paid =='no'){
                        $payroll = new payroll;
                        $pat = User::find($prescribed->user_id);
                        $prescribed->paid= 'yes';
                        $prescribed->save();
                        // $salary= 100;
                        $payroll->doc_name=$doctor->name;
                        $payroll->doc_id=$doctor->id;
                        $payroll->pat_id=$pat->id;
                        $payroll->pat_name=$pat->name;
                        $payroll->department=$doctor->department;
                        $payroll->pres_id=$prescribed->id;
                        $payroll->medication=$prescribed->medication;
                        $payroll->tasks=1;
                        $payroll->status='Pending';
                        $payroll->salary=100;
                        $payroll->save();
                        
                        // $payroll->update([
                        //     "doc_name"=>$doctor->name,
                        //     "doc_id"=>$doctor->user_id,
                        //     'pat_id'=>$pat->id,
                        //     'pat_name'=>$pat->name,
                        //     "department"=>$doctor->department,
                        //     'pres_id'=>$prescribed->id,
                        //     'medication'=>$prescribed->medication,
                        //     "tasks"=>1,
                        //     'status'=>'Pending',
                        //     "salary"=>$salary,
                        // ]); 
                        // dd($payroll,$doctor);
                        $payrolls->push($payroll);
                        break;
                    }
                    
                }
                // dd($payrolls->all());
                if($payrolls->all() == []){
                    return redirect('/show_payrolls');
                }
                // $all =prescription::where('doc_id',$id)->get()->all();
                // foreach($all as $pres){
                //     // dd($pres);
                    
                    
                //     if($pres->paid == 'yes'){
    
                //      return view('admin.payrolls',compact('payrolls'))->with('message','Payment Approved');

                //     }
                // }

                // $presCtr = count($prescriptions);
            
            
        
        // dd($payrolls,$prescriptions);
        // dd($doctors);dd('PAYROLL',$payrolls ,$prescriptions);
// dd($payrolls->all());
elseif($payrolls != []){
    // Mail::send(new ApprovedPayment);

    return view('admin.payrolls',compact('payrolls'))->with('message','Payment Approved');
}

   
    }

    public function make_payroll($id){
        $payroll = payroll::find($id);
        $doctor = Doctor::find($payroll->doc_id);
        $payroll->status = 'Approved'; 
        $payroll->save();
        $doctor->salary = $payroll->salary;
        $doctor->save();
        return redirect()->back()->with('message',$doctor->name.' '.$payroll->salary.' '.'Payroll Approved');


    }



   public function show_prescriptions(){
    $prescriptions = prescription::paginate(5);
    $doctors =Doctor::all();
    return view('admin.show_prescriptions',compact('prescriptions','doctors'));
   }



}
