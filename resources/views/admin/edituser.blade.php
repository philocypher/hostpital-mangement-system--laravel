
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
  
              <form class='col-8 h-100 w-100'method='POST' enctype="multipart/form-data" action="{{url('edit_user_info',$user->id)}}">
                @csrf
                <h1 class="h2 w-25 rounded-full text-light bg-info">Update info</h1>
                <div class="mt-4 row ">
                  <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="user Name" for="name"  />
                  <x-jet-input id="name" 
                               value="{{$user->name}}"
                               class="block col-8 w-50 mt-1 text-black" type="text" name="name"  required />
              </div>
              <div class="mt-4 row">
                <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="email" for="email" />
                <x-jet-input id="email" 
                             class="block text-black col-8 w-50 mt-1 w-full" 
                            type="text" 
                            value="{{$user->email}}"
                            name="email"
                          
                              required />
            </div>
            <div class="mt-4 row">
              <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="Phone" for="phone" />
              <x-jet-input id="phone" 
                           class="block text-black col-8 w-50 mt-1 w-full" 
                          type="text" 
                          name="phone"
                          value="{{$user->phone}}"
                        
                            required />
          </div>
  
          <div class="mt-4 row">
            <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="address" for="address" />
            <x-jet-input id="address" 
                         class="block text-black col-8 w-50 mt-1 w-full" 
                        type="text" 
                        name="address"
                        value="{{$user->address}}"
                      
                          required />
        </div>
        <div class="mt-4 row">
            <x-jet-label class=' mt-3 text-lg col-2 offset-2 text-white' value="usertype" for="usertype" />
            <x-jet-input id="usertype" 
                         class="block text-black col-8 w-50 mt-1 w-full" 
                        type="text" 
                        name="usertype"
                        value="{{$user->usertype}}"
                       placeholder=" usertype"
                          required />
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
