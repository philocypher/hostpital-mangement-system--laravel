
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include('admin.css')
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

        {{-- @include('admin.body') --}}


        
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
           @foreach ($appoints as $appointment)

           <tbody class="text-light">
             <tr>
                <td>{{$appointment->name }}</td>
                <td>{{$appointment->phone }}</td>
                <td>{{$appointment->email }}</td>
               <td>{{$appointment->doctor }}</td>
               <td>{{$appointment->date }}</td>
               <td>{{$appointment->message }}</td>
               <td>{{"$".$appointment->price }}</td>
               @if($appointment->status == 'in progress')
               <td class="text-warning ">{{$appointment->status }}</td>
               @elseif($appointment->status == 'Approved')
               <td class="text-primary ">{{$appointment->status }}</td>
               @else
               <td class="text-success ">{{$appointment->status }}</td>
               @endif
               <td class="row ">
                @if($appointment->status == 'Prescribed' || $appointment->status == 'Approved')
                <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to CANCEL the appointment?')" href="{{url('canceled',$appointment->id)}}">Delete</a></td>

                @else
                <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('approve',$appointment->id)}}">Approve</a>
                <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to CANCEL the appointment?')" href="{{url('canceled',$appointment->id)}}">Delete</a></td>

                @endif
	     </tr>
              <div style="background:rgb(122, 89, 89)" class="border rounded  text-light col-12">
                    {{$appoints->links()}}
                 </div>
           </tbody>
           @endforeach
         </table>
   </div>
</div>
      


    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
