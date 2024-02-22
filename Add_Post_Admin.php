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

<style>
/** {
  box-sizing: border-box;
}*/

/* Add a gray background color with some padding */
/*body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}*/

/* Header/Blog Title */
/*.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}*/

/* Create two unequal columns that floats next to each other */
/* Left column */
/*.leftcolumn {   
  float: left;
  width: 75%;
}*/

/* Right column */
/*.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}*/

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 30%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 40px;
   border-radius:10px;
   margin-top: 20px;
  -webkit-box-shadow:0 10px 18px rgba(0,0,0,.25);
}
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
/*.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}*/

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
/*@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}*/
</style>


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
        include('configadmin.php');
        if (isset($_POST['submit'])) 
        {
            
            $name=$_SESSION['adm_name'];
            $faculty_id=$_SESSION['faculty_id'];

            $post_data= $_POST['post_data'];
            // $post_image= $_POST['post_image'];
            date_default_timezone_set("Asia/Kolkata");
            $posted_date=date("Y-m-d h:i:sa");


            if (!empty($_FILES['uploaded_file']['name'])) 
            {
                $imgfile = $_FILES["uploaded_file"]["name"];
                                  // $validExt = array("jpg", "png", "jpeg", "bmp", "gif");
                // get the image extension
                $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
                // allowed extensions
                $allowed_extensions = array(".jpg","jpeg",".png",".gif",".mp4");
                // Validation for allowed extensions .in_array() function searches an array for a specific value.
            if(!in_array($extension,$allowed_extensions))
            {
                
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";

            }
            else
            {
                $path = "images/post_images/";

                $path1 = $path . basename( $_FILES['uploaded_file']['name']);

                move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$path1);



                $sql1="INSERT INTO placement_post (post_by_id,posted_by,placement_post_data,placement_post_image,placement_post_timedate) VALUES('$faculty_id','$name','$post_data','$imgfile','$posted_date')";
                $query=mysqli_query($mysqli,$sql1);
            // header('location:Notification');
            }
          }
          else
          {
              $sql1="INSERT INTO placement_post (post_by_id,posted_by,placement_post_data,placement_post_timedate) VALUES('$faculty_id','$name','$post_data','$posted_date')";
                $query=mysqli_query($mysqli,$sql1);


          }
        }
        

        ?>

        <section class="dashboard">
            <!-- dashboard_header start here -->
            <div class="dashboard_header">
                <h6>ADD POST</h6>

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Back</a></h6> -->

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">


                        <div class="form_group">
                            <label>Post</label>
                            <textarea name="post_data" class="emp_area2" required=""></textarea>
                        </div> 
                        <div class="form_group2">
                            <label>Post Image / file</label>
                            <input type="file" name="uploaded_file" class="emp_txt2">
                        </div>
        
                        <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Send Post" class="emp_btn">
                        </div>
                    </form>

                    <div class="dashboard_body_wrapper">
                <!-- <div class="table-responsive">-->
                  <!-- <table class="table-striped"> -->
                    
                    <?php
                    include('configadmin.php');
                    
                    $sql="SELECT * FROM placement_post ORDER BY placement_post_id DESC";
                    $query=mysqli_query($mysqli,$sql);
                    while ($row=mysqli_fetch_array($query))
                    {
                      // echo 
                      // $row['proj_name'];
                    ?>

                    <div class="row">
                    <div class="leftcolumn">
                      <div class="card">
                        <h2><?php echo $row['posted_by'];?></h2>
                        <h5><?php echo $row['placement_post_timedate'];?></h5>
                        <?php if(!empty($row['placement_post_image']))
                        {
                          ?>
                        <div>
                          <img style="height:520px; " style="" src='images/post_images/<?php echo $row['placement_post_image'];?>'>
                        </div>
                      <?php }
                      else 
                      {
                        $a="sdf";
                      }
                       ?>

                        <p><?php echo $row['placement_post_data'];?></p>
                        <!-- <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p> -->
                      </div>
                  </div>
                  </div>
                    
                  <?php
                    }
                  ?>
                  <!-- </table> -->
                <!-- </div> -->



                    
                    <div class="clear"></div>                   
                </div><!-- dashboard_body_wrapper ends here -->
                    


                    
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
<?php
    ob_start();
    @session_start();
    require_once("common/check_login.php");
?>