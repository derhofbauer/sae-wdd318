<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <h1>Edit: <?php echo $user->name; ?></h1>
        <div class="row">

            <form action="admin/users/update/<?php echo $user->id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo $user->name; ?>" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo $user->email; ?>" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>