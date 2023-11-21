<?php
session_start();
//error_reporting(0);//Turn off error outputs. This is usedful if u are loading them throu intellij
require_once 'util/CisUtil.class.php';
require_once 'util/Header.class.php';

if (!isset($_SESSION['question'])) {
    $_SESSION['question'] = 0;
    CisUtil::sendMessageBox("Set to 0");
}

/*******************************
 *  Question Loading
 *******************************/
$questions = [];
$pathToFile = "triviaQuestions.txt";
// check if the file is empty (no orders present)
if (filesize($pathToFile) == 0 && file_exists($pathToFile)) {
    CisUtil::startPage("Error");
    ?>
    <main id="main" class="container bg-white">
        <h1 class="display-1 text-danger">Error!</h1>
        <p class="fs-5">Question File was not found. Please contact the website's admin!</p>
    </main>
    <?php
    CisUtil::endSession();
} else {
    // file() reads entire file into an array - no need for fopen or fclose if we use this method
    $linesInFile = file($pathToFile);
    foreach ($linesInFile as $line) {
        $questions[count($questions)] = explode("\t", $line);
    }
}
$halfWay = round((count($questions) - 1) / 2);

$color = "white";//Sets header color


$header = new Header("Trivia", array("bgColor" => $color, "titleClasses" => "display-3"));
$value = "question " . $_SESSION['question'] . ", " . (isset($_POST['submit']) ? $_POST['submit'] : "None");
$_SESSION['answers'] = [];

$isValid = true;

//Check Button input type
if (isset($_POST['submit'])) {
    switch (trim(strtolower($_POST['submit']))) {
        case "start": //if start button was pressed
            if ($_SESSION['question'] <= 0) {
                $_SESSION['question'] += 1;
            }
            break;
        case "back": //if back button was pressed
            if ($_SESSION['question'] > 1) {
                $_SESSION['question'] -= 1;
            }
            break;
        case "next": //if Next button was pressed
            if (isset($_POST['answer']) && $_POST['answer'] != null) {
                $_POST['answer'] = null;
                $_SESSION['question'] += 1;
                $_SESSION['answers'][count($_SESSION['answers'])] = $_POST['answer'];
            } else {
                $isValid = false;
            }
            break;
        case "reset": //if the reset button was pressed
            $_SESSION['question'] = 0;
            $_SESSION['answers'] = [];
            break;

    }
}


if (count($questions) > $_SESSION['question']) {

    if ($_SESSION['question'] == 0) {
        CisUtil::startPage("Riddle Trivia");
        ?>
        <?php
        $header->build() ?>
        <main id="main" class="container bg-white">
            <form action="" method="post" class="d-flex justify-content-center ">
                <div class="btn-group m-5" role="group" aria-label="Basic example">
                    <button type="submit" name="submit" value="start" class="btn">Click to start...</button>
                </div>
            </form>
        </main>
        <footer class="bg-white container py-2 px-5">
            <p>Built By Joshua M</p>
        </footer>
        <?php
        CisUtil::endPage();

    } else {
        CisUtil::startPage("Riddle Trivia | Question " . $_SESSION['question']);
        ?>


        <main id="main" class="bg-white container pb-3">
            <form action="" method="post" class="pb-3">
                <h4 class="display-4">Question <?= $_SESSION['question'] ?></h4>
                <p class="fs-5" <?= ($isValid ? '' : 'style="color: red;"') ?>><?= $questions[$_SESSION['question']][0] . ($isValid ? '' : '*') ?></p>


                <input type="text" id="answer" name="answer" value="" placeholder="Answer" class="form-control ">


                <div class="d-flex justify-content-center">
                    <div class="btn-group m-5" role="group" aria-label="Basic example">
                        <button type="submit" name="submit" value="back" class="btn btn-primary">Back</button>
                        <button type="submit" name="submit" value="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit" value="next" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </main>
        <footer class="bg-white container py-2 px-5">
            <p>Built By Joshua M and Lemuel</p>
        </footer>
        <?php
        CisUtil::endPage();
        //Sends Message if they tried submitting without giving a answer
        if (!$isValid) {
            CisUtil::sendMessageBox("Please enter answer");
        }
    }
} else {
    CisUtil::startPage("Riddle Trivia | Results");
    ?>
    <main id="main" class="container bg-white">
        <?php for ($i = 0; $i < Count($questions); $i++) {?>
        <div>
            <h5 class="display-5">Question-5</h5>
            <p class=""><?=$questions[0][1]?></p>


        <?php } ?>
    </main>
    <footer class="bg-white container py-3">
        <form action="" method="post" class="d-flex justify-content-center ">
            <button type="submit" name="submit" value="reset" class="btn btn-danger">Reset</button>
        </form>
    </footer>
    <?php
    CisUtil::endPage();
}