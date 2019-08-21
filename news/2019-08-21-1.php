<div class="info entry">
  <!-- .info -->
  <h3 class="summary entry-title">PHP 7.4 builds use Visual Studio 2017</h3>
  <?php news_date('21-Aug-2019') ?>
  <div>
    <p>
      We used Visual Studio 2019 to build the early releases of PHP 7.4 (up to
      and including 7.4.0beta2), and although Visual Studio 2019 is generally an
      improvement over Visual Studio 2017, particularly the linker/object format
      is not as stable as we would like (we had to rebuilt dependency packages
      several times, and got trouble reports from others who have not been able
      to build with the provided dependency packages), and its adoption is not
      as widespread as desired (for instance, AppVeyor would still not allow us
      to do our CI with VS 2019 without extra effort). To be able to offer the
      smoothest and most stable experience, we have decided to switch back to
      Visual Studio 2017 for our PHP 7.4 builds, and we are planning to stick
      with this for the complete lifetime of PHP 7.4.
    </p>
    <p>
      Our master snapshots are still built with Visual Studio 2019, and we are
      planning to stick with Visual Studio 2019 for PHP 8.0.
    </p>
  </div>
</div><!-- .info -->
