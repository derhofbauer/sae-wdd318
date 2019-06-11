<?php

class LoginController
{
    public function loginForm ()
    {
        if (isset($_POST['email'])) {
            // Formular wurde abgeschickt, sonst würden wir keine Daten kriegen

            $user = User::findByEmail($_POST['email']);
            $adminUser = Admin::findByEmail($_POST['email']);
            if ($user === false && $adminUser === false) {
                // User existiert nicht
                die('User existiert nicht!');
            } else {
                if ($adminUser !== false) {
                    $user = $adminUser;
                }
                // user existiert --> password prüfen
                if ($user->checkPassword($_POST['password'])) {
                    // User einloggen
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user->id;

                    if (is_a($user, Admin::class)) {
                        $_SESSION['admin'] = true;
                    }

                    $referer = $_POST['_referer'];

                    if (empty($referer)) {
                        header("Location: " . APP_BASE);
                        exit;
                    }

                    header("Location: $referer");
                    exit;
                } else {
                    // Fehlermeldung
                    $_SESSION['logged_in'] = false; // nicht nötig, aber sicherheitshalber loggen wir den User aus, wenn ein Session-Relikt vorhanden ist
                    unset($_SESSION['user_id']);
                    unset($_SESSION['admin']);
                    die('Passwort ist falsch! -.-');
                }
            }
        }

        View::load('login');
    }

    public function logout ()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $_SESSION['logged_in'] = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['admin']);

        header("Location: $referer");
        exit;
    }

    public static function getEmailFromSession ()
    {
        // ID aus Session auslesen
        $user_id = (int)$_SESSION['user_id'];

        $name = '';

        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            $user = Admin::find($user_id);
            $name = $user->email;
        } else {
            // Name aus Datenbank abfragen
            $user = User::find($user_id);
            $name = $user->name;
        }

        // Name zurückgeben
        return $name;
    }

    public function signupForm ()
    {
        if (isset($_POST['email'])) {
            // Formular wurde abgeschickt, sonst würden wir keine Daten kriegen
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password_repeat = trim($_POST['password_repeat']);

            if ($password !== $password_repeat) {
                $params = [
                    'error' => 'Du Depp! Gib das richtige Passwort an!'
                ];
                View::load('signup', $params); return;
            }
            // alle anderen Validierungen!! bspw. Email

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->setPassword($password);
            $user->save();


            // s. https://www.php.net/manual/en/function.mail.php
            $to      = $user->email;
            $subject = 'Herzlich Wilkommen in unserem coolen Shop';
            $message = 'Herzlich Wilkommen in unserem coolen Shop';
            $headers = 'From: noreply@saeshop.com' . "\r\n" .
                'Reply-To: office@saeshop.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);

            header('Location:' . APP_BASE); exit;
        }

        View::load('signup');
    }
}