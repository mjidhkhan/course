<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php

$query = $dbh->prepare('SELECT orders.id, orders.customer_id,
                        orders.order_date, 
                        orders.booking_date,users.fullname 
FROM orders
INNER JOIN users 
ON users.id = orders.customer_id');
$query->execute();
$allOrders = $query->fetchAll();

?>

<?php include 'includes/header.php'; ?>
	<!------ content area stats here            ----->
<div id="content-head">
		<?php  if (logged_in()) {
    ?>
		<h3> Welcome,  <?php echo strtoupper($_SESSION['fullname']);
}?> </h3>
	</div>
	<div id="content"> 
		<h3 class="page-heading">View All Orders</h3>  
	    <table>
		<tr>
		   <th>Customer</th>
		   <th>Order Date</th>
		   <th class=" booking small">Booking Date</th>
		   <th class="">View</th>
		   
		
		</tr>
		<?php
        foreach ($allOrders as $key => $value) {
            //print_r($value);
            //foreach ($data as $key => $value) {?>
		<tr>
		<td class=" bottom-line right-line  small"><?php echo $value['fullname']; ?></td>
		<td class=" bottom-line right-line  gray small"><?php echo $value['order_date']; ?></td>
		<td class=" error bottom-line right-line  medium "><?php echo $value['booking_date']; ?></td>
        <td class=" success bottom-line right-line  small details-link"> <a href="order_details.php?order_id=<?php echo $value['id']; ?>&cust_id=<?php echo $value['customer_id']; ?>">Details</a></td>
        </tr>
        <tr>

        </tr>
		<?php
           // }
        } ?>

        </table> 

    </div>
	<?php  if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
            include 'includes/staff_sidebar.php';
        } else {
            include 'includes/sidebar.php';
        }
        ?>
	<?php include 'includes/footer.php'; ?>
