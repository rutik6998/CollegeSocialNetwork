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
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
  <link type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<?php
      include('configadmin.php');
      if(isset($_POST['del_student']))
      {
        $id=$_POST['del_student'];
        // echo $id; 
        $sql_delete="DELETE FROM student where student_id='$id'";
        $query_delete=mysqli_query($mysqli,$sql_delete);

        $sql_admin="DELETE FROM admin where stud_id='$id'";
        $query_admin=mysqli_query($mysqli,$sql_admin);
      }
        //header("Location:project_info.php");  
?>
<body>

    <div class="wrapper_class">
        
        <header>
            <div class="logo"></div>

            <div class="notifications"></div>
        </header>
        <form method="POST" name="student_form" id="student_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_student1" id="edit_student1">
            <input type="hidden" name="del_student" id="del_student">
            
        

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
                <!-- <h6>Department</h6> -->

                <h6>STUDENT DETAILS</a></h6>

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <div class="dashboard_body">                        

                

                <div class="dashboard_body_header">
                    <form action="" method="post">

                        <!-- <input type="text" name="emp_id" value="<?php //if(isset($_POST['emp_id'])){ echo $_POST['emp_id'];}?>" placeholder="Employee ID"  class="srch_emp_txt" > -->


                        <input type="text" name="std_name" value="<?php if(isset($_POST['std_name'])){ echo $_POST['std_name'];}?>" placeholder="Student Name" class="srch_emp_txt">

                        <!-- <select name="Designs" class="srch_emp_drp"> -->
                            <!-- <?php// if(isset($_POST['Designs'])){ echo $_POST['Designs'];}?> -->
                            <!-- <option value="" >-- Select Department --</option> -->
                                <!-- <option value="">value1</option> -->
                        <!-- </select> -->


                        <input type="submit" name="submits" value="Search" class="srch_emp_btn">
                        <input type="submit" name="reset" value="Reset" class="reset_emp_btn">


                    </form>
                    
                    <div class="clear"></div>
                </div><!-- dashboard_body_header ends here -->  
                <?php
                    // echo  $_SESSION['id'];
                        if (isset($_POST['reset'])) 
                        {
                            header("Location:Show_Student.php");
                        }
                        if(isset($_POST['submits']))
                        {
                            require_once("configadmin.php");
                            // $id=$_POST['emp_id'];
                            $name=$_POST['std_name'];
                            // $Designs=$_POST['Designs'];
                        //  $sql1="SELECT *  FROM employee where";
                        //  $query1=mysqli_query($mysqli,$sql1);
                        // }
                            // $sql1="SELECT * FROM `employee` WHERE `employee_id` LIKE '$id%'";


                            $cond ="";

                            

                            // if(($_POST['emp_id']) !="")
                            // {

                            //     $cond .=" AND employee_id LIKE '%$id%'";
                            // }
                            if(($_POST['std_name']) !="")
                            {

                                $cond .=" AND full_name LIKE '$name%'";
                            }
                            // if(($_POST['Designs']) !="")
                            // {

                            //     $cond .=" AND designation = '$Designs'";
                            // }

                            // && emp_id='$employee'
                            $sql1="SELECT * FROM student  WHERE student_id!=0".$cond ;

                            // $sql1="SELECT * FROM employee  WHERE emp_id!=0 ".$cond;
                            // echo $sql1;
                            // $sql1="SELECT * FROM `employee` WHERE
                            // (employee_id LIKE '%$id%') AND (first_name LIKE '$name%') ";
                            $query1=mysqli_query($mysqli,$sql1);
                            $count = mysqli_num_rows($query1);
                            if($count == "0")
                            {
                                $output = '<h2>No result found!</h2>';
                                echo $output;
                            }
                            else
                            {

                    ?>  
                    <div class="dashboard_body_wrapper">
                <!-- <div class="table-responsive">-->
                  <table class="table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <?php
                    
                    // $sql="SELECT * FROM student";
                    // $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query1))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['student_id'];?></td>
                        
                        <td style="width:100px;"><img style="" src='images/student_profile/<?php echo $row['std_profile_img'];?>' width='100%'></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['department'];?></td>
                        <td><?php echo $row['std_emai_id'];?></td>
                        <td><?php echo $row['std_mobile_no'];?></td>
                        <td><?php echo $row['std_address'];?></td>
                        <!-- <td><?php //echo $row['proj_images'];?></td> -->
                        

                        <td>
                            <!-- <button onclick="delete_student(<?php// echo $row['student_id'];?>)" class="btn"><i class="fa fa-trash"></i></button> -->

                            <!-- <button onclick="edit_student(<?php //echo $row['student_id'];?>)" class="btn"><i class="fa fa-edit"></i></button> -->
                            <!-- <a href="project_edit.php?id=<?php// echo $row['proj_id'];?>" class="btn btn-success" > -->

                          <!-- <span class = "glyphicon glyphicon-pencil"></span> Edit</a> -->

                        </td>


                      </tr>

                      
                    </tbody>
                  <?php
                    }
                  ?>
                  </table>
                <!-- </div> -->


                    
                    <div class="clear"></div>                   
                </div><!-- dashboard_body_wrapper ends here -->


            <?php 
                    } 
                        }

            if(!isset($_POST['submits']))
                { 
            ?>
                <div class="dashboard_body_wrapper">
                <!-- <div class="table-responsive">-->
                  <table class="table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <?php
                    include('configadmin.php');
                    $sql="SELECT * FROM student";
                    $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['student_id'];?></td>
                        
                        <td style="width:100px;"><img style="" src='images/student_profile/<?php echo $row['std_profile_img'];?>' width='100%'></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['department'];?></td>
                        <td><?php echo $row['std_emai_id'];?></td>
                        <td><?php echo $row['std_mobile_no'];?></td>
                        <td><?php echo $row['std_address'];?></td>
                        <!-- <td><?php //echo $row['proj_images'];?></td> -->
                        

                        <td>
                            <!-- <button onclick="delete_student(<?php //echo $row['student_id'];?>)" class="btn"><i class="fa fa-trash"></i></button> -->

                            <!-- <button onclick="edit_student(<?php //echo $row['student_id'];?>)" class="btn"><i class="fa fa-edit"></i></button> -->
                            <!-- <a href="project_edit.php?id=<?php// echo $row['proj_id'];?>" class="btn btn-success" > -->

                          <!-- <span class = "glyphicon glyphicon-pencil"></span> Edit</a> -->

                        </td>


                      </tr>

                      
                    </tbody>
                  <?php
                    }
                  ?>
                  </table>
                <!-- </div> -->


                    
                    <div class="clear"></div>                   
                </div><!-- dashboard_body_wrapper ends here -->
                <?php } ?>
                
                
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
<script type="text/javascript">
    

    function delete_student(fac_id)
    {
        var a = fac_id;
        // alert(a);
        document.getElementById('del_student').value=a;

        document.getElementById("student_form").submit();
    }

function edit_student(fac_id)
    {
        var a = fac_id;
        // alert(a);
        document.getElementById('edit_student1').value=a;

        document.getElementById("student_form").action="Edit_Student.php";

        document.getElementById("student_form").submit();
    }

</script>