<div class="info entry">
  <!-- .info -->
  <h3 class="summary entry-title">Visual Studio 2019 Builds</h3>
  <?php news_date('04-Jun-2019') ?>
  <div>
    <p>
      All binary packages we were offering contained "vc#" (for instance, "vc14") in the filename to designate
      the Visual Studio version which has been used to build them. This number ("#") has tradionally been
      the major number of the respective platform toolset. The preview releases of Visual Studio 2017 shipped
      with platform toolset 15.00, so we used "vc15" to mark the files. The first GA release of Visual Studio
      2017, however, shipped with platform toolset 14.10 (to signal the backward compatibility), but the
      internal Visual Studio version number stayed 15.00. To avoid confusion with already distributed packages,
      we stuck with the "vc15" marker. For our Visual Studio 2019 builds (PHP 7.4 and master) we finally changed
      from "vc#" to "vs#" (note the "s"), where the number now designates the major internal Visual Studio
      version number. We are planning to stick with this new naming scheme for the foreseeable future.
    </p>
  </div>
</div><!-- .info -->
