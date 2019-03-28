<?php 

/**
 * Dieses Skript läuft möglicherweise nicht durch oder produziert Fehler,
 * es geht nur um die Beispiele
 */

/**
 * Arrays
 */
var arr = [1, 2, 3];

$arr = [
    'vorname' => 'Regina',
    "sae-kurs" => 'WDD317',
    'drei' => 3,
    4 => 4
];

/**
 * Datentyp prüfen
 */
is_bool($arr);
is_string('string');

/**
 * Operatoren
 */
$modulo = 33 % 2;

/**
 * Inkrement/Dekrement
 */
$a = 42;
$b = ++$a; // 43
$c = $a++; // 43
echo $a; // 44

$a = 42;
$b = --$a; // 41
// ....

/**
 * Referenzen & Funktionen
 */
function addString (&$str) {
    return "$str - append";
}

$a = "string";
addString($a);
echo $a; // string - append

// oder
 
function addString ($str) {
    return "$str - append";
}

$a = "string";
$a = addString($a);
echo $a; // string - append

/**
 * Referenz Beispiel
 */
$arr1 = [1, 2, 3];
$wert = array_shift($arr1); // 1
var_dump($arr1); // [2, 3]

// While Loop
while (true) {
    // läuft theoretisch unendlich lang
}

while (false) {
    // läuft gar nicht
}

do {
    echo "foobar"; // gibt 1x "foobar" aus
} while (false);

// strpos
$haystack = "Heuhaufen";
$needle = "haufen";

$strpos = strpos($haystack, $needle);
echo $strpos;
echo "<br>";

// strtolower
$uppercaseString = "WohOOO!";
$lowercaseString = strtolower($uppercaseString);
echo $lowercaseString;
echo "<br>";

// strtoupper
$uppercaseString = strtoupper($lowercaseString);
echo $uppercaseString;

?>