<div class="info entry" id="news-2020-08-09-1">
  <!-- .info -->
  <h3 class="summary entry-title">libjpeg dependency</h3>
  <?php news_date('14-Jul-2021') ?>
  <div>
    <p>
      As of PHP 8.1.0, the official Windows dependencies use <a
      href="https://libjpeg-turbo.org/">libjpeg-turbo</a>
      instead of <a href="http://ijg.org/">libjpeg</a>. The main reason is that
      libjpeg-turbo offers better performance, because it uses SIMD instructions
      on supported platforms (Windows x86 and x64 are supported). Note that many
      Linux distributions already use libjpeg-turbo for quite a while.
    </p>
    <p>
      This is relevant for the GD extension, but may affect other extensions as
      well. Please <a href="https://bugs.php.net/report.php">file a bug report</a>,
      if you experience any problems regarding this change.
    </p>
  </div>
</div><!-- .info -->
