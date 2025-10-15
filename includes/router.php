<?php

declare(strict_types=1);

function dispatch(string $uri, string $method): void {
  // 1- normalize the URI: GET /geustbook -> routes/guestbook_get.php
  // 2- GET|POST - reuturn 404
  // 3- file path - PHP file path
  // 4- if this file exists, if not 404
  // 5- Handle the route by including the php file
}