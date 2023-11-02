<?php
require_once 'Classes/CisUtil.class.php';
require_once 'Classes/FormBuilder.Bootstrap.class.php';
CisUtil::autoload("Classes");



$musicGenres = [
    "Rock",
    "Pop",
    "Hip-Hop",
    "Rap",
    "Country",
    "Jazz",
    "Blues",
    "Electronic",
    "Classical",
    "Reggae",
    "R&B",
    "Metal",
    "Punk",
    "Folk",
    "Soul",
    "Funk",
    "Dance",
    "Alternative",
    "Gospel",
    "Indie",
    "Hip-Hop/Rap",
    "K-Pop",
    "Latin",
    "Disco",
    "Techno",
    "House",
    "EDM",
    "Trance",
    "Dubstep",
];
$musicPublishers = [
    "Universal Music Group",
    "Sony Music",
    "Warner Music Group",
    "EMI",
    "BMG",
    "Columbia Records",
    "Atlantic Records",
    "Capitol Records",
    "Interscope Records",
    "Def Jam Recordings",
    "RCA Records",
    "Republic Records",
    "Virgin Records",
    "Motown Records",
    "Sub Pop Records",
    "Merge Records",
    "Elektra Records",
    "Epic Records",
    "Island Records",
    "Polydor Records",
    "Arista Records",
    "Jive Records",
    "MCA Records",
    "Verve Records",
    "Warner Bros. Records",
    "Sire Records",
    "Nonesuch Records",
    "Rounder Records",
    "XL Recordings",
];

$form = new BSFormBuilder("process.php","post",array("bootstrap"=> isset($_POST["bootstrap"]),"autoBrk"=>true));
$form->addLabel("album","Album title:");
$form->addInput("text","album","Joshuas Beats","Album title");

$form->addLabel("artist","Artist:");
$form->addInput("text","artist","Joshua Mckenna","Artist");

$form->row();
$form->addLabel("genres","Genres: ");
$form->addSelect("genres",$musicGenres);

$form->addLabel("publishers","Publishers: ");
$form->addDataList("publishers",$musicPublishers,"Publisher","Warner Bros. Records");
$form->row();
$form->setSettings(array("autoFrmt"=>false));
$form->div();
$form->addLabel("songs","Songs: ");
$form->addTextarea("songs","Songs (1 song pre line)", "","","style=\"width: 100%; max-height: 500px;\"");
$form->addCustomHTML("<span class='text-danger'>Place your songs in separate lines.</span>");
$form->div();
$form->setSettings(array("autoFrmt"=>true));


$form->addSubmit();

CisUtil::startPage("Add a album page");
//CisUtil::navbar();
?>
    <main class="main bg-white container">
        <div class="col-12 col-lg-6">
        <h3><strong>Add a Album</strong></h3>
            <?php
            $form->build()
            ?>
        </div>
    </main>
    <div class="bg-white p-5" style=" position: relative; right: 0;">
        <form action="" method="post" style="display: flex;">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="mySwitch" name="bootstrap" value="true" <?= (isset($_POST["bootstrap"]) ? "checked" : "") ?>>
                <label class="form-check-label" for="mySwitch">Bootstrap Mode</label>
            </div>
            <button type="submit" class="mx-5 btn btn-primary mt-3">Save</button>
        </form>
    </div>

<?php
//CisUtil::footer();
CisUtil::endPage();

