 <?php
 session_start();

    include('admin/connect.php'); 
    
    $order_id = $_SESSION['order_id'];
    $query_cart = "select * from cart where order_id = '$order_id'";
    $result_cart = mysqli_query($conn,$query_cart);
    $num_cart = mysqli_num_rows($result_cart)
    

?>

           <nav id="primary-nav" class="dropdown cf">
               <ul class="dropdown menu">
                   <li><a href="index.php">Home</a></li>

                   <?php
                                $query_cat = "select * from categories";
                                $result_cat = mysqli_query($conn,$query_cat);
                                $num_cat = mysqli_num_rows($result_cat);
                                for($i=0; $i<$num_cat; $i++)
                                {
                                $row_cat = mysqli_fetch_array($result_cat);

     ?>
                   <li class='active'><a
                           href="products.php?catid=<?php echo $row_cat['id']; ?>"><?php echo $row_cat['cat_name']; ?></a>
                   </li>
                   <?php } ?>
                   <li><a href="cart.php">Cart (<?php echo $num_cart; ?>) </a></li>
               </ul>
           </nav><!-- / #primary-nav -->