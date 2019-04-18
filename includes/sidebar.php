</div> 
        <div id="sidebar">
            <ul id="accordion">
                <li class="active">
                    <ul class="blocklist">
                        <li class="second">
                            <p class="sidebar-title">Main</p>
                                <ul>
                                        <?php if (logged_in() && $_SESSION['status'] == 1) {
    ?>
                                    <li><a href="index_staff.php">Staff Home</a></li>
                                        <?php
}?>
                                        <?php if (logged_in() && $_SESSION['status'] == 2) {
        ?>
                                    <li><a href="index_cust.php">Home</a></li>
                                         <?php
    }?>
                                         <?php if (!logged_in()) {
        ?>
                                    <li><a href="index.php">Home</a></li>
                                        <?php
    }?>
                                </ul>
                        </li>
                        <li class="second">
                        <p class="sidebar-title">Meals</p>
                                <ul>
                                    <li><a href="meals.php">All Meals</a></li>
                                    <li><a href="starters.php">Starters</a></li>
                                    <li><a href="main_courses.php">Main Courses</a></li>
                                   
                                </ul>
                        </li>
                        <li class="second">
                        <p class="sidebar-title">Categories</p>
                                <ul>
                                    <li><a href="meal_veg.php">Vegetarian</a></li>
                                    <li><a href="meal_nonveg.php">None-Vegetarian</a></li>
                                </ul>
                        </li>
                        <li class="second">
                        <p class="sidebar-title">Customers</p>
                                <ul>
                                    <?php if (logged_in()) {
        ?>
                                    <li><a href="order.php">View Order</a></li>
                                        <?php
    } else {
        ?>
                                    <li><a href="new_cust.php">Register</a></li>
                                        <?php
    }?>
                                        <?php if (logged_in()) {
        ?>
                                    <li> <a href="logout.php">Logout</a></li>
                                        <?php
    } else {
        ?>
                                    <li><a href="user_login.php">Login</a></li>
                                        <?php
    } ?>
                                </ul>
                        </li>
                        <?php if (logged_in() && isset($_SESSION['ORDERS'])) {
        ?>
                        <li class="second" id="orders">
                        <p class="sidebar-title">Basket</p>
                                <ul>
                                    <li><a href="orderable.php">View Basket </a></li> 
                                </ul>
                        </li>
                        <?php
    } ?>
                   
                </li>
                        <li class="second">
                        <p class="sidebar-title">Search</p> 
                                <ul>
                                    <li class="small_inst">
                                        <form method="get" class="searchform" action="search_result.php" >   
                                             Search for Meal course
                                            <input type="text" size="24" value="" name="search" class="search" />
                                            <input type="submit" class="searchsubmit formbutton" name="submit" value="Go" />
                                        </form>	
                                    </li>
                                </ul>
                        </li>
                </ul>
        </ul>
                      