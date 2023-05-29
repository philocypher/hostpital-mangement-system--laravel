
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

        <div class="container-fluid page-body-wrapper"> 
            {{-- @if(session()->has('message'))
  
            <div class="alert alert-success row col-8 offset-2 w-50 h-25">
              {{ session()->get('message') }}
  
            </div>
            @endif --}}
           
            
            <div  
               style="background-color: rgb(0, 2, 32);"  
               class="row  border rounded-lg bg-cyan-900 pt-3 container m-4"align="center">
              
               <!-- alert message --> 
              
            
               @if(session()->has('message'))
  
            <div class="alert alert-success alert-dismissible fade show "role='alert'>
              {{ session()->get('message') }}
            </div>
            @endif
  
              <form class='col-8 h-100 w-100'method='POST' enctype="multipart/form-data" action="{{url('update_info',$doctor->id)}}">
                @csrf
                <h1 class="h2 w-25 rounded-full text-light bg-info">Update info</h1>
                <div class="mt-4 row ">
                  <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Doctor Name" for="name"  />
                  <x-jet-input id="name" 
                               value="{{$doctor->name}}"
                               placeholder="Doctor's full name"
                               class="block col-8 w-50 mt-1 text-black" type="text" name="name"  required />
              </div>
              <div class="mt-4 row">
                <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Department" for="department" />
                <x-jet-input id="department" 
                             class="block text-black col-8 w-50 mt-1 w-full" 
                            type="text" 
                            value="{{$doctor->department}}"
                            name="department"
                           placeholder="Enter the department"
                              required />
            </div>
            <div class="mt-4 row">
              <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Phone" for="phone" />
              <x-jet-input id="phone" 
                           class="block text-black col-8 w-50 mt-1 w-full" 
                          type="text" 
                          name="phone"
                          value="{{$doctor->phone}}"
                         placeholder="contact phone"
                            required />
          </div>
  
          <div class="mt-4 row">
            <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Room No." for="room" />
            <x-jet-input id="room" 
                         class="block text-black col-8 w-50 mt-1 w-full" 
                        type="text" 
                        name="room"
                        value="{{$doctor->room}}"
                       placeholder="Room Number"
                          required />
        </div>

        {{-- <div class="mt-4 row ">
          <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="user_id" for="user_id"  />
          <x-jet-input id="user_id" 
                       value="{{$doctor->user_id}}"
                       placeholder="Assgin doctor user id"
                       class="block col-8 w-50 mt-1 text-black" type="text" name="user_id"   />
      </div> --}}

        <div class="mt-4 row">
            <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Old Image" for="oldImage" />
                      <img class="border border-info rounded w-25 h-25" name="oldImage"src="/storage/{{$doctor->image}}" alt="">
                       
        </div>

        <div class="mt-4 row">
          <x-jet-label class=' mt-1 text-lg col-2 offset-2 text-white' value="Change Image" for="image" />
          <x-jet-input id="image" 
                       class="block  col-8 w-50 mt-1 w-full" 
                      type="file" 
                      value="{{$doctor->image}}"
                      name="image"
                     placeholder=""
                         />
      </div>


      <div class="mt-4 row">
        <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="user_id" for="user_id"  />
         
        <select name="user_id" id="user_id" class='mt-3 text-lg col-2 offset-1 text-dark'>
          <option >--Select doctor</option>
          @foreach($filtereddocs as $doc)
        <option >{{$doc->id}}</option>
        @endforeach
      </select>
      </div> 
  
          <div class="col-5 ">
            <x-jet-button class="m-4  w-75">
             submit
          </x-jet-button>
  
          </div>
            
              </form>
            </div>
          </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
