<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login & Signup</title>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

*{margin:0;padding:0;box-sizing:border-box;font-family:"Poppins",sans-serif;}

body{
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
background-image:url(https://plus.unsplash.com/premium_photo-1674572257880-bdca9f92d070?q=80&w=1932&auto=format&fit=crop);
background-size:cover;
}

.wrapper{
position:relative;
max-width:470px;
width:100%;
border-radius:12px;
padding:20px 30px 120px;
background:#4070f4;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
overflow:hidden;
}

/* Message box */
.alert{
background:#fff;
padding:10px;
border-radius:6px;
margin-bottom:15px;
font-size:14px;
text-align:center;
}
.alert.error{border-left:5px solid red;}
.alert.success{border-left:5px solid green;}

.form.login{
position:absolute;
left:50%;
bottom:-86%;
transform:translateX(-50%);
width:calc(100% + 220px);
padding:20px 140px;
border-radius:50%;
height:100%;
background:#fff;
transition:0.6s ease;
}

.wrapper.active .form.login{
bottom:-15%;
border-radius:35%;
}

.form header{
font-size:30px;
text-align:center;
color:#fff;
font-weight:600;
cursor:pointer;
}

.form.login header{color:#333;}
.wrapper.active .signup header{opacity:1;} /* Never hide signup */

.wrapper form{
display:flex;
flex-direction:column;
gap:20px;
margin-top:40px;
}

form input{
height:50px;
border:none;
padding:0 15px;
font-size:16px;
border-radius:8px;
}

.form.login input{border:1px solid #aaa;}

form input[type="submit"]{
background:#4070f4;
color:#fff;
cursor:pointer;
font-weight:500;
}

</style>
</head>

<body>

<section class="wrapper">

<?php if(isset($_SESSION['error'])): ?>
<div class="alert error">
<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php endif; ?>

<?php if(isset($_SESSION['success'])): ?>
<div class="alert success">
<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
</div>
<?php endif; ?>

<div class="formsignup">
<header>Signup</header>
<form action="registration.php" method="post">
<input type="text" placeholder="Full name" name="username" required>
<input type="email" placeholder="Email address" name="email" required>
<input type="password" placeholder="Password" name="password" required>
<input type="submit" value="Signup">
</form>
</div>

<div class="form login">
<header>Login</header>
<form action="login.php" method="post">
<input type="email" placeholder="Email address" name="email" required>
<input type="password" placeholder="Password" name="password" required>
<input type="submit" value="Login">
</form>
</div>

</section>

<script>
const wrapper=document.querySelector(".wrapper");
const signupHeader=document.querySelector(".signup header");
const loginHeader=document.querySelector(".login header");

loginHeader.addEventListener("click",()=>wrapper.classList.add("active"));
signupHeader.addEventListener("click",()=>wrapper.classList.remove("active"));

<?php if(isset($_SESSION['form_type'])): ?>
    <?php if($_SESSION['form_type']=="login"): ?>
        wrapper.classList.add("active");
    <?php else: ?>
        wrapper.classList.remove("active");
    <?php endif; ?>
<?php unset($_SESSION['form_type']); endif; ?>
</script>

</body>
</html>
