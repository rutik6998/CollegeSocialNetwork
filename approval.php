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
      if(isset($_POST['del_approval']))
      {
        $approval_id2 =$_POST['del_approval'];
        // echo $id; 
        $sql_delete="DELETE from student_approvle where uproval_id='$approval_id2'";
        $query_delete=mysqli_query($mysqli,$sql_delete);
      }
        //header("Location:project_info.php");  
      if(isset($_POST['approval_responce']))
      {
        $approval_responce =$_POST['approval_responce'];
        $approval_id1 =$_POST['approval_id'];
        $student_id =$_POST['student_id'];
        
        // echo $id; 
        $sql_update="UPDATE student_approvle SET approvel_status='$approval_responce' where uproval_id='$approval_id1'";
        $query_update=mysqli_query($mysqli,$sql_update);
        // echo $sql_update;
        if($_POST['approval_responce']==1)
        {
            
            $sql_fetch="SELECT * FROM student_approvle WHERE uproval_id='$approval_id1'";
            $query_fetch=mysqli_query($mysqli,$sql_fetch);
            $row_fetch=mysqli_fetch_array($query_fetch);

            $std_unique_id=$row_fetch['std_unique_id'];
            $first_name=$row_fetch['std_first_name'];
            $middel_name=$row_fetch['std_middel_name'];
            $last_name=$row_fetch['std_last_name'];
            $dob=$row_fetch['std_dob'];
            $email=$row_fetch['std_emai_id'];
            $phone=$row_fetch['std_mobile_no'];
            $address=$row_fetch['std_address'];
            $imgfile=$row_fetch['std_profile_img'];
            $username=$row_fetch['std_user_name'];
            $password=$row_fetch['std_password'];
            $full_name=$row_fetch['full_name'];

            // $sql_update="UPDATE student SET approvel_status='$approval_responce' where uproval_id='$approval_id1'";
            $sql_approval_details="UPDATE student SET std_unique_id='$std_unique_id' ,std_first_name='$first_name',std_middel_name='$middel_name',std_last_name='$last_name',std_dob='$dob',std_emai_id='$email',std_mobile_no='$phone',std_address='$address',std_profile_img='$imgfile',std_user_name='$username',std_password='$password',full_name='$full_name'  WHERE student_id='$student_id'"; 
          
            $query_approval_details=mysqli_query($mysqli,$sql_approval_details);
              // echo $sql_approval_details;
        }
      }
?>
<body>

    <div class="wrapper_class">
        
        <header>
            <div class="logo"></div>

            <div class="notifications"></div>
        </header>
        <form method="POST" name="approval_form" id="approval_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_dept" id="edit_dept">
            <input type="hidden" name="del_approval" id="del_approval">

            <input type="hidden" name="approval_responce" id="approval_responce">
            <input type="hidden" name="approval_id" id="approval_id">
            <input type="hidden" name="student_id" id="student_id">
            
        

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

                <h6>STUDENT APPRUVAL</a></h6>

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <div class="dashboard_body">                        

                

                <div class="dashboard_body_header">
                    
                    
                    <div class="clear"></div>
                </div><!-- dashboard_body_header ends here -->  
                <?php
                    
                        


                ?>  
                <div class="dashboard_body_wrapper">
                <!-- <div class="table-responsive">-->
                  <table class="table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>full_name</th>
                        <th>Image</th>
                        <th>username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    include('configadmin.php');
                    $sql="SELECT * FROM student_approvle";
                    $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['std_unique_id'];?></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td style="width:100px;"><img style="" src='images/student_profile/<?php echo $row['std_profile_img'];?>' width='100%'></td>
                        <td><?php echo $row['std_user_name'];?></td>
                        <td><?php echo $row['std_password'];?></td>
                        <td><?php echo $row['std_emai_id'];?></td>
                        <td><?php echo $row['std_mobile_no'];?></td>
                        <td><?php echo $row['std_address'];?></td>
                        <td>
                            <select class="leavestats" onchange="leaveStatus(this.value,<?php echo $row['uproval_id'];?>,<?php echo $row['student_id'];?>)">
                                    <option>---select----</option>

                                    <option <?php if($row['approvel_status']==0) { ?> selected="selected" <?php } ?> value="0">Pending</option>


                                    <option  <?php if($row['approvel_status']==1){?> selected="selected" <?php } ?> value="1"> Approve</option>
                                

                                    <option  <?php if($row['approvel_status']==2){?> selected="selected" <?php } ?> value="2">Rejected</option>
                                    
                                </select>
                        </td>

                        <td>
                            <button onclick="delete_appr_id(<?php echo $row['uproval_id'];?>)" class="btn"><i class="fa fa-trash"></i></button>


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
    function leaveStatus(a,b,c)
    {
        // alert(a);
        // alert(b);
        // alert(c);
        document.getElementById('approval_responce').value=a;
        document.getElementById('approval_id').value=b;
        document.getElementById('student_id').value=c;
        document.getElementById("approval_form").submit();
    }

    function delete_appr_id(id)
    {
        var approval_id1 = id;
        // alert(a);
        document.getElementById('del_approval').value=approval_id1;

        document.getElementById("approval_form").submit();
    }
</script>