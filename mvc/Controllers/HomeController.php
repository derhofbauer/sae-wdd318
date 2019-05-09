<?php

class HomeController {

    public function index() {
        $params = [
            'htmltitle' => 'Startseite'
        ];

        load_view('home', $params);
    }

}

?>