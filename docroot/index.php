<?php
include __DIR__ . '/../include/config.php';

define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
//define('TPL_PATH', CUR_PATH . 'templates' . DIRECTORY_SEPARATOR);

$title_page = 'Home'

include TPL_PATH . 'header.php';

include TPL_PATH . 'news_line.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
  <meta name="generator" content=
  "HTML Tidy for Windows (vers 25 March 2009), see www.w3.org">

  <title></title>
</head>

<body>
  <ul>
    <li id="content"></li>
  </ul>

  <ul id="content-columns">
    <?php

    include TPL_PATH . 'left_column.php';

    ?>

    <li id="main-column">
      <div class="content">
        <div class="block">
          <!-- .block -->

          <div class="info entry">
            <!-- .info -->

            <h3 class="summary entry-title">PHP 5.4.0 Release
            Announcement</h3>

            <p class="news-date"><abbr class="published newsdate"
            title="2009-03-10T21:03:42+02:00">1-Mar-2012</abbr></p>

            <div class="newsImage"></div>

            <div>
              <p>The PHP development team is proud to announce the
              immediate availability of PHP <a href=
              "http://php.net/downloads.php#v5.4.0">5.4.0</a>. This
              release is a major leap forward in the 5.x series,
              which includes a large number of new features and bug
              fixes.</p>

              <p><b>The key features of PHP 5.4.0 include:</b></p>

              <ul>
                <li>New language syntax including <a href=
                "http://php.net/traits">Traits</a>, <a href=
                "http://docs.php.net/manual/en/language.types.array.php">
                shortened array syntax</a> and <a href=
                "http://docs.php.net/manual/en/migration54.new-features.php">
                more</a></li>

                <li>Improved performance and reduced memory
                consumption</li>

                <li>Support for multibyte languages now available
                in all builds of PHP at the flip of a runtime
                switch</li>

                <li><a href=
                "http://php.net/manual/en/features.commandline.webserver.php">
                Built-in webserver</a> in CLI mode to simplify
                development workflows and testing</li>

                <li>Cleaner code base thanks to the removal of
                multiple deprecated language features</li>

                <li>Many more improvements and fixes</li>
              </ul>

              <p><b>Changes that affect compatibility:</b></p>

              <ul>
                <li><a href=
                "http://www.php.net/manual/en/security.globals.php">
                Register globals</a>, <a href=
                "http://www.php.net/manual/en/security.magicquotes.php">
                magic quotes</a> and <a href=
                "http://www.php.net/manual/en/features.safe-mode.php">
                safe mode</a> were removed</li>

                <li>The <a href=
                "http://php.net/manual/en/control-structures.break.php">
                break</a>/<a href=
                "http://php.net/manual/en/control-structures.continue.php">continue</a>
                $var syntax was removed</li>

                <li>The ini option <a href=
                "http://php.net/allow_call_time_pass_reference">allow_call_time_pass_reference</a> was
                removed</li>

                <li>The PHP <a href=
                "http://www.php.net/manual/en/ini.core.php#ini.default-charset">
                default_charset</a> is now "UTF-8"</li>
              </ul>

              <p><b>Extensions moved to <a href=
              "http://pecl.php.net">PECL</a>:</b></p>

              <ul>
                <li><a href=
                "http://www.php.net/manual/en/ref.sqlite.php">ext/sqlite</a>
                (<a href=
                "http://www.php.net/manual/en/book.sqlite3.php">ext/sqlite3</a>
                and <a href=
                "http://www.php.net/manual/en/ref.pdo-sqlite.php">ext/pdo_sqlite</a>
                are not affected)</li>
              </ul>

              <p><b>PHP 5.4 series will be the last versions to
              support Windows XP and Windows 2003.</b> We will not
              provide binary packages for these Windows versions
              anymore after PHP 5.4.</p>

              <p>For users upgrading from PHP 5.3 there is a
              migration guide available <a href=
              "http://php.net/migration54">here</a>, detailing the
              changes between those releases and PHP 5.4.0.</p>

              <p>For a full list of changes in PHP 5.4.0, see the
              <a href=
              "http://php.net/ChangeLog-5.php#5.4.0">ChangeLog</a>.</p>
            </div>
          </div><!-- .info -->

          <div class="info entry">
            <!-- .info -->

            <h3 class="summary entry-title">PHP 5.3.6
            Released!</h3>

            <p class="news-date"><abbr class="published newsdate"
            title=
            "2011-03-17T13:43:21+00:00">[17-Mar-2011]</abbr></p>

            <div class="newsImage"></div>

            <div>
              <div class="block">
                <!-- .block -->

                <div class="info entry">
                  <!-- .info -->

                  <div>
                    <p>The PHP development team would like to
                    announce the immediate availability of PHP
                    5.3.6. This release focuses on improving the
                    stability of the PHP 5.3.x branch with over 60
                    bug fixes, some of which are security
                    related.</p>

                    <p><b>Security Enhancements and Fixes in PHP
                    5.3.6:</b></p>

                    <ul>
                      <li>Enforce security in the fastcgi protocol
                      parsing with fpm SAPI.</li>

                      <li>Fixed bug #54247 (format-string
                      vulnerability on Phar). (CVE-2011-1153)</li>

                      <li>Fixed bug #54193 (Integer overflow in
                      shmop_read()). (CVE-2011-1092)</li>

                      <li>Fixed bug #54055 (buffer overrun with
                      high values for precision ini setting).</li>

                      <li>Fixed bug #54002 (crash on crafted tag in
                      exif). (CVE-2011-0708)</li>

                      <li>Fixed bug #53885 (ZipArchive segfault
                      with FL_UNCHANGED on empty archive).
                      (CVE-2011-0421)</li>
                    </ul>

                    <p><b>Key enhancements in PHP 5.3.6
                    include:</b></p>

                    <ul>
                      <li>Upgraded bundled Sqlite3 to version
                      3.7.4.</li>

                      <li>Upgraded bundled PCRE to version
                      8.11.</li>

                      <li>Added ability to connect to HTTPS sites
                      through proxy with basic authentication using
                      stream_context/http/header/Proxy-Authorization.</li>

                      <li>Added options to debug backtrace
                      functions.</li>

                      <li>Changed default value of ini directive
                      serialize_precision from 100 to 17.</li>

                      <li>Fixed Bug #53971 (isset() and empty()
                      produce apparently spurious runtime
                      error).</li>

                      <li>Fixed Bug #53958 (Closures can't 'use'
                      shared variables by value and by
                      reference).</li>

                      <li>Fixed bug #53577 (Regression introduced
                      in 5.3.4 in open_basedir with a trailing
                      forward slash).</li>

                      <li>Over 60 other bug fixes.</li>
                    </ul>

                    <p>Windows users: please mind that we do no
                    longer provide builds created with Visual
                    Studio C++ 6. It is impossible to maintain a
                    high quality and safe build of PHP for Windows
                    using this unmaintained compiler.</p>

                    <p>For Apache SAPIs (php5_apache2_2.dll), be
                    sure that you use a Visual Studio C++ 9 version
                    of Apache. We recommend the Apache builds as
                    provided by <a href=
                    "http://www.apachelounge.com/">ApacheLounge</a>.
                    For any other SAPI (CLI, FastCGI via mod_fcgi,
                    FastCGI with IIS or other FastCGI capable
                    server), everything works as before. Third
                    party extension providers must rebuild their
                    extensions to make them compatible and loadable
                    with the Visual Studio C++9 builds that we now
                    provide.</p>

                    <p>All PHP users should note that the PHP 5.2
                    series is NOT supported anymore. All users are
                    strongly encouraged to upgrade to PHP
                    5.3.6.</p>

                    <p>For a full list of changes in PHP 5.3.6, see
                    the <a href=
                    "http://www.php.net/ChangeLog-5.php#5.3.6">ChangeLog</a>.
                    For source and binaries downloads please visit
                    our <a href="/download/">downloads
                    page</a>.</p>
                  </div>
                </div><!-- .info -->

                <div class="block">
                  <!-- .block -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.3.2
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2010-03-04T19:00:11+00:00">04-Mar-2010</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP development team is proud to
                      announce the immediate release of PHP 5.3.2.
                      This is a maintenance release in the 5.3
                      series, which includes a large number of bug
                      fixes.</p>

                      <p><b>Security Enhancements and Fixes in PHP
                      5.3.2:</b></p>

                      <ul>
                        <li>Improved LCG entropy. (Rasmus, Samy
                        Kamkar)</li>

                        <li>Fixed safe_mode validation inside
                        tempnam() when the directory path does not
                        end with a /). (Martin Jansen)</li>

                        <li>Fixed a possible open_basedir/safe_mode
                        bypass in the session extension identified
                        by Grzegorz Stachowiak. (Ilia)</li>
                      </ul>

                      <p><b>Key Bug Fixes in PHP 5.3.2
                      include:</b></p>

                      <ul>
                        <li>Added support for SHA-256 and SHA-512
                        to php's crypt.</li>

                        <li>Added protection for $_SESSION from
                        interrupt corruption and improved
                        "session.save_path" check.</li>

                        <li>Fixed bug #51059 (crypt crashes when
                        invalid salt are given).</li>

                        <li>Fixed bug #50940 Custom content-length
                        set incorrectly in Apache sapis.</li>

                        <li>Fixed bug #50847 (strip_tags() removes
                        all tags greater then 1023 bytes
                        long).</li>

                        <li>Fixed bug #50723 (Bug in garbage
                        collector causes crash).</li>

                        <li>Fixed bug #50661 (DOMDocument::loadXML
                        does not allow UTF-16).</li>

                        <li>Fixed bug #50632 (filter_input() does
                        not return default value if the variable
                        does not exist).</li>

                        <li>Fixed bug #50540 (Crash while running
                        ldap_next_reference test cases).</li>

                        <li>Fixed bug #49851 (http wrapper breaks
                        on 1024 char long headers).</li>

                        <li>Over 60 other bug fixes.</li>
                      </ul>

                      <p>The SNMP extension is now available in VC9
                      versions. The cURL and MPIR libraries have
                      been updated.</p>

                      <p>For users upgrading from PHP 5.2 there is
                      a migration guide available <a href=
                      "http://php.net/migration53">here</a>,
                      detailing the changes between those releases
                      and PHP 5.3.</p>

                      <p><b>Further information and
                      downloads:</b></p>

                      <p>For a full list of changes in PHP 5.3.2,
                      see the <a href=
                      "/ChangeLog-5.php#5.3.2">ChangeLog</a>. For
                      source downloads please visit our <a href=
                      "/downloads.php">downloads page</a>, Windows
                      binaries can be found on <a href=
                      "http://windows.php.net/download/">windows.php.net/download/</a>.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.13
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2010-02-25T17:00:11+00:00">25-Feb-2010</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP development team would like to
                      announce the immediate availability of PHP
                      5.2.13. This release focuses on improving the
                      stability of the PHP 5.2.x branch with over
                      40 bug fixes, some of which are security
                      related. All users of PHP 5.2 are encouraged
                      to upgrade to this release.</p>

                      <p><b>Security Enhancements and Fixes in PHP
                      5.2.13:</b></p>

                      <ul>
                        <li>Fixed safe_mode validation inside
                        tempnam() when the directory path does not
                        end with a /). (Martin Jansen)</li>

                        <li>Fixed a possible open_basedir/safe_mode
                        bypass in session extension identified by
                        Grzegorz Stachowiak. (Ilia)</li>

                        <li>Improved LCG entropy. (Rasmus, Samy
                        Kamkar)</li>
                      </ul>

                      <p>Further details about the PHP 5.2.13
                      release can be found in the <a href=
                      "http://www.php.net/releases/5_2_13.php">release
                      announcement</a>, and the full list of
                      changes are available in the <a href=
                      "http://www.php.net/ChangeLog-5.php#5.2.13">ChangeLog</a>.</p>

                      <p>The libcURL library has been updated to
                      7.20.0, which fixes important bugs fixes as
                      well as a security flaw, see the advisory
                      <a href=
                      "http://curl.haxx.se/docs/adv_20100209.html">here</a>
                      and the full changelog <a href=
                      "http://curl.haxx.se/changes.html">here</a>.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.3.1
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-11-19T17:41:11+00:00">19-Nov-2009</abbr></p>

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

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.11
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-09-17T14:00:00+02:00">17-Sept-2009</abbr></p>

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

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.3.0
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-06-30T11:47:17+02:00">30-Jun-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP development team is proud to
                      announce the immediate release of PHP
                      <a href="http://php.net/downloads.php#v5.3.0">
                      5.3.0</a>. This release is a major
                      improvement in the 5.X series, which includes
                      a large number of new features and bug
                      fixes.</p>

                      <p>Some of the key new features include:
                      <a href=
                      "http://php.net/namespaces">namespaces</a>,
                      <a href="http://php.net/lsb">late static
                      binding</a>, <a href=
                      "http://php.net/closures">closures</a>,
                      optional <a href=
                      "http://php.net/gc_enable">garbage
                      collection</a> for cyclic references, new
                      extensions (like <a href=
                      "http://php.net/phar">ext/phar</a>, <a href=
                      "http://php.net/intl">ext/intl</a> and
                      <a href=
                      "http://php.net/fileinfo">ext/fileinfo</a>),
                      over 140 bug fixes and much more.</p>

                      <p>For users upgrading from PHP 5.2 there is
                      a <a href=
                      "http://php.net/migration53">migration
                      guide</a> available here, detailing the
                      changes between those releases and <a href=
                      "http://php.net/downloads.php#v5.3.0">PHP
                      5.3.0</a>.</p>

                      <p>Further details about the <a href=
                      "http://php.net/downloads.php#v5.3.0">PHP
                      5.3.0</a> release can be found in the
                      <a href="http://php.net/releases/5_3_0.php">release
                      announcement</a>, and the full list of
                      changes are available in the <a href=
                      "http://php.net/ChangeLog-5.php">ChangeLog</a>.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.10
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-04-07T21:03:42+02:00">18-Jun-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP development team would like to
                      announce the immediate availability of PHP
                      5.2.10. This release focuses on improving the
                      stability of the PHP 5.2.x branch with over
                      100 bug fixes, one of which is security
                      related. All users of PHP are encouraged to
                      upgrade to this release.</p>

                      <p><strong>Security Enhancements and Fixes in
                      PHP 5.2.10:</strong></p>

                      <ul>
                        <li>Fixed bug #48378 (exif_read_data()
                        segfaults on certain corrupted .jpeg
                        files). (Pierre)</li>
                      </ul>

                      <p>Further details about the PHP 5.2.10
                      release can be found in the <a href=
                      "http://php.net/releases/5_2_10.php">release
                      announcement</a>, and the full list of
                      changes are available in the <a href=
                      "http://php.net/ChangeLog-5.php#5.2.10">ChangeLog</a>.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.9-2
                    (Windows) released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-04-07T21:03:42+02:00">07-Apr-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP Development Team would like to
                      announce the availability of a new Windows
                      build for PHP - PHP 5.2.9-2</p>

                      <p>This release focuses on fixing security
                      flaws in the included OpenSSL library
                      (CVE-2009-0590, CVE-2009-0591 and
                      CVE-2009-0789). The security advisory is
                      available <a href=
                      "http://openssl.org/news/secadv_20090325.txt">
                      here</a>.</p>

                      <p>The OpenSSL library has been updated to
                      0.9.8k, which includes fixes for these
                      flaws.</p>

                      <p>Note: Only the Windows binaries are
                      affected. There are no changes to the PHP
                      sources, therefore no source releases are
                      necessary.</p>

                      <p>Binaries are available in our <a href=
                      "/download/">downloads page</a></p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.9-1
                    (Windows) released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-03-10T21:03:42+02:00">10-Mar-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The PHP Development Team would like to
                      announce the availability of a new Windows
                      build of PHP - PHP 5.2.9-1</p>

                      <p>This release focuses on fixing a security
                      flaw introduced by the cURL library
                      (CVE-2009-0037). Please see the following for
                      a full description: <a href=
                      "http://curl.haxx.se/docs/adv_20090303.html">http://curl.haxx.se/docs/adv_20090303.html</a></p>

                      <p>Please note that the cURL related function
                      is disabled when open_basedir or safe_mode
                      enabled.</p>

                      <p>Note: Only the Windows packages are
                      affected.</p>

                      <p>Binaries are available in our <a href=
                      "/download/">downloads page</a></p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.9
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-02-26T21:03:42+02:00">26-Feb-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>PHP 5.2.9 is now available. Get it
                      <a href="/download/">here</a>.</p>

                      <p>The OpenSSL library has been updated to
                      its latest version, 0.9.8j</p>

                      <p>This release has been the occasion to
                      greatly improve the installer, it should now
                      work smoothly on every supported
                      platform.</p>

                      <p>For the full list of changes, see the
                      <a href=
                      "http://www.php.net/releases/5_2_9.php">announcement</a>
                      .</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">PHP 5.2.9RC3
                    released</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2009-02-19T21:03:42+02:00">19-Feb-2009</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>PHP 5.2.9RC3 is now available for testing.
                      Get it <a href="/qa/">here</a>.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">Installer and
                    non thread safe builds available for the
                    snapshots</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2008-10-23T11:03:42+02:00">23-Oct-2008</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The NTS builds and the installers are now
                      available for all php branches and
                      builds.</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">Snapshots are
                    now online</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2008-10-81T13:03:42+02:00">08-Oct-2008</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p>The snapshots are back online, with more
                      choices and quality builds. The new Visual
                      c++ 2008 builds are now available for PHP 5.3
                      and 6.0!</p>

                      <p>x64 experimental snapshots should be
                      available in the next days</p>
                    </div>
                  </div><!-- .info -->

                  <div class="info entry">
                    <!-- .info -->

                    <h3 class="summary entry-title">New website for
                    PHP Windows</h3>

                    <p class="news-date"><abbr class=
                    "published newsdate" title=
                    "2008-08-01">01-Sep-2008</abbr></p>

                    <div class="newsImage"></div>

                    <div>
                      <p><br>
                      The PHP Windows Development team would like
                      to announce this new website. Here you will
                      find information specifically related to
                      Windows, such as downloads, snapshots and
                      documentation.<br>
                      <br>
                      Only the downloads are available for now.</p>
                    </div>
                  </div><!-- .info -->
                </div><!-- .block -->

                <p class="t-center"><!--
                                <a href="http://windows.php.net/archive/index.php"><strong>News Archive</strong></a>
                                --></p>
              </div><!-- .content -->
            </div>
          </div>
        </div>
      </div>
    </li><!-- .main-column -->
  </ul><!-- .content-columns -->
  <!-- .content -->
  <?php

  include TPL_PATH . 'footer.php';

  ?>
</body>
</html>
