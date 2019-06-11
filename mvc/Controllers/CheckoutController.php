<?php

class CheckoutController
{
    public function addAddress ()
    {
        $cart = new SessionCart();

        $order = new Order();
        $order->user_id = $_SESSION['user_id'];
        $order->products = json_encode($cart->products);

        if (isset($_POST['existing_address'])) { // Formular wurde abgeschickt

            if ($_POST['existing_address'] !== 'default') {
                // adresse auslesen und zu order speichern
                //$address = Address::find($_POST['existing_address']);
                $order->delivery_address_id = $_POST['existing_address'];
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
                $order->delivery_address_id = $new_address->id;
            }

            $order->save();

            // weiter zum schritt zahlungsmethode
            header('Location: ' . APP_BASE . "checkout/payment/$order->id");
        } else {
            $user_id = $_SESSION['user_id'];
            $addresses = Address::findByUser($user_id);

            $params = [
                'addresses' => $addresses
            ];

            View::load('checkout/addressForm', $params);
        }
    }

    public function addPayment ($order_id) {
        $order_id = (int)$order_id;

        $order = Order::find($order_id);

        if (isset($_POST['existing_payment'])) {
            if ($_POST['existing_payment'] !== 'default') {
                $order->payment_id = $_POST['existing_payment'];
            } else {
                // validieren: s. CheckoutController->addAddress()

                // payment speichern
                $payment = new Payment();
                $payment->name = trim($_POST['name']);
                $payment->number = (int)$_POST['number'];
                $payment->expires = trim($_POST['expires']);
                $payment->ccv = (int)$_POST['ccv'];
                $payment->user_id = (int)$_POST['user_id'];
                $payment->save();

                // adresse zu order speichern
                $order->payment_id = $payment->id;
            }

            $order->save();

            // weiter zum schritt zahlungsmethode
            header('Location: ' . APP_BASE . "checkout/summary/$order->id");
        } else {
            $user_id = $_SESSION['user_id'];
            $payments = Payment::findByUser($user_id);

            $params = [
                'payments' => $payments
            ];

            View::load('checkout/paymentForm', $params);
        }
    }

    public function summary ($order_id) {
        $order_id = (int)$order_id;

        $order = Order::find($order_id);
        $address = Address::find($order->delivery_address_id);
        $payment = Payment::find($order->payment_id);
        $products = [];

        $total_price = 0;
        foreach ($order->getProductsArray() as $product_id => $amount) {
            $product = Product::find($product_id);
            $product->amount = $amount;
            $products[] = $product;

            $subtotal = $product->price * $amount;
            $total_price = $total_price + $subtotal;
        }

        $params = [
            'order' => $order,
            'address' => $address,
            'payment' => $payment,
            'products' => $products,
            'total_price' => $total_price
        ];

        View::load('checkout/summary', $params);
    }

    public function finish ($order_id) {
        $order_id = (int)$order_id;

        $order = Order::find($order_id);
        $order->status = 'in progress';
        $order->save();

        $user = User::find($_SESSION['user_id']);

        $params = [
          'user' => $user
        ];

        View::load('checkout/thankyou', $params);
    }
}