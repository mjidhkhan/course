<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php
$course_id = $_GET['course_id'];
        /*this query will show Ingredients used in Recipe with Quantity used
                         and Remaining quantity in Stock after Updating  Quantaties*/
        $query = $dbh->prepare('SELECT  course_name,course_image, course_notes,course_instructions, ingredient_name,qty_used,units
			FROM course_details
			JOIN recipes
			ON course_details.course_id = recipes.course_id
			JOIN stock
			ON recipes.item_id = stock.id
			WHERE course_details.course_id = :course_id');
        $query->execute(array(':course_id' => $course_id));
            $result = $query->fetch();

?>
<?php include 'includes/header.php'; ?>
<!------ content area stats here            ----->

<h3><?php echo $result['course_name']; ?></h3>

                       <table>
							<tr>
								<td class="recipe-image-view "> <img class="recipe-image "src="upload/recipe-images/<?php echo $result['course_image']; ?>">
								<h3 class="recipe-notes">Recipe Notes</h3>
								<?php echo $result['course_notes']; ?></td>
							</tr>
						</table>
						<br>
						<table>
					  	<tr>
                            <th>Ingredients</th>
                            <?php while ($row_2 = $query->fetch()) {
    //echo '<pre>'. var_export($row_2, true).'</pre>';?>
                            <td>
									<?php echo $row_2['ingredient_name']; ?>
									<?php echo $row_2['qty_used']; ?>
									<?php echo $row_2['units']; ?>
			    			</td>
						
                            <?php
}?>
							</tr>

			   </table>
			   <table>
							<tr>
							<td class="recipe-image-view "> 
								<h3 class="recipe-notes">Recipe Instructions</h3>
								<?php echo $result['course_instructions']; ?></td>
							</tr>
						</table>
	<div>
	<!-- donot remove this div it start from sidebar --->
		</div>
	<!----  sidebar div Ends here  ----->
	<!------ content area sends here            ----->

<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/footer.php'; ?>
