<?php
global $jsLinks, $root;
$jsLinks = isset($jsLinks) ? $jsLinks : "";
$root = isset($root) ? $root : "";
?>
<!--JAVASCRIPT GOES HERE-->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>-->
<script src="<?=$root?>js/bootstrap.bundle.js"></script>
<?php
//loads the the js Scripts
if (is_array($jsLinks)) {
    foreach ($jsLinks as $link) {
        echo "<script src=\"{$link}\"></script>";
    }
} else {
    echo "<script src=\"{$jsLinks}\"></script>";
}
?>
</body>
</html>
