
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
               <th style="color:white;" scope="col">Patient NAME</th>
               <th style="color:white;" scope="col">DOCTOR NAME</th>
               <th style="color:white;" scope="col">DOCTOR DEPARTMENT</th>
               <th style="color:white;" scope="col">Medication </th>
               <th style="color:white;" scope="col">Amount NO.</th>
               <th style="color:white;" scope="col">REFILLS NO.</th>
               <th style="color:white;" scope="col">PAYMENT STATUS</th>
               <th style="color:white;" scope="col">Payroll</th>

               
             </tr>
           </thead>
           @foreach ($prescriptions as $pres)
           <tbody class=" text-light">
               <tr>
                   <td class="col">{{$pres->name }}</td>
                   @foreach ($doctors as $doc)
                @if($doc->user_id == $pres->doc_id)
                <td class="col">{{$doc->name }}</td>
                <td class="col">{{$doc->department }}</td>
                @endif
                @endforeach
                <td class="col">{{$pres->medication }}</td>
                <td class="col">{{$pres->amount }}</td>
               <td class="col">{{$pres->refills }}</td>
               <td class="col">{{$pres->paid }}</td>
               <td>
                @if ($pres->paid =='no')
                <a href="{{url("add_payroll",$pres->doc_id)}}">
                  <div class=" h2 btn btn-outline-primary">Add Payment</div>
                  </a>
                @endif
                @if ($pres->paid =='yes')
                <a href="{{url("show_payrolls")}}">
                  <div class=" badge badge-outline-success">Paid</div>
                </a>
                @endif
                </td>
            
	     </tr>
              <div style="background:rgb(122, 89, 89)" class="border rounded  text-light col-12">
                 {{$prescriptions->links()}}
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
