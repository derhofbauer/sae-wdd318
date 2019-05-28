<?php

class View
{
    /**
     * @param string $view Format: 'home', 'products/list'
     * @param array  $params
     */
    public static function load (string $view, array $params = [])
    {
        extract($params);
        $base = APP_BASE;
        require_once 'Views/Layouts/' . $view . '.php';
    }
}