<div class="main-panel">

    <div class="m-2 mt-4 content-wrapper conatiner">
    
    <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div class="container">

                    @if(session()->has('message'))
   
                    <div class="alert alert-success alert-dismissible fade show "role='alert'>
                       {{ session()->get('message') }} 
                     </div>
                     @endif
                   
             <div class="d-flex justify-content-between m-2">
                 
                <h4 class=" h1 card-titlem ">My Profile:</h4>
                <a href="{{url('edit_profile',$doctor->id ?? 'no')}}">
                    <button type="button" class="m-2 mb-2 w-20 btn btn-outline-primary">Edit</button>
                    </a>
            </div>

            <div class="row">

              <img class="col-3 rounded" height="100px" width="50px" src="storage/{{$doctor->image ?? 'defaa.jpg' }}" alt="image" />
              <div class=" col-9 mt-3  table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-info"> <h1 class="h4"><strong>Name</strong></h1>  </th>
                      <th class="text-info"><h1 class="h4"><strong>Department </strong></h1></th>
                      <th class="text-info"> <h1 class="h4"><strong>Room No. </strong></h1> </th>
                      <th class="text-info"><h1 class="h4"><strong>Phone</strong></h1> </th>
                      <th class="text-info"> <h1 class="h4"><strong>Salary</strong></h1></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-light"> <h3 class="h5"> {{$doctor->name ?? "ASK ADMIN TO ASSIGN A PROFILE FOR YOU"}}</h3> </td>
                      <td class="text-light"><h3 class="h5"> {{$doctor->department ?? "ASK ADMIN TO ASSIGN A PROFILE FOR YOU"}}</h3> </td>
                      <td class="text-light"><h3 class="h5"> {{$doctor->room ?? "ASK ADMIN TO ASSIGN A PROFILE FOR YOU"}}</h3>  </td>
                      <td class="text-light"><h3 class="h5"> {{$doctor->phone ?? "ASK ADMIN TO ASSIGN A PROFILE FOR YOU"}}</h3> </td>
                      <td class="text-light"><h3 class="h5"> ${{$doctor->salary ?? "ASK ADMIN TO ASSIGN A PROFILE FOR YOU"}}</h3> </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

            </div>
            

            </div>

          </div>
        </div>
      </div>
    
    </div>
    
     </div>