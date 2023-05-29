
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
        <div class="main-panel">

            <div class="m-2 mt-4 content-wrapper conatiner">
            
            <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
        
                        <div class="container ">

                            <div class="d-flex">

                            <div class="row">
                                <div class="col-5">
                                    <h1 class="h3 text-light">
                                        Old Picture
                                    </h1>
                                    <img class="col-12 w-100 rounded" height="300px" width="200px" src="storage/{{$doctor->image ?? def.svg}}" alt="image" />
                                </div>
                                
                              </div>
                              
                              <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                              <div class="w-100  m-2 ">

                                <form action="{{url('store_profile',$doctor->id)}}" enctype="multipart/form-data" method="POST">
                                    @csrf

                             
                              
                              <!-- Columns are always 50% wide, on mobile and desktop -->
                              


                              <div class="row">
                                <div class="mt-3 d-flex justify-content-around">
                                    <div class="input-group mb-3 h-50 w-50">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text text-light rounded  h-100 w-100 bg-primary" id="name"><label for="name"><strong>Name</strong></label> </span>
                                        </div>
                                        <input type="text" placeholder="{{$doctor->name}}" 
                                                style="color:white;background:rgb(223, 225, 235)"       
                                                class="ms-2  rounded  text-dark form-control" aria-label="name" name="name" >
                                      </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="mt-3 d-flex justify-content-around">
                                    <div class="input-group mb-3 h-50 w-50">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text text-light rounded  h-100 w-100 bg-primary" id="phone"><label for="phone"><strong>Phone</strong></label> </span>
                                        </div>
                                        <input type="text" placeholder="{{$doctor->phone}}" class="ms-2 rounded text-dark form-control"
                                        style="color:white;background:rgb(217, 217, 230)" aria-label="phone" name="phone" >
                                      </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="mt-3 d-flex justify-content-around">
                                    <div class="input-group mb-3 h-50 w-50">
                                        <div class="input-group-prepend ">
                                          <span class="input-group-text w-100 rounded bg-primary text-light" id="image"><label for="image"><strong>Change image</strong></label></span>
                                        </div>
                                        <input type="file" class=" rounded ms-4 form-control" aria-label="image" name="image" >
                                      </div>
                                </div>
                              </div>

                              <div class="row">
                                    <button type="submit" class=" col m-4 mb-2 w-50 btn btn-outline-primary">SUBMIT</button>
                              </div>
                            </form>



                            </div>
                            </div>
        
                    </div>
                    
        
                    </div>
        
                  </div>
                </div>
              </div>
            
            </div>
            
             </div>


    <!-- container-scroller -->
    @include('doctor.script')
  </body>
</html>
