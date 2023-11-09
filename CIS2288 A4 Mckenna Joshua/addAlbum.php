<?php
require_once 'Classes/CisUtil.class.php';
CisUtil::autoload("Classes");
CisUtil::startPage("Add a album page");
//CisUtil::navbar();
?>
    <div id="container" class="main bg-white container">
        <div class="">
            <h3><strong>Add a Album</strong></h3>
            <form action='process.php' method='post'>
                <div class="row ">
                    <div class="mb-3 col "><label for='album' class="form-label "><strong>Album title: </strong></label><input
                                type='text' id='album' name='album' value='' placeholder="Album title"
                                class="form-control "></div>
                    <div class="mb-3 col "><label for='artist'
                                                  class="form-label "><strong>Artist: </strong></label><input
                                type='text' id='artist' name='artist' value='' placeholder="Artist"
                                class="form-control "></div>
                </div>
                <div class="row ">
                    <div class="mb-3 col "><label for='genres'
                                                  class="form-label "><strong>Genres:</strong></label><select
                                id="genres" name="genres" class="form-select ">
                            <option value="Rock">Rock</option>
                            <option value="Pop">Pop</option>
                            <option value="Hip-Hop">Hip-Hop</option>
                            <option value="Rap">Rap</option>
                            <option value="Country">Country</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Blues">Blues</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Classical">Classical</option>
                            <option value="Reggae">Reggae</option>
                            <option value="R&B">R&B</option>
                            <option value="Metal">Metal</option>
                            <option value="Punk">Punk</option>
                            <option value="Folk">Folk</option>
                            <option value="Soul">Soul</option>
                            <option value="Funk">Funk</option>
                            <option value="Dance">Dance</option>
                            <option value="Alternative">Alternative</option>
                            <option value="Gospel">Gospel</option>
                            <option value="Indie">Indie</option>
                            <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
                            <option value="K-Pop">K-Pop</option>
                            <option value="Latin">Latin</option>
                            <option value="Disco">Disco</option>
                            <option value="Techno">Techno</option>
                            <option value="House">House</option>
                            <option value="EDM">EDM</option>
                            <option value="Trance">Trance</option>
                            <option value="Dubstep">Dubstep</option>
                        </select></div>
                    <div class="mb-3 col "><label for='publishers' class="form-label "><strong>Publishers: </strong>
                        </label><input id='publishers' name='publishers' value='' list='publisherss'
                                       placeholder="Publisher" class="form-control ">
                        <datalist id="publisherss">
                            <option value="Universal Music Group"></option>
                            <option value="Sony Music"></option>
                            <option value="Warner Music Group"></option>
                            <option value="EMI"></option>
                            <option value="BMG"></option>
                            <option value="Columbia Records"></option>
                            <option value="Atlantic Records"></option>
                            <option value="Capitol Records"></option>
                            <option value="Interscope Records"></option>
                            <option value="Def Jam Recordings"></option>
                            <option value="RCA Records"></option>
                            <option value="Republic Records"></option>
                            <option value="Virgin Records"></option>
                            <option value="Motown Records"></option>
                            <option value="Sub Pop Records"></option>
                            <option value="Merge Records"></option>
                            <option value="Elektra Records"></option>
                            <option value="Epic Records"></option>
                            <option value="Island Records"></option>
                            <option value="Polydor Records"></option>
                            <option value="Arista Records"></option>
                            <option value="Jive Records"></option>
                            <option value="MCA Records"></option>
                            <option value="Verve Records"></option>
                            <option value="Warner Bros. Records"></option>
                            <option value="Sire Records"></option>
                            <option value="Nonesuch Records"></option>
                            <option value="Rounder Records"></option>
                            <option value="XL Recordings"></option>
                        </datalist>
                    </div>
                </div>
                <div class="mb-3 "><label for='songWriters' class="form-label "><strong>Song Writer:</strong><span
                                class='text-danger pt-0 mt-0'> (Make sure to put commas in between names)</span></label><input
                            type='text' id='songWriters' name='songWriters' value='' placeholder="Song Writer"
                            class="form-control "></div>
                <div class="mb-3 "><label for='songs' class="form-label "><strong>Songs: </strong> <span
                                class='text-danger pt-0 mt-0'>(Place your songs titles in separate lines.)</span></label><textarea
                            name="songs" placeholder="Songs (1 song pre line)" class="form-control mb-0 pb-0"
                            style="width: 100%; max-height: 500px;"></textarea></div>
                <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                <div class="mb-3 ">
            </form>
        </div>
    </div>
<?php
//CisUtil::footer();
CisUtil::endPage();

