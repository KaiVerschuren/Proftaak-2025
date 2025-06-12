<?php


/**
 * makes a connection to the database.
 * @return mysqli A mysqli connection object.
 */
function connectDB()
{
    $mysqli = new mysqli("localhost", "root", "", "goodiematicaa");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    return $mysqli;
}

/**
 * Inserts data from generator.php into the database.
 * @param string $code Description of the $code parameter.
 * @param int $maxOrders Max amount of orders per code.
 * @return bool whether or not the insertion was successful.
 */
function sendCodes($code, $maxOrders)
{
    $mysqli = connectDB();

    // Tell mysqli what to do, then prepare the SQL statement
    $sql = "INSERT INTO authcode (code, orders, maxOrders) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return false;
    }

    // stupid variable because bind_param requires a variable to be passed by reference
    $defaultOrders = 0;

    // Bind parameters: 's' for string, 'i' for integer
    $stmt->bind_param("sii", $code, $defaultOrders, $maxOrders);

    $result = $stmt->execute();

    if (!$result) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

    return $result;
}

/**
 * Fetches codes from database.
 * @return array | bool Array with fetched codes, OR empty if none.
 */
function fetchCodes()
{
    $mysqli = connectDB();

    $sql = "SELECT id, code, orders, maxOrders FROM authcode ORDER BY id DESC";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
        return false;
    }

    $codes = [];
    while ($row = $result->fetch_assoc()) {
        $codes[] = $row;
    }

    $result->free();
    $mysqli->close();

    return $codes;
}

/**
 * Rewrites the orders of a code to 0.
 * @param int  $id of the order to rewrite.
 * @return bool whether or not the rewrite was successful. 
 */
function rewriteId($id)
{
    $mysqli = connectDB();

    $sql = "UPDATE authcode SET orders = 0 WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return false;
    }

    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if (!$result) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

    return $result;
}

/**
 * Deletes code from ID.
 * @param int  $id of the order to delete.
 * @return bool whether or not the deletion was successful. 
 */
function deleteCode($id)
{
    $mysqli = connectDB();

    $sql = "DELETE FROM authcode WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return false;
    }

    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if (!$result) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

    return $result;
}
