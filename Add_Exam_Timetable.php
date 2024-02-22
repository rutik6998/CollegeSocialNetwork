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

        <section class="dashboard">
            <!-- dashboard_header start here -->
            <div class="dashboard_header">
                <h6>EXAM DETAILS</h6>

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Back</a></h6> -->

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <?php

            if (isset($_POST['submit'])) 
        {
            $Stream= $_POST['Stream'];
            $Semester= $_POST['Semester'];
            
            date_default_timezone_set("Asia/Kolkata");
            $posted_date=date("Y-m-d h:i:sa");


            $imgfile = $_FILES["uploaded_file"]["name"];
             
             if(!empty($_FILES['uploaded_file']))
            {
                $path = "images/time_table/";

                $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);



                $sql1="INSERT INTO exam_timetable (stream,sem,timetable_file) VALUES('$Stream','$Semester','$imgfile')";
                $query=mysqli_query($mysqli,$sql1);
                header('location:Exam_Timetable.php');
            }
        }

            ?>

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">

                        
                        
                        

                        <div class="form_group">
                            <label>Stream</label>
                            
                            <select name="Stream" id="" class="emp_txt">
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
                            <label>Semester</label>
                            <select name="Semester" id="" class="emp_txt">
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                            </select>
                        </div>

                        <div class="form_group">
                                <label>TimeTable file</label><br>
                                <input type="file" class="form-control" name="uploaded_file" id="uploaded_file" placeholder="Select File" required="required"></input>
                        </div>

                        <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Add Exam TimeTable" class="emp_btn2">
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
