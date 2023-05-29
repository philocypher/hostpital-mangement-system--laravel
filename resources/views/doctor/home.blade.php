
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('doctor.css')
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      @include('doctor.sidebar')
      <!-- partial -->
      @include('doctor.navbar')
        <!-- partial -->

        {{-- @include('doctor.body') --}}
     @include('doctor.profile')


    <!-- container-scroller -->
    @include('doctor.script')
  </body>
</html>
