<?php
  ob_start();
  @session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/loginnew.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <title>COLLEGE NETWORK</title>
<?php
        include("configadmin.php");
        if(isset($_POST["admlogin"]))
        {
              $admname=$_POST["admname"];
              $admpass=$_POST["admpass"];

              $qry = "SELECT * FROM faculty where user_name='$admname' and password='$admpass'";
              // echo $qry;
              
              $query= mysqli_query($mysqli,$qry);
              if($row=mysqli_fetch_array($query))
              {     
                  // $id=$row['adm_id'];
                  // $_SESSION['id']=$id;

                  // $student_id=$row['stud_id'];
                  // $_SESSION['student_id']=$student_id;
                  
                  $faculty_id=$row['faculty_id'];
                  $_SESSION['faculty_id']=$faculty_id;
                  
                  $_SESSION['username']=$row['faculty_first_name'];
                  $_SESSION['adm_name']=$row['full_name'];
                  
                  if($row['user_type'] == "admin")
                  {
                    header("Location:index.php");
                    $_SESSION['show']="ad";
                  }
                  // elseif ($row['user_type'] == "student") 
                  // {

                    // $_SESSION['employee_date']=date('Y-m-d H:i:s');

                    // header("Location:Dashbord.php");
                  // }
                  elseif ($row['user_type'] == "placement_officer") 
                  {

                    header("Location:Notification.php");
                  }
                  elseif ($row['user_type'] == "teacher")
                  {

                    header("Location:Staff_Teacher.php");
                  }

                  ?>
                 <!--  <script type="text/javascript">
                    // alert("login");
                    <?php //header("Location:index.php");?>
                  </script>
 -->                  <?php

              }
              else
              {

        ?>
                   <script type="text/javascript">
                     alert("Envalid user");


                   </script>
        <?php
              }
        }
?>
</head>
<body>
   
 <div class="login-page">
  <div class="form">
    <!-- <form > -->

      <!-- <form method="post" action="" class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->
    
       <form method="post" action="" class="login-form">
        <div class="loginbaslik">LOGIN</div>
            <hr class="line_hr">

      <input type="text"  name="admname" required="" placeholder="username"/>
      <input type="password" name="admpass" required="" placeholder="password"/>
      <!-- <button>login</button> -->
      <input class="btn" type="submit" name="admlogin" id="admlogin" value="Login"></a>
      <a href="Student_Login.php">For Student Login</a>
      <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>

    
  </div>
</div>



</body>
</html>

<script type="text/javascript">
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>