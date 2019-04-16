<?php

// Wir lagern das hier beispielhaft aus, weil oft nicht nur die Datenbank-
// Verbindung geschlossen werden muss am Ende des Requests, sondern auch
// andere Resourcen geschlossen werden müssen.
mysqli_close($link);

?>