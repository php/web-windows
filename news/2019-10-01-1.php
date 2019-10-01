<div class="info entry" id="news-2019-10-01-1">
  <!-- .info -->
  <h3 class="summary entry-title">OpenSSL default config path changed</h3>
  <?php news_date('01-Oct-2019') ?>
  <div>
    <p>
      As of PHP 7.4.0, the OpenSSL default config path changes from
      c:\usr\local\ssl\openssl.cnf to C:\Program Files\Common Files\SSL\openssl.conf
      for x64 builds, and C:\Program Files (x86)\Common Files\SSL\openssl.conf
      for x86 builds. These paths match the defaults of OpenSSL 1.1, and are
      more inline with the Windows folder structure than the old settings.
      Note that this path is still configurable via the environment variable
      <i>OPENSSL_CONF</i>.
      See also the
      <a href="https://www.php.net/manual/en/openssl.installation.php">installation</a>
      section in the PHP manual.
    </p>
  </div>
</div><!-- .info -->
