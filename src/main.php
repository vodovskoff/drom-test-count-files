<?php

declare(strict_types=1);

$configFilePath = dirname(__DIR__).'/config.json';

$configString = file_get_contents($configFilePath);
if (false === $configString) {
    throw new Exception('Cannot read config file');
}

$config = json_decode(file_get_contents($configFilePath), true, JSON_THROW_ON_ERROR);
if (!isset($config['directories']) || !is_array($config['directories'])) {
    throw new Exception('Invalid config file');
}

$totalSum = 0;
$delimiter = $config['delimiter'] ?? ' ';
$visitedPaths = [];

foreach (array_unique($config['directories']) as $directory) {
    if (!is_dir($directory) || !is_readable($directory)) {
        echo "Skipping \"{$directory}\": does not exist or is not readable\n";
        continue;
    }

    $directoryIterator = new RecursiveDirectoryIterator($directory);
    $iterator = new RecursiveIteratorIterator($directoryIterator);

    foreach ($iterator as $file) {
        $filePath = realpath($file->getPathname());
        if ('count' === $file->getFilename() && !isset($visitedPaths[$filePath])) {
            $content = file_get_contents($filePath);
            $elements = explode($delimiter, $content);

            foreach ($elements as $element) {
                if (is_numeric($element)) {
                    $totalSum += (float) $element;
                }
            }

            $visitedPaths[$filePath] = true;
        }
    }
}

echo "Total sum: {$totalSum}\n";
