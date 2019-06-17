<?php

class UserController
{

    function __construct ()
    {
        if (!isset($_SESSION['admin']) && !isset($_SESSION['logged_in']) ||
            $_SESSION['admin'] !== true || $_SESSION['logged_in'] !== true) {
            header("Location: " . APP_BASE);
        }
    }

    public function adminList ()
    {
        $users = User::all();

        $params = [
            'users' => $users
        ];

        View::load('admin/users.list', $params);
    }

    public function editForm ($id)
    {
        $id = (int)$id;

        $user = User::find($id);

        $params = [
            'user' => $user
        ];

        View::load('admin/user.edit', $params);
    }

    public function updateUser ($id)
    {
        $id = (int)$id;

        $user = User::find($id);

        $user->name = trim($_POST['name']);
        $user->email = trim($_POST['email']);

        if (isset($_POST['password'])) {
            $user->setPassword(trim($_POST['password']));
        }

        if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $path => $on) {
                $user->removeImageByPath($path);
            }
        }

        $user->save();

        header("Location: " . APP_BASE . "admin/users/edit/$id");
        exit;
    }

    public function delete ($id)
    {
        $id = (int)$id;

        $user = User::find($id);
        $user->deleted = true;
        $user->save();

        header("Location: " . APP_BASE . "admin/users");
        exit;
    }
}