<?php
include __DIR__ . '/../include/config.php';

define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

$title_page = 'Home';

function news_date($in) {
    $time = strtotime($in);
    $human_readable = date('d M Y', $time);
    $for_tools = date(DATE_W3C, $time);
    echo "<p class='news-date'><time datetime='{$for_tools}'>{$human_readable}</time></p>";
}


include TPL_PATH . 'header.php';

include TPL_PATH . 'news_line.php';

?>

<li id="content">
  <ul id="content-columns">
    <?php

    include TPL_PATH . 'left_column.php';

    ?>

    <li id="main-column">
      <div class="content">
        <div class="block">
          <!-- .block -->
          <?php include NEWS_DIR . '2019-06-04-1.php'; ?>
          <?php include NEWS_DIR . '2018-12-26-1.php'; ?>
          <?php include NEWS_DIR . '2018-03-12-1.php'; ?>
          <?php include NEWS_DIR . '2018-03-08-1.php'; ?>
          <?php include NEWS_DIR . '2015-03-20-1.php'; ?>
          <?php include NEWS_DIR . '2014-04-10-1.php'; ?>
          <?php include NEWS_DIR . '2013-06-20-1.php'; ?>
          <?php include NEWS_DIR . '2012-03-01-1.php'; ?>
          <?php include NEWS_DIR . '2011-03-17-1.php'; ?>
          <?php include NEWS_DIR . '2010-03-04-1.php'; ?>
          <?php include NEWS_DIR . '2010-02-25-1.php'; ?>
          <?php include NEWS_DIR . '2009-11-19-1.php'; ?>
          <?php include NEWS_DIR . '2009-09-17-1.php'; ?>
          <?php include NEWS_DIR . '2009-06-30-1.php'; ?>
          <?php include NEWS_DIR . '2009-06-18-1.php'; ?>
          <?php include NEWS_DIR . '2009-04-07-1.php'; ?>
          <?php include NEWS_DIR . '2009-03-10-1.php'; ?>
          <?php include NEWS_DIR . '2009-02-26-1.php'; ?>
          <?php include NEWS_DIR . '2009-02-19-1.php'; ?>
          <?php include NEWS_DIR . '2008-10-23-1.php'; ?>
          <?php include NEWS_DIR . '2008-10-08-1.php'; ?>
          <?php include NEWS_DIR . '2008-09-01-1.php'; ?>

        </div><!-- .block -->
                <p class="t-center"><!--
                                <a href="https://windows.php.net/archive/index.php"><strong>News Archive</strong></a>
                                --></p>
              </div><!-- .content -->
    </li><!-- .main-column -->
  </ul><!-- .content-columns -->

  <?php

  include TPL_PATH . 'footer.php';

  ?>
