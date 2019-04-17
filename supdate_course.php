<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$fileName = '';
function fileUpload($fileName, $sourcePath, $targetPath, $fileType){
    $valid_extensions = array('jpeg', 'jpg', 'png');
    $temporary = explode('.', $fileName);
    $file_extension = end($temporary);
    if ((($fileType == 'image/png') || ($fileType == 'image/jpg') || ($fileType == 'image/jpeg')) && in_array($file_extension, $valid_extensions)) {
        if (move_uploaded_file($sourcePath, $targetPath)) {
            $uploadedFile = $fileName;
        }
    }
}
if (isset($_POST['submit'])){
    if (!empty($_FILES['fileToUpload']['type'])) {
		$fileName = time().'_'.$_FILES['fileToUpload']['name'];
		$sourcePath = $_FILES['fileToUpload']['tmp_name'];
		$targetPath = 'upload/recipe-images/'.$fileName;
		$fileType = $_FILES['fileToUpload']['type'];
		fileUpload($fileName, $sourcePath, $targetPath, $fileType);
	} 
	$errors = array();
	$required_fields = array('course_name', 'course_type', 'meal_type');
	foreach($required_fields as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0))  {
			$errors[] = $fieldname;
		}
	}
	if (!empty($errors)) {
		redirect_to("new_dish.php");
    }
    $course_id = htmlentities($_POST['course_id']);
	$course_name = htmlentities($_POST['course_name']);
	$prep_date   = htmlentities($_POST['prep_date']);
	$course_type = htmlentities($_POST['course_type']);
	$time_to_prepare  = htmlentities($_POST['time_to_prepare']);
	$course_notes  = htmlentities($_POST['course_notes']);
	$course_instructions  = htmlentities($_POST['course_instructions']);
	$meal_type = htmlentities($_POST['meal_type']);
        // inserting data to meal_course table
	$query =  $dbh->prepare("UPDATE meal_course  SET course_type=:course_type, meal_type=:meal_type");
    $query->execute(array(':course_type'=>$course_type, ':meal_type'=>$meal_type));
    $count = $query->rowCount();
	$sql = $dbh->prepare("UPDATE  course_details SET course_name=:course_name, 
			course_prep_date=:course_prep_date, course_prep_time=:course_prep_time, course_notes=:course_notes, 
			course_instructions= :course_instructions WHERE course_id=:course_id");
	$sql->execute(array(':course_id'=>$course_id, ':course_name'=>$course_name, ':course_prep_date'=>$prep_date, ':course_prep_time'=>$time_to_prepare,
                ':course_notes'=>$course_notes, ':course_instructions'=>$course_instructions));
    if(!empty($fileName)){
                $sql = $dbh->prepare("UPDATE  course_details SET course_image=:course_image WHERE course_id=:course_id");
                $sql->execute(array(':course_image'=>$fileName, ':course_id'=>$course_id)); 
    }
    /* Recipes table Update  start here */
    $query = $dbh->prepare("UPDATE recipes  SET  item_id=:item_id , qty_used=:qty_used WHERE course_id=:course_id AND recipe_id=:recipe_id ");          
    for($i=1; $i<=4; $i++){
        $stock_qty  = 0;
        $new_qty  = 0;
        $recipe_id = $course_id.'.'.$i;
       $item = htmlentities($_POST['item_'.$i]);
       $qty_used = htmlentities($_POST['quantity_'.$i]);
        $query->execute(array(':course_id'=>$course_id, ':recipe_id'=>$recipe_id, ':item_id'=>$item , ':qty_used'=>$qty_used));
        $select_item = $dbh->prepare("SELECT  quantity FROM `stock` WHERE id =:id ");
        $select_item->execute(array(':id'=> $item));
        $result= $select_item->fetch();
        if($stock_qty > $qty_used){
            $stock_qty = $result['quantity'];
            $new_qty= $stock_qty - $qty_used;
            $update_item = $dbh->prepare("UPDATE stock SET  quantity =:quantity WHERE id =:id");
            $update_item->execute(array(':id'=>$item, ':quantity'=>$new_qty));
        }else{ 
			$message =  "<p> Error occured while updating record please try later....!</p>";
        } 
    }
} else {
    $message =  "<p> Error occured while updating record please try later....!</p>";
}
