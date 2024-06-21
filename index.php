<?php

require __DIR__ . '/vendor/autoload.php';

use Sitemap\Exceptions\FileWriteException;
use Sitemap\Exceptions\InvalidDataException;
use Sitemap\SitemapGenerator;

try {

    $pages = [
        [
            'loc' => 'http://example.com/',
            'lastmod' => '2024-06-21',
            'changefreq' => 'daily',
            'priority' => '1.0',
        ],
        [
            'loc' => 'http://example.com/1',
            'lastmod' => '2024-06-21',
            'changefreq' => 'daily',
            'priority' => '1.0',
        ]
    ];


    $format = 'json';
    $filePath = 'sitemaps/sitemap.json';

    $generator = new SitemapGenerator($pages, $format, $filePath);
    $generator->generate();

} catch (InvalidDataException $e) {
    echo "Invalid Data Error: " . $e->getMessage();
} catch (FileWriteException $e) {
    echo "File Write Error: " . $e->getMessage();
} catch (Throwable $e) {
    echo "General Error: " . $e->getMessage();
}