<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('hrdepartment/css/sidebar.css')}}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-menu'></i>
      <span class="logo_name">Aeternitas Payroll</span>
    </div>
    <ul class="nav-links">
      <li class="nav-item">
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard">Dashboard</a></li>
        </ul>
      </li>


      <li class="nav-item ">
        <div class="iocn-link">
          <a href="{{ url('/aeternitas/employee') }}">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Employee List</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ url('/aeternitas/employee') }}">Employee List</a></li>

        </ul>
      </li>

     <li class="nav-item ">
        <div class="iocn-link">
          <a href="{{ url('/aeternitas/department') }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Department List</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ url('/aeternitas/department') }}">Department List</a></li>

        </ul>
      </li>

      <li class="nav-item ">
        <div class="iocn-link">
          <a href="{{ url('#') }}">
            <i class='bx bx-history' ></i>
            <span class="link_name">Position List</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ url('/aeternitas/position') }}">Position List</a></li>

        </ul>
      </li>

 {{--
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-car-mechanic' ></i>
            <span class="link_name">Services</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Services</a></li>
          <li><a href="#">Add Services</a></li>
          <li><a href="#">View Services</a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">Schedules</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Schedules</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#"> <!-- Using the named route here -->
            <i class='bx bx-history'></i>
            <span class="link_name">Shop Schedules</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Shop Schedules</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Payment Methods</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Payment Methods</a></li>
          <li><a href="#">Paypal</a></li>
          <li><a href="#">Gcash(In development)</a></li>
        </ul>
      </li>
      <li> --}}
        <div class="profile-details">
            <div class="profile-content">
                <!-- Optionally include an image here -->
                <!-- <img src="image/profile.jpg" alt="profileImg"> -->
            </div>
            <div class="name-job">
                <div class="job">{{ Auth::user()->name }}</div>
            </div>

            <!-- Logout Icon wrapped in an anchor that triggers the logout form submission -->
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
            </a>
        </div>

        <!-- Hidden form for logout POST request -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
  </li>
</ul>
  </div>



  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>
