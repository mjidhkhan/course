<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php //confirm_logged_in();?>
<?php include 'includes/header.php'; ?>

	<!------ content area stats here            ----->

        <?php  if (logged_in()) {
    ?>
        <h3> Hi,  <?php echo strtoupper($_SESSION['username']); ?> Special  Starters for you</h3>
        <?php
} else {
        ?>
            <h3>All available Starters
        <?php
    } ?></h3><hr>
        <?php //this query will show all available Starters.

        $sql = $dbh->prepare('SELECT * FROM `meal_course`
        Where course_type = 1');
        $sql->execute();
        $row = $sql->fetchAll();
        foreach ($row as $key => $value) {
            $sql = $dbh->prepare('SELECT * FROM `course_details`
        Where course_id =:course_id');
            $sql->execute(array(':course_id' => $value['id']));
            $result = $sql->fetch(); ?>
        <h3 class="recipe-title"><?php echo $result['course_name']; ?></h3>
                <p><img  class="recipe-image" src="upload/recipe-images/<?php echo $result['course_image']; ?>"></p>
                <h3 class="recipe-notes">Recipe Notes</h3>
                <p class="contents"><?php echo $result['course_notes']; ?></p>
                <h3 class="recipe-notes">Recipe Instructions</h3>
                <p class="contents"><?php echo $result['course_instructions']; ?></p>
                <br>
                <hr>
        <?php
        }?>
	<!------ content area sends here            ----->
        <?php  include 'includes/sidebar.php'; ?>
	<?php include 'includes/footer.php'; ?>
