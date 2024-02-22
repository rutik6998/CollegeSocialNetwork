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
                
               <?php require_once("common/hrmssidebar.php")?>
                
                <div class="clear"></div>
            </div><!-- Sidebar_body ends here -->

        </section><!-- Sidebar section ends here -->
        <?php
                    $faculty_id=$_SESSION['faculty_id'];
                    require_once("configadmin.php");
                    $sql="SELECT * FROM faculty WHERE faculty_id='$faculty_id'";
                    // echo $sql1;
                    // $query=mysqli_query($mysqli,$sql);
                    $query=mysqli_query($mysqli,$sql);
                    $row=mysqli_fetch_array($query);
            ?>

        <section class="dashboard">
            <!-- dashboard_header start here -->
            <div class="dashboard_header">
                <h6>PLACEMENT PROFILE</h6>

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Add Department </a></h6> -->

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <div class="prof_img_Links">
                        
                        <div class="prof_img">
                            <img src="images/faculty_images/<?php echo $row['profile_image'];?>" width="100%">
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
                    <div id="b_info" class="tabcontent">
                    <form action="" method="POST" id="myform" name="myform">

                        <div class="form_group">
                            <label>First Name</label>
                            <input type="text" name="first_name" readonly="" class="emp_txt"<?php if($row['faculty_first_name']!="") { ?>value="<?php echo $row['faculty_first_name'];?>" <?php } ?> >
                            <span></span>
                        </div>

                        <div class="form_group">
                            <label>Middel Name</label>
                            <input type="text" name="last_name" readonly="" class="emp_txt"<?php if($row['faculty_middel_name']!="") { ?>value="<?php echo $row['faculty_middel_name'];?>" <?php } ?> >
                        </div>

                        <div class="form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" readonly="" class="emp_txt"<?php if($row['faculty_last_name']!="") { ?>value="<?php echo $row['faculty_last_name'];?>" <?php } ?> >
                        </div>

                        <div class="form_group">
                            <label>Mobile No</label>
                            <input type="text" maxlength="10" readonly="" pattern="\d{10}" name="phone" class="emp_txt"<?php if($row['mobile_no']!="") { ?>value="<?php echo $row['mobile_no'];?>" <?php } ?> >
                        </div>

                        

                        <div class="form_group">
                            <label>Email</label>
                            <input type="email" name="email" readonly="" class="emp_txt"<?php if($row['email_id']!="") { ?>value="<?php echo $row['email_id'];?>" <?php } ?> >
                        </div>

                        <div class="form_group">
                            <label>Department</label>
                            <input type="text" name="department" readonly="" class="emp_txt"<?php if($row['department']!="") { ?>value="<?php echo $row['department'];?>" <?php } ?> >
                        </div>

                        <div class="form_group">
                            <label>Designation</label>
                            <input readonly="" type="text" name="designation" readonly="" class="emp_txt"<?php if($row['designation']!="") { ?>value="<?php echo $row['designation'];?>" <?php } ?> >
                        </div>

                        <div class="form_group">
                            <label>Address</label>
                            <!-- <input type="text" > -->
                            <textarea readonly="" name="Address" class="emp_txt"><?php if($row['address']!="") {  echo $row['address']; } ?> </textarea>
                        </div>

                        <!-- <div class="form_group">
                            <label>Username</label>
                            <input type="text"name="username" id="username" class="emp_txt" autocomplete="off">
                            <div id="status">
                                
                            </div>
                        </div>
                        <div class="form_group">
                            <label>Password</label>
                            <input type="password" name="password"  id="password" class="emp_txt" autocomplete="off">
                        </div>

                        <div class="form_group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="emp_txt" autocomplete="off">
                        </div> -->

                        <!-- <div class="form_group">
                            <label>Employee ID</label>
                            <input type="text" name="emp_id" id="emp_id" class="emp_txt" autocomplete="off">
                            <div id="status2">
                                
                            </div>
                        </div> -->

                        <div class="form_group">
                            <label>Joining Date</label>
                            <input type="Date" name="joining_date" class="emp_txt" readonly="" style="height: 18px;" <?php if($row['joining_date']!="") { ?>value="<?php echo $row['joining_date'];?>" <?php } ?> >
                        </div>
        
                        <!-- <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Create Employee" class="emp_btn">
                        </div> -->
                    </form>
                </div>
                    


                    
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
