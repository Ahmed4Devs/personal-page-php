<?php

declare(strict_types=1);
const ALLOWRD_METHODS = ['GET', 'POST'];
const INDEX_URI = '';
const INDEX_ROUTE = 'index';

function normailzeUri(string $uri): string {
  $uri = strtolower(trim($uri, '/'));
  return $uri === INDEX_URI ? INDEX_ROUTE : $uri;
}

function getFilePath(string $uri, string $method): string {
  return ROUTES_DIR . '/' . normailzeUri($uri) . '_' . strtolower( $method) . '.php';
}

function notFound(): void {
  http_response_code(404);
  echo "404 Not Found";
  exit;
}

function badRequest(string $message = 'Bad Request'): void {
  http_response_code(400);
  echo $message;
  exit;
}

function serverError(string $message = 'Server Error'): void {
  http_response_code(500);
  echo $message;
  exit;
}

function dispatch(string $uri, string $method): void {
  // 1- normalize the URI: GET /geustbook -> routes/guestbook_get.php
  $uri = normailzeUri($uri);
  $method = strtoupper($method);
  // var_dump($uri);die;

  // 2- GET|POST - reuturn 404
  if(!in_array($method, ALLOWRD_METHODS)) {
    // notFound 404
    notFound();
  }

  // 3- file path - PHP file path
  $filePath = getFilePath($uri, $method);
  if(file_exists($filePath)) {
    include($filePath);
    return;
  }

  notFound();
  // 4- if this file exists, if not 404
  // 5- Handle the route by including the php file
}