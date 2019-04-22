<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>
<?php 
// Empty the basket

?>
<h2 class="page-heading bg-success x-larg"><span id="success-title"> Success</span></h1>
<hr>
<div class="">
    <blockquote>
        <p id="success-message" class="success larg">
            Your order submited successfully.
        </p>
    </blockquote>
</div>

 <?php  if ($_SESSION['status'] == 1) {
    include 'includes/staff_sidebar.php';
} else {
    include 'includes/sidebar.php';
}
        ?>
	<?php include 'includes/footer.php'; ?>