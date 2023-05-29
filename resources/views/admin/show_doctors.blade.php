
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
               <th style="color:white;" scope="col">DOCTOR NAME</th>
               <th style="color:white;" scope="col">DOC ID</th>
               <th style="color:white;" scope="col">POHNE NO.</th>
               <th style="color:white;" scope="col">ROOM NO.</th>
               <th style="color:white;" scope="col">DEPARTMENT</th>
               <th style="color:white;" scope="col">IMAGE</th>
               <th style="color:white;" scope="col">Payroll</th>
               <th style="color:white;" scope="col">Update</th>
               <th style="color:white;" scope="col">Delete</th>

               
             </tr>
           </thead>
           @foreach ($doctors as $doctor)
           <tbody class=" text-light">
             <tr>
                <td class="col">{{$doctor->name }}</td>
                <td class="col">{{$doctor->user_id }}</td>
                <td class="col">{{$doctor->phone }}</td>
               <td class="col">{{$doctor->room }}</td>
               <td class="col">{{$doctor->department }}</td>
               <td class=""><img src="/storage/{{$doctor->image }}" alt=""></td>
               <td>
                @if ($doctor->user_id !='--Select doctor')
                <a href="{{url("show_payrolls")}}">
                  <div class=" h2 btn btn-outline-primary">Payments</div>
                  </a>
                @endif
                @if ($doctor->user_id =='--Select doctor')
                <a href="{{url('update_doc',$doctor->id)}}">
                  <div class=" badge badge-outline-warning">Assign Doctor</div>
                  </a>
                @endif
                </td>
              <td>
                  <a class="col-6 w-75 m-2 p-2 btn btn-outline-success"  href="{{url('update_doc',$doctor->id)}}">Update</a>
                </td>
               <td>
                   <a class="col-6 w-75 m-2 p-2 btn btn-outline-danger" onclick="return confirm('Are sure you want to CANCEL the appointment?')" href="{{url('delete_doc',$doctor->id)}}">delete</a>
               </td>
           
	     </tr>
             <div style="background:rgb(122, 89, 89)" class="border rounded  text-light col-12">
                    {{$doctors->links()}}
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
