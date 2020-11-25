<!DOCTYPE html>
<html>
<head>
  <title>Login / Register Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/login/style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="assets/plugins/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body>
<div class="login-page">
  <div class="form">
    <h1 id="login_header">Login / Register Page</h1>
    <form id="form_register" class="register-form" method="POST" action="do/register.php">
      <input type="text" name="register_name" id="name" value="" placeholder="name"/>
      <input type="text" name="register_email" id="email" value="" placeholder="email address"/>
      <input type="password" name="register_password" id="password" value="" placeholder="password"/>
      <button type="button" id="btn_register">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form id="form_login" class="login-form" method="POST" action="do/login.php">
      <input type="text" name="login_email" id="login_email" value="" placeholder="email"/>
      <input type="password" name="login_password" id="login_password" value="" placeholder="password"/>
      <button type="button" id="btn_login">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
<script type="text/javascript" src="assets/login/script.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript">
$("#btn_register").click(function(){
  if($.trim($("#name").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Nama Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#email").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Email Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#password").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Password Harus di isi',
      icon: 'error',
    });
  }else{
    $('#form_register').submit();
  }
});
$("#btn_login").click(function(){
  if($.trim($("#login_email").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Email Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#login_password").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Password Harus di isi',
      icon: 'error',
    });
  }else{
    $('#form_login').submit();
  }
});
</script>
</body>
</html>