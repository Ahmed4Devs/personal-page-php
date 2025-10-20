<?php
declare(strict_types=1);
// require_once __DIR__ . '/../bootstrap.php';
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

loadSchema(
  connectDb(),
  DB_DIR . '/schema.sql'
);