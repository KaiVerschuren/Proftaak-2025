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

/**
 * Gets set one of the 3 sets used for goodie bags.
 * 
 * @return array Array of products with id 1 in collumn productSet
 */

 function getSetOne()
{
    $mysqli = connectDB();

    $sql = "SELECT * FROM product WHERE productSet = 1 AND categoryId = 1";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $result->free();
    $mysqli->close();

    return $products;
}

/**
 * Gets set one of the 3 sets used for goodie bags.
 * 
 * @return array Array of products with id 2 in collumn productSet
 */

 function getSetTwo()
{
    $mysqli = connectDB();

    $sql = "SELECT * FROM product WHERE productSet = 2 AND categoryId = 1";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $result->free();
    $mysqli->close();

    return $products;
}

/**
 * Gets set one of the 3 sets used for goodie bags.
 * 
 * @return array Array of products with id 3 in collumn productSet
 */

 function getSetThree()
{
    $mysqli = connectDB();

    $sql = "SELECT * FROM product WHERE productSet = 3 AND categoryId = 1";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $result->free();
    $mysqli->close();

    return $products;
}

/**
 * Fetches products from the "other" category
 * @return array<array|bool|null> Almost always will be an array of products, unless error.
 */
function fetchOtherProducts() {
    $mysqli = connectDB();

    $sql = "SELECT * FROM product WHERE categoryId = 2";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $result->free();
    $mysqli->close();

    return $products;
}


/**
 * function to add 1 use to a code, can be used for both goodie codes and normal ones.
 * @param int $id Id of the code to add a use to. 
 * @return bool Result, only really important if you have errors.
 */
function addUse($id) {
    $mysqli = connectDB();

    $sql = "UPDATE authcode SET orders = orders + 1 WHERE id = ?";
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
 * gets the orders data from a authcode
 * @param int $id id of authcode
 */
function getUses($id) {
    $mysqli = connectDB();

    $sql = "SELECT orders, maxOrders FROM authcode WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return false;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($orders, $maxOrders);
    $stmt->fetch();

    $stmt->close();
    $mysqli->close();

    return $orders;
}