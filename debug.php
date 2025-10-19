<?php
$baseDir = 'C:\Apps\personal-page';
$filesToCheck = [
    $baseDir . '\bootstrap.php',
    $baseDir . '\bin\schema.php'
];

foreach ($filesToCheck as $file) {
    echo "file: $file<br>";
    echo "→ exist: " . (file_exists($file) ? 'yes ✅' : 'no ❌') . "\n";
    echo "→ readable: " . (is_readable($file) ? 'yes ✅' : 'no ❌') . "\n";
    echo "→ true patj: " . (realpath($file) ?: 'not corrcet ❌') . "\n\n";
}

// اختبار المسار المختلف
echo "<h3>test the path:</h3>";
$testPaths = [
    'bin./../bootstrap.php',
    'bin/../bootstrap.php', 
    dirname(__DIR__) . '/bootstrap.php'
];

foreach ($testPaths as $path) {
    $fullPath = $baseDir . '\\' . str_replace('/', '\\', $path);
    echo "path: $path → " . (file_exists($fullPath) ? 'true ✅' : 'false ❌') . "\n";
}
?>