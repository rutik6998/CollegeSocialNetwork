<?php
    ob_start();
    @session_start();
    require_once("common/check_login.php");
?>

<!DOCTYPE html>
<html>
<head>
   
  <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="css/hrmsstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.js"></script> -->
   

  <!-- <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->



<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->


<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->


</head>
<body>

    <div class="wrapper_class">
        
        <header>
            <div class="logo"></div>

            <div class="notifications"></div>
        </header>
        <form method="POST" name="dept_form" id="dept_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_dept" id="edit_dept">
            <input type="hidden" name="del_dept" id="del_dept">
            
        

        <section class="sidebar">
            
            <div class="sidebar_header">
                
                <div class="user_pic">
                    
                </div><!-- User profile pic ends here -->
                     <?php require_once("common/username.php");?>
                <!-- <div class="username_status">
                    <h1>Username</h1>
                    <h4>Online</h4>
                </div> --><!-- username_status ends here -->

                <div class="clear"></div>
            </div><!-- Sidebar_header ends here -->

            <div class="sidebar_body">
                
               <?php require_once("common/hrmssidebar.php");?>
                
                <div class="clear"></div>
            </div><!-- Sidebar_body ends here -->

        </section><!-- Sidebar section ends here -->

        <section class="dashboard">
            <!-- dashboard_header start here -->
            <div class="dashboard_header">
                <h6>ADD FACULTY</h6>

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Back</a></h6> -->

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <?php

            if (isset($_POST['submit'])) 
        {
            $faclty_id= '1';
            $first_name= $_POST['first_name'];
            $middel_name= $_POST['middel_name'];
            $last_name= $_POST['last_name'];
            $department= $_POST['department'];
            $designation= $_POST['designation'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $joining_date= $_POST['joining_date'];
            $email= $_POST['email'];
            $phone= $_POST['phone'];
            $address= $_POST['address'];
            $user_type= $_POST['user_type'];

            $full_name[]=$_POST['first_name'];
            $full_name[]=$_POST['last_name'];
            $r=implode(" ",$full_name);


            // $post_image= $_POST['post_image'];
            date_default_timezone_set("Asia/Kolkata");
            $posted_date=date("Y-m-d h:i:sa");


            $imgfile = $_FILES["uploaded_file"]["name"];
                              // $validExt = array("jpg", "png", "jpeg", "bmp", "gif");
            // get the image extension
            $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
            // allowed extensions
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            // Validation for allowed extensions .in_array() function searches an array for a specific value.
            if(!in_array($extension,$allowed_extensions))
            {
                
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";

            }
            else if(!empty($_FILES['uploaded_file']))
            {
                $path = "images/faculty_images/";

                $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);



                $sql1="INSERT INTO faculty (faclty_id,faculty_first_name,faculty_middel_name,faculty_last_name,department,designation,email_id,mobile_no,address,profile_image,user_name,password,joining_date,user_type,full_name) VALUES('$faclty_id','$first_name','$middel_name','$last_name','$department','$designation','$email','$phone','$address','$imgfile','$username','$password','$joining_date','$user_type','$r')";


                $query=mysqli_query($mysqli,$sql1);
                // echo $sql1;
                $faculty_id = mysqli_insert_id($mysqli);
                $sql_extra="INSERT INTO ADMIN (faculty_id,adm_name,adm_pass,user_type) VALUES ('$faculty_id','$username','$password','$user_type')";
                $query_extra=mysqli_query($mysqli,$sql_extra);
                // echo $query_extra;
                header('location:Faculty.php');
            }
        }

            ?>

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">

                        
                        <div class="form_group">
                                <label>Profile Image</label><br>
                                <input type="file" class="form-control" name="uploaded_file" id="uploaded_file" placeholder="Select File" required=""></input>
                            </div>
                        <div class="form_group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="emp_txt" required="">
                            <span></span>
                        </div>
                        <div class="form_group">
                            <label>Middel Name</label>
                            <input type="text" name="middel_name" class="emp_txt" required="">
                            <span></span>
                        </div>

                        <div class="form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="emp_txt" required="">
                        </div>

                        <div class="form_group">
                            <label>Department</label>
                            
                            <select name="department" id="" class="emp_txt" required="required">
                                <option value="Computer">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            </select>
                        </div>


                        <div class="form_group">
                            <label>Designation</label>
                            <select name="designation" id="" class="emp_txt" required="required">
                                <option value="designation1">Designation 1</option>
                                <option value="designation2">Designation 2</option>
                                <option value="designation3">Designation 3</option>
                                <option value="designation4">Designation 4</option>
                            </select>
                        </div>



                        <div class="form_group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="emp_txt" autocomplete="off" required="">
                            <div id="status">
                                
                            </div>
                        </div>

                        <div class="form_group">
                            <label>Password</label>
                            <input type="password" name="password"  id="password" class="emp_txt" autocomplete="off" required="">
                        </div>
                        
                        <div class="form_group">
                            <label>Roll Assign</label>
                            <select name="user_type" class="emp_txt" required="required">
                                    <option value="">-- Select Roll Type --</option>
                                    <option  value="admin">Admin</option>
                                    <option value="placement_officer">Placement Officer</option>
                                    <option value="teacher">Teacher</option>
                                    
                                </select>
                        </div>
                        <div class="form_group">
                            <label>Joining Date</label>
                            <input type="Date" name="joining_date" class="emp_txt" style="height: 18px;" required="">
                        </div>

                        <div class="form_group">
                            <label>Email</label>
                            <input type="email" name="email" class="emp_txt" required="">
                        </div>

                        <div class="form_group">
                            <label>Phone</label>
                            <input type="text" maxlength="10" pattern="\d{10}" name="phone" class="emp_txt" required="">
                        </div>

                        <div class="form_group">
                            <label>Address</label>
                            <textarea name="address" class="emp_txt2" required=""></textarea>
                        </div> 

        
                        <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Add Faculty" class="emp_btn2">
                        </div>
                    </form>
                    


                    
                    <div class="clear"></div>                   
                </div><!-- dashboard_body_wrapper ends here -->
                
                <div class="clear"></div>
            </div><!-- dashboard_body ends here -->

            <!-- <?php// require_once("common/footer.php")?> -->

            <div class="clear"></div>
        </section><!-- Dashboard section ends here -->

        <!-- <footer>
            
        </footer> -->

        <div class="clear"></div>
        </form>
    </div><!-- Wrapper class ends here -->
</body>
</html>
