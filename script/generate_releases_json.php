<?php

require_once __DIR__ . '/../include/config.php';
require_once __DIR__ . '/../include/listing.php';

$releases = generate_listing('downloads/releases', MODE_RELEASE, 'c');

/*
 * Change date format to ISO 8601
 * Altering date format in generate_listing() could break third-party scrapers
 */
$timezone = new DateTimeZone('-07:00');
foreach ($releases as &$release) {
    foreach ($release as &$flavour) {
        if (! is_array($flavour) || ! isset($flavour['mtime'])) {
            continue;
        }

        try {
            $date = new DateTimeImmutable($flavour['mtime'], $timezone);
            $flavour['mtime'] = $date->format('c');
        } catch (Exception $exception) {
            printf(
                'An error occurred while trying to format date "%s": %s',
                $flavour['mtime'],
                $exception->getMessage()
            );
        }
    }
    unset($flavour);
}
unset($release);

file_put_contents(RELEASES_DIR . 'releases.json', json_encode($releases));
