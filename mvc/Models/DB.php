<?php

/**
 * Class DB
 *
 * Sollte eigentlich in einem anderen Ordner liegen, weil es kein klassisches Model ist, ist nur mal der Einfachheit
 * halber hier.
 */
class DB
{
    protected $link;
    protected $stmt;

    // public function __construct ($host = 'mariadb', $user = 'shop', $pass = 'password', $dbname = 'shop', $port = 3306) <-- Alex' config
    public function __construct ($host = 'localhost', $user = 'shop', $pass = 'password', $dbname = 'shop', $port = 3306)
    {
// Datenbankverbindung aufbauen
        $this->link = new mysqli($host, $user, $pass, $dbname, $port);
    }

    /**
     * query
     *
     * @param string $sql
     * @param array  $params ['i:id' => 2, 's:name' => "Thomas"]
     */
    public function query ($sql, array $params = [])
    {
// query abschicken
// $this->stmt = $this->link->stmt_init();
        $this->stmt = $this->link->prepare($sql);

// prepare params
        $types = '';
        $param_values = [];
        foreach ($params as $key => $value) {

            $values = explode(':', $key); // 'i:id' => [0 => 'i', 1 => 'id']
            $type = $values[0]; // i, bzw. s
            $name = $values[1]; // id, bzw. name

            $types .= $type;
            $param_values[] = &$value; // mysqli_stmt::bind_param erwartet referenzen auf die Werte und nicht die werte selbst: https://www.php.net/manual/de/mysqli-stmt.bind-param.php

        } // types: 'is', values: [2, 'Thomas']

// bind params
        array_unshift($param_values, $types); // params: ['is', 2, 'Thomas']
        if (count($params) >= 1) {
            call_user_func_array([$this->stmt, 'bind_param'], $param_values); // $this->stmt->bind_param($params[0], $params[1], $params[2], .....);
        }

// execute query
        $this->stmt->execute();

// get result
        $result = $this->stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct ()
    {
// Datenbankverbindung schließen
        $this->link->close();
    }
}