<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <div class="row">
            <ul>
                <?php foreach ($users as $user): ?>
                <li>
                    <span class="product_id">
                        (<?php echo $user->id; ?>)
                    </span>
                    <a href="admin/users/edit/<?php echo $user->id; ?>">
                        <?php echo $user->name; ?>
                    </a>
                    <span> - </span>
                    <a href="admin/users/delete/<?php echo $user->id; ?>">Delete</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>