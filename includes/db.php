<?php 

function connectDb(): PDO {
  $pdo = new PDO('sqlite:' . DB_DIR . '/' . 'db.sqlite');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}

function loadSchema(PDO $pdo, string $schemaFile): void {
  $sql = file_get_contents($schemaFile);
  if (!$sql) {
  // if (false === $sql) {
    die("Failed to load schema: $schemaFile");
  }
  $pdo->exec($sql);
  echo "Schema loaded successfully.\n";
  // $schema = file_get_contents($schemaFile);
  // if ($schema === false) {
  //   throw new RuntimeException("Failed to read schema file: $schemaFile");
  // }
  // $pdo->exec($schema);
}