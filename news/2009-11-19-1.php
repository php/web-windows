<div class="info entry">
  <!-- .info -->

  <h3 class="summary entry-title">PHP 5.3.1
  released</h3>
  <?php news_date('19-Nov-2009') ?>

  <div class="newsImage"></div>

  <div>
    <p>The PHP development team would like to
    announce the immediate availability of PHP
    5.3.1. This release focuses on improving the
    stability of the PHP 5.3.x branch with over
    100 bug fixes, some of which are security
    related. All users of PHP are encouraged to
    upgrade to this release.</p>

    <p><b>Security Enhancements and Fixes in PHP
    5.3.1:</b></p>

    <ul>
      <li>Added "max_file_uploads" INI directive,
      which can be set to limit the number of
      file uploads per-request to 20 by default,
      to prevent possible DOS via temporary file
      exhaustion.</li>

      <li>Added missing sanity checks around exif
      processing.</li>

      <li>Fixed a safe_mode bypass in
      tempnam().</li>

      <li>Fixed a open_basedir bypass in
      posix_mkfifo().</li>

      <li>Fixed failing
      safe_mode_include_dir.</li>
    </ul>

    <p>Further details about the PHP 5.3.1
    release can be found in the <a href=
    "http://www.php.net/releases/5_3_1.php">release
    announcement</a>, and the full list of
    changes are available in the <a href=
    "http://www.php.net/ChangeLog-5.php#5.3.1">ChangeLog</a>.</p>

    <p>The OpenSSL library has been updated to
    0.9.8l, which fixes important bugs fixes (see
    the OpenSSL <a href="http://openssl.org">website</a> for
    details.</p>
  </div>
</div><!-- .info -->
