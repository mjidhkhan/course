</div> 
        <div id="sidebar">
            <ul id="accordion">
                <li class="active">
                    <ul class="blocklist">
                        <li class="second">
                            <p class="sidebar-title">Staff area</p>
                            <ul>
                                <?php if($_SESSION['status'] ==1){ ?>
                                <li><a href="index.php">Front End</a></li>
                                <li><a href="new_dish.php"> New Dish </a></li>
                                <li><a href="view_orders.php">View orders</a></li>
                                <li><a href="new_staff.php">New Staff</a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <?php } ?>
                            </ul>
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
