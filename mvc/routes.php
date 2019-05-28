<?php

// "/products/show/:id"
// -- /products/show/1
// -- /products/show/42
// -- /products/show/xy

/**
 * Konvention: Parameter in Routes werden immer in folgender Form angegeben:
 * :name
 */
$routes = [
    "/" => "HomeController.index",
    "/products" => "ProductController.list",
    "/products/list" => "ProductController.list",
    "/products/show/:id" => "ProductController.show",
    "/cart" => "CartController.list",
    "/cart/add/:id" => "CartController.addProduct",
    "/login" => "LoginController.loginForm",
    "/logout" => "LoginController.logout"
    // ...
];

?>