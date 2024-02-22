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
                
               <?php require_once("common/student_sidebar.php");?>
                
                <div class="clear"></div>
            </div><!-- Sidebar_body ends here -->

        </section><!-- Sidebar section ends here -->
        <?php
              $stud_id=$_SESSION['student_id'];
            
            if(isset($_POST['submit']))
            {
                $first_name=$_POST['std_first_name'];
                $middel_name=$_POST['std_middel_name'];
                $last_name=$_POST['std_last_name'];
                $std_unique_id=$_POST['std_unique_id'];
                $dob=$_POST['dob'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $phone=$_POST['std_mobile_no'];
                $address=$_POST['std_address'];

                $student_id=$_SESSION['student_id'];
                // $department=$_POST['department'];
                // $ssc_per=$_POST['ssc_per'];
                // $hsc_per=$_POST['hsc_per'];
                // $gradu_per=$_POST['gradu_per'];
                // $history_backlog=$_POST['history_backlog'];
                // $current_backlog=$_POST['current_backlog'];
                
                

                $full_name[]=$_POST['std_first_name'];
                $full_name[]=$_POST['std_last_name'];
                $r=implode(" ",$full_name);


                if (!empty($_FILES['uploaded_file']['name'])) 
                {
                   
                
                // $uploaded_file=$File['uploaded_file'];
                $imgfile = $_FILES["uploaded_file"]["name"];
                // $validExt = array("jpg", "png", "jpeg", "bmp", "gif");
                // get the image extension
                $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
                // echo $extension;
                // allowed extensions
                $allowed_extensions = array(".jpg","jpeg",".png",".JPG",".JPEG",".PNG");
                // Validation for allowed extensions .in_array() function searches an array for a specific value.
                if(!in_array($extension,$allowed_extensions))
                {
                    
                    echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";

                }
             
                 else
                {
                   
                    $path = "images/student_profile/";

                    $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);
                 
                 $sql="INSERT INTO student_approvle (student_id,std_unique_id,std_first_name,std_middel_name,std_last_name,std_dob,std_emai_id,std_mobile_no,std_address,std_profile_img,std_user_name,std_password,full_name)VALUES('$student_id','$std_unique_id','$first_name','$middel_name','$last_name','$dob','$email','$phone','$address','$imgfile','$username','$password','$r')" ; 
                 $query=mysqli_query($mysqli,$sql);
                 // echo  $sql;
                 if($query)
                    {
                        $msg="insert"; 
                    }

                }
            }
                else
                {

                    $sql="INSERT INTO student_approvle (student_id,std_unique_id,std_first_name,std_middel_name,std_last_name,std_dob,std_emai_id,std_mobile_no,std_address,std_user_name,std_password,full_name)VALUES('$student_id','$std_unique_id','$first_name','$middel_name','$last_name','$dob','$email','$phone','$address','$username','$password','$r')" ;
                 $query=mysqli_query($mysqli,$sql);
                 // echo  $sql;
                 if($query)
                    {
                        $msg="insert"; 
                    }

                 // $sql_extra="UPDATE admin SET adm_name='$username',adm_pass='$password',user_type='student' WHERE adm_id='$stud_id'";
                // $query_extra=mysqli_query($mysqli,$sql_extra);
                // echo $query_extra;
                }

            }
            

        ?>



        <section class="dashboard">
            <!-- dashboard_header start here -->
            <!-- <div class="dashboard_header"> -->
                <!-- <h6>Department</h6> -->

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Add Department </a></h6> -->

                <!-- <div class="clear"></div> -->
            <!-- </div> -->
            <!-- dashboard_header ends here -->
            <div class="dashboard_header">
                <h6>STUDENT DETAILS</h6>           

                <div class="clear"></div>
            </div><!-- dashboard_header ends here -->
            <?php
                    $sql_notif="SELECT * FROM notification ORDER BY noti_id DESC";
                    $query_notif=mysqli_query($mysqli,$sql_notif);
                    $row_notif=mysqli_fetch_array($query_notif);

            ?>
           <marquee onmouseover="this.stop();" onmouseout="this.start();" width=100% height=4%><span style="color:blue"> New Notification</span>:- <a href="Student_Notification.php"><?php echo $row_notif['notification']?></a></marquee>

            <div class="btn_wrapper">
                <?php
                    if(isset($msg))
                {?>
                        <span style="color: green;">Inserted Successfully For Approval</span>
                <?php   
                    }
                    if(isset($msg1))
                {?>
                        <span style="color: green;">Updated Successfully</span>
                <?php   
                    } 
                ?>
                
            </div>
            <?php
                     $stud_id=$_SESSION['student_id'];
                    require_once("configadmin.php");
                    $sql="SELECT * FROM student WHERE student_id='$stud_id'";
                    // echo $sql1;
                    // $query=mysqli_query($mysqli,$sql);
                    $query=mysqli_query($mysqli,$sql);
                    $row=mysqli_fetch_array($query);
            ?>

            <div class="dashboard_body">                        
                <!-- dashboard_body_wrapper start here -->
                            <div class="dashboard_body_wrapper">

                    <div class="prof_img_Links">
                        
                        <div class="prof_img">
                            <img src="images/student_profile/<?php echo $row['std_profile_img'];?>" width="100%">
                        </div><!-- prof_img ends here -->

                        <!-- <div class="prof_links">
                            <ul class="tab">
                                <li class="tablinks" onclick="openCity(event, 'b_info')" id="defaultOpen">Employee Information</li>
                                <li class="tablinks" onclick="openCity(event, 'p_info')" id="defaultOpen">Personal Information</li>
                                <li class="tablinks" onclick="openCity(event, 'c_info')">Contact Information</li>

                                <li class="tablinks" onclick="openCity(event, 'pr_info')">Professional Information</li>
                                <li class="tablinks" onclick="openCity(event, 'bank_info')">Bank Information</li>

                                <li class="tablinks" onclick="openCity(event, 'performance')">Performance</li>
                            </ul>
                        </div> -->
                        <!-- prof_links ends here -->

                        <div class="clear"></div>
                    </div><!-- prof_img_links ends here -->

                    <div class="prof_details">

                        <!--  -->
                        <div id="b_info" class="tabcontent">
                            <form action="" method="POST">
                                <!-- <div class="form_group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" readonly="" value="<?php //echo $row['full_name'];?>" class="emp_txt">
                                </div> -->
                                <div class="form_group">
                                    <label>First Name</label>
                                    <input type="text" name="std_first_name" class="emp_txt" <?php if($row['std_first_name']!="") { ?>value="<?php echo $row['std_first_name'];?>" <?php } ?> required="">
                                </div>
                                
                                <div class="form_group">
                                    <label>Middel Name</label>
                                    <input type="text" name="std_middel_name" class="emp_txt" <?php if($row['std_middel_name']!="") { ?>value="<?php echo $row['std_middel_name'];?>" <?php } ?> required="">
                                </div>
                                <div class="form_group">
                                    <label>Last Name</label>
                                    <input type="text" name="std_last_name" class="emp_txt" <?php if($row['std_last_name']!="") { ?>value="<?php echo $row['std_last_name'];?>" <?php } ?> required="">
                                </div>

                                <div class="form_group">
                                    <label>Student unique id</label>
                                    <input type="text" name="std_unique_id" readonly="" value="<?php echo $row['std_unique_id'];?>" class="emp_txt" required="">
                                </div>

                                <div class="form_group">
                                    <label>Email ID</label>
                                    <input type="email" name="email" required="" class="emp_txt"<?php if($row['std_emai_id']!="") { ?>value="<?php echo $row['std_emai_id'];?>"<?php } ?>>
                                    
                                </div>
                                <div class="form_group">
                                    <label>Date Of Birth </label>
                                    <input type="date" name="dob" class="emp_txt" required="" <?php if($row['std_dob']!="") { ?>value="<?php echo $row['std_dob'];?>"<?php } ?>>
                                </div>
                                <div class="form_group">
                                    <label>Mobile No</label>
                                    <input type="text" name="std_mobile_no" class="emp_txt" <?php if($row['std_mobile_no']!="") { ?>value="<?php echo $row['std_mobile_no'];?>"<?php } ?>>
                                </div>

                                <div class="form_group">
                                    <label>Profile Image </label>
                                    <input type="file" name="uploaded_file" class="emp_txt">
                                </div>


                                <div class="form_group">
                                <label>Username</label>
                                    <input type="text"name="username" id="username" class="emp_txt" autocomplete="off" <?php if($row['std_user_name']!="") { ?>value="<?php echo $row['std_user_name'];?>"<?php } ?>>
                                    <div id="status">
                                        
                                    </div>
                                </div>

                                <div class="form_group">
                                    <label>Password</label>
                                    <input type="text" name="password"  id="password" class="emp_txt" autocomplete="off" <?php if($row['std_password']!="") { ?>value="<?php echo $row['std_password'];?>"<?php } ?>>
                                </div>

                                
                                <div class="form_group">
                                    <label>Address</label>
                                    <textarea class="emp_area" name="std_address" required="">
                                        <?php if($row['std_address']!="") { echo $row['std_address']; } ?></textarea>
                                </div>

                                

                                <div class="btn_wrapper">
                                    <input type="submit" name="submit" value="Update" class="emp_btn2">
                                </div>
                                
                            </form>
                        </div>
                <!-- dashboard_body_wrapper ends here -->
                
                <div class="clear"></div>
            </div><!-- dashboard_body ends here -->

            <!-- <?php// require_once("common/footer.php")?> -->

            <div class="clear"></div>
        </section><!-- Dashboard section ends here -->

        <!-- <footer>
            <p><a href=""></a> </p>
        </footer> -->

        <div class="clear"></div>
        </form>
    </div><!-- Wrapper class ends here -->
</body>
</html>
