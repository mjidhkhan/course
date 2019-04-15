<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in();  ?>

<?php include("includes/header.php"); ?>

	<!--  ---- content area stats here            ---  -->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['username']);}?> </h3>
	<?php //this query will show all available courses
		$sql = $dbh->prepare("SELECT * FROM course_details");
		$sql->execute();
        ?>
        <hr>
	<?php while($result= $sql->fetch()){ ?>
                <h3 class="recipe-title"><?php echo $result['course_name']; ?></h3>
                <p><img  class="recipe-image" src="upload/recipe-images/<?php echo $result['course_image']; ?>"></p>
                <h3 class="recipe-notes">Recipe Notes</h3>
                <p class="contents"><?php echo $result['course_notes']; ?></p>
                <h3 class="recipe-notes">Recipe Instructions</h3>
                <p class="contents"><?php echo $result['course_instructions']; ?></p>
                <br>
                <hr>
        <?php }?>
	<!--  ---- content area sends here            ---  -->
        <?php  include("includes/sidebar.php");?>

	<?php include("includes/footer.php"); ?>
