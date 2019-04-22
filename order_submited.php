<?php require_once 'includes/session.php'; ?>
<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/functions.php'; ?>

<?php

//echo '<pre>'.var_export($_SESSION, true).'</pre>'; //print_r($_SESSION);

if (isset($_POST)) {
    if ($_POST['action'] == 'REMOVE_ITEM') {
        removeItem($_POST);
    } elseif ($_POST['action'] == 'ORDER') {
        addOrder($dbh, $_POST);
        $servings = $_POST['servings'];
    }
}

function removeItem($posted)
{
    // print_r($_SESSION['ORDERS']);
    //print_r($_SESSION['ORDERS_DETAILS']);
    if (array_key_exists('ORDERS', $_SESSION)) {
        foreach ($_SESSION['ORDERS_DETAILS'] as $key => $value) {
            if ($value['course_id'] == $posted['id']) {
                $index = $key;
                unset($_SESSION['ORDERS_DETAILS'][$index]);
                unset($_SESSION['ORDERS'][$index]);
                $_SESSION['ORDERS_DETAILS'] = array_values($_SESSION['ORDERS_DETAILS']);
                $_SESSION['ORDERS'] = array_values($_SESSION['ORDERS']);

                if (sizeof($_SESSION['ORDERS']) == 0) {
                    unset($_SESSION['ORDERS']);
                    unset($_SESSION['ORDERS_DETAILS']);
                }
            }
        }
    }
    if (array_key_exists('ORDERS', $_SESSION)) {
        echo sizeof($_SESSION['ORDERS']);
    }
}

function addOrder($dbh, $posted)
{
    $response = insertOrderData($dbh, $posted);
    if ($response > 0) {
        $data = $_SESSION['ORDERS_DETAILS'];
        echo $result = insertOrderDetailsData($dbh, $data, $response);

        if ($result <= 0) {
            unset($_SESSION['ORDERS']);
            unset($_SESSION['ORDERS_DETAILS']);
        }
    }
}

function insertOrderData($dbh, $data)
{
    $date = date('Y-m-d');
    $customer_id = $_SESSION['user_id'];
    $booking_date = $data['booking_date'];
    // insert in to orders

    $query = $dbh->prepare('INSERT INTO orders (customer_id, order_date, booking_date)
              VALUES(:customer_id, :order_date, :booking_date)');
    $query->execute(array(':customer_id' => $customer_id, ':order_date' => $date, ':booking_date' => $booking_date));

    return $dbh->lastInsertId();
}
function insertOrderDetailsData($dbh, $data, $order_id)
{
    // print_r($data);

    $query = $dbh->prepare('INSERT INTO order_details (order_id, course_id, order_ref, meal_type,
										course_type, course_name, servings, order_status)
              VALUES(:order_id, :course_id, :order_ref, :meal_type,
										:course_type, :course_name, :servings, :order_status)');
    foreach ($data as $key => $value) {
        $course_id = $value['course_id'];
        $course_type = $value['course_type'];
        $meal_type = $value['meal_type'];
        $course_name = $value['course_name'];
        $order_status = 0; // order pending
        $order_ref = (string) $order_id.'.'.$key;
        $servings = 1; // default 1 we will update it later.
        $query->execute(array(':order_id' => $order_id, ':course_id' => $course_id, ':order_ref' => $order_ref, ':meal_type' => $meal_type,
            ':course_type' => $course_type, ':course_name' => $course_name, ':servings' => $servings, ':order_status' => $order_status,
        ));

        $result = updateServings($dbh, $course_id, $order_id, $order_ref);
    }

    return $result;
}

function updateServings($dbh, $course_id, $order_id, $order_ref)
{
    $servings = $_POST['servings'];
    foreach ($servings as $key => $value) {
        /**
         * Servings are in 43-1, 44-3 formate
         * where befor - is order id and after - is servings.
         * we need to explode - which return and array of two
         * itwms and then we can use course id to match with
         * course id in seccion, and can update order_details table.
         */
        $item = explode('-', $value);
        $serv_course_id = $item[0];
        $n_servings = $item[1];
        if ($serv_course_id === $course_id) {
            $query = $dbh->prepare('UPDATE  order_details SET servings=:servings 
									  WHERE order_id=:order_id AND order_ref=:order_ref');
            $query->execute(array(':servings' => $n_servings, ':order_id' => $order_id, ':order_ref' => $order_ref));
            $result = $query->rowCount();
        }
    }

    return $result;
}

?>
