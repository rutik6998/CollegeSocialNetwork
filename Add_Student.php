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

        <?php
            if(isset($_POST['submit']))
            {
                $first_name=$_POST['first_name'];
                $middel_name=$_POST['middel_name'];
                $last_name=$_POST['last_name'];
                $std_unique_id=$_POST['std_unique_id'];
                $dob=$_POST['dob'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                
                $department=$_POST['department'];
                $ssc_per=$_POST['ssc_per'];
                $hsc_per=$_POST['hsc_per'];
                $gradu_per=$_POST['gradu_per'];
                $history_backlog=$_POST['history_backlog'];
                $current_backlog=$_POST['current_backlog'];
                $address=$_POST['address'];
                

                $full_name[]=$_POST['first_name'];
                $full_name[]=$_POST['last_name'];
                $r=implode(" ",$full_name);

                // $uploaded_file=$File['uploaded_file'];
                $imgfile = $_FILES["uploaded_file"]["name"];
             
                 if(!empty($_FILES['uploaded_file']))
                {
                    $path = "images/student_profile/";

                    $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);
                 
                 $sql="INSERT INTO student (std_unique_id,std_first_name,std_middel_name,std_last_name,std_dob,std_emai_id,std_mobile_no,std_address,std_profile_img,std_user_name,std_password,department,SSC_Percentage,HSC_Percentage,Graduation_Percentage,History_of_Backlog,Current_Backlog,full_name)VALUES('$std_unique_id','$first_name','$middel_name','$last_name','$dob','$email','$phone','$address','$imgfile','$username','$password','$department','$ssc_per','$hsc_per','$gradu_per','$history_backlog','$current_backlog','$r')" ; 
                 $query=mysqli_query($mysqli,$sql);
                 // echo  $sql;
                $stud_id = mysqli_insert_id($mysqli);
                 $sql_extra="INSERT INTO ADMIN (stud_id,adm_name,adm_pass,user_type) VALUES ('$stud_id','$username','$password','student')";
                $query_extra=mysqli_query($mysqli,$sql_extra);
                // echo $query_extra;
                header("Location:Student.php");
                
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

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">
                        <h4 style="border-bottom: 3px solid blue;">Personal Details</h4>
                        <div class="form_group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="emp_txt">
                            <span></span>
                        </div>
                        <div class="form_group">
                            <label>Middel Name</label>
                            <input type="text" name="middel_name" class="emp_txt">
                        </div>

                        <div class="form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="emp_txt">
                        </div>

                        <div class="form_group">
                            <label>Student unique id</label>
                            <input type="text" name="std_unique_id" class="emp_txt" required="">
                        </div>

                        <div class="form_group">
                            <label>Date Of Birth</label>
                            <input type="Date" name="dob" class="emp_txt" style="height: 18px;">
                        </div>
                        <div class="form_group">
                            <label>Email</label>
                            <input type="email" name="email" class="emp_txt">
                        </div>

                        <div class="form_group">
                            <label>Username</label>
                            <input type="text"name="username" id="username" class="emp_txt" autocomplete="off">
                            <div id="status">
                                
                            </div>
                        </div>

                        <div class="form_group">
                            <label>Password</label>
                            <input type="text" name="password"  id="password" class="emp_txt" autocomplete="off">
                        </div>

                        

                        <!-- <div class="form_group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="emp_txt" autocomplete="off">
                        </div> -->
                        <div class="form_group">
                            <label>Phone</label>
                            <input type="text" maxlength="10" pattern="\d{10}" name="phone" class="emp_txt">
                        </div>

                        <div class="form_group">
                                <label>Profile Image</label><br>
                                <input type="file" class="form-control" name="uploaded_file" id="uploaded_file" placeholder="Select File"></input>
                        </div>

                        <div class="form_group">
                            <label>Address</label>
                            <textarea name="address" class="emp_txt2"></textarea>
                        </div>
                        <div class="form_group">
                            <label></label>
                            <input type="hidden" name="">
                        </div>

                        
                        <h4 style="border-bottom: 3px solid blue;">Education Details</h4>
                        
                        <div class="form_group">
                            <label>Department</label>
                            
                            <select name="department" id="" class="emp_txt">
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
                            <label>SSC Percentage</label>
                            <input type="text" name="ssc_per" class="emp_txt">
                        </div>
                        <div class="form_group">
                            <label>HSC Percentage</label>
                            <input type="text" name="hsc_per" class="emp_txt">
                        </div>
                        <div class="form_group">
                            <label>Graduation Percentage</label>
                            <input type="text" name="gradu_per" class="emp_txt">
                        </div>
                        <div class="form_group">
                            <label>History of Backlog</label>
                            
                            <select name="history_backlog" id="" class="emp_txt">
                                <option value="0">--Select Backlogs--</option>
                                <option value="1">1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                            </select>
                        </div>
                        <div class="form_group">
                            <label>Current Backlog</label>
                            
                            <select name="current_backlog" id="" class="emp_txt">
                                <option value="0">--Select Backlogs--</option>
                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                            </select>
                        </div>


                        <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Save" class="emp_btn2">
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
