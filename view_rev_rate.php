<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


	<!------ content area stats here            ----->
<?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo $user = strtoupper($_SESSION['username']);?> </h3>
<?php }else{?>
        <h3>Reviews to our Meals by  customers
<?php } ?>
        </h3><hr>
<?php //this query will show all  reviews by customers for specific products.
		$sql = $dbh->prepare("SELECT course_details.course_id,
                                course_details.course_name,
                                course_details.course_notes,
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
                        ORDER BY review_rating.date ");
		$sql->execute();

?>
         <div class= "cust-reviews">
                <?php while($row= $sql->fetch()){?>
                    <ul>
                        <li>
                            <p>
                            <p> <h3>Meal <?php echo $row['course_name'] ;?></h3></p>
                                <p class="sub-title"><strong> <?php echo $row['fullname'] ;?> </Strong>
                             |<?php echo $row['date'] ;?></p>
                            <p><img  class="recipe-image" src="upload/recipe-images/<?php echo $row['course_image']; ?>"></p>
                            <h3> <?php echo $row['cont_title'] ;?></h3>
                            
                            <p>   <?php
                                            if($row['rating'] == 1){
                                                echo '<img style="width:inherit; height:inherit" src="images/1star.gif"/> ' ;}
                                            if($row['rating'] == 2){
                                                echo '<img style="width:inherit; height:inherit" src="images/2star.gif"/>' ;}
                                            if($row['rating'] == 3){
                                                echo '<img style="width:inherit; height:inherit" src="images/3star.gif"/>' ;}
                                            if($row['rating'] == 4){
                                                echo '<img style="width:inherit; height:inherit" src="images/4star.gif"/>' ;}
                                            if($row['rating'] == 5){
                                                echo '<img style="width:inherit; height:inherit" src="images/5star.gif"/>' ;}
                                            if($row['rating'] == null){
                                                    echo '<p class ="star-rate"> This Porducted is not reviewed or rated. ';
                                                }
                                        ?>

                            </p>

                            <p> <?php echo $row['review'] ;?> </p>
                            
                        </li>
                    </ul>
                <?php } ?>


                </div>


        <div>
        </div>
	<!------ content area sends here            ----->
        <?php  include("includes/sidebar.php");?>
	<?php include("includes/footer.php"); ?>
