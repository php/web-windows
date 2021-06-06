<?php

include __DIR__ . '/../include/config.php';

$versions = ['7.3.26', '7.4.14', '8.0.1'];

/*
 * releases
 */

$dir = RELEASES_DIR;
@mkdir($dir);
foreach ($versions as $version) {
    switch (true) {
        case version_compare($version, '7.4.0') < 0:
            $vc = 'VC15';
            break;
        case version_compare($version, '8.0.0') < 0:
            $vc = 'vc15';
            break;
        default:
            $vc = 'vs16';
    }
    touch("{$dir}php-{$version}-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-{$version}-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-{$version}-src.zip");
    touch("{$dir}php-{$version}-Win32-{$vc}-x64.zip");
    touch("{$dir}php-{$version}-Win32-{$vc}-x86.zip");
    touch("{$dir}php-debug-pack-{$version}-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-debug-pack-{$version}-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-debug-pack-{$version}-Win32-{$vc}-x64.zip");
    touch("{$dir}php-debug-pack-{$version}-Win32-{$vc}-x86.zip");
    touch("{$dir}php-devel-pack-{$version}-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-devel-pack-{$version}-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-devel-pack-{$version}-Win32-{$vc}-x64.zip");
    touch("{$dir}php-devel-pack-{$version}-Win32-{$vc}-x86.zip");
    touch("{$dir}php-test-pack-{$version}.zip");
}

$sha256 = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';
$sha_file = fopen("{$dir}sha256sum.txt", 'w');
foreach (scandir($dir) as $filename) {
    if (pathinfo($filename, PATHINFO_EXTENSION) !== 'zip') continue;
    fwrite($sha_file, "{$sha256} *{$filename}\n");
}
fclose($sha_file);

/*
 * qa
 */

$dir = QA_DIR;
@mkdir($dir);
foreach ($versions as $version) {
    switch (true) {
        case version_compare($version, '7.4.0') < 0:
            $vc = 'VC15';
            break;
        case version_compare($version, '8.0.0') < 0:
            $vc = 'vc15';
            break;
        default:
            $vc = 'vs16';
    }
    touch("{$dir}php-{$version}RC1-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-{$version}RC1-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-{$version}RC1-src.zip");
    touch("{$dir}php-{$version}RC1-Win32-{$vc}-x64.zip");
    touch("{$dir}php-{$version}RC1-Win32-{$vc}-x86.zip");
    touch("{$dir}php-debug-pack-{$version}RC1-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-debug-pack-{$version}RC1-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-debug-pack-{$version}RC1-Win32-{$vc}-x64.zip");
    touch("{$dir}php-debug-pack-{$version}RC1-Win32-{$vc}-x86.zip");
    touch("{$dir}php-devel-pack-{$version}RC1-nts-Win32-{$vc}-x64.zip");
    touch("{$dir}php-devel-pack-{$version}RC1-nts-Win32-{$vc}-x86.zip");
    touch("{$dir}php-devel-pack-{$version}RC1-Win32-{$vc}-x64.zip");
    touch("{$dir}php-devel-pack-{$version}RC1-Win32-{$vc}-x86.zip");
    touch("{$dir}php-test-pack-{$version}RC1.zip");
}

$sha256 = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';
$sha_file = fopen("{$dir}sha256sum.txt", 'w');
foreach (scandir($dir) as $filename) {
    if (pathinfo($filename, PATHINFO_EXTENSION) !== 'zip') continue;
    fwrite($sha_file, "{$sha256} *{$filename}\n");
}
fclose($sha_file);

/*
 * snaps
 */

$versions = [
    'php-7.3' => [
        "revision_last" => "65d7ade6842bcf06b3d2ed59a796bdd78d073df9",
        "revision_previous" => null,
        "revision_last_exported" => "65d7ade",
        "build_num" => 5,
        "builds" => [
            "nts-windows-vc15-x64",
            "nts-windows-vc15-x86",
            "ts-windows-vc15-x86",
            "ts-windows-vc15-x64",
            "nts-windows-vc15-x64-avx"
        ]
    ],
    'php-7.4' => [
        "revision_last" => "65d7ade6842bcf06b3d2ed59a796bdd78d073df9",
        "revision_previous" => null,
        "revision_last_exported" => "65d7ade",
        "build_num" => 5,
        "builds" => [
            "nts-windows-vc15-x64",
            "nts-windows-vc15-x86",
            "ts-windows-vc15-x86",
            "ts-windows-vc15-x64",
            "nts-windows-vc15-x64-avx"
        ]
    ],
];
$json = '{"stats":{"warning":0,"error":0},"has_php_pkg":true,"has_debug_pkg":false,"has_devel_pkg":false,"has_test_pkg":false}';
$dir = SNAPS_DIR;
@mkdir($dir);
foreach ($versions as $version => $snap_meta) {
    @mkdir("{$dir}{$version}");
    file_put_contents("{$dir}{$version}/{$version}.json", json_encode($snap_meta));
    $rev = $snap_meta['revision_last_exported'];
    $revdir = "{$dir}{$version}/r{$rev}";
    @mkdir($revdir);
    touch("{$revdir}/{$version}-src-r{$rev}.zip");
    foreach ($snap_meta['builds'] as $build) {
        file_put_contents("{$revdir}/{$build}.json", $json);
        $prefix = strncmp($version, 'php', 3) ? "php-{$version}" : $version;
        file_put_contents("{$revdir}/{$prefix}-{$build}-r{$rev}.zip", '*');
    }
}
