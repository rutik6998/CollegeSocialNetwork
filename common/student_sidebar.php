

<?php 

	// include("db.php");
    include('configadmin.php');
	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$first_part = $components[2];

	$emp_id = $_SESSION['student_id'];
?>
<ul>

	<?php 

		$role = "select * from student where student_id = $emp_id";
		$u_role = mysqli_query($mysqli, $role);
		$user_role = mysqli_fetch_array($u_role);

		echo $user_type1 = $user_role['user_type'];

		//echo $user_type;

		if($user_type1 == 'admin'){
	?>

		
			<li class="<?php if ($first_part=="index" || $first_part=="" ||$first_part=="index.php") {echo "active"; }?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> HOME </a> </li>

			<li class="<?php if ($first_part=="Faculty.php" || $first_part=="Add_Faculty.php"|| $first_part=="Edit_Faculty.php") {echo "active"; }?>"> <a href="Faculty.php"> <i class="fa fa-calendar-times-o"></i>ADD FACULTY </a> </li>

				
			<li class="<?php if ($first_part=="Student.php" || $first_part=="Add_student.php" || $first_part=="Edit_Student.php") {echo "active"; }?>"> <a href="Student.php"> <i class="fa fa-calendar-times-o"></i> ADD STUDENT </a> </li>
			<!-- STRATION -->

					
			<!-- <li class="<?php// if ($first_part=="user" || $first_part=="user") {echo "active"; }?>" > <a href="user"> <i class="fa fa-bookmark-o"></i> STUDEND </a> </li> -->

			<li class="<?php if ($first_part=="approval.php" || $first_part=="add_workShift.php") {echo "active"; }?>"> <a href="approval.php"> <i class="fa fa-clock-o"></i> APPROVE UPDATE </a> 
			</li>
			
			<li class="<?php if ($first_part=="logout") {echo "active"; }?>"> <a href="logout"> <i class="fa fa-power-off"></i> LOGOUT </a> </li>
	<?php
		}

		elseif($user_type1 == 'student')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
		    // echo $directoryURI1;
        	//$path = parse_url($directoryURI, PHP_URL_PATH);
        	//echo $path;

        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        	//$first_part = $getid[2];
        	// echo $getid;
        
        	$empids = $getid[1];
        	// echo $empids; 
        	 $id 	= base64_decode($empids);
        	// echo $id;
        	$getids = explode('=', $id);
        	// echo $getids;
        	 // $empid = $getids[1];
        	$_SESSION['u_id'] =$empid;

        	$u_id=$_SESSION['u_id'];
        	}





	?>
			
			<li class="<?php if ($first_part=="Student_Dashbord.php" || $first_part=="" || $first_part == "Student_Dashbord.php") {echo "active"; }?>"> <a href="Student_Dashbord.php"> <i class="fa fa-dashboard"></i> HOME </a> </li>
			

			<li class="<?php if ($first_part=="Student_Profile" || $first_part=="" || $first_part == "Student_Profile.php") {echo "active"; }?>"> <a href="Student_Profile.php"> <i class="fa fa-user-o"></i>PROFILE</a> </li>


			<!--<li class="<?php if ($first_part=="Student_Exam_Date" || $first_part=="Student_Exam_Date.php" ) {echo "active"; }?>"> <a href="Student_Exam_Date.php"> <i class="fa fa-calendar-o"></i> Exam date </a> </li>-->
			<!-- ?<?php //echo base64_encode('empid='.$u_id); ?> -->

			<li class="<?php if ($first_part=="Student_Exam_Timetable" || $first_part=="Student_Exam_Timetable.php" ) {echo "active"; }?>"> <a href="Student_Exam_Timetable.php"> <i class="fa fa-calendar-times-o"></i>EXAM-TIMETABLE</a> </li>

	

			<li class="<?php if ($first_part=="Selected_Student_List.php" || $first_part=="Selected_Student_List.php.php" ) {echo "active"; }?>"> <a href="Selected_Student_List.php"> <i class="fa fa-id-card-o"></i>SELECTED STUDENT</a> </li>

			<li class="<?php if ($first_part=="Student_Notification" || $first_part=="Student_Notification.php" ) {echo "active"; }?>"> <a href="Student_Notification.php"> <i class="fa fa-commenting"></i> NOTIFICATION</a> </li>

			<li class="<?php if ($first_part=="Student_Marks_Details" || $first_part=="Student_Marks_Details.php" ) {echo "active"; }?>"> <a href="Student_Marks_Details.php"> <i class="fa fa-sticky-note"></i> MARKS DETAILS</a> </li>

			<li class="<?php if ($first_part=="https://msbte.org.in/#") {echo "active"; }?>"> <a href="https://msbte.org.in/#" target="_blank"> <i class="fa fa-share"></i> MS-BTE </a> </li>
			<li class="<?php if ($first_part=="https://erp.kkwagh.edu.in/") {echo "active"; }?>"> <a href="https://erp.kkwagh.edu.in/" target="_blank"> <i class="fa fa-share"></i> ERP-LOGIN</a> </li>

			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout.php"> <i class="fa fa-power-off"></i> LOGOUT </a> </li>
			
	<?php
		}

		elseif($user_type1 == 'placement_officer')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
		    // echo $directoryURI1;
        	//$path = parse_url($directoryURI, PHP_URL_PATH);
        	//echo $path;

        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        	//$first_part = $getid[2];
        	// echo $getid;
        
        	$empids = $getid[1];
        	// echo $empids; 
        	 $id 	= base64_decode($empids);
        	// echo $id;
        	$getids = explode('=', $id);
        	// echo $getids;
        	 // $empid = $getids[1];
        	$_SESSION['u_id'] =$empid;

        	$u_id=$_SESSION['u_id'];
        	}





	?>

	<!-- <li class="<?php// if ($first_part=="index" || $first_part=="") {echo "active"; }?>"> <a href="index"> <i class="fa fa-dashboard"></i> Dashboard </a> </li> -->


			<li class="<?php if ($first_part=="Notification.php" || $first_part=="Send_Notification.php" || $first_part=="") {echo "active"; }?>"> <a href="Notification.php"> <i class="fa fa-group"></i>SEND NOTIFICATION </a> </li>
			<!-- ?<?php //echo base64_encode('empid='.$u_id); ?> -->

			

			<li class="<?php if ($first_part=="Selected_Student.php" || $first_part=="Add_Selected_Student.php" ) {echo "active"; }?>"> <a href="Selected_Student.php"> <i class="fa fa-calendar-times-o"></i>POST SELECTION</a> </li>

			<li class="<?php if ($first_part=="Placement_Profile.php" || $first_part=="Placement_Profile.php" ) {echo "active"; }?>"> <a href="Placement_Profile.php"> <i class="fa fa-calendar-times-o"></i> PROFILE</a> </li>

			<li class="<?php if ($first_part=="Add_Post_Placement.php") {echo "active"; }?>"> <a href="Add_Post_Placement.php"> <i class="fa fa-calendar-times-o"></i> POST </a> </li>


			<li class="<?php if ($first_part=="logout.php") {echo "active"; }?>"> <a href="logout"> <i class="fa fa-power-off"></i> LOGOUT </a> </li>
	<?php
		}

		elseif($user_type1 == 'exam_head_officer')
		{
		    
		    $directoryURI1 = $_SERVER['REQUEST_URI'];
		    // echo $directoryURI1;
        	//$path = parse_url($directoryURI, PHP_URL_PATH);
        	//echo $path;

        	if(strpos($directoryURI1, '?'))
        	{
        	$getid = explode('?', $directoryURI1);
        	//$first_part = $getid[2];
        	// echo $getid;
        
        	$empids = $getid[1];
        	// echo $empids; 
        	 $id 	= base64_decode($empids);
        	// echo $id;
        	$getids = explode('=', $id);
        	// echo $getids;
        	 // $empid = $getids[1];
        	$_SESSION['u_id'] =$empid;

        	$u_id=$_SESSION['u_id'];
        	}

	?>

			<!-- <li class="<?php //if ($first_part=="index" || $first_part=="") {echo "active"; }?>"> <a href="index"> <i class="fa fa-dashboard"></i> Dashboard </a> </li> -->


			<li class="<?php if ($first_part=="Marks_Details.php" || $first_part=="Add_Marks.php"|| $first_part=="Update_Marks.php" || $first_part=="") {echo "active"; }?>"> <a href="Marks_Details.php"> <i class="fa fa-group"></i>ENTER MARKS</a> </li>

			<li class="<?php if ($first_part=="Ex_Head_Profile.php" ) {echo "active"; }?>"> <a href="Ex_Head_Profile.php"> <i class="fa fa-calendar-times-o"></i> PROFILE </a> </li>

			<li class="<?php if ($first_part=="Exam_Timetable.php" || $first_part=="Add_Exam_Timetable.php") {echo "active"; }?>"> <a href="Exam_Timetable.php"> <i class="fa fa-calendar-times-o"></i>EXAM-TIMETABLE</a> </li>

			<!--<li class="<?php if ($first_part=="Exam_Date.php" || $first_part=="Add_Exam_Date.php" ) {echo "active"; }?>"> <a href="Exam_Date.php"> <i class="fa fa-calendar-times-o"></i> Exam Date </a> </li>-->

			<!-- <li class="<?php //if ($first_part=="Student_List" || $first_part=="Student_List" ) {echo "active"; }?>"> <a href="Student_List"> <i class="fa fa-calendar-times-o"></i> Create List </a> </li> -->
			
			<li class="<?php if ($first_part=="Add_Post_ExamHead.php") {echo "active"; }?>"> <a href="Add_Post_ExamHead.php"> <i class="fa fa-calendar-times-o"></i> POST </a> </li>

			<li class="<?php if ($first_part=="logout") {echo "active"; }?>"> <a href="logout"> <i class="fa fa-power-off"></i> LOGOUT </a> </li>

		<?php } ?>

</ul>






