{{-- <x-app-layout>
    <h1 class="h1"> THIS IS USER DASHBOARD</h1>
 </x-app-layout>
  --}}

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
  

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/home"><span class="text-primary">Wellness</span>-Mark</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link  m-2 btn  text-white btn-info" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  m-2 btn  text-white btn-info" href="/home#about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  m-2 btn  text-white btn-info" href="/home#docs">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  m-2 btn  text-white btn-info" href="/home#news">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  m-2 btn  text-white btn-info" href="/home#appoint">Make Appointment</a>
              <li class="nav-item">
                @if(Route::has('login'))
                @auth
                <li class="nav-item">
                  <a class="nav-link btn btn-info text-white" href="{{url('myappointment')}}">My Appointment</a>
                  <li class="nav-item">
                <x-app-layout>
                </x-app-layout>
                
                @else
                  <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login </a>
                </li>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}"> Register</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
</header>
    <div 
             style=" 
             box-shadow: 0.2rem 0.2rem 0.5rem rgb(22, 26, 27);"
             class=" mt-4 rounded container">

        <div class="w-100">
              
              <table class="w-100 table-striped table">
                <thead class="w-100 thead-dark">
                  <tr class="w-100">
                    <th scope="col">Doctor name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
		   <th scope="col">Price</th>
                     <th scope="col">Status</th>
                   
                    <th scope="col">State</th>
                  </tr>
                </thead>
                @foreach ($appointments as $in => $appointment)
               
                <tbody>
                  <tr>
                    <td>{{$in.' '.$appointment->doctor ?? "make appointment"}}</td>
                    <td>{{$appointment->date ?? "make appointment"}}</td>
                    <td>{{$appointment->message ?? "make appointment"}}</td>
                    @if($appointment->status!=='Prescribed')
		   
                    <td>{{"$100"}}</td>
                    <td>{{$appointment->status ?? "make appointment"}}</td>
                    
                    <td><a class="btn btn-danger" onclick="return confirm('Are sure you want to delete the appointment?')" href="{{url('cancel_appoint',$appointment->id)}}">Cancel</a></tr>
                      @elseif($appointment->status=='Prescribed')
		    <td>{{"$".$appointment->price ?? "make appointment"}}</td>

                      <td class="table-success">{{$appointment->status ?? "make appointment"}}</td>
                    
                      
                      <td><div class="badge p-2 btn-outline-success">Done</div></td>
                      @endif
                      @foreach($prescription as $pres)
                      @if($appointment->status=='Prescribed')
		         
                        <thead class="w-100 thead">
                  <tr class="w-100 table-success">
                    <th scope="col">Name</th>
                    <th scope="col">Medication</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Refills</th>
                    <th scope="col">Prescription by</th>
                    <th scope="col">{{ $appointment->doctor}}</th>
                  </tr>
                </thead>


                       <tr class="table-success">
		     <td>{{$pres->name ?? "make appointment"}}</td>
                   <td>{{$pres->medication ?? "make appointment"}}</td>
                   <td>{{$pres->amount ?? "make appointment"}}</td>
                   <td>{{$pres->refills ?? "make appointment"}}</td>
                   
                  <td><div class="badge  p-2 btn-outline-success">Prescription</div></td>
                  <td></td>
                  </tr>
                  @endif
                  @break
                  
                  @break
                  @endforeach
                  @endforeach
                </tr>
              </tbody>
              </table>
           
              

        </div>

    </div>


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
