<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php confirm_logged_in(); ?>
<?php include 'includes/header.php'; ?>

	<!-- content area stats here            ----->
        <?php  if (logged_in()) {
    ?>
        <h3> Welcome to Staff area,  <?php echo strtoupper($_SESSION['username']);
}?> </h3><hr>
        <?php //this query will show if ingredients quantatiy is low we set the standar of 250 g/ml
        $sql = $dbh->prepare('SELECT * FROM stock WHERE quantity <= reorder_level');
        $sql->execute();
        $result = $sql->fetchAll() ;
                if (sizeof($result) != 0) {
                    ?>
                    <h3>Some of Ingredients has Low Quantity in stock </h3>
                <table class="table">
                    <tr>
                        <th>Ingredient</th>
                        <th>Qyantity</th>
                        <th>Update</th>
                    </tr>
            <?php
                }?>
            <?php  foreach ($result as $key => $value) {
                # code...
            
                    ?>
                    <tr>
                        <td class="bottom-line right-line  small low"><?php echo $value['ingredient_name']; ?></td>
                        <td class="bottom-line right-line  small low"><?php echo $value['quantity']; ?></td>
                        <td  class="bottom-line right-line  small"><a class="error" href="manage_stock.php?id=<?php echo $row['id']; ?>"> Update</a> </td>
                    </tr>
            <?php
                }?>
                </table> 
                <br><br>

	<?php //this query will show all available courses
      $sql = $dbh->prepare('SELECT * FROM `course_details` ');
      $sql->execute();
      $result = $sql->fetchAll();
        ?>
	<h3> Available courses</h3>
	<table class="table">
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
		   <th>Preperation Date</th>
		   <th>Meal Type</th>
            <th>Modify</th>
            <th>Recipe</th>
		</tr>
		<tr>
                    <?php foreach ($result as $key => $value) {
            ?>
                        <?php
                         $sql = $dbh->prepare('SELECT * FROM `meal_course` WHERE id=:id ');
            $sql->execute(array(':id' => $value['course_id']));
            $result = $sql->fetch();

            $sql = $dbh->prepare('SELECT * FROM `course_type` WHERE id=:id ');
            $sql->execute(array(':id' => $result['course_type']));
            $result_course = $sql->fetch();

            $sql = $dbh->prepare('SELECT * FROM `meal_type` WHERE id=:id ');
            $sql->execute(array(':id' => $result['meal_type']));
            $result_meal = $sql->fetch(); ?>

                    <td  class=" bottom-line right-line  small"><?php echo $value['course_name']; ?></td>
                   
                  <td  class=" bottom-line right-line  small"><?php echo $result_course['course_type']; ?></td>
                  <td  class=" bottom-line right-line  small"><?php echo $value['course_prep_date']; ?></td>
                  <td  class=" bottom-line right-line  small"><?php echo $result_meal['meal_type']; ?></td>
                    <td  class=" bottom-line right-line  small"><a href="update_course.php?course_id=<?php echo $value['course_id']; ?>"> Update</a> </td>
                    <td  class=" bottom-line right-line  small"><a href="recipe_view.php?course_id=<?php echo $value['course_id']; ?>"> View</a> </td>

                </tr>
                <?php
        }?>
        </table>
	<!-- content area sends here            ----->
        <?php  if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
            include 'includes/staff_sidebar.php';
        } else {
            include 'includes/sidebar.php';
        }
        ?>
	<?php include 'includes/footer.php'; ?>
