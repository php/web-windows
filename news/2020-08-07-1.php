<div class="info entry" id="news-2019-10-08-1">
  <!-- .info -->
  <h3 class="summary entry-title">Windows Defender Warnings</h3>
  <?php news_date('07-Aug-2020') ?>
  <div>
    <p>
      A few days ago, we have noticed that Windows Defender reports some files
      in the PHP source and test packages as severe threat, claiming they would
      constitute a backdoor (e.g. <i>Backdoor:PHP/Dirtelti.MTF</i>). These files
      are auxiliary test files containing <code>eval</code> statements. Are
      these files backdoors? That depends on the context, i.e. in this case
      whether they are accessible via the Web. If they are, because they have
      been uploaded to the webroot of a publicly available Webserver, for
      instance, they may pose a serious threat. On the other hand, if they are
      just used on a local machine for development and testing purpuses, they
      are <em>not</em> malicious in any way.
    </p>
    <p>
      So, if you experience such Windows Defender warnings, examine the reported
      files, make sure they don't pose any threat, and then unblock them.
    </p>
    <p>
      Happy PHPing on Windows!
    </p>
  </div>
</div><!-- .info -->
