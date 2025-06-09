<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';

initSession();

if ($_SESSION['admin'] == false) {
    header('location: index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generate'])) {
    $codeLength = isset($_POST['codeLength']) ? intval($_POST['codeLength']) : 10;
    $codeType = isset($_POST['codeType']) ? $_POST['codeType'] : 'simple';
    $codeMaxOrders = isset($_POST['codeMaxOrders']) ? intval($_POST['codeMaxOrders']) : 1;
    $codeAmount = isset($_POST['codeAmount']) ? intval($_POST['codeAmount']) : 1;

    if ($codeLength < 5 || $codeLength > 20 || $codeMaxOrders < 1 || $codeMaxOrders > 9999 || $codeAmount < 1 || $codeAmount > 100) {
        toggleToast("error", "Invalid input values. Please check your inputs.");
    } else {
        toggleToast("success", "Codes generated successfully!");

        // Generates a array of codes based on length, type, and the amount of codes requested.
        $codes = generateCodes($codeLength, $codeType, $codeAmount);

        // So here we need to loop through all generated codes and individually send them to the database.
        foreach ($codes as $code) {
            $result = sendCodes($code, $codeMaxOrders);

            if (!$result) {
                toggleToast("error", "Failed to send code: $code. Please try again.");

                // break exits the foreach loop, stopping further 
                // sending of codes if any one of them fails.
                break;
            }
        }

        if ($result) {
            toggleToast("Info", "Codes are sent to the database.");
        }
    }
}

/**
 * Generates an array of codes based on parameters.
 * @param int $codeLength Length of each code.
 * @param string $codeType Type of code (simple, CharNum, Char, Num).
 * @param int $codeAmount Amount of codes to generate.
 * 
 * @return array An array of generated codes.
 */

function generateCodes($codeLength, $codeType, $codeAmount)
{
    $codes = [];
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';

    if ($codeType == 'CharNum') {
        $characters .= $numbers;
    } elseif ($codeType == 'Num') {
        $characters = $numbers;
    } elseif ($codeType == 'Char') {
        // Do nothing, keep $characters as is
    }

    for ($i = 0; $i < $codeAmount; $i++) {
        if ($codeType == 'simple') {
            $contents = file_get_contents('inc/json/words.json');
            $words = json_decode($contents);
            if (json_last_error() !== JSON_ERROR_NONE) {
                toggleToast("error", "Failed to decode words.json. Please check the file.");
                return [];
            }

            $word = $words[array_rand($words)];
            $word = substr($word, 0, $codeLength);

            // If the word is too short, pad with random numbers
            while (strlen($word) < $codeLength) {
                $word .= $numbers[rand(0, strlen($numbers) - 1)];
            }

            $codes[] = $word;
        } else {
            $code = '';
            for ($j = 0; $j < $codeLength; $j++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            $codes[] = $code;
        }
    }

    return $codes;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codeId = $_POST['codeId'] ?? null;

    if (isset($_POST['renew']) && $codeId) {
        rewriteId($codeId);
        toggleToast("success", "Code with ID {$codeId} has been renewed.");
    }

    if (isset($_POST['delete']) && $codeId) {
        deleteCode($codeId);
        toggleToast("success", "Code with ID {$codeId} has been deleted.");
    }

    if (isset($_POST['copy'])) {
        // handle copy in js
    }
}


$codes = fetchCodes();

head("Generator");

headerFunc();
?>
<main class="container">
    <div class="generator">
        <div class="generatedCodes generatorTile cardShadow">
            <div class="codesRow codesRowHeader">
                <div class="code">Code:</div>
                <div class="uses">Uses:</div>
                <div class="maxUses">Max Uses:</div>
                <div class="options">Options:</div>
            </div>
            <?php
            foreach ($codes as $code) {
            ?>
                <div class="codesRow">
                    <div class="code"><?php echo $code['code']; ?></div>
                    <div class="uses"><?php echo $code['orders']; ?></div>
                    <div class="maxUses"><?php echo $code['maxOrders']; ?></div>
                    <div class="options">
                        <div class="dropdownWrapper">
                            <svg data-num="<?php echo $code['id']; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="dropdownIcon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                            <div class="codesDropdown" data-num="<?php echo $code['id']; ?>">
                                <form method="post">
                                    <input type="submit" data-num="<?php echo $code['id']; ?>" class="codesDropdownButton" value="Copy" name="copy">
                                    <input type="submit" class="codesDropdownButton" value="Renew" name="renew">
                                    <input type="submit" class="codesDropdownButton" value="delete" name="delete"> <!-- name lowercase to match -->
                                    <input type="hidden" name="codeId" value="<?php echo $code['id']; ?>">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="codesRow codesRowHeader">
                <div class="CodesPagination">
                    <button class="btnSecondary" id="prevPage">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btnIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button class="btnPrimary" id="prev10Pages">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btnIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                        </svg>
                    </button>
                    <span class="pageNumber">1</span>
                    <button class="btnPrimary" id="next10Pages">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btnIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>

                    </button>
                    <button class="btnSecondary" id="nextPage">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="btnIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="generatorControl generatorTile cardShadow">
            <form method="post">
                <ul class="generatorFormUL noStyleUL">
                    <li>
                        <label data-tooltip="Minimum 5 characters, maximum 20 characters." for="codeLength">Code length:</label>
                        <input class="input removeArrow" name="codeLength" type="number" min="5" max="20">
                    </li>
                    <li>
                        <label data-tooltip="Choose the type of codes you want to generate." for="codeType">Code type:</label>
                        <select class="input removeArrow" name="codeType">
                            <option value="simple">Simplified</option>
                            <option value="CharNum">Characters + numbers</option>
                            <option value="Char">Characters</option>
                            <option value="Num">Numbers</option>
                        </select>
                    </li>
                    <li>
                        <label data-tooltip="Minimum is 1, maximum is 9999." for="codeMaxOrders">Max orders:</label>
                        <input class="input removeArrow" name="codeMaxOrders" type="number" min="1" max="9999">
                    </li>
                    <li>
                        <label data-tooltip="Minimum is 1, maximum is 100." for="codeAmount">Amount of codes:</label>
                        <input class="input removeArrow" name="codeAmount" type="number" min="1" max="100" value="1">
                    </li>
                    <li>
                        <input type="submit" name="generate" class="btnPrimary">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</main>
<?php
footerFunc();
?>