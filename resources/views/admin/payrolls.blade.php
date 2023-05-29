
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
        <div class="main-panel">
          <div class="content-wrapper">
       
 
              <!-- partial -->

             


        <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Payrolls To Be Approved</h4>
                @if(session()->has('message'))

  <div class="alert alert-success alert-dismissible fade show "role='alert'>
    {{ session()->get('message') }}
  </div>
  @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-info"> Doctor Name </th>
                        <th class="text-info"> Patient Name </th>
                        <th class="text-info"> Tasks No </th>
                        <th class="text-info"> Department </th>
                        <th class="text-info"> Doctor ID </th>
                        <th class="text-info"> Salary </th>
                        <th class="text-info"> Payment Status </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($payrolls as $payroll)
                      @if($payroll->status == 'Pending' 
                           || $payroll->status == 'Rejected' 
                           || $payroll->status == 'pending' || $payroll->status == 'rejected')
                  
                      <tr>
                      
                        <td>
                          <img src="storage/defaa.jpg" alt="image" />
                          <span class="text-light ps-2">{{$payroll->doc_name}}</span>
                        </td>
                        <td class="text-light"> {{$payroll->pat_name}} </td>
                        <td class="text-light"> {{$payroll->medication}} </td>
                        <td class="text-light"> {{$payroll->department}} </td>
                        <td class="text-light">{{$payroll->doc_id}} </td>
                        <td class="text-light"> ${{$payroll->salary}} </td>
                        <td>
                        <a href="{{url("make_payroll",$payroll->id)}}">
                          <div class=" h1 btn btn-outline-warning">{{$payroll->status}}</div>
                          </a>
                        </td>
                      </tr>
                      @endif
                      @endforeach
               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--next table -->



<div class="row ">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Approved Payrolls</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-info"> Doctor Name </th>
                <th class="text-info"> Patient Name </th>
                <th class="text-info"> Tasks No </th>
                <th class="text-info"> Department </th>
                <th class="text-info"> Doctor ID </th>
                <th class="text-info"> PAYMENT </th>
                <th class="text-info"> Payment Status </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($payrolls as $payroll)
              @if($payroll->status == 'Approved' 
                   || $payroll->status == 'approved' )
          
              <tr>
              
                <td>
                  <img src="storage/defaa.jpg" alt="image" />
                  <span class="text-light ps-2">{{$payroll->doc_name}}</span>
                </td>
                <td class="text-light"> {{$payroll->pat_name}} </td>
                <td class="text-light"> {{$payroll->medication}} </td>
                <td class="text-light"> {{$payroll->department}} </td>
                <td class="text-light">{{$payroll->doc_id}} </td>
                <td class="text-light"> ${{$payroll->salary}} </td>
                <td>
                
                  <div class="h1 badge badge-outline-success">{{$payroll->status}}</div>
                  
                </td>
              </tr>
              @endif
              @endforeach
       
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>





          </div>
        </div>

        


    <!-- container-scroller -->




    
    @include('admin.script')
  </body>
</html>
