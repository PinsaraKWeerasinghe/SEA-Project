<?php 

	require_once 'header.php';
	if(!isset($_SESSION['user'])|| $_SESSION['user']->type!="instructor"){header('Location: login.php'); exit();}
		if(isset($_GET['module']))$CA_module=$_GET['module']; else die("you can only go with selected module");
		if(isset($_GET['task']))$task=$_GET['task']; else die("you can only go with selected task");


	 ?>
<h1>Given Assignments For <?php echo "$CA_module";  ?></h1>
	<link rel="stylesheet" type="text/css" href="includes/list_style.css">





	<?php 
		

		$query = "SELECT * FROM `instructor_".$CA_module ."_ca`";

		$mydb = openDB();
		
		$execute_object=mysqli_query($mydb,$query);
		mysqli_close($mydb);
		if ($execute_object){

			$a = array();

			while ($result_set=mysqli_fetch_assoc($execute_object)) {


				
				array_push($a,$result_set);
				
				
				
			
			}

			

			

		}else{
			echo "Query not executed";
		}

		

		/*$query2="select * from ".$CA_module." where student_name='".$user."'";
		$execute_object2=mysqli_query($conn,$query2);

		

		if ($execute_object2){

			

			$record=mysqli_fetch_assoc($execute_object2);
		

				$a2=array();
				echo "<br>";
				echo "<br>";
				print_r($record);

			foreach ($record as $x=>$x_value) {

				array_push($a2,$x_value);
				echo "<br>";
				print_r(array_slice($a2,4));

			}

		




			

		}else{

			echo "Query not executed Successfully!!!!!!!";
			
	
		}


	function f($a,$count){
		if(!empty($a[$count])) {



			return "submitted";

					
		}else{
			return "Not Submitted";
		}


	}*/ 

	?>

	<h2 style="color:black;font-style:all;font-family:'Times New Roman','Times',sans-serif;margin-left:30px;font-weight:bold;">Given CA</h2>


	




<ul class="a" style="margin-left:30px;">
	<?php 

	//print_r($a2);
	if ($task=="1") {
		$count=-1;
		foreach ($a as $ca) {
			++$count;
			$number=$ca['CA_number'];
			$task=$ca['assignment'];
			$validity=date_create($ca['valid_duration']); 

			
		
			echo "<li class='a'>

			<a href='edit CA.php?module=$CA_module&ca_number=$number'><h2 style='color:#ffffff;opacity:1;'>".$number."                                </h2></a>
		

			<br>Assignment:-".$task."<br>Valid Duration:".date_format($validity,"Y-m-d H:i:s")."

			






			</li>";  
			
		}
	}elseif ($task=="2") {
		$count=-1;
		foreach ($a as $ca) {
			++$count;
			$number=$ca['CA_number'];
			$task=$ca['assignment'];
			$validity=date_create($ca['valid_duration']);
			


			
		
			echo "<li class='a'>

			<a href='Grade CAs.php?module=$CA_module&ca_number=$number'><h2 style='color:#ffffff;opacity:1;'>".$number."                                </h2></a>
		

			<br>Assignment:-".$task."<br>Valid Duration:".date_format($validity,"Y-m-d H:i:s")."

			






			</li>";  
			
		}
		
	}{

	}

		

	 ?>
	
	</ul>
	
<?php require_once 'footer.php';?>