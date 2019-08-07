<?php

require_once __DIR__ . '/../include/config.php';
require_once __DIR__ . '/../include/listing.php';

$releases = generate_listing('downloads/releases', MODE_RELEASE);
file_put_contents(RELEASES_DIR . 'releases.json', json_encode($releases));
