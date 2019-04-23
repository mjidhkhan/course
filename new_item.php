<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php confirm_logged_in(); ?>


<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
	$item_name = $_POST['item_name'];
	$item_qty = ($_POST['item_qty']);
	$units = ($_POST['units']);
	
	$query 	= $dbh->prepare("INSERT INTO stock (ingredient_name, quantity,units) 
    VALUES(:ingredient_name, :quantity,:units)");
		$query->execute(array(':ingredient_name' => $item_name, ':quantity' => $item_qty, ':units'=>$units));
		//$result = mysql_query($query);
		      if (	$query->rowCount() == 1) {
		      // if record updated we redirect to qty_view.php
		      redirect_to("index_staff.php?a=1");
		      } else {
		      // Failed
		     $message = "The subject update failed.";
		     $message .= "<br />". mysql_error();
		}
}

?>
<?php include("includes/header.php"); ?>
<h3> Welcome , <?php echo $_SESSION['fullname'];?> </h3><p>
<!------ content area stats here----->
<form action="new_item.php" method="post" id="add_course">
                <div><h3 class="page-heading"> Add New Item In Stock</h3></div>
               
		<div class="small_inst"> Quantity must be in grams/litters.</div>
		<div class="small_inst"> Units: 1kg = 1000 grams & 1 liter = 1000 ml.</p></div>
        <div class="contents" >
            <table>
			

			<tr>
				<td>
				<label class="btn-right"> Item Name</label>
				</td>
				<td>
				<input type="text"  class="ingredient " value="" name="item_name" />
				
				</td>
			</tr>
			<tr>
				<td>
				<label  class="btn-right">Item Quantity</label>
				</td>
				<td>
				<input type="text" class="ingredient" name="item_qty"/>
				<span class="small">g/ml</span>
				</td>
			</tr>
			<tr>
				<td>
				<label  class="btn-right">Units</label>
				</td>
				<td>
				<select name="units" style="width:80px">
                    <option value='g'>grams</option>
                    <option value='ml'>mili-litters</option>

                </select>
				<span class="small">g/ml</span>
				</td>
			</tr>
			<tr>
			<div class=" actions button">
				<td>
				<input type="submit" class="searchsubmit formbutton btn-right" name="submit" value="Submit" />
				</td>
				<td>
				
		
		<input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" />
		
				</td>
				</div>
			</tr>
			</table>    
		    
		    
                  
                   
		   
                   
                    
               </div>
		
</form>
<div>
<!-- donot remove this div it start from sidebar --->
	    </div>
	<!-- content area sends here            ----->
        <?php  if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
            include 'includes/staff_sidebar.php';
        } else {
            include 'includes/sidebar.php';
        }
        ?>
	<?php include 'includes/footer.php'; ?>
