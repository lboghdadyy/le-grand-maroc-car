<?
include('connection.php');
include('assets/php/application/check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/icon" href="assets/logo/Red & White Minimalist Automotive Car Logo (2).png" />
  <title>Le Grand Maroc Car</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <link rel="stylesheet" href="assets/css/master.css">
  <style>
    body {
      font-family: 'Open Sans';
      font-weight: 100;
      display: flex;
      overflow: hidden;
      background: url(../images/welcome-hero/wallpaper.png);
      background-position: center;
      background-size: cover;
      background-position-x: -300px;


    }

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
    @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

    body,
    html {
      height: 100%;
    }


    input {

      ::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.7);
      }

      ::-moz-placeholder {
        color: rgba(255, 255, 255, 0.7);
      }

      :-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.7);
      }

      &:focus {
        outline: 0 transparent solid;

        ::-webkit-input-placeholder {
          color: rgba(0, 0, 0, 0.7);
        }

        ::-moz-placeholder {
          color: rgba(0, 0, 0, 0.7);
        }

        :-ms-input-placeholder {
          color: rgba(0, 0, 0, 0.7);
        }
      }
    }


    .login-text {
      background: hsl(40, 30, 60);
      border-bottom: .5rem solid white;
      color: white;
      font-size: 1.5rem;
      margin: 0 auto;
      max-width: 50%;
      padding: .5rem;
      text-align: center;
      text-shadow: 1px -1px 0 rgba(0, 0, 0, 0.3);

      .fa-stack-1x {
        color: black;
      }
    }

    .login-username,
    .login-password {
      background: #fff;
      border: 0 solid;
      border-bottom: 1px solid rgba(white, .5);
      color: white;
      width: 300px;
      display: block;
      margin: 1rem;
      padding: .5rem;
      transition: 250ms background ease-in;
      width: calc(100% - 3rem);

      &:focus {
        background: white;
        color: black;
        transition: 250ms background ease-in;
      }
    }

    .login-forgot-pass {
      border-bottom: 1px solid white;
      bottom: 0;
      color: white;
      cursor: pointer;
      display: block;
      font-size: 75%;
      left: 0;
      opacity: 0.6;
      padding: .5rem;
      position: absolute;
      text-align: center;
      text-decoration: none;
      width: 100%;

      &:hover {
        opacity: 1;
      }
    }

    .login-submit {
      border: 1px solid white;
      background: transparent;
      color: white;
      display: block;
      width: 200px;
      height: 40px;
      margin: 1rem auto;
      min-width: 1px;
      padding: .25rem;
      transition: 250ms background ease-in;

      &:hover,
      &:focus {
        background: white;
        color: black;
        transition: 250ms background ease-in;
      }
    }





    .underlay-photo {
      animation: hue-rotate 6s infinite;
      background: url('https://31.media.tumblr.com/41c01e3f366d61793e5a3df70e46b462/tumblr_n4vc8sDHsd1st5lhmo1_1280.jpg');
      background-size: cover;
      -webkit-filter: grayscale(30%);
      z-index: -1;
    }

    .underlay-black {
      background: rgba(0, 0, 0, 0.7);
      z-index: -1;
    }

    @keyframes hue-rotate {
      from {
        -webkit-filter: grayscale(30%) hue-rotate(0deg);
      }

      to {
        -webkit-filter: grayscale(30%) hue-rotate(360deg);
      }
    }

    .login-form {

      background-color: #FF6666;
      box-shadow: 0 0 1rem rgba(0, 0, 0, 0.3);
      min-height: 10rem;
      height: 300px;
      width: 450PX;
      margin: auto;
      padding: .5rem;
      border-radius: 20PX;
      box-shadow: 10px #000;

    }
  </style>
</head>

<body>



  <form class="login-form" method="post">
    <p class="login-text">
      <span class="fa-stack fa-lg">
        <i class='bx bx-user'></i>
      </span>
    </p>
    <input type="text" name="useremail" class="login-username" autofocus="true" required="true" placeholder="Username" />
    <input type="password" name="password" class="login-password" required="true" placeholder="Password" />
    <input type="submit" name="Login" value="Login" class="login-submit" />
    <input type="button" onclick="window.location.href='sign_up.php'" class="login-submit" value="Register" />
  </form>
</body>

</html>