<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
        $status = 0;
        $pending = 'Pending';


        if(isset($_SESSION['ORDERS'])){

            $orders = $_SESSION['ORDERS'];
            $query =  $dbh->prepare( "SELECT * FROM `course_details` WHERE course_id=:course_id ");
            foreach ($orders as $key => $value) {
                 $course_id = $value;
                 $query->execute(array(':course_id'=>$value));
                 $result[]=$query->fetch(); 
            }
            
        }
       
        ?>

	<!-- content area stats here            ----->
        <?php  if (logged_in()){?>
        <h3> Welcome,  <?php echo strtoupper($_SESSION['fullname']);}?> </h3><hr>
        <?php ?>
		
    <h3 class="page-heading"> You Order Basket</h3>
    <div class=" row">
    <div class="column left">
    <table class="table">
   
		<tr>
           <td class=" order bottom-line right-line  ">Reservation Date</td><td class="bottom-line right-line  pending larg">20-04-2019</td>
        <tr>
           <td class="bottom-line right-line order gray ">Order Date<span class= "req" > * </span></td><td class=" bottom-line right-line gray ">
				<input type= "text" name="prep_date" id="date" size="20" required/>
           </td>
        </tr>
    </table>
        </div>
    <div class="column right">
    <table class="table">
    
		<tr>
           <td class="bottom-line right-line order   ">Order Status </td><td class=" bottom-line right-line pending larg "><?php echo $pending; ?></td>
        <tr>
           <td class=" bottom-line right-line order gray ">contact</td>
           <td  class=" bottom-line right-line gray "><?php echo $_SESSION['email']; ?></td>
               
              
         
        </tr>
    </table>
        </div>
</div>

<br>
	<table class="table">
		<tr>
		   <th>Course Name</th>
		   <th>Course Type</th>
           <th>Meal Type</th>
           <th>Servings</th>
		</tr>
		<tr>


                    <?php
                    unset($_SESSION['ORDERS_DETAILS']);
                  
                    
                    foreach ($result as $key => $value) {
                        ?>
                        <?php
                         $sql =  $dbh->prepare( "SELECT * FROM `meal_course` WHERE id=:id ");
                         $sql->execute(array(':id'=>$value['course_id']));
                         $result1= $sql->fetch();
                        
                         $sql =  $dbh->prepare( "SELECT * FROM `course_type` WHERE id=:id ");
                         $sql->execute(array(':id'=>$result1['course_type']));
                         $result_course= $sql->fetch();

                         $sql =  $dbh->prepare( "SELECT * FROM `meal_type` WHERE id=:id ");
                         $sql->execute(array(':id'=>$result1['meal_type']));
                         $result_meal= $sql->fetch();
                         $full_order[]= array('course_id'=>$value['course_id'], 
                                                    'course_type'=> $result1['course_type'],
                                                    'meal_type'=>$result1['meal_type'],
                                                    'course_name'=>$value['course_name']
                                                );
                        
                         ?>
                  <td  class=" bottom-line right-line  small"><?php echo $value['course_name']; ?></td>
                  <td  class=" bottom-line right-line gray small"><?php echo $result_course['course_type']; ?></td>
                  <td  class=" bottom-line right-line gray small"><?php echo $result_meal['meal_type']; ?></td>
                  <td  class=" bottom-line right-line  small">
                  <select id="course_<?php echo $value['course_id'] ?>" name="item_<?php echo $value['course_id'] ?>" >
                  <?php for($idx =1; $idx<=10; $idx ++){ ?> 
                        <option value="<?php echo $idx; ?>"><?php echo $idx; ?></option>
                    <?php }?>
				 </select>
                
                </td>
                   

                </tr>
                <?php  }


                $_SESSION['ORDERS_DETAILS'][] =  $full_order;
                
                ?>
        </table>

        <div class="order-button ">
        <input type="submit" class="formbutton pull-right" onclick="placeOrder('order_submited.php')" name="submit" value="Submit Order" />
        <br>
        <br>

        </div>
        <p  class=" bottom-line"></p>
					
				
			
	<!-- content area sends here            ----->
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>
	<?php include("includes/footer.php"); ?>
