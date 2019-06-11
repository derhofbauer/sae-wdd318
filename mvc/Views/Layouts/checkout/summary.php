<?php require_once __DIR__ . '/../../Partials/Header.php'; ?>
    <div class="container">

        <span class="order-number">Bestellnummer: <?php echo $order->id; ?></span>

        <?php foreach ($products as $product) : ?>
            <div class="product">
                <?php echo $product->id; ?>x <?php echo $product->name; ?> -
                                                              Price: <?php echo $product->price; ?>,
                                                              Subtotal: <?php echo $product->amount * $product->price; ?>
            </div>
        <?php endforeach; ?>

        <div class="delivery-address">
            <h2>Lieferadresse</h2>
            <p><?php echo $address->name; ?></p>
            <p><?php echo $address->street . ' ' . $address->streetNr; ?></p>
            <p>Tür <?php echo $address->door; ?></p>
            <p><?php echo $address->city . ', ' . $address->zip; ?></p>
            <p><?php echo $address->country; ?></p>
        </div>

        <div class="payment">
            <h2>Zahlungsmethode</h2>
            <p><?php echo $payment->name; ?></p>
            <p><?php echo $payment->number; ?></p>
            <p><?php echo $payment->expires; ?></p>
        </div>

        <a href="checkout/place/<?php echo $order->id; ?>" class="btn btn-primary">zahlungspflichtig bestellen</a>

    </div>
<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>