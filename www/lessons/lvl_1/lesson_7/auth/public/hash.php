<?php

$pass = 123;

$hash = password_hash($pass, PASSWORD_DEFAULT);
var_dump($hash);