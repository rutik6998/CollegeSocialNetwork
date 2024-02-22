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
      if(isset($_POST['del_faculty']))
      {
        $id=$_POST['del_faculty'];
        // echo $id; 
        $sql_delete="DELETE from faculty where faculty_id='$id'";
        $query_delete=mysqli_query($mysqli,$sql_delete);

        $sql_admin="DELETE FROM admin where faculty_id='$id'";
        $query_admin=mysqli_query($mysqli,$sql_admin);
      }
?>
<body>

    <div class="wrapper_class">
        
        <header>
            <div class="logo"></div>

            <div class="notifications"></div>
        </header>
        <form method="POST" name="faculty_form" id="faculty_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_faculty1" id="edit_faculty1">
            <input type="hidden" name="del_faculty" id="del_faculty">
            
        

        <section class="sidebar">
            
            <div class="sidebar_header">
                
                <div class="user_pic">
                    
                </div><!-- User profile pic ends here -->
                     <?php require_once("common/username.php");?>
                
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

                <h6><a href="Add_Faculty.php"> <i class="fa fa-plus"></i> ADD FACULTY</a></h6>

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <div class="dashboard_body">                        
                <div class="dashboard_body_header">
                    <form action="" method="post">

                        <input type="text" name="staf_name" value="<?php if(isset($_POST['staf_name'])){ echo $_POST['staf_name'];}?>" placeholder="Name" class="srch_emp_txt">

                        <input type="submit" name="submits" value="Search" class="srch_emp_btn">
                        <input type="submit" name="reset" value="Reset" class="reset_emp_btn">


                    </form>
                    
                    <div class="clear"></div>
                </div><!-- dashboard_body_header ends here -->
                

                <div class="dashboard_body_header">
                    
                    
                    <div class="clear"></div>
                </div><!-- dashboard_body_header ends here -->  
                <?php
                    
                        if (isset($_POST['reset'])) 
                        {
                            header("Location:Faculty.php");
                        }
                        if(isset($_POST['submits']))
                        {
                            require_once("configadmin.php");
                            // $id=$_POST['emp_id'];
                            $name=$_POST['staf_name'];
                            $cond ="";

                            if(($_POST['staf_name']) !="")
                            {

                                $cond .=" AND full_name LIKE '$name%'";
                            }
                            
                            $sql1="SELECT * FROM faculty  WHERE faculty_id!=0".$cond ;

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
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    while ($row=mysqli_fetch_array($query1))
                    {
                      
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['faculty_id'];?></td>
                        
                        <td style="width:100px;"><img style="" src='images/faculty_images/<?php echo $row['profile_image'];?>' width='100%'></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['department'];?></td>
                        <td><?php echo $row['designation'];?></td>
                        <td><?php echo $row['email_id'];?></td>
                        <td><?php echo $row['mobile_no'];?></td>
                        <td><?php echo $row['user_type'];?></td>
                        
                        <td>
                            <button onclick="delete_faculty(<?php echo $row['faculty_id'];?>)" class="btn"><i class="fa fa-trash"></i></button>

                            <button onclick="edit_faculty(<?php echo $row['faculty_id'];?>)" class="btn"><i class="fa fa-edit"></i></button>
                            
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
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    include('configadmin.php');
                    $sql="SELECT * FROM faculty";
                    $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['faculty_id'];?></td>
                        
                        <td style="width:100px;"><img style="" src='images/faculty_images/<?php echo $row['profile_image'];?>' width='100%'></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['department'];?></td>
                        <td><?php echo $row['designation'];?></td>
                        <td><?php echo $row['email_id'];?></td>
                        <td><?php echo $row['mobile_no'];?></td>
                        <td><?php echo $row['user_type'];?></td>
                        
                        <td>
                            <button onclick="delete_faculty(<?php echo $row['faculty_id'];?>)" class="btn"><i class="fa fa-trash"></i></button>

                            <button onclick="edit_faculty(<?php echo $row['faculty_id'];?>)" class="btn"><i class="fa fa-edit"></i></button>
                            
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


                ?>


                
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
    

    function delete_faculty(fac_id)
    {
        var a = fac_id;
        // alert(a);
        document.getElementById('del_faculty').value=a;

        document.getElementById("faculty_form").submit();
    }

function edit_faculty(fac_id)
    {
        var a = fac_id;
        // alert(a);
        document.getElementById('edit_faculty1').value=a;

        document.getElementById("faculty_form").action="Edit_Faculty.php";

        document.getElementById("faculty_form").submit();
    }

</script>
