<?php

function connectDb(): PDO {
  $pdo = new PDO('sqlite:' . DB_DIR . '/' . 'db.sqlite');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}

function loadSchema(PDO $pdo, string $schemaFile): void {
  $schema = file_get_contents($schemaFile);
  if (!$schema) {
    die("Failed to load schema from file: $schemaFile.");
  }
  $pdo->exec($schema);
  echo "Schema loaded successfully.\n";
}