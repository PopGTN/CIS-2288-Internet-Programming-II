<!--
Author: Joshua Mckenna
Date: 2023/10/31
Description:
    a class for creating headers.
-->

<?php

class Header
{
    const DEFAULT_STYLE = [
        'bgColor' => "#D3D3D3FF",
        'height' => "200px",
        'fontColor' => 'black',
        'classes' => 'container',
        'titleClasses' => 'display-3',
        'STClasses' => '',
        'underline' => true,
        'underlineWidth' => "3px",
        'STUnderline' => false,
        'STUnderlineWidth' => "2px",
        'STFontSize' => "1.3em",
        'bottomSpacing' => "0.5rem",
        'bgRepeat' => 'no-repeat',
        'bgPosition' => 'center',
        'bgSize' => 'cover',
        'alignText' => 'center'
    ];
    private $text;
    private $style;

    /**
     * @param $text "either array of Custom html or just text"
     * @param $style "Set all the style here. Leave out style for default Settings" <br>
     * $style = [ <br>
     * 'image' => '', <br>
     * 'bgColor' => "#D3D3D3FF", <br>
     * 'height' => "200px", <br>
     * 'fontColor' => 'black', <br>
     * 'classes' => 'container', <br>
     * 'titleClasses' => 'display-1', <br>
     * 'STClasses' => '', <br>
     * 'underline' => true, <br>
     * 'underlineColor' => "black", <br>
     * 'underlineWidth' => "2px", <br>
     * 'STUnderline' => false, <br>
     * 'STUnderlineColor' => "black", <br>
     * 'STUnderlineSize' => "3px", <br>
     * 'bottomSpacing' => '1rem', <br>
     * 'textAlign'=> 'center', <br>
     * 'STTextAlign'=> 'center', <br>
     * 'fontSize' => "", <br>
     * 'STFontSize' => "", <br>
     * 'bgRepeat' => 'no-repeat', <br>
     * 'bgPosition' => 'center', <br>
     * 'bgSize' => 'cover', <br>
     * 'alignText' => 'center' <br>
     * ];
     * @return void
     */
    public function __construct($text = "Hello world", $style = [])
    {
        $this->style = array_merge(self::DEFAULT_STYLE, $style);
        //Set it the font colour the same
        if (!isset($this->style['STFontColor'])) {
            $this->style['STFontColor'] = $this->style['fontColor'];
        }
        if (!isset($this->style['underlineColor'])) {
            $this->style['underlineColor'] = $this->style['fontColor'];
        }
        if (!isset($this->style['STUnderlineColor'])) {
            $this->style['STUnderlineColor'] = $this->style['STFontColor'];
        }
        if (!isset($this->style['STBottomSpacing'])) {
            $this->style['STBottomSpacing'] = $this->style['bottomSpacing'];
        }

        $this->text = $text;

    }

    /**
     * @param $style
     * @return void
     */
    public function setStyle($style)
    {
        $this->style = array_merge($this->style, $style);
    }

    /**
     * @param $texts
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    public function build() {
        ?>

        <header class="<?= $this->style['classes'] ?>"
                style="
                <?= 'background-color: ' . $this->style['bgColor'] ?>;
                <?= "min-height: " . $this->style['height'] ?>;
                <?php if (!empty($this->style['image'])) { ?>
                        background-image: url('<?= $this->style['image'] ?>');
                <?php } ?>


                        background-size: <?= $this->style['bgSize'] ?>;
                        background-position: <?= $this->style['bgPosition'] ?>;
                        background-repeat:  <?= $this->style['bgRepeat'] ?>;
                        display: flex;
                        justify-content: <?= $this->style['alignText'] ?>;
                        align-items: center;
                        "
        >
            <div>
                <?php
                if (is_array($this->text)) {

                    ?>
                    <h1 class="<?= $this->style['titleClasses'] ?>"
                        style="
                                width: fit-content; margin: auto;
                                color: <?= $this->style['fontColor'] ?>;
                                margin-bottom: <?= $this->style['bottomSpacing'] ?>;

                        <?php if ($this->style['underline']) { ?>
                                border-bottom-color: <?= $this->style['underlineColor']?>;
                            border-bottom-style: solid;
                            border-bottom-width: <?=$this->style['underlineWidth'] ?>;
                        <?php } ?>
                        <?php if (isset($this->style['fontSize'])) { ?>
                                font-size: <?=$this->style['fontSize']?>;
                        <?php } ?>

                                ">
                        <?= $this->text[0] ?>
                    </h1>
                    <?php
                    for ($x = 1; $x < count($this->text); $x++) { ?>
                        <p class="<?= $this->style['STClasses'] ?>"
                           style="
                                   width: fit-content; margin: auto;
                                   color: <?= $this->style['STFontColor'] ?>;

                           <?php if ($x != (count($this->text) - 1)) { ?>
                                   margin-bottom: <?= $this->style['STBottomSpacing']?>;
                        <?php } ?>
                           <?php if ($this->style['STUnderline']) { ?>
                                   border-bottom-color: <?= $this->style['STUnderlineColor']?>;
                                   border-bottom-width: <?= $this->style['STUnderlineWidth'] ?>;
                                   border-bottom-style: solid;
                        <?php } ?>
                           <?php if (isset($this->style['STFontSize'])) { ?>
                                   font-size: <?=$this->style['STFontSize']?>;
                        <?php } ?>

                                   ">
                            <?= $this->text[$x] ?>
                        </p>


                    <?php }
                } else { ?>
                    <h1 class="<?= $this->style['titleClasses'] ?>"
                        style="
                                color: <?= $this->style['fontColor'] ?>;
                                margin-bottom: <?= $this->style['bottomSpacing'] ?>;
                        <?php if ($this->style['underline']) { ?>
                                border-bottom-color: <?= $this->style['underlineColor']?>;
                                border-bottom-style: solid;
                                border-bottom-width: <?=$this->style['underlineWidth'] ?>;
                        <?php } ?>
                        <?php if (isset($this->style['fontSize'])) { ?>
                                font-size: <?=$this->style['fontSize']?>;
                        <?php } ?>

                                ">
                        <?= $this->text ?>
                    </h1>
                <?php }
                ?>
            </div>
        </header>
    <?php }



}
