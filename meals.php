<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

	<!------ content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['username']);?> <hr> <?php }?></h3>
	<?php //this query will show all available courses
		 $sql =  $dbh->prepare("SELECT * FROM meal_course");
         $sql->execute();
         $row= $sql->fetchAll();
         foreach ($row as $key => $value){
            $sql =  $dbh->prepare("SELECT * FROM `course_details`
                Where course_id =:course_id");
                $sql->execute(array(':course_id'=>$value['id']));
                $result= $sql->fetch();
                
        ?>
                 <h3>Meal Course: <?php echo $cont=$result['course_name']; ?></h3>
                 <h5 class="sub-title">Course Type:   <?php  if($value['course_type']== 1){
					echo "Starter";}
				if($value['course_type']== 2){
					echo "Main Course";}
				if($value['course_type']== 3){
					echo "Desserts";}
				if($value['course_type']== 4){
					echo "Breakfast";}
				if($value['course_type']== 5){
					echo "Refreshment";
				}; ?>
                 | Meal Type:    <?php if ($value['meal_type']== 2){
			echo "Vegetarian";
			}else{
				echo "Non-vegetarian";
                        } ?></h5>
                <p><img  class="recipe-image" src="upload/recipe-images/<?php echo $result['course_image']; ?>"></p>
                <h3>Course Notes:</h3> <p class="contents"> <?php echo $result['course_notes']; ?></p>
                <p class="posted"><a href="reviews.php?cont=<?php echo $cont_id=$result['course_id'];?>">Rate & Review</a> </p>
                <p class="reviews"> Customers Reviews</p>
                <?php //this query will show all available reviews for specific course
		$sql_1 = $dbh->prepare("SELECT course_details.course_id,
                                course_details.course_name,
                                course_details.course_image,
                                review_rating.review,
                                review_rating.user_id,
                                review_rating.date,
                                review_rating.rating,
                                review_rating.cont_title,
                                users.fullname
                        FROM course_details
                        LEFT join review_rating
                        ON course_details.course_id = review_rating.course_id
                        LEFT JOIN users
                        ON review_rating.user_id = users.id
                        where course_details.course_id = :cont_id
                        ORDER BY review_rating.rating ");
			$sql_1->execute(array(':cont_id'=>$cont_id));
?>

                <div class= "comments">
                <?php while($row_1= $sql_1->fetch()){?>

                    <ul>
                        <li>
                            <p> <h3><strong> <?php echo $row_1['fullname'] ;?> </Strong></h3></p>
                            <p> <?php echo $row_1['date'] ;?></p>
                            <p>   <?php
                                            if($row_1['rating'] == 1){
                                                echo '<img style="width:inherit; height:inherit" src="images/1star.gif"/> ' ;}
                                            if($row_1['rating'] == 2){
                                                echo '<img style="width:inherit; height:inherit" src="images/2star.gif"/>' ;}
                                            if($row_1['rating'] == 3){
                                                echo '<img style="width:inherit; height:inherit" src="images/3star.gif"/>' ;}
                                            if($row_1['rating'] == 4){
                                                echo '<img style="width:inherit; height:inherit" src="images/4star.gif"/>' ;}
                                            if($row_1['rating'] == 5){
                                                echo '<img style="width:inherit; height:inherit" src="images/5star.gif"/>' ;}
                                            if($row_1['rating'] == null){
                                                    echo '<p class ="star-rate"> This Porducted is not reviewed or rated. ';
                                                }
                                        ?>
                            </p>
                           <p>
                            <h3> <?php echo $row_1['cont_title'] ;?></h3>
                            <p> <?php echo $row_1['review'] ;?> </p>
                            </p>
                        </li>
                    </ul>
                <?php } ?>

                <div class="clear"></div>
                </div>
         <?php }?>

        <div>
	<!------ content area sends here            ----->
        </div>
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
