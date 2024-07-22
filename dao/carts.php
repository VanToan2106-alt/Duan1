<?php
// function cart_insert($id_cart, $id_product, $id_user, $amount)
// {
//     $sql = "INSERT INTO carts(`id_cart`,`id_product`, `id_user`, `amount`) 
//     VALUES (?,?,?,?)";
//     pdo_execute($sql, $id_cart, $id_product, $id_user, $amount);
// }
function cart_insert($id_product, $amount)
{
    if (isset($_SESSION["user"])) {
        $user_id = $_SESSION["user"]["id_user"];
        if (isset($_SESSION["cart_user"][$user_id])) {
            array_push($_SESSION["cart_user"][$user_id]["cart"], [
                "id_product" => $id_product,
                "amount" => $amount
            ]);
        } else {
            $arr_cart = [
                "cart" => [
                    [
                        "id_product" => $id_product,
                        "amount" => $amount
                    ]
                ]
            ];
            $_SESSION["cart_user"][$user_id] = $arr_cart;
        }
    } else {
        if (isset($_SESSION["cart_user"]["customer"])) {
            array_push($_SESSION["cart_user"]["customer"]["cart"], [
                "id_product" => $id_product,
                "amount" => $amount
            ]);
        } else {
            $arr_cart = [
                "customer" => [
                    "cart" => [
                        [
                            "id_product" => $id_product,
                            "amount" => $amount
                        ]
                    ]
                ]
            ];
            $_SESSION["cart_user"] = $arr_cart;
        }
    }
}

function cart_update($index, $amount)
{
    if (isset($_SESSION["user"])) {
        $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$index]["amount"] += $amount;
    } else {
        $_SESSION["cart_user"]["customer"]["cart"][$index]["amount"] += $amount;
    }
}
function cart_delete($id_cart)
{
    if (isset($_SESSION["user"])) {
        if (isset($_SESSION['order_now']['id_product'])) {
            unset($_SESSION['order_now']);
        } else {
            if (is_array($id_cart)) {
                $i = 0;
                foreach ($id_cart as $id) {
                    array_splice($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"], $id - $i, 1);
                    $i++;
                }
            } else {
                array_splice($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"], $id_cart, 1);
            }
        }
    } else {
        if (isset($_SESSION['order_now']['id_product'])) {
            unset($_SESSION['order_now']);
        } else {
            if (is_array($id_cart)) {
                $i = 0;
                foreach ($id_cart as $id) {
                    array_splice($_SESSION["cart_user"]["customer"]["cart"], $id - $i, 1);
                    $i++;
                }
            } else {
                array_splice($_SESSION["cart_user"]["customer"]["cart"], $id_cart, 1);
            }
        }
    }
}

function check_cart($id_product)
{
    $index = false;
    if (isset($_SESSION["cart_user"])) {
        # code...
        if (isset($_SESSION["user"])) {
            if (isset($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"])) {
                $index = array_search($id_product, array_column($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"], 'id_product'));
            }
        } else {
            if (isset($_SESSION["cart_user"]["customer"]["cart"])) {
                $index = array_search($id_product, array_column($_SESSION["cart_user"]["customer"]["cart"], 'id_product'));
            }
        }
    }
    return $index;
}
function show_cart()
{
    $listProduct = null;
    if (isset($_SESSION["cart_user"])) {
        if (isset($_SESSION["user"])) {
            if (isset($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"])) {
                # code...
                $listProduct = $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"];
            }
        } else {
            $listProduct = $_SESSION["cart_user"]["customer"]["cart"];
        }
    }

    return $listProduct;
}
function get_info_product_cart($id_product)
{
    $sql = "SELECT p.* FROM products p
    WHERE p.id_product = ?";
    return pdo_query_one($sql, $id_product);
}
function seen_product_cart($index)
{
    if (isset($_SESSION["user"])) {
        $id_product = $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$index]['id_product'];
    } else {
        $id_product = $_SESSION["cart_user"]["customer"]["cart"][$index]['id_product'];
    }
    $sql = "SELECT p.* FROM products p
    WHERE p.id_product = ?";
    return pdo_query_one($sql, $id_product);
}
function seen_product_now($id_product)
{
    $sql = "SELECT p.* FROM products p
    WHERE p.id_product = ?";
    return pdo_query_one($sql, $id_product);
}
