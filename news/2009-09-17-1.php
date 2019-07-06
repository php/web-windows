<div class="info entry">
  <!-- .info -->

  <h3 class="summary entry-title">PHP 5.2.11
  released</h3>
  <?php news_date('17-Sept-2009') ?>

  <div class="newsImage"></div>

  <div>
    <p>The PHP development team would like to
    announce the immediate availability of PHP
    5.2.11. This release focuses on improving the
    stability of the PHP 5.2.x branch with over
    75 bug fixes, some of which are security
    related. All users of PHP 5.2 are encouraged
    to upgrade to this release.</p>

    <p>Security Enhancements and Fixes in PHP
    5.2.11:</p>

    <ul>
      <li>Fixed certificate validation inside
      php_openssl_apply_verification_policy.
      (Ryan Sleevi, Ilia)</li>

      <li>Fixed sanity check for the color index
      in imagecolortransparent(). (Pierre)</li>

      <li>Added missing sanity checks around exif
      processing. (Ilia)</li>

      <li>Fixed bug <a href=
      "http://bugs.php.net/44683">#44683</a>
      (popen crashes when an invalid mode is
      passed). (Pierre)</li>
    </ul>

    <p>Key enhancements in PHP 5.2.11
    include:</p>

    <ul>
      <li>Fixed regression in cURL extension that
      prevented flush of data to output defined
      as a file handle.</li>

      <li>A number of fixes for the
      FILTER_VALIDATE_EMAIL validation rule</li>

      <li>Fixed bug #49361 (wordwrap() wraps
      incorrectly on end of line
      boundaries).</li>

      <li>Fixed bug #48696 (ldap_read() segfaults
      with invalid parameters)</li>

      <li>Fixed bug #48645 (mb_convert_encoding()
      doesn't understand hexadecimal
      html-entities).</li>

      <li>Fixed bug #48619 (imap_search ALL
      segfaults).</li>

      <li>Fixed bug #48400 (imap crashes when
      closing stream opened with OP_PROTOTYPE
      flag).</li>

      <li>Fixed bug #47351 (Memory leak in
      DateTime).</li>

      <li>Over 60 other bug fixes.</li>
    </ul>

    <p>On windows, the cURL library has been
    updated to its latest version (7.19.6) to fix
    the flaws described <a href=
    "http://curl.haxx.se/docs/adv_20090812.html">here</a>.</p>

    <p>Further details about the PHP 5.2.11
    release can be found in the <a href=
    "http://www.php.net/releases/5_2_11.php">release
    announcement</a>, and the full list of
    changes are available in the <a href=
    "/ChangeLog-5.php#5.2.11">ChangeLog</a>.</p>
  </div>
</div><!-- .info -->
