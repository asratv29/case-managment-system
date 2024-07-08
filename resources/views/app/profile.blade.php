
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome Icons CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">
    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/registration.css') }}">
   
    <title>Profile Dropdown Menu | upCoding</title>
  </head>
  <body>
    <nav class="navbar">
        <div class="profile-dropdown">
            <div class="profile-dropdown-btn" onclick="toggle()">
                <div class="profile-img">
                    <i class="fa-solid fa-circle"></i>
                </div>
                <span>
                    Victoria
                    <i class="fa-solid fa-angle"></i>
                </span>
            </div>

            <ul class="profile-dropdown-list">
                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-regular fa-user"></i>
                        Edit Profile
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-regular fa-envelope"></i>
                        Inbox
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-chart-line"></i>
                        Analytics
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-sliders"></i>
                        Setting
                    </a>
                </li>

                <hr />

                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="{{ asset('asset/js/profile.js') }}"></script>
  </body>
</html>
