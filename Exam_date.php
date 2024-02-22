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
      if(isset($_POST['del_date']))
      {
        $id=$_POST['del_date'];
        // echo $id; 
        $sql_delete="DELETE from exam_date where exam_date_id='$id'";
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
        <form method="POST" name="exzam_date_form" id="exzam_date_form" enctype="multipart/form-data">
            <!-- <input type="hidden" name="edit_dept" id="edit_dept"> -->
            <input type="hidden" name="del_date" id="del_date">
            
        

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
                <!-- <h6>Department</h6> -->

                <h6><a href="Add_Exam_Date.php"> <i class="fa fa-plus"></i> ADD EXAM DATE</a></h6>

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
                        <th>Stream</th>
                        <th>Semester</th>
                        <th>Exzam Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    include('configadmin.php');
                    $sql="SELECT * FROM exam_date";
                    $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['stream'];?></td>
                        <td><?php echo $row['semester'];?></td>
                        
                        <td><?php echo $row['exzam_date'];?></td>
                        <td><?php echo $row['updated_date'];?></td>
                        

                        <td>
                            <button onclick="delete_date(<?php echo $row['exam_date_id'];?>)" class="btn"><i class="fa fa-trash"></i></button>

                            <!-- <button onclick="deleteid(<?php //echo $row['proj_id'];?>)" class="btn"><i class="fa fa-edit"></i></button> -->
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
    function delete_date(id)
    {
        var a = id;
        // alert(a);
        document.getElementById('del_date').value=a;

        document.getElementById("exzam_date_form").submit();
    }
</script>