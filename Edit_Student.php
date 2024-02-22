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
        <form method="POST" name="student_form" id="student_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_student1" id="edit_student1" value="<?php echo $_POST['edit_student1'];?>">
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
             // $stud_id=$_SESSION['student_id'];
            if (isset($_POST['edit_student1']))
            {
                  $stud_id=$_POST['edit_student1'];
            }
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


                if (!empty($_FILES['uploaded_file']['name'])) 
                {
                   
                
                // $uploaded_file=$File['uploaded_file'];
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
             
                 else
                {
                   
                    $path = "images/student_profile/";

                    $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);
                 
                 $sql="UPDATE student SET std_unique_id='$std_unique_id' ,std_first_name='$first_name',std_middel_name='$middel_name',std_last_name='$last_name',std_dob='$dob',std_emai_id='$email',std_mobile_no='$phone',std_address='$address',std_profile_img='$imgfile',std_user_name='$username',std_password='$password',department='$department',SSC_Percentage='$ssc_per',HSC_Percentage='$hsc_per',Graduation_Percentage='$gradu_per',History_of_Backlog='$history_backlog',Current_Backlog='$current_backlog',full_name='$r'  WHERE student_id='$stud_id'"; 
                 $query=mysqli_query($mysqli,$sql);
                 // echo  $sql;

                 $sql_extra="UPDATE admin SET adm_name='$username',adm_pass='$password',user_type='student' WHERE stud_id='$stud_id'";
                $query_extra=mysqli_query($mysqli,$sql_extra);
                // echo $query_extra;
                header('location:Student.php');
                }
            }
                else
                {

                    $sql="UPDATE student SET std_unique_id='$std_unique_id' , std_first_name='$first_name',std_middel_name='$middel_name',std_last_name='$last_name',std_dob='$dob',std_emai_id='$email',std_mobile_no='$phone',std_address='$address',std_user_name='$username',std_password='$password',department='$department',SSC_Percentage='$ssc_per',HSC_Percentage='$hsc_per',Graduation_Percentage='$gradu_per',History_of_Backlog='$history_backlog',Current_Backlog='$current_backlog',full_name='$r' WHERE student_id='$stud_id'"; 
                 $query=mysqli_query($mysqli,$sql);
                 // echo  $sql;

                 $sql_extra="UPDATE admin SET adm_name='$username',adm_pass='$password',user_type='student' WHERE stud_id='$stud_id'";
                $query_extra=mysqli_query($mysqli,$sql_extra);
                // echo $query_extra;Student.php
                header('location:Student.php');
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
            <?php
                $sql_fetch="SELECT * FROM student WHERE student_id='$stud_id'";
                $query_fetch=mysqli_query($mysqli,$sql_fetch);
                $row=mysqli_fetch_array($query_fetch);
             ?>
            


            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">
                        <h4 style="border-bottom: 3px solid blue;">Personal Details</h4>
                        <div class="form_group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="emp_txt"value="<?php echo $row['std_first_name'];?>">
                            <span></span>
                        </div>
                        <div class="form_group">
                            <label>Middel Name</label>
                            <input type="text" name="middel_name" class="emp_txt"value="<?php echo $row['std_middel_name'];?>">
                        </div>

                        <div class="form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="emp_txt"value="<?php echo $row['std_last_name'];?>">
                        </div>
                        <div class="form_group">
                            <label>Student unique id</label>
                            <input type="text" name="std_unique_id"  value="<?php echo $row['std_unique_id'];?>" class="emp_txt" required="">
                        </div>

                        <div class="form_group">
                            <label>Date Of Birth</label>
                            <input type="Date" name="dob" class="emp_txt" style="height: 18px;"value="<?php echo $row['std_dob'];?>">
                        </div>
                        <div class="form_group">
                            <label>Email</label>
                            <input type="email" name="email" class="emp_txt" value="<?php echo $row['std_emai_id'];?>">
                        </div>

                        <div class="form_group">
                            <label>Username</label>
                            <input type="text"name="username" id="username" class="emp_txt" autocomplete="off"value="<?php echo $row['std_user_name'];?>">
                            <div id="status">
                                
                            </div>
                        </div>

                        <div class="form_group">
                            <label>Password</label>
                            <input type="text" name="password"  id="password" class="emp_txt" autocomplete="off" value="<?php echo $row['std_password'];?>"> 
                        </div>

                        

                        <!-- <div class="form_group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="emp_txt" autocomplete="off">
                        </div> -->
                        <div class="form_group">
                            <label>Phone</label>
                            <input type="text" maxlength="10" pattern="\d{10}" name="phone" class="emp_txt"value="<?php echo $row['std_mobile_no'];?>">
                        </div>

                        <div class="form_group">
                                <label>Profile Image</label><br>
                                <input type="file" class="form-control" name="uploaded_file" id="uploaded_file" placeholder="Select File"></input>
                        </div>

                        <div class="form_group">
                            <label>Address</label>
                            <textarea name="address" class="emp_txt2"><?php echo $row['std_address'];?></textarea>
                        </div>
                        <div class="form_group">
                            <label></label>
                            <input type="hidden" name="">
                        </div>
                        
                        <h4 style="border-bottom: 3px solid blue;">Education Details</h4>
                        
                        <div class="form_group">
                            <label>Department</label>
                            <?php  $dep= $row['department'];?>
                            <select name="department" id="" class="emp_txt">
                                <?php 
                                if ($dep=='Computer')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='IT')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT" selected="">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php } 
                            else if ($dep=='Electrical')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical" selected="">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='Mechanical')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical" selected="">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='Civil')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil" selected="">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='Chemical')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical" selected="">Chemical</option>
                                <option value="Electronics">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='Electronics')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics" selected="">Electronics & Communication</option>
                            <?php }
                            else 
                                { 
                                ?>
                                <option value="Computer" >Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics" selected="">Electronics & Communication</option>
                            <?php }
                            ?>
                            </select>
                        </div>


                        <div class="form_group">
                            <label>SSC Percentage</label>
                            <input type="text" name="ssc_per" class="emp_txt" value="<?php echo $row['SSC_Percentage'];?>">
                        </div>
                        <div class="form_group">
                            <label>HSC Percentage</label>
                            <input type="text" name="hsc_per" class="emp_txt" value="<?php echo $row['HSC_Percentage'];?>">
                        </div>
                        <div class="form_group">
                            <label>Graduation Percentage</label>
                            <input type="text" name="gradu_per" class="emp_txt" value="<?php echo $row['Graduation_Percentage'];?>">
                        </div>
                        <div class="form_group">
                            <label>History of Backlog</label>
                            <?php  $value1=$row['History_of_Backlog'];?>
                            <select name="history_backlog" id="" class="emp_txt">
                                <?php 
                                if ($value1=='1')
                                { 
                                ?>
								<option value="1" selected="">--Select--</option>
                                <option value="2" >1</option>
                                <option value="3"> 2</option>
                                <option value="4"> 3</option>
                                <option value="5"> 4</option>
                            <?php } 
                            else if ($value1=='2')
                                { 
                                ?>
                                <option value="1">1</option>
                                <option value="2" selected=""> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                            <?php }
                            else if ($value1=='3')
                                { 
                                ?>
                                <option value="1">1</option>
                                <option value="2"> 2</option>
                                <option value="3"selected=""> 3</option>
                                <option value="4"> 4</option>
                            <?php }
                            else if ($value1=='4')
                                { 
                                ?>
                                <option value="1" >1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4" selected=""> 4</option>
                            <?php }
                            else 
                                { 
                                ?>
                                <option value="1" >1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form_group">
                            <label>Current Backlog</label>
                            <?php  $value= $row['Current_Backlog'];?>
                            <select name="current_backlog" id="" class="emp_txt">
                                <?php if ($value=='1')
                                { 
                                ?>
                                <option value="1" selected=""> --Select--</option>
								<option value="2" > 1</option>
                                <option value="3"> 2</option>
                                <option value="4"> 3</option>
                                <option value="5"> 4</option>
                            <?php } 
                            else if ($value=='2')
                            { ?>
                                <option value="1" > 1</option>

                                <option value="2" selected=""> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                            <?php }

                            else if ($value=='3')
                            { ?>
                                <option value="1" > 1</option>

                                <option value="2" > 2</option>
                                <option value="3" selected=""> 3</option>
                                <option value="4"> 4</option>
                            <?php }

                            else if ($value=='4')
                            { ?>
                                <option value="1" > 1</option>

                                <option value="2" > 2</option>
                                <option value="3"> 3</option>
                                <option value="4" selected=""> 4</option>
                            <?php } 
                            else 
                            { ?>
                                <option value="1" > 1</option>

                                <option value="2" > 2</option>
                                <option value="3"> 3</option>
                                <option value="4" > 4</option>
                            <?php }
                            ?> 
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
