<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>
<h3 class="page-heading bg-error"><span id="error-title"></span></h3>
<hr>
<div class="">
    <blockquote>
        <p id="error-message"></p>
    </blockquote>
</div>




 <?php  if ($_SESSION['status'] == 1) {
    include 'includes/staff_sidebar.php';
} else {
    include 'includes/sidebar.php';
}
        ?>
	<?php include 'includes/footer.php'; ?>