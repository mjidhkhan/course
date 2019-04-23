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


<!--- Required For Specific Course Start -->

<?php  

$course_id = $_GET['cid'];
$servings = $_GET['ser'];

$query = $dbh->prepare('SELECT 
order_details.course_name, 
order_details.servings, 
meal_type.meal_type, course_type.course_type 
FROM order_details
INNER JOIN meal_type 
ON order_details.meal_type = meal_type.id
INNER JOIN course_type 
ON order_details.course_type = course_type.id
WHERE order_details.course_id=:course_id');
$query->execute(array(':course_id' => $course_id));
$course_details = $query->fetchAll();

?>

<div class="content">
  
<h3>Required Stock fo : <?php echo $course_details[0]['course_name'];?> </h3>
   
  <table class="table">
                  <tr>
                  <td class=" bottom-line right-line   medium bg-default"> Course Name</td>
                  <td class=" bottom-line right-line  medium bg-default "><?php echo $course_details[0]['course_name'];?></td>
                 
                  <tr>
                  <td class=" bottom-line right-line medium bg-default">  Meal Type</td>
                  <td  class=" bottom-line right-line  medium bg-default"><?php echo $course_details[0]['meal_type'];?></td>
                  </tr>
                  <tr>
                  <td class=" bottom-line right-line medium bg-default">  Course Type</td>
                  <td  class=" bottom-line right-line  medium bg-default"><?php echo $course_details[0]['course_type'];?></td>
                  <tr>
                  <td class=" bottom-line right-line medium bg-default"> Required Servings</td>
                  <td  class=" bottom-line right-line  medium bg-default"><?php echo $course_details[0]['servings'];?></td>
                  </tr>
                  </tr>
              </table>
              <br>
            
  </div>
 <br>
        <table>
		<tr>
		   <th>Item Name</th>
		   <th>Required Quantity </th>
		   <th>Available Quantity </th>
		  
		   <th>Status</th>
		   
		
        </tr>
        <?php 

        
        
            $query = $dbh->prepare('SELECT item_id, qty_used,stock.quantity, stock.ingredient_name,  stock.units
            FROM recipes 
            JOIN stock
            ON stock.id = recipes.item_id
            WHERE course_id =:course_id');
            $query->execute(array(':course_id' => $course_id));
            $stock_details = $query->fetchAll();
            $result = '';
            foreach ($stock_details as $key => $value) {
                $stock_quantity = $value['quantity'];
                $stock_required = $servings * $value['qty_used'];
                $status =$stock_required - $stock_quantity;
            ?>
        <tr>
        <td class=" bottom-line right-line  small"><?php echo $value['ingredient_name']; ?></td>
		<td class=" bottom-line right-line  gray small"><?php echo $stock_quantity .''.$value['units'];?></td>
		<td class=" gray bottom-line right-line  small "><?php echo $stock_required.''.$value['units']; ?></td>
		
        <?php 
             if($status<0){
                 $res='LOW' ;
            
              
             
         
        // echo '<pre>'. var_export($res, true).'</pre>';// print_r($res);
            
            
        
        ?>
		<td class="low-stock bottom-line right-line  medium "><a href="low_stock_details.php?cid=<?php echo $course_id; ?>&ser=<?php echo $servings; ?>" class="low-stock"> <i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
         <?php }else{   $res='OK' ;?>
            <td class=" ok-stock bottom-line right-line  medium "><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
         <?php } }  ?>
        </tr>
        <?php
        
        ?>

        </table> 



































<!--- Required For Specific Course End -->


<!-- content area sends here            ----->
<?php  if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
            include 'includes/staff_sidebar.php';
        } else {
            include 'includes/sidebar.php';
        }
        ?>
	<?php include 'includes/footer.php'; ?>