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
           <td class="bottom-line right-line order gray ">Order Date</td><td class=" bottom-line right-line gray ">20-04-2019</td>
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


                    <?php foreach ($result as $key => $value) {
                        ?>
                        <?php
                         $sql =  $dbh->prepare( "SELECT * FROM `meal_course` WHERE id=:id ");
                         $sql->execute(array(':id'=>$value['course_id']));
                         $result= $sql->fetch();
                        
                         $sql =  $dbh->prepare( "SELECT * FROM `course_type` WHERE id=:id ");
                         $sql->execute(array(':id'=>$result['course_type']));
                         $result_course= $sql->fetch();

                         $sql =  $dbh->prepare( "SELECT * FROM `meal_type` WHERE id=:id ");
                         $sql->execute(array(':id'=>$result['meal_type']));
                         $result_meal= $sql->fetch();
                         ?>
                  <td  class=" bottom-line right-line  small"><?php echo $value['course_name']; ?></td>
                  <td  class=" bottom-line right-line gray small"><?php echo $result_course['course_type']; ?></td>
                  <td  class=" bottom-line right-line gray small"><?php echo $result_meal['meal_type']; ?></td>
                  <td  class=" bottom-line right-line  small"> 1 </td>
                   

                </tr>
                <?php  }?>
        </table>

        <div class="order-button ">
        <input type="submit" class="formbutton pull-right" name="submit" value="Submit Order" />
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
