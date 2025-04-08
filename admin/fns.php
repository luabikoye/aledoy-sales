<?php

    function get_category_name($cat_id)
    {
        global $conn;
        $query = "select * from categories where id = '$cat_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $cat_name = $row['cat_name'];
        return $cat_name;
    }

    function cart_item($order_id)
    {
        global $conn;
        $query = "select * from cart where order_id = '$order_id'";
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function cart_sub_total($order_id)
    {
        global $conn;
        $query = "select sum(total_price) from cart where order_id = '$order_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        return $row[0];
    }

    function shipping_cost($state)
    {
        if(!$state)
        {
            return 0;

        }
        elseif($state == 'Lagos')
        {
            return 2000;

        }
        elseif($state == 'Ogun' || $state == 'Oyo')
        {
            return 6000;
        }
        else{
            return 10000;
        }
    }


    function grand_total($order_id,$state)
    {
        $sub_total = cart_sub_total($order_id);
        $shipping = shipping_cost($state);

        $grand_total = $sub_total+$shipping;
        return $grand_total;
    }

    function now()
    {
        $now = date('Y-m-d h:i:s');
        return $now;
    }

    function get_image($id)
    {
        global $conn;
        $query = "select * from products where id = '$id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        return $row['image_1'];
    }

    function mydate($date)
    {
        $new_date = date('d M Y h:ia', strtotime($date));
        return $new_date;
    }

?>