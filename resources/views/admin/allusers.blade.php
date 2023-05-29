
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
               <th style="color:white;" scope="col">User Id</th>
               <th style="color:white;" scope="col">User Name</th>
               <th style="color:white;" scope="col">EMAIL ADDRESS</th>
               <th style="color:white;" scope="col">PHONE</th>
               <th style="color:white;" scope="col">ADDRESS</th>
               <th style="color:white;" scope="col">USERTYPE</th>
               <th style="color:white;" scope="col">ACTION</th>


             </tr>
           </thead>
           @foreach ($users as $user)
           @if ($user->usertype == 0)
           <tbody class="text-light">
            <tr>
               <td>{{$user->id }}</td>
               <td>{{$user->name }}</td>
               <td>{{$user->email }}</td>
               <td>{{$user->phone }}</td>
              <td>{{$user->address }}</td>
              <td>ADMIN {{$user->usertype }}</td>
              <td class="row ">
               <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('edit_user',$user->id)}}">Edit</a>
               <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to DELETE this Admin?')" href="{{url('delete_user',$user->id)}}">delete</a></td>
            </tr>
          </tbody>

           @endif
           @if ($user->usertype == 1)
           <tbody class="text-light">
             <tr>
               <td>{{$user->id }}</td>
               <td>{{$user->name }}</td>
               <td>{{$user->email }}</td>
               <td>{{$user->phone }}</td>
               <td>{{$user->address }}</td>
               <td>Client {{$user->usertype }}</td>
               <td class="row ">
                 <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('edit_user',$user->id)}}">Edit</a>
                 <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to DELETE this user?')" href="{{url('delete_user',$user->id)}}">delete</a></td>
                </tr>
              </tbody>
              @endif
              @if ($user->usertype == 2)
              <tbody class="text-light">
                <tr>
                  <td>{{$user->id }}</td>
                  <td>{{$user->name }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{$user->phone }}</td>
                  <td>{{$user->address }}</td>
                  <td>DOCTOR {{$user->usertype }}</td>
                  <td class="row ">
                    <a class="col-6 w-75 m-2 p-2 btn btn-success"  href="{{url('edit_user',$user->id)}}">Edit</a>
                    <a class="col-6 w-75 m-2 p-2 btn btn-danger" onclick="return confirm('Are sure you want to DELETE this user?')" href="{{url('delete_user',$user->id)}}">delete</a></td>
                   </tr>
                 </tbody>
                 @endif
           @endforeach
           <div class=" text-light row">
            <div style="background:rgb(122, 89, 89)" class="border rounded  text-light col-12">
                 {{$users->links()}}
              </div>
           </div>
         </table>
   </div>
</div>
      


    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
