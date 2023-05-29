
<!DOCTYPE html>
<html lang="en">
  <head>
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
                <a href="{{url("add_payroll",$doctor->user_id)}}">
                  <div class=" h2 btn btn-outline-primary">Add Payment</div>
                  </a>
                @endif
                </td>
           
             </tr>
           </tbody>
           @endforeach
         </table>
   </div>
</div>
      


    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
