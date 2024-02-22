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
<?php
      include('configadmin.php');
      if(isset($_POST['del_stud']))
      {
        $id=$_POST['del_stud'];
        // echo $id; 
        $sql_delete="DELETE from selected_student where noti_id='$id'";
        $query_delete=mysqli_query($mysqli,$sql_delete);
      }
        //header("Location:project_info.php");  
?>
<body>

    <div class="wrapper_class">
        
        <header>
            <div class="logo"></div>

            <div class="notifications"></div>
        </header>
        <form method="POST" name="dept_form" id="dept_form" enctype="multipart/form-data">
            <!-- <input type="hidden" name="edit_dept" id="edit_dept"> -->
            <input type="hidden" name="del_stud" id="del_stud">
            
        

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
        if (isset($_POST['submit'])) 
        {
            $company_name= $_POST['company_name'];
            $designation= $_POST['designation'];
            $selected_student= $_POST['selected_student'];
            // $save_date=date('Y-m-d');

            $sql="INSERT INTO selected_student (company_name,designation,total_selected) VALUES('$company_name','$designation','$selected_student')";
            $query=mysqli_query($mysqli,$sql);
            header('location:Selected_Student');
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

                        <div class="form_group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="emp_txt">
                            <span></span>
                        </div>

                        <div class="form_group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="emp_txt">
                        </div>

                        
                        <!-- <div class="form_group">
                            <label>Selected Student</label>
                            <input type="text" name="selected_student" class="emp_txt">
                        </div> -->
                        <div class="form_group">
                            <label>Student Id</label>
                            <?php 
                            $sql="SELECT * FROM student_marks";
                                $query=mysqli_query($mysqli,$sql);
                                $row=mysqli_fetch_array($query); 
                            ?>
                            
                            <select name="selected_student" id="" class="emp_txt" required="required">
                                <option value="">--Select Student--</option>
                                <?php 
                                    $sql_desi="SELECT * FROM student ";
                                    $query_desi=mysqli_query($mysqli,$sql_desi);
                                    while($desi_row=mysqli_fetch_array($query_desi)) 
                                    {
                                ?>
                                <option  value="<?php echo $desi_row['full_name']; ?>"><?php echo $desi_row['full_name'];?>
                                                </option>

                                            <?php } ?>
                                <!-- <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option> -->
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


<script type="text/javascript">
    function deleteid(id)
    {
        var a = id;
        // alert(a);
        document.getElementById('del_stud').value=a;

        document.getElementById("notification_form").submit();
    }
</script>