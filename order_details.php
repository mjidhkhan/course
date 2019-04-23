<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/functions.php'; ?>

<?php
$order_id = $_GET['order_id'];
$customer_id = $_GET['cust_id'];

$query = $dbh->prepare('SELECT DISTINCT users.fullname,users.email, 
orders.id, orders.booking_date,
order_details.course_id,
order_details.course_name, 
order_details.servings, 
order_details.order_status,
meal_type.meal_type, course_type.course_type 
FROM users
INNER JOIN orders 
ON orders.customer_id = users.id
INNER JOIN order_details 
ON order_details.order_id = orders.id
INNER JOIN meal_type 
ON order_details.meal_type = meal_type.id
INNER JOIN course_type 
ON order_details.course_type = course_type.id
WHERE orders.id=:order_id
AND orders.customer_id=:customer_id');
$query->execute(array(':order_id' => $order_id, ':customer_id' => $customer_id));
$order_details = $query->fetchAll();

//echo '<pre>'.var_export($order_details, true).'</pre>';

foreach ($order_details as $key => $value) {
    $status = $value['order_status'];
    if ($status == 0) {
        $pending = 'Pending';
    } else {
        $pending = 'Done';
    }

    $email = $value['email'];
    $booking_date = $value['booking_date'];
    $customer = $value['fullname'];
}

?>

<?php include 'includes/header.php'; ?>
	<!------ content area stats here            ----->
<div id="content-head">
		<?php  if (logged_in()) {
    ?>
		<h3> Welcome,  <?php echo strtoupper($_SESSION['fullname']);
}?> </h3>
    </div>
    <br>
                <br>
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
<hr>
	<div id="content"> 
        <div class=" row">
            <div class="column left">
                <table class="table">
                    <tr>
                    <td class="bg-default bottom-line right-line order">Customer </td><td class=" bottom-line right-line gray small "><?php echo $customer; ?></td>
                    <tr>
                    <td class="bg-default bottom-line right-line order">Contact</td>
                    <td  class=" bottom-line right-line gray "><?php echo $email; ?></td>
                    </tr>
                </table>
            </div>
            <div class="column right">
                <table class="table">
                    <tr>
                        <td class="bg-default order bottom-line right-line order">Reservation Date</td><td class="bottom-line right-line  gray small"><?php echo $booking_date; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-default bottom bottom-line right-line order">Order Status </td><td class=" bottom-line right-line pending medium "><?php echo $pending; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <br>
        <br>
        <table>
		<tr>
		   <th>Course Name</th>
		   <th>Meal Type</th>
		   <th>Course Type</th>
		   <th class=" booking0 medium0">Servings</th>
		   <th>Stock Status</th>
		   
		
        </tr>
        <?php 
        foreach ($order_details as $key => $value) {
            $course_id = $value['course_id'];
            $servings = $value['servings'];
            $query = $dbh->prepare('SELECT item_id, qty_used,stock.quantity
            FROM recipes 
            JOIN stock
            ON stock.id = recipes.item_id
            WHERE course_id =:course_id');

            $query->execute(array(':course_id' => $course_id));
            $stock_details = $query->fetchAll();
            ?>
        <tr>
        <td class=" bottom-line right-line  small"><?php echo $value['course_name']; ?></td>
		<td class=" bottom-line right-line  gray small"><?php echo $value['meal_type']; ?></td>
		<td class=" gray bottom-line right-line  small "><?php echo $value['course_type']; ?></td>
		<td class=" error bottom-line right-line  medium "><?php echo $value['servings']; ?></td>
        <?php 
         $result = '';
         foreach ($stock_details as $key => $value) {
             $stock_quantity = $value['quantity'];
             $stock_used = $servings * $value['qty_used'];
              $status = $stock_quantity -  $stock_used;
             if($status<0){
                 $res[] ='LOW' ;
             }elseif($status<250 && $status>=0){
                $res[] ='CRT' ;
             }else{
                $res[] ='OK' ;
             }
         }
        // echo '<pre>'. var_export($res, true).'</pre>';// print_r($res);
        
        $level = array_count_values($res);
        
           
       
         // echo '<pre>'. var_export($a, true).'</pre>';// print_r($res);
        
        if( array_key_exists('LOW', $level)){
        ?>
		<td class="low-stock bottom-line right-line  medium "><a href="low_stock_details.php?cid=<?php echo $course_id; ?>&ser=<?php echo $servings; ?>" class="low-stock"> <i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
         <?php }else if( array_key_exists('CRT', $level)){ ?>
            <td class=" ok-stock bottom-line right-line  medium "><a href="low_stock_details.php?cid=<?php echo $course_id; ?>&ser=<?php echo $servings; ?>" class="warning-stock"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></td>
         <?php } else{ ?>
            <td class=" ok-stock bottom-line right-line  medium "><a href="low_stock_details.php?cid=<?php echo $course_id; ?>&ser=<?php echo $servings; ?>" class="ok-stock"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
            <?php } $res=null ?>
        </tr>
        <?php
        }
        ?>

        </table> 
</div>


<?php  if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
            include 'includes/staff_sidebar.php';
        } else {
            include 'includes/sidebar.php';
        }
        ?>
	<?php include 'includes/footer.php'; ?>