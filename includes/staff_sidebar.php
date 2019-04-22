</div> 
        <div id="sidebar">
            <ul id="accordion">
                <li class="active">
                    <ul class="blocklist">
                    <?php if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
    ?>
                        <?php if (false) {
        ?>
                        <li class="second" style="border: 1px solid rgb(231, 8, 8)">
                        
                                <p class="sidebar-title out-stock">Notifications</p>
                        
                                <ul>
                                
                                </ul>
                            </li>
                        <?php
    } ?>
                   <?php
} ?>
                        <li class="second">
                            <p class="sidebar-title">Admin Area</p>
                            <ul>
                                <?php if ($_SESSION['status'] == 1) {
        ?>
                                <li><a href="new_staff.php">New Staff</a></li>
                                <li><a href="new_staff.php">Fire Staff</a></li>
                                <?php
    } ?>
                            </ul>
                        </li>
                        <li class="second">
                            <p class="sidebar-title">Staff area</p>
                            <ul>
                                <?php if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
        ?>
                                    <li><a href="new_dish.php"> New Recipe </a></li>
                                    <li><a href="view_orders.php">View orders</a></li>
                                    <li><a href="rcp_plane.php">Stock check</a></li>
                                <?php
    } ?>
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
