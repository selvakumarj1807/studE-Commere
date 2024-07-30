<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
    <ul class="nav navbar-nav nav_1">

        <?php

        require('db.php');

        $res = mysqli_query($conn, "Select * from category");
        while ($row = mysqli_fetch_array($res)) {
            
            $category = $row['category'];

        ?>

            <li><a href="products.php?category=<?php echo $category; ?>"><?php echo $row['category']; ?></a></li>

        <?php  } ?>

    </ul>
</div>