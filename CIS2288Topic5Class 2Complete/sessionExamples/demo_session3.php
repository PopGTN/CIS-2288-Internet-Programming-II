<?php
session_start();

if (empty($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<html>

<head>
    <title>Setting up a PHP session</title>
</head>

<body>
<p>
    Hello visitor, you have seen this page <?php echo $_SESSION['count']; ?> times.
</p>

<p>
<!--    The SID constant will show an empty string if a a cookie with the name of session.name (cookies enabled) has been detected by PHP.-->
    <!--To continue, <a href="nextpage.php?<?php /*echo htmlspecialchars(SID); */?>">click
        here</a>.-->
    To continue, <a href="nextpage.php?<?php echo htmlspecialchars(session_id()); ?>">click
        here</a>.
</p>
<!--echo "<br/>Session ID: ".;-->

</body>

</html>
