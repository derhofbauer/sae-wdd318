<?php

// "/products/show/:id"
// -- /products/show/1
// -- /products/show/42
// -- /products/show/xy

$routes = [
    "/" => "HomeController.index",
    "/products/list" => "ProductController.list",
    "/products/show/:id" => "ProductsController.show"
    // ...
];

?>