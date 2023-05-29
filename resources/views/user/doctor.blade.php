
  <div id="docs"class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach ($doctors as $doctor)
            
        
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="250px" width="300px" src="/storage/{{$doctor->image}}" alt="">
             
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$doctor->name}}</p>
              <span class="text-sm text-grey">{{$doctor->department}}</span>
            </div>
          </div>
        </div>
        @endforeach

        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets/img/doctors/doctor_2.jpg" alt="">
             
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Alexa Melvin</p>
              <span class="text-sm text-grey">Dental</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
