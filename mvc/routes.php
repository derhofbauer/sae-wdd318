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
    "/products/list" => "ProductController.list",
    "/products/show/:id" => "ProductController.show"
    // ...
];

?>