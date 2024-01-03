<?php
global $root, $isLoggedIn;
$root = (!isset($root) ? "" : $root);
?>
<nav class="navbar navbar-expand-lg sticky-top bg-primary ">
    <div class="container text-white">
        <a class="navbar-brand" href="<?= $root ?>">
            <!--  <img src="<?php /*=$root*/ ?>photos/logo.webp" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">-->
            Bookorama Management System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--
                <li class="nav-item">
                    <a class="nav-link" href="<?php /*= $root */?>">Home</a>
                </li>-->
    <!--            <li class="nav-item invisible" style="display: none;">
                    <a class="nav-link" href="<?php /*= $root */?>login">Request Pickup</a>
                </li>-->

<!--                <li class="nav-item dropdown invisible">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Sevices
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php /*= $root */?>login">Request Pickup</a></li>
                        <li><a class="dropdown-item" href="<?php /*= $root */?>#">Another Service</a></li>
                        <li><a class="dropdown-item" href="<?php /*= $root */?>#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php /*= $root */ ?>#">About Us</a>
                </li>-->
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
                    <!--                    <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>-->
                    <hr class="d-lg-none my-2 text-white-50">
                </li>
                <?php if (!$isLoggedIn) { ?>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link" href="<?= $root ?>login" target=""
                           rel="noopener">
<!--                            <i class="bi bi-person-circle"></i>-->
                            Login
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
<!--                            <i class="bi bi-person-circle"></i>-->
                            <?=$_SESSION["username"]?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?= $root ?>book/add">Add a new Book</a></li>
                            <li><a class="dropdown-item link-danger text-center" href="<?= $root ?>logout">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <!--Divider-->
                <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
                    <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                    <hr class="d-lg-none my-2 text-white-50">
                </li>

                <!--Colour Mode Switcher-->
                <li class="nav-item dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="circle-half" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                  d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>

                        </symbol>
                        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                  d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
                            <path fill="currentColor"
                                  d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
                        </symbol>
                        <symbol id="sun-fill" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                  d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
                        </symbol>
                    </svg>

                    <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                            id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-label="Toggle theme (auto)">
                        <svg class="bi my-1 theme-icon-active" width="16" height="16">
                            <use href="#circle-half"></use>
                        </svg>
                        <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16">
                                    <use href="#sun-fill"></use>
                                </svg>
                                Light
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16">
                                    <use href="#moon-stars-fill"></use>
                                </svg>
                                Dark
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16">
                                    <use href="#circle-half"></use>
                                </svg>
                                Auto
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
