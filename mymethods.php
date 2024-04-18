<?php
function connect()
{
    $hostName = "localhost";
    $username = "root";
    $password = ""; 
    $database = "ecommerce";
   
    $conn = mysqli_connect($hostName, $username, $password, $database);

    return $conn;
}

//User Methods
function insert_user($data)
{
   $name = $data['name'];
   $email = $data['email'];
   $password = $data['password'];
   $contact = $data['contact'];
   $address = $data['address'];
    $conn = connect();
    if($conn)
    {
        $insert = " insert into user values ('$name','$email','$password','$contact','$address')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
            {
                    return "added sucessfully";
               
            }
            else
            {
                return "Not added";
            }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
} 

function addToCart($product_id, $price, $email)
{
    $conn = connect();
    if($conn)
    {
        $insert = "insert into mycart(email, product_id, price) values('$email', '$product_id', '$price')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
            {
                    return "product added into cart sucessfully";
               
            }
            else
            {
                return "product Not added into cart";
            }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
}

function login_user($data)
{
    $email = $data['email'];
   $password = $data['password'];
    $conn = connect();
    if($conn)
    {
        $sql = "select *from user where email='$email' and password='$password'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else
    {
        return 'Not login';
    }
} 

function display_product()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from products";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}

function display_cart_by_email($email)
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from mycart where email = '$email'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}

function display_product_by_product_id($pid)
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from products where product_id = '$pid'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}

function count_cart_by_email($email)
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from mycart where email='$email'";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}

function delete_cart_by_email($email)
{
    $conn = connect();

    if($conn)
    {
        $sql = "delete from mycart where email='$email'";
        $response = mysqli_query($conn, $sql);
        
        return $response;
    }
    else{
        return "0";
   
     }
}

function check_cart_by_product_id($product_id)
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from mycart where product_id='$product_id'";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}

function update_cart($product_id)
{
    $conn = connect();
    if($conn)
    {
        $update = "update mycart set quantity=(quantity+1) where product_id='$product_id'";
        $response = mysqli_query($conn, $update);
    }
    else
    {
        return 'Not' ;
    }
} 
function count_product($email)
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from mycart where email='$email'";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}
function addQuantity($cart_id)
{
    $conn = connect();
    if($conn)
    {
        $add = "update mycart set quantity=(quantity+1) where cart_id='$cart_id'";
        $response = mysqli_query($conn, $add);
    }
    else
    {
        return 'Not' ;
    }
} 
function subtractQuantity($cart_id)
{
    $conn = connect();
    if($conn)
    {
        $add = "update mycart set quantity=(quantity-1) where cart_id='$cart_id'";
        $response = mysqli_query($conn, $add);
    }
    else
    {
        return 'Not' ;
    }
}

function myorder($email,$total_amount,$total_product)
{
    $conn = connect();
    if($conn)
    {
        $insert = "insert into myorder(email,total_amount,total_product) values('$email', '$total_amount', '$total_product')";
        $response = mysqli_query($conn, $insert);

        $myorderid = mysqli_insert_id($conn);
        
        return $myorderid;
    }
    else
    {
        return 'Not ';
    }
}

function display_order()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from myorder";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}

function addOrderDetails($product_id,$order_id,$email,$quantity)
{
    $conn = connect();
    if($conn)
    {
        $insert = "insert into orderdetails(product_id,order_id,email,quantity) values('$product_id', '$order_id', '$email','$quantity')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
            {
                    return "product added into order details table sucessfully";
               
            }
            else
            {
                return "product Not added into order details table";
            }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
}

function payment($email,$amount,$transiction_id)
{
    $conn = connect();
    if($conn)
    {
        $insert = "insert into payment(email,amount,transiction_id) values('$email', '$amount', '$transiction_id')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
        {
            //get all  product which is in mycart table by email
            $total_product = count_product($email);

            //add into my_order table
            $myorderid = myorder($email,$amount,$total_product);

            if($myorderid > 0){
                //add 1 by 1 all cart details into order_details table

                $response1 = display_cart_by_email($email);

                while($data = mysqli_fetch_assoc($response1))
                {
                    $product_id = $data['product_id'];
                    $quantity = $data['quantity'];
                    addOrderDetails($product_id,$myorderid,$email,$quantity);
                }

                //delete all cart data
                delete_cart_by_email($email);

                return "product added into myorder ";
            }
            else
            {
                return "product not added into myorder ";
            }

            
            
            //delete from mycart
            return "product added ";
            
        }
        else
        {
            return "product Not added into cart";
        }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
}

?>