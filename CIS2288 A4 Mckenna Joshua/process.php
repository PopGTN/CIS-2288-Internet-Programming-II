<?php
/**
Author: Joshua Mckenna
Date: 2023/09/27
Description: Proccessing page for the form on addAlbum.php page
 */

require_once 'Classes/CisUtil.class.php';
CisUtil::autoload();

foreach ($_POST as $item) {
    if (empty($item)) {
        CisUtil::startPage("Album Processing...");
        echo "<main class='main container bg-white'>";
        echo "<p class='py-3 px-3'>Please finish filling out the form <a href=\"addAlbum.php\">Add a album</a></p>";
        CisUtil::endPage();
//        Header("Location: addAlbum.php");
        CisUtil::sendMessageBox("Please finish filling out the form");
        exit();
    }
}


CisUtil::startPage("Album Processed");
//CisUtil::navbar();
?>
    <div id="container" class="main bg-white container it">
        <?php echo "<h3><strong>Album Created</strong></h3>" ?>

        <div style="font-family: Times; font-size: medium;">
            <?php
            //puts the stong titles into array. song titles are separated by new lines
            $songs = explode("\r\n", CisUtil::cleanInputs($_POST['songs']));
            //song put the song writes into array and they were separated by commas
            $songWriters = explode(",", CisUtil::cleanInputs($_POST['songWriters']));

            //cleans empty spaces in the arrays
            $songWriters = array_filter($songWriters);
            $songs = array_filter($songs);
            //creates album objects
            $album = new album(CisUtil::cleanInputs($_POST['album']), CisUtil::cleanInputs($_POST['artist']), CisUtil::cleanInputs($_POST['publishers']), CisUtil::cleanInputs($_POST['genres']), $songs);

            //adds custom attributes
            $album->songWriters = $songWriters; //song writes
            $album->songs = $songs; //song titles
            ?>

            <!--displayes the object attributes-->
            <?= $album->__toString(); ?>

            <p class="py-3">
                <a href="addAlbum.php">Add another album!</a>
            </p>


            <?=CisUtil::arrayToText($_POST)?>

        </div>
    </div>

<?php
//CisUtil::footer();
CisUtil::endPage();