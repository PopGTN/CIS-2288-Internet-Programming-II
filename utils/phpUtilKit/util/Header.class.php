<?php

/**
 * Author: Joshua Mckenna
 * Date: 2023/10/31
 * Description:
 * a class for creating headers.
 */
class Header
{
    const DEFAULT_STYLE = [
        'bgColor' => "var(--header)",
        'height' => "200px",
        'fontColor' => '',
        'classes' => '',
        'textDivClasses' => 'container',
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
        'alignText' => "center"
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
     * 'classes' => '', <br>
     * 'textDivClasses' => 'container', <br>
     * 'titleClasses' => 'display-1', <br>
     * 'STClasses' => '', <br>
     * 'underline' => true, <br>
     * 'underlineColor' => "black", <br>
     * 'underlineWidth' => "2px", <br>
     * 'STUnderline' => false, <br>
     * 'STUnderlineColor' => "black", <br>
     * 'STUnderlineSize' => "3px", <br>
     * 'bottomSpacing' => '1rem', <br>
     * 'alignText'=> true, <br>
     * 'STAlignText'=> 'true, <br>
     * 'fontSize' => "", <br>
     * 'STFontSize' => "", <br>
     * 'bgRepeat' => 'no-repeat', <br>
     * 'bgPosition' => 'center', <br>
     * 'bgSize' => 'cover', <br>
     * 'alignText' => 'center' <br>
     * ];
     * @return void
     */
    public function __construct($text = array("My Website"), $style = [])
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
        if (!isset($this->style['STAlignText'])) {
            $this->style['STAlignText'] = $this->style['alignText'];
        }

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

    public function build()
    {
        $alignText = "";
        $STAlignText = "";
        switch (strtolower($this->style['alignText'])) {
            case "center":
                $alignText = "justify-content: center;";
                break;
            case"start":
            case "left":
                $alignText = "justify-content: flex-start;";
                break;
            case"end":
            case "right":
                $alignText = "justify-content: flex-end;";
                break;
            default:
                break;
        }
        switch (strtolower($this->style['STAlignText'])) {
            case "center":
                $STAlignText = "justify-content: center;";
                break;
            case"start":
            case "left":
                $STAlignText = "justify-content: flex-start;";
                break;
            case"end":
            case "right":
                $STAlignText = "justify-content: flex-end;";
                break;
            default:
                break;
        }


        ?>
        <header class="<?= $this->style['classes'] ?>"
                style=" <?= 'background-color: ' . $this->style['bgColor'] ?>; <?= "min-height: " . $this->style['height'] ?>; <?php if (!empty($this->style['image'])) { ?> background-image: url('<?= $this->style['image'] ?>'); <?php } ?> <?= $alignText ?> background-size: <?= $this->style['bgSize'] ?>; background-position: <?= $this->style['bgPosition'] ?>; background-repeat: <?= $this->style['bgRepeat'] ?>; display: flex; align-items: center; ">
            <div class="<?= $this->style['textDivClasses'] ?>">
                <?php
                if (is_array($this->text)) {

                    ?>
                    <h1 class="<?= $this->style['titleClasses'] ?>"
                        style="width: fit-content; margin: auto; margin-bottom: <?= $this->style['bottomSpacing'] ?>; <?php if ($this->style['underline']) { ?> border-bottom-color: <?= $this->style['underlineColor']?>; border-bottom-style: solid; border-bottom-width: <?=$this->style['underlineWidth'] ?>; <?php } ?> <?php if (isset($this->style['fontSize'])) { ?> font-size: <?=$this->style['fontSize']?>; <?php } ?>">
                        <?= $this->text[0] ?>
                    </h1>
                    <div style="display: flex; align-items: center; <?= $STAlignText ?>">
                        <?php
                        for ($x = 1; $x < count($this->text); $x++) { ?>
                            <p class="<?= $this->style['STClasses'] ?>"
                               style="width: fit-content; color: <?= $this->style['STFontColor'] ?>; <?php if ($x != (count($this->text) - 1)) { ?> margin-bottom: <?= $this->style['STBottomSpacing']?>; <?php } ?> <?php if ($this->style['STUnderline']) { ?> border-bottom-color: <?= $this->style['STUnderlineColor']?>; border-bottom-width: <?= $this->style['STUnderlineWidth'] ?>; border-bottom-style: solid; <?php } ?> <?php if (isset($this->style['STFontSize'])) { ?> font-size: <?=$this->style['STFontSize']?>; <?php } ?> ">
                                <?= $this->text[$x] ?>
                            </p>

                        <?php } ?>
                    </div>
                    <?php
                } else { ?>
                    <h1 class="<?= $this->style['titleClasses'] ?>"
                        style=" width: fit-content; margin: auto; color: <?= $this->style['fontColor'] ?>; margin-bottom: <?= $this->style['bottomSpacing'] ?>; <?php if ($this->style['underline']) { ?> border-bottom-color: <?= $this->style['underlineColor']?>; border-bottom-style: solid; border-bottom-width: <?=$this->style['underlineWidth'] ?>; <?php } ?> <?php if (isset($this->style['fontSize'])) { ?> font-size: <?=$this->style['fontSize']?>; <?php } ?> ">
                        <?= $this->text ?>
                    </h1>
                <?php }
                ?>
                <!--</div>-->
            </div>
        </header>
    <?php }


}
