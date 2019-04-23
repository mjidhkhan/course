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
  
<h3 class="page-heading">Required Stock for : <span ><?php echo $course_details[0]['course_name'];?> </span></h3>
   
  <table class="">
  <tr>
                  <td class="  gray bg-default">  Meal Type : <span class="success medium"><?php echo $course_details[0]['meal_type'];?></span></td>
                 
                  </tr>
                  <tr>
                  <td class="  bg-default gray">  Course Type : <span class="success medium"><?php echo $course_details[0]['course_type'];?></span></td>

                  <tr>
                  <td class="  bg-default gray"> Required Servings : <span class="success medium"><?php echo $course_details[0]['servings'];?></span></td>
                  
                  </tr>
                  </tr>
              </table>
              <br>
            
  </div>
  <div class="content">
  
   
    <table class="table">
                    <tr>
                    <td class=" bottom-line right-line order error medium">  <i class="fa fa-arrow-down" aria-hidden="true"></i> </td>
                    <td class=" bottom-line right-line gray small error ">Low Stock Level with respect to number of servings required.</td>
                    <tr>
                    <td class=" bottom-line right-line order medium success"> <i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                    <td  class=" bottom-line right-line gray success">Sufficient Stock Level with respect to number of servings required.</td>
                    </tr>
                    <tr>
                    <td class=" bottom-line right-line order medium warning"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></td>
                    <td  class=" bottom-line right-line gray warning">Critical Stock Level with respect to number of servings required.</td>
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
                $status = $stock_quantity - $stock_required;
            ?>
        <tr>
        <td class=" bottom-line right-line  small"><?php echo $value['ingredient_name']; ?></td>
		<td class=" bottom-line right-line  gray small"><?php echo $stock_required .''.$value['units'];?></td>
		<td class=" gray bottom-line right-line  small "><?php echo $stock_quantity.''.$value['units']; ?></td>
		
        <?php 
             if($status <0 ){ $res='LOW' ;
        ?>
        <td class="low-stock bottom-line right-line  medium "><a href="manage_stock.php?id=<?php echo $value['item_id']; ?>" class="low-stock"> <i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
        <?php }else if($status<250 && $status>=0){ $res='CRT' ;?>
        <td class="warning-stock bottom-line right-line  medium  "><a href="manage_stock.php?id=<?php echo $value['item_id'];?>" class="warning-stock"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></td>
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
