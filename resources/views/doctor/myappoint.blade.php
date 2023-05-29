
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('doctor.css')
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      @include('doctor.sidebar')
      <!-- partial -->
      @include('doctor.navbar')
        <!-- partial -->

        {{-- @include('doctor.body') --}}


        
        <div 
        style=" 
        box-shadow: 0.2rem 0.2rem 0.5rem rgb(22, 26, 27);"
        class=" mt-4 rounded container">

   <div style="color:white;
              margin-right:2em"
       class=" container justify-content-between mt-5  me-3 p-5">
         
         <table style="color:white;background:rgb(45, 26, 77)"
              class=" p-5 col-8 table ">
           <thead style="color:white;background:rgb(63, 29, 29)" class="w-100 text-light ">
             <tr>
               <th style="color:white;" scope="col">CLIENT NAME</th>
               <th style="color:white;" scope="col">POHNE NO.</th>
               <th style="color:white;" scope="col">EMAIL ADDRESS</th>
               <th style="color:white;" scope="col">DOCTOR & Dept</th>
               <th style="color:white;" scope="col">DATE</th>
               <th style="color:white;" scope="col">MESSAGE</th>
               <th style="color:white;" scope="col">PRICE</th>
               <th style="color:white;" scope="col">STATUS</th>
               <th style="color:white;" scope="col">CHECK</th>
             </tr>
           </thead>
           @foreach ($appointments as $appointment)
               @if($appointment->status =='Approved' && $appointment->doc_id == $myid)
           <tbody class="text-light">
             <tr>
                <td>{{$appointment->name }}</td>
                <td>{{$appointment->phone }}</td>
                <td>{{$appointment->email }}</td>
               <td>{{$appointment->doctor }}</td>
               <td>{{$appointment->date }}</td>
               <td>{{$appointment->message }}</td>
               <td>{{"$".'100' }}</td>
               <td>{{$appointment->status }}</td>
               <td class="row ">
                <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('accept',$appointment)}}">Accept</a>
                <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to CANCEL the appointment?')" href="{{url('cancel',$appointment->id)}}">Cancel</a></td>
                    @elseif($appointment->status =='accepted')
                    <td>{{$appointment->name }}</td>
                    <td>{{$appointment->phone }}</td>
                    <td>{{$appointment->email }}</td>
                   <td>{{$appointment->doctor }}</td>
                   <td>{{$appointment->date }}</td>
                   <td>{{$appointment->message }}</td>
                   <td>{{$appointment->price }}</td>
                   <td>{{$appointment->status }}</td>
                   <td class="row ">
                    <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('accept',$appointment)}}">Prescripe</a>
                    <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to CANCEL the appointment?')" href="{{url('cancel',$appointment->id)}}">Cancel</a></td>

                @endif
             </tr>
            </tbody>
           @endforeach
         </table>
   </div>
</div>
      


    <!-- container-scroller -->
    @include('doctor.script')
  </body>
</html>
