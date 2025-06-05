<?php
include 'inc/php/functions.php';
initSession();

if ($_SESSION['admin'] == false) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codeLength = isset($_POST['codeLength']) ? intval($_POST['codeLength']) : 10;
    $codeType = isset($_POST['codeType']) ? $_POST['codeType'] : 'simple';
    $codeMaxOrders = isset($_POST['codeMaxOrders']) ? intval($_POST['codeMaxOrders']) : 1;
    $codeAmount = isset($_POST['codeAmount']) ? intval($_POST['codeAmount']) : 1;

    if ($codeLength < 5 || $codeLength > 20 || $codeMaxOrders < 1 || $codeMaxOrders > 9999 || $codeAmount < 1 || $codeAmount > 100) {
        toggleToast("error", "Invalid input values. Please check your inputs.");
    } else {
        toggleToast("success", "Codes generated successfully!");

        $codes = generateCodes($codeLength, $codeType, $codeAmount);
        
    }
}

function generateCodes($codeLength, $codeType, $codeAmount) {
    $codes = [];
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';

    if ($codeType == 'CharNum') {
        $characters .= $numbers;
    } elseif ($codeType == 'Num') {
        $characters = $numbers;
    } elseif ($codeType == 'Char') {
        // Do nothing, keep $characters as is for Char
    }

    for ($i = 0; $i < $codeAmount; $i++) {
        $code = '';
        for ($j = 0; $j < $codeLength; $j++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        $codes[] = $code;
    }

    return $codes;
}

head("Generator");

headerFunc();
?>
<main class="container">
    <div class="generator">
        <div class="generatedCodes generatorTile cardShadow">

        </div>
        <div class="generatorControl generatorTile cardShadow">
            <form method="post">
                <ul class="generatorFormUL noStyleUL">
                    <li>
                        <label for="codeLength">Code length:</label>
                        <input class="input" name="codeLength" type="number" min="5" max="20">
                    </li>
                    <li>
                        <label for="codeType">Code type:</label>
                        <select class="input" name="codeType">
                            <option value="simple">Simplified</option>
                            <option value="CharNum">Characters + numbers</option>
                            <option value="Char">Characters</option>
                            <option value="Num">Numbers</option>
                        </select>
                    </li>
                    <li>
                        <label for="codeMaxOrders">Max orders:</label>
                        <input class="input" name="codeMaxOrders" type="number" min="1" max="9999">
                    </li>
                    <li>
                        <label for="codeAmount">Amount of codes:</label>
                        <input class="input" name="codeAmount" type="number" min="1" max="100" value="1">
                    </li>
                    <li>
                        <input type="submit" class="btnPrimary">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</main>
<?php
footerFunc();
?>