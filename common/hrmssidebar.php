

<?php 

	// include("db.php");
    include('configadmin.php');
	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$first_part = $components[2];

	$admin_id = $_SESSION['faculty_id'];
?>
<ul>

	<?php 

		$role = "select * from faculty where faculty_id = $admin_id";
		$u_role = mysqli_query($mysqli, $role);
		$user_role = mysqli_fetch_array($u_role);

		echo $user_type1 = $user_role['user_type'];

		//echo $user_type;

		if($user_type1 == 'admin'){
	?>

		
			<li class="<?php if ($first_part=="index" || $first_part=="" ||$first_part=="index.php") {echo "active"; }?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> HOME </a> </li>

			<li class="<?php if ($first_part=="Faculty.php" || $first_part=="Add_Faculty.php"|| $first_part=="Edit_Faculty.php") {echo "active"; }?>"> <a href="Faculty.php"> <i class="fa fa-user-o"></i> ADD FACULTY </a> </li>

				
			<li class="<?php if ($first_part=="Student.php" || $first_part=="Add_student.php" || $first_part=="Edit_Student.php") {echo "active"; }?>"> <a href="Student.php"> <i class="fa fa-group"></i>ADD STUDENTS</a> </li>

			<!-- STRATION -->

			<li class="<?php if ($first_part=="Add_Post_Admin.php") {echo "active"; }?>"> <a href="Add_Post_Admin.php"> <i class="fa fa-comments-o"></i> ADD POST </a> </li>

			<li class="<?php if ($first_part=="Approval.php" || $first_part=="Approval") {echo "active"; }?>"> <a href="Approval.php"> <i class="fa fa-check-square"></i> APPROVE UPDATE </a> 
			</li>

			<li class="<?php if ($first_part=="Exam_Timetable.php" || $first_part=="Add_Exam_Timetable.php") {echo "active"; }?>"> <a href="Exam_Timetable.php"> <i class="fa fa-calendar-o"></i>EXAM TIMETABLE </a> </li>



			<!--<li class="<?php if ($first_part=="Exam_Date.php" || $first_part=="Add_Exam_Date.php" ) {echo "active"; }?>"> <a href="Exam_Date.php"> <i class="fa fa-calendar-times-o"></i> EXAM DATE</a> </li>-->
			
			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout.php"> <i class="fa fa-power-off"></i> LOGOUT </a> </li>
	<?php
		}

		elseif($user_type1 == 'student')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
		    
        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        	
        	$empids = $getid[1];
        	 $id 	= base64_decode($empids);
        	$getids = explode('=', $id);
        	$_SESSION['u_id'] =$empid;
        	$u_id=$_SESSION['u_id'];
        	}
	?>
			
			<li class="<?php if ($first_part=="Dashbord" || $first_part=="" || $first_part == "Dashbord.php") {echo "active"; }?>"> <a href="Dashbord.php"> <i class="fa fa-dashboard"></i> DASHBOARD</a> </li>
			

			<li class="<?php if ($first_part=="Student_Profile" || $first_part=="" || $first_part == "Student_Profile.php") {echo "active"; }?>"> <a href="Student_Profile.php"> <i class="fa fa-dashboard"></i> PROFILE </a> </li>


			<!--<li class="<?php if ($first_part=="Student_Exam_Date" || $first_part=="Student_Exam_Date.php" ) {echo "active"; }?>"> <a href="Student_Exam_Date.php"> <i class="fa fa-group"></i> Exam date </a> </li>-->
			<!-- ?<?php //echo base64_encode('empid='.$u_id); ?> -->

			<li class="<?php if ($first_part=="Student_Exam_Timetable" || $first_part=="Student_Exam_Timetable.php" ) {echo "active"; }?>"> <a href="Student_Exam_Timetable.php"> <i class="fa fa-calendar-times-o"></i>EXAM-TIMETABLE</a> </li>

	

			<li class="<?php if ($first_part=="Selected_Student_List.php" || $first_part=="Selected_Student_List.php.php" ) {echo "active"; }?>"> <a href="Selected_Student_List.php"> <i class="fa fa-calendar-times-o"></i>SELECTED STUDENT</a> </li>

			<li class="<?php if ($first_part=="Student_Notification" || $first_part=="Student_Notification.php" ) {echo "active"; }?>"> <a href="Student_Notification.php"> <i class="fa fa-calendar-times-o"></i> NOTIFICATION</a> </li>


			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout.php"> <i class="fa fa-power-off"></i>LOGOUT</a> </li>
			
	<?php
		}

		elseif($user_type1 == 'placement_officer')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
		    
        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        
        	$empids = $getid[1];
        	 $id 	= base64_decode($empids);
        	
        	$getids = explode('=', $id);
        	
        	$_SESSION['u_id'] =$empid;

        	$u_id=$_SESSION['u_id'];
        	}





	?>

			<li class="<?php if ($first_part=="Notification.php" || $first_part=="Send_Notification.php" || $first_part=="") {echo "active"; }?>"> <a href="Notification.php"> <i class="fa fa-commenting"></i>SEND NOTIFICATION</a> </li>

			<!-- ?<?php //echo base64_encode('empid='.$u_id); ?> -->

			

			<li class="<?php if ($first_part=="Selected_Student.php" || $first_part=="Add_Selected_Student.php" ) {echo "active"; }?>"> <a href="Selected_Student.php"> <i class="fa fa-sticky-note"></i>POST SELECTION</a> </li>

			<li class="<?php if ($first_part=="Placement_Profile.php" || $first_part=="Placement_Profile.php" ) {echo "active"; }?>"> <a href="Placement_Profile.php"> <i class="fa fa-user-o"></i>PROFILE</a> </li>
			<li class="<?php if ($first_part=="Show_Student.php" ) {echo "active"; }?>"> <a href="Show_Student.php"> <i class="fa fa-group"></i>STUDENT PROFILE</a> </li>

			<li class="<?php if ($first_part=="Add_Post_Placement.php") {echo "active"; }?>"> <a href="Add_Post_Placement.php"> <i class="fa fa-comments-o"></i>POST</a> </li>


			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout.php"> <i class="fa fa-power-off"></i>LOGOUT</a> </li>
	<?php
		}

		elseif($user_type1 == 'teacher')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        
        	$empids = $getid[1];
        	 $id 	= base64_decode($empids);
        	$getids = explode('=', $id);
        	$_SESSION['u_id'] =$empid;

        	$u_id=$_SESSION['u_id'];
        	}

	?>


			<li class="<?php if ($first_part=="Staff_Teacher.php" ) {echo "active"; }?>"> <a href="Staff_Teacher.php"> <i class="fa fa-user-o"></i>PROFILE</a> </li>


			<li class="<?php if ($first_part=="Show_Student.php" ) {echo "active"; }?>"> <a href="Show_Student.php"> <i class="fa fa-group"></i>STUDENT DETAILS</a> </li>

			<li class="<?php if ($first_part=="Marks_Details.php" || $first_part=="Add_Marks.php"|| $first_part=="Update_Marks.php" || $first_part=="") {echo "active"; }?>"> <a href="Marks_Details.php"> <i class="fa fa-sticky-note"></i>ENTER-MARKS</a> </li>

			
			<li class="<?php if ($first_part=="Add_Post_ExamHead.php") {echo "active"; }?>"> <a href="Add_Post_ExamHead.php"> <i class="fa fa-comments-o"></i>POST</a> </li>

			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout.php"> <i class="fa fa-power-off"></i>LOGOUT</a> </li>

		<?php } ?>

</ul>






