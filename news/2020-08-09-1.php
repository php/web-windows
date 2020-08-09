<div class="info entry" id="news-2020-08-09-1">
  <!-- .info -->
  <h3 class="summary entry-title">OCI DLLs missing from PHP 8.0.0 pre-release builds</h3>
  <?php news_date('09-Aug-2020') ?>
  <div>
    <p>
      Due to a build system error which only has been noticed recently, so far
      the PHP 8.0.0 pre-release builds didn't contain php_oci8_12c.dll and
      php_pdo_oci.dll in the ext/ folder. You can now separately <a
      href="https://windows.php.net/downloads/snaps/ostc/oci/">download these
      files</a> and copy them in your existing PHP-8.0.0beta1 installation (the
      DLLs are not suitable for the alpha releases). Make sure that you use the
      appropriate package (x64 vs. x86, and non thread-safe vs. thread-safe).
    </p>
  </div>
</div><!-- .info -->
