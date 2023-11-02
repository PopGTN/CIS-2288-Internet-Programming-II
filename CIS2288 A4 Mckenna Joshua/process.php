<?php
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
    <main class="main bg-white container it">
        <h3><strong>Album Created</strong></h3>
        <div style="font-family: Times; font-size: medium;">
            <?php
            $songs = explode("\r\n", CisUtil::cleanInputs($_POST['songs']));
            $songs = array_filter($songs);
            $album = new album(CisUtil::cleanInputs($_POST['album']), CisUtil::cleanInputs($_POST['artist']), CisUtil::cleanInputs($_POST['publishers']), CisUtil::cleanInputs($_POST['genres']), $songs);
            ?>

            <strong>Album Title:</strong> <?= $album->albumTitle ?><br>
            <strong>Artist:</strong> <?= $album->artist ?><br>
            <strong>Publisher:</strong> <?= $album->publisher ?><br>
            <strong>Genre:</strong> <?= $album->genre ?><br>
            <strong>Songs:</strong>
            <ul>
                <?php
                foreach ($album->songs as $song) {
                    echo "<li>{$song}</li>";
                }
                ?>
            </ul>
            <p class="py-3">
                <a href="addAlbum.php">Add another album!</a>
            </p>
        </div>
    </main>

<?php
//CisUtil::footer();
CisUtil::endPage();