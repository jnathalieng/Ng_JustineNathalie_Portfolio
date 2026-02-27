<?php

session_start();

session_destroy();

header('Location: /Ng_JustineNathalie_Portfolio/CMS/login.php');
exit;