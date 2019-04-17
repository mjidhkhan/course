<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php //confirm_logged_in();  ?>

<?php include("includes/header.php"); ?>
    <h3 class="sidebar-title second">Contact Us </h3>
    <div id="content">
        <div class="page">
            <div class="contents"></div>
        </div>
        <table >
            <tr>
		<td>
			<h3>Your Query Here...</h3>
                        <?php if (!empty($message)){ echo "<p class=\"message\">" . $message . "</p>";} ?>
			<form action="new_staff.php" method="post">
			<table>
                <tr>
					<td><label for="course_notes" id="course_notes">Your name <span class= "req" > * </span> </label></td>
					<td><input type="text" name="fullname" maxlength="30" value="" /></td>
				</tr>
				
                <tr>
					<td><label for="course_notes" id="course_notes">Your email <span class= "req" > * </span> </label></td>
					<td><input type="text" name="email" maxlength="30" value="" /></td>
				</tr>
				
                <tr>
					<td> <label for="course_notes" id="course_notes">Message <span class= "req" > * </span> </label></td>
					<td><textarea  name="course_notes" id="course_notes" cols="50" rows="5"></textarea></td>
				</tr>
				
                
                                        <td></td>
					<td colspan="2"><input type="submit" class="formbutton" name="submit" value="Submit" /></td>
				</tr>
			</table>
			</form>
		</td>
            </tr>
        </table>   
    </div>
<!----
	
	<!--  ---- content area sends here            ---  -->
        <?php  include("includes/sidebar.php");?>

	<?php include("includes/footer.php"); ?>