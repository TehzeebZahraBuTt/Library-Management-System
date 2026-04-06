<?php  
$res=0;

if(isset($_POST['signup'])){

    $conn=mysqli_connect("localhost","root","","db_lms");
    extract($_POST);
    $sql="insert into users(user_name,user_email,user_password,user_role) values('$name','$email','$password','$roles')";
    $res=mysqli_query($conn,$sql);
    header("location:user-login.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

</head>
<body>

    <div class="container " style="margin-top: 50px;">
       
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                 <!-- ============ -->
         <?php if($res==1){ ?>         
        <div class="alert alert-success alert-dismissible fade show" role="alert" >
        <strong>Congratulations!</strong> You have successfully registered.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php }  ?>
         <!-- ============ -->
          

                <div class="signup-content">
                    <div class="signup-form">
                    <div style="
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
    position: relative;
" id="alert">
    <strong>Warning!</strong> This Email Already Exists.
    <button onclick="this.parentElement.style.display='none'" style="
        position: absolute;
        top: 10px;
        right: 15px;
        background: none;
        border: none;
        font-size: 20px;
        line-height: 20px;
        color: #856404;
        cursor: pointer;
    ">&times;</button>
</div>
                        <h2 class="form-title">Sign up</h2>
                        

                        <!-- ================ -->
                       



                        <!-- ============== -->
                       
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="re_pass" id="re_pass" placeholder="Select your Role" readonly/>
                            </div>
                            <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roles" id="exampleRadios1" value="Librarian" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Librarian
                                      </label>
                                  </div>
                            </div>
                            <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roles" id="exampleRadios1" value="Member" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Member
                                      </label>
                                  </div>
                            </div>
                            <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="roles" id="exampleRadios1" value="Admin" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Admin
                                      </label>
                                  </div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="user-login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
       

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Add this in your <head> or just before </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script type="text/javascript">
       $(document).ready(function(){
        $("#alert").hide();
          $("#email").blur(function(){
            var email = $("#email").val();
 
               $.ajax({
                url:"SignUpAjax.php",
                type:"POST",
                data:{type:"match",email:email},
                success:function(result){
                  console.log(result);
                  if (result) {
                    $("#alert").show();
                  }
                  
                }
               })
          })

       })
     </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>