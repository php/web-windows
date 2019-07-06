<div class="info entry">
  <!-- .info -->
  <h3 class="summary entry-title">OpenSSL security update</h3>
  <?php news_date('10-Apr-2014') ?>
  <div>
    <p>The <a href="http://www.openssl.org/news/secadv_20140407.txt">OpenSSL Security Advisory [07 Apr 2014]</a> announces the
    availability of the OpenSSL 1.0.1g which fixes CVE-2014-0160. In this regard the latest PHP release 5.5.11 was rebuilt with the OpenSSL 1.0.1g.
    All PHP users are strongly encouraged to upgrade to PHP 5.5.11. If you already have downloaded this version before 10-Apr-2014, please redownload.
    The existing private keys should be regenerated as soon as possible.</p>
    
    <p>Alternatively, the updated OpenSSL dependency DLLs can be downloaded separately as replacement for the older PHP versions. Though be aware that
      this issue affects only OpenSSL 1.0.x and the DLL packages are only applicable to PHP 5.5 and upper.</p>
    <ul>
      <li><a href="https://windows.php.net/downloads/php-sdk/deps/vc11/x86/openssl-1.0.1g-vc11-x86.zip">https://windows.php.net/downloads/php-sdk/deps/vc11/x86/openssl-1.0.1g-vc11-x86.zip</a></li>
      <li><a href="https://windows.php.net/downloads/php-sdk/deps/vc11/x64/openssl-1.0.1g-vc11-x64.zip">https://windows.php.net/downloads/php-sdk/deps/vc11/x64/openssl-1.0.1g-vc11-x64.zip</a></li>
    </ul>
    <p>
      PHP 5.4 and lower is not affected by this issue. 
    </p>
  </div>
</div><!-- .info -->
