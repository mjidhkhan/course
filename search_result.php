<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<h3> Search Result</h3><hr>
<?php
   $var= htmlentities($_GET['search']);
   $trimmed = trim($var);
    if (!empty($var)){
	//this query will show all available courses
        $sql = $dbh->prepare("SELECT course_details.course_id,
				course_details.course_name,
				course_details.course_image,
				meal_course.course_type,
			 meal_course.meal_type
				FROM course_details
				LEFT join meal_course
				ON course_details.course_id= meal_course.id
				LEFT JOIN meal_type
				ON meal_type.id =meal_course.meal_type
				where course_details.course_name LIKE :item
				ORDER BY course_details.course_name");
	$sql->execute(array(':item'=> '%'.$trimmed.'%'));
	$items=$sql->rowCount();
	if ($items != 0){
?>
	<h3> Looked for: "<?php echo $trimmed;?> "</h3>
	<?php echo "<p>item(s) found : <strong style='color:red'> " . $items . " </strong></p>" ?>


	<table class="table">
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
		   <th>Meal Type</th>
                   <th> + Order</th>
		</tr>
		<tr class="clchange">
	<?php while($row= $sql->fetch()){ ?>
			<td class="result"><strong><?php echo $row['course_name']; ?></strong></td>
		  <td><?php if ($row['meal_type']== 2){
			echo "Vegetarian";
			}else{
				echo "Non-vegetarian";} ?></td>
		  <td><?php  if($row['course_type']== 1){
					echo "Starter";}
				if($row['course_type']== 2){
					echo "Main Course";}
				if($row['course_type']== 3){
					echo "course_type";}
				if($row['course_type']== 4){
					echo "Breakfast";}
				if($row['course_type']== 5){
					echo "Refreshment";}
			    ?>
        </td>
        <td><button class="btn btn-search" onclick="addToOrder(<?php echo $row['course_id'];?>)"> +</button> </td>
      </tr>
	<?php };?>
	</table>
	<?php
	}else{
		echo "<h4>Results</h4>";
		echo "<p>Sorry, your search for:  &quot;<strong style='color:red'>" . $trimmed . "</strong>  &quot; returned zero results</p>";
	    }?>
	<!------ content area sends here            ----->
	<?php
	}else{
	//	echo '<h3> Result for your search:'.  $trimmed.'</h3>';
  	echo "<h3 style='color:red'>Please provide search item.</h3>";
  
  } ?>
         <?php include("includes/sidebar.php"); ?>

	<?php include("includes/footer.php"); ?>
