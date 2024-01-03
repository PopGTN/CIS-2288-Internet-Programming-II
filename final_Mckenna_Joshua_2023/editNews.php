<?php
/**
 * @author Joshua Mckena, Donnie McKinnon
 * @since 12/12/2023
 * Used to edit any new stories
 */
include 'incCheckCreds.php';
include 'CisUtil.class.php';
$pageTitle = "News - Edit";
include("incPageHead.php");
/*This page will present the user with an edit form and is also used to process form input*/

//User Messages
$message1 = "<div class='alert alert-success'>Edit Success <a href='index.php'>View All News</a></div>";
$message2 = "<div class='alert alert-danger'>There was a problem with your query. <a href=\"javascript:history.back()\">Go Back</a></div>";
$message3 = "<div class='alert alert-danger'>One or more fields was empty. <a href=\"javascript:history.back()\">Go Back</a></div>";


if (!isset($_POST['submit']) && isset($_GET['id'])) {

    require("connect.php");
    global $mysqli;

    $id = $mysqli->real_escape_string(CisUtil::cleanInputs($_GET['id']));
    $query = "SELECT * FROM news WHERE storyId = {$id} LIMIT 1";
//    echo $query;
    $result = $mysqli->query($query);
    $num_results = $result->num_rows;
    $story = $result->fetch_row();
    if ($num_results != 1) {
        echo $message2;
        exit;
    }
    $result->free();
    $mysqli->close();
    ?>

    <h2>Edit News Item</h2>

    <form action="editNews.php?>" method="post">
        <div class="form-group">
            <label for="headLine">Headline:</label><br>
            <input id="headLine" type="text" name="headline" class="form-control" value="<?=$story[1]?>"/>
        </div>
        <div class="form-group">
            <label for="storyDetails">Story Details:</label><br>
            <textarea id="storyDetails" class="form-control" name="storyDetails"><?= $story[2] ?></textarea><br>
            <input type="hidden" name="id" value="<?=$story[0]?>"/>
            <input type="submit" name="submit" class="btn btn-default" value="Commit Edit">
        </div>
    </form>

    <?php
} else {
    require("connect.php");
    global $mysqli;
    $headline = C;
    $storyId = $mysqli->real_escape_string(CisUtil::cleanInputs($_POST["id"]));
    $storyDetails = $mysqli->real_escape_string(CisUtil::cleanInputs($_POST["storyDetails"]));

    if  (!empty($headline) &&  !empty($storyId) && !empty($storyDetails)){

        $query = "UPDATE news SET headline='{$headline}', storyDetails='{$storyDetails}' WHERE storyId={$storyId} LIMIT 1";
//        echo $query;
        $result = $mysqli->query($query);
//        echo $result;
//        CisUtil::sendMessageBox($result);

        if ($result != 1) {
            echo $message2;
            exit;
        }
        echo $message1;
//        $result->free();
    } else {
        echo $message3;
    }
    $mysqli->close();

}
include("incPageFoot.php");
?>