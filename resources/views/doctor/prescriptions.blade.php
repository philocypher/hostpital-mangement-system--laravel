
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
       @if(session()->has('message'))

       <div class="alert alert-success alert-dismissible fade show "role='alert'>
         {{ session()->get('message') }}
       </div>
       @endif
         
         <table style="color:white;background:rgb(45, 26, 77)"
              class=" p-5 col-8 table ">
           <thead style="color:white;background:rgb(63, 29, 29)" class="w-100 text-light ">
             <tr>
               <th style="color:white;" scope="col">CLIENT NAME</th>
               <th style="color:white;" scope="col">MEDICATION</th>
               <th style="color:white;" scope="col">AMOUNT</th>
               <th style="color:white;" scope="col">REFILLS</th>
               <th style="color:white;" scope="col">DATE</th>
               <th style="color:white;" scope="col">PAYMENT</th>
               <th style="color:white;" scope="col">STATE</th>


             
             </tr>
           </thead>
           @foreach ($all as $prescript)
               
           <tbody class="text-light">
             <tr>
                <td>{{$prescript->name }}</td>
                <td>{{$prescript->medication }}</td>
                <td>{{$prescript->amount }}</td>
                <td>{{$prescript->refills }}</td>
               <td>{{$prescript->created_at }}</td>
               <td>{{$prescript->paid }}</td>

               <td>
               <a href="{{url("home")}}">
                  <div class=" badge badge-outline-success">Done</div>
                </a>
              </td>
               {{-- <td class="row ">
                <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('accept',$prescript->id)}}">Accept</a>
                <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to CANCEL the prescript?')" href="{{url('cancel',$prescript->id)}}">Cancel</a></td> --}}
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
