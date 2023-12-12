<?php
/**
 * @author Joshua Mckenna
 * @since 11/25/2023
 *  Makes the trivia game to work By reading the file and displaying the questions and then providing a answer at the end
 * */

session_start();
//Turn off error outputs. This is usedful if u are loading them throu intellij
require_once 'util/CisUtil.class.php';
require_once 'util/Header.class.php';
$header = new Header("Trivia", array("bgColor" => "white", "titleClasses" => "display-3"));

/*******************************
 * Turn on strict Mode Below
 *
 * I didnt read throu instruction
 * at first and now i just added
 * this to make sure u can leave
 * answers blank
 *******************************/
$isStrict = false;
/*******************************
 * Turn off ugly Mode Below
 *
 * I didnt read throu instruction
 * at first and now i just added
 * this to make sure u can leave
 * that result screen is in a
 * table form
 *******************************/
$uglyMode = true;

//Set the question there on to 0 if they haven't started the quiz
if (!isset($_SESSION['question'])) {
    $_SESSION['question'] = 0;
}

//Used to reset the form
if (isset($_GET['reset'])){
    $_SESSION['question'] = 0;
    Header("Location: trivia.php");
}

/*******************************
 *  Question Loading
 *******************************/
//This is so if some ever changes the files question mid way as some is doing it quiz it won't effect them
if (!isset($_SESSION['questions']) || $_SESSION['question'] == 0) {
    $_SESSION['questions'] = [];
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
            $_SESSION['questions'][count($_SESSION['questions'])] = explode("\t", $line);
        }
    }
}

//Reset it back to empty on first load or on reset
if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = [];
}
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
            if (isset($_POST['answer']) && $_POST['answer'] != null || !$isStrict) {
//                $_SESSION['answers'][count($_SESSION['answers'])] = $_POST['answer'];
                //Save it the user's answer to the same array that holds the the question and the actual answer
                if (count($_SESSION['questions']) > $_SESSION['question'] - 1) {
                    /**
                     * It inside this statement because it keeps a bug from occurring with php
                     * where the last answer would be added to the array when the refreshing
                     * the page
                     */
                    //saves answer
                    $_SESSION['answers'][$_SESSION['question'] - 1] = CisUtil::cleanInputs($_POST['answer']);
                }
                $_POST['answer'] = null;
                $_SESSION['question'] += 1;
            } else {
                $isValid = false;
            }
            break;
        case "reset": //if the reset button was pressed
            $_SESSION['question'] = 0;
            $_SESSION['answers'] = [];
            break;

    }
    $_POST['submit'] = null;
}


if (count($_SESSION['questions']) > $_SESSION['question'] - 1) {

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
            <form id="trivia" action="" method="post" class="pb-3">
                <h4 class="display-4">Question <?= $_SESSION['question'] ?></h4>
                <p class="fs-5" <?= ($isValid ? '' : 'style="color: red;"') ?>><?= $_SESSION['questions'][$_SESSION['question'] - 1][0] . ($isValid ? '' : '*') ?></p>

                <?php error_reporting(0); ?>
                <input type="text" id="answer" name="answer"
                       value="<?= $_SESSION['answers'][$_SESSION['question'] - 1] ?>" placeholder="Answer"
                       class="form-control ">


                <div class="d-flex justify-content-center">
                    <div class="btn-group m-5" role="group" aria-label="Basic example">
                        <button type="submit" name="submit" value="back"
                                class="btn btn-primary" <?= ($_SESSION['question'] == 1 ? "disabled" : "") ?>>Back
                        </button>
                        <!--My orginal way is commented out because the instructions asked for a hyperlink to reset the form 😒-->
                        <!--                        <button type="submit" name="submit" value="reset" class="btn btn-danger">Reset</button>-->
                        <a href="trivia.php?reset"  class="btn btn-danger">Reset</a>
                        <button type="submit" name="submit" value="next" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </main>
        <footer class="bg-white container py-2 px-5">
            <p>Built By Joshua M</p>
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
        <?php
        $header->setText("Trivia Completed!!!!");
        $header->build();
        ?>
        <div class="col-12 col-lg-6 mx-auto">
            <?php $wrongsCounter = 0;?>
            <div class="col-12 col-lg-10 mx-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Your Answer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < Count($_SESSION['questions']); $i++) {
                        $isCorrect = false;
                        if (strcasecmp(trim($_SESSION['questions'][$i][1]), trim($_SESSION['answers'][$i])) == 0) {
                            $isCorrect = true;
                            $wrongsCounter++;
                        } ?>
                        <tr class="<?php if ($isCorrect) { ?>table-success<?php } else { ?>table-danger<?php } ?>">
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $_SESSION['questions'][$i][0] ?></td>
                            <td><?= $_SESSION['questions'][$i][1] ?></td>
                            <td><?= $_SESSION['answers'][$i]?></td>
                        </tr>
                    <?php }
                    $decimalEquivalent = $wrongsCounter/count($_SESSION['questions']);
                    $percentage = round($decimalEquivalent * 100,2);
                    ?>
                    <h2 class="mb-5 mt-3">You scored <?=$percentage?>% <?php /*echo $wrongsCounter."/". count($_SESSION['questions'])*/?></h2>
                    </tbody>
                </table>
            </div>
            <form action="" method="post" class="d-flex justify-content-center ">
                <button type="submit" name="submit" value="reset" class="btn btn-danger">Reset</button>
            </form>
    </main>


    <footer class="bg-white container py-2 px-5">
        <p>Built By Joshua M</p>
    </footer>

    <?php
    CisUtil::endPage();

}