<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';

loadSchema(
  connectDb(),
  __DIR__ . '/db/schema.sql'
);
