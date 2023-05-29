<div class="page-section">
  <div class="container">
    <h1 id='appoint'class="text-center wow fadeInUp">Make an Appointment</h1>
    
    <form class="main-form" action="{{url('appointment')}}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5 ">
      <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
        <label for="name">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="date">Pick appointment date</label>
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="doctor">Choose Your Doctor</label>
            <select name="doctor" id="departement" class="custom-select">
              <option >--Select doctor</option>
              @foreach($doctors as $doctor)
              @if ($doctor->user_id != '--Select doctor' )
              <option >{{$doctor->name}} -Dep- {{$doctor->department}} $100</option>
              @endif
              @endforeach
            </select>
          </div>
          
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" required
            placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="message">Kindly detail your request </label>
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
        @if(Route::has('login'))
        @auth
        <button type="submit" style="  background-color: #6bdd9f;" class="btn  mt-3 wow zoomIn">Submit Request</button>
        @else
        <li>
        <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login </a>
  </li>
  <li class="nav-item">
      <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}"> Register</a>
  </li>
  @endauth
  @endif
      </form>
    </div>
  </div> 