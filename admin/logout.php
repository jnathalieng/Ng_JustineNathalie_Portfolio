<?php

session_start();

session_destroy();

header('Location: /Ng_JustineNathalie_Portfolio/admin/login.php');
exit;