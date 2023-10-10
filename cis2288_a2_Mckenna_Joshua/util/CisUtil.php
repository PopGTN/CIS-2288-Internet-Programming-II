<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making random tasks alot quicker.  This Class will be updated throughout the school year when need!
-->

<?php class CisUtil
{
    public static function startPage($title = 'My Website', $html = '')
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo "$title"; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php include_once 'css/style.php';
            echo $html;
            ?>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                  crossorigin="anonymous">

        </head>
    <?php }


    public
    static function endPage()
    {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        </body>
        </html>
    <?php }

    public
    static function cleanInputs($string)
    {
        return htmlspecialchars(stripslashes($string));

    }
}

?>