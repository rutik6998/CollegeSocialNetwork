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
        <form method="POST" name="marks_form" id="marks_form" enctype="multipart/form-data">
            <input type="hidden" name="edit_marks" id="edit_marks" value="<?php echo $_POST['edit_marks'];?>">
            <!-- <input type="hidden" name="del_dept" id="del_dept"> -->
            <!-- <input type="hidden" name="edit_workShift" id="edit_workShift" value="<?php// echo $_POST['edit_workShift'];?>"> -->
            
        

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
         echo $id=$_POST['edit_marks'];
        if (isset($_POST['submit'])) 
        {
            $Student_id= $_POST['Student_id'];
            $sem= $_POST['sem'];
            $Stream= $_POST['Stream'];
            $subject= $_POST['subject'];
            $marks= $_POST['marks'];

            $sql="UPDATE student_marks SET stud_id='$Student_id',stream='$Stream',sem='$sem',subject='$subject',marks='$marks' WHERE stud_marks_id='$id' ";
            $query=mysqli_query($mysqli,$sql);
            header('location:Marks_Details.php');
        }
        

    
        ?>

        <section class="dashboard">
            <!-- dashboard_header start here -->
            <div class="dashboard_header">
                <h6>UPDATE MARKS</h6>

                <!-- <h6><a href="add_jobTitle"> <i class="fa fa-plus"></i> Back</a></h6> -->

                <div class="clear"></div>
            </div>
            <!-- dashboard_header ends here -->
            <?php
                $sql="SELECT * FROM student_marks where stud_marks_id='$id'";
                $query=mysqli_query($mysqli,$sql);
                $row=mysqli_fetch_array($query);

            ?>

            <div class="dashboard_body">                        

                <div class="dashboard_body_wrapper">
                    <form action="" method="POST" id="myform" name="myform">

                        <div class="form_group">
                            <label>Student Id</label>
                            <?php  $stud_id=$row['stud_id']; ?>
                            <select name="Student_id" id="" class="emp_txt">
                                <option value="">--Select Student--</option>
                                <?php 
                                            $sql_desi="SELECT * FROM student ";
                                            $query_desi=mysqli_query($mysqli,$sql_desi);
                                            while($desi_row=mysqli_fetch_array($query_desi)) 
                                            {
                                                if($stud_id==$desi_row['student_id'])
                                                    {

                                        ?>
                                                <option selected="selected" value="<?php echo $desi_row['student_id']; ?>"><?php echo $desi_row['full_name'];?>
                                                </option>
                                        <?php 
                                                    } 
                                                else
                                                    {
                                        ?>
                                                    <option value="<?php echo $desi_row['student_id']; ?>"><?php echo $desi_row['full_name'];?>
                                            
                                                    </option>

                                        <?php } }?>
                            </select>
                        </div>


                        <div class="form_group">
                            <label>Semister</label>
                            <?php  $value1=$row['sem'];?>
                            <select name="sem" id="" class="emp_txt">
                                
                                <option value="">--Select Semister--</option>
                                <?php 
                                if ($value1=='Sem1')
                                { 
                                ?>
                                <option value="Sem1" selected="">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                               
                                <?php 
                                } 
                                else if ($value1=='Sem2')
                                { 
                                ?>
                                <option value="Sem1" >Sem 1</option>
                                <option value="Sem2" selected="">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                
                                <?php 
                                } 
                                else if ($value1=='Sem3')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3"  selected="">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                
                                <?php 
                                } 
                                else if ($value1=='Sem4')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4"  selected="">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                               
                                <?php 
                                } 
                                
                                else if ($value1=='Sem5')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5"  selected="">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                
                                <?php 
                                } 
                                else if ($value1=='Sem6')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6"  selected="">Sem 6</option>
                               
                                <?php 
                                } 
                                else if ($value1=='Sem7')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                <option value="Sem7"  selected="">Sem 7</option>
                                <option value="Sem8">Sem 8</option>
                                <?php 
                                } 
                                else if ($value1=='Sem8')
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                <option value="Sem7">Sem 7</option>
                                <option value="Sem8"  selected="">Sem 8</option>
                                <?php 
                                } 
                                else
                                { 
                                ?>
                                <option value="Sem1">Sem 1</option>
                                <option value="Sem2">Sem 2</option>
                                <option value="Sem3">Sem 3</option>
                                <option value="Sem4">Sem 4</option>
                                <option value="Sem5">Sem 5</option>
                                <option value="Sem6">Sem 6</option>
                                <option value="Sem7">Sem 7</option>
                                <option value="Sem8">Sem 8</option>
                                <?php 
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form_group">
                            <label>Stream</label>
                            <?php  $dep= $row['stream'];?>
                            <select name="Stream" id="" class="emp_txt">
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
                            <?php }
                            else if ($dep=='Electronics & Communication')
                                { 
                                ?>
                                <option value="Computer" selected="">Computer</option>
                                <option value="IT">IT</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Electronics & Communication" selected="">Electronics & Communication</option>
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
                                <option value="Electronics & Communication">Electronics & Communication</option>
                            <?php }
                            ?>
                            </select>
                        </div>



                        <div class="form_group">
                            <label>Subject</label>
                            <input type="text" name="subject" id="subject" class="emp_txt" autocomplete="off" value="<?php echo $row['subject'];?>">
                            <div id="status">
                                
                            </div>
                        </div>

                        <div class="form_group">
                            <label>Marks</label>
                            <input type="text" name="marks"  id="marks" class="emp_txt" autocomplete="off"  value="<?php echo $row['marks'];?>" >
                        </div>

                       
        
                        <div class="btn_wrapper">
                            <input type="submit" name="submit" value="Save Marks " class="emp_btn">
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
