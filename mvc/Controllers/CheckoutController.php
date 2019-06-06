<?php

class CheckoutController
{
    public function addAddress ()
    {
        if (isset($_POST['existing_address'])) { // Formular wurde abgeschickt

            if ($_POST['existing_address'] !== 'default') {
                // adresse auslesen und zu order speichern
            } else {
                // validieren
                $requiredFields = [
                    'street',
                    'streetNr',
                    'zip',
                    'city',
                    'country',
                    'name'
                ];
                foreach ($requiredFields as $requiredField) {
                    if (isset($_POST[$requiredField]) && !empty($requiredField)) {
                        // alles gut
                    } else {
                        // Error messages!!
                    }
                }

                // address speichern
                $country = Countries::getNameByAbbr($_POST['country']);
                $new_address = new Address();
                $new_address->street = trim($_POST['street']);
                $new_address->streetNr = trim($_POST['streetNr']);
                $new_address->door = trim($_POST['door']);
                $new_address->zip = trim($_POST['zip']);
                $new_address->city = trim($_POST['city']);
                $new_address->country = trim($country);
                $new_address->user_id = $_SESSION['user_id'];
                $new_address->name = trim($_POST['name']);
                $new_address->save();

                // adresse zu order speichern
            }

            // weiter zum schritt zahlungsmethode
        } else {
            $user_id = $_SESSION['user_id'];
            $addresses = Address::findByUser($user_id);

            $params = [
                'addresses' => $addresses
            ];

            View::load('checkout/addressForm', $params);
        }
    }
}