<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CIS-2288</a>
    </div>
    <ul class="nav navbar-nav">
      <li class='<?php if (isset($page) && $page == "home") {echo "active";}?>'><a href="index.php">Home</a></li>
      <li class='<?php if (isset($page) && $page == "page1") {echo "active";}?>'><a href="page1.php">Page 1</a></li>
      <li class='<?php if (isset($page) && $page == "page2") {echo "active";}?>'><a href="page2.php">Page 2</a></li>
      <li class='<?php if (isset($page) && $page == "page3") {echo "active";}?>'><a href="page3.php">Page 3</a></li>
    </ul>
      <div class="navbar-header navbar-right">
          <a class="navbar-brand" href="logout.php">Logout</a>
      </div>
  </div>
</nav>