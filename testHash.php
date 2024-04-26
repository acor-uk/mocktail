<?php

//$hash = md5("Letmein1");
$hash = password_hash("Password1234",PASSWORD_DEFAULT);

echo($hash);