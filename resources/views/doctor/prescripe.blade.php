
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
  

         
    
            
         <form class='col-8 h-100 w-100'method='POST' enctype="multipart/form-data" action="{{url('prescripe',$patient)}}">
           @csrf
           <h1 class="h2 w-25 rounded-full text-light bg-info">Prescription</h1>
           <div class="mt-4 row ">
             <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="client Name" for="name"  />
             <x-jet-input id="name" 
                           value="{{ $patient->name ?? $appointment->name }}"
                          placeholder="client name"
                          class="block col-8 w-50 mt-1 text-black" type="text" name="name"  required />
         </div>
         <div class="mt-4 row">
           <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Medication" for="medication" />
           <x-jet-input id="medication" 
                        class="block text-black col-8 w-50 mt-1 w-full" 
                       type="text"
                       name="medication"
                      placeholder="medication"
                         required />
       </div>
       <div class="mt-4 row">
         <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Amount" for="amount" />
         <x-jet-input id="amount" 
                      class="block text-black col-8 w-50 mt-1 w-full" 
                     type="text" 
                     name="amount"
                    placeholder="amount and frequency to take"
                       required />
     </div>

     <div class="mt-4 row">
       <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Refills" for="refills" />
       <x-jet-input id="refills" 
                    class="block text-black col-8 w-50 mt-1 w-full" 
                   type="text" 
                   name="refills"
                  placeholder="how many Refills allowed"
                     required />
                     
   </div> 

{{-- 
   <div class="mt-4 row">
    <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="user_id" for="user_id"  />
     
    <select name="user_id" id="user_id" class='mt-3 text-lg col-2 offset-1 text-dark'>
      <option >null</option>
      @foreach($users as $user)
    <option >{{$user->id}}</option>
    @endforeach
  </select>
  </div>  --}}
   {{-- <div class="mt-4 row">
    <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="user_id" for="user_id" />
    <x-jet-input id="user_id" 
                 class="block text-black col-8 w-50 mt-1 w-full" 
                type="text" 
                value="{{$patient->id ?? ''}}"
                name="user_id"
               placeholder="set user"
                   />
                  
</div> --}}

  
   
     <div class="col-5 ">
       <x-jet-button class="m-4  w-75">
        submit
     </x-jet-button>

     </div>
       
         </form>
       </div>
     </div>



   </div>
</div>
      


    <!-- container-scroller -->
    @include('doctor.script')
  </body>
</html>
