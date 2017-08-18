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

  <ul id="content-columns">
    <?php

    include TPL_PATH . 'left_column.php';

    ?>

    <li id="main-column">
      <div class="content">
          <div class="block">
              <?php include 'news.php'; ?>
          </div>
      </div>
    </li><!-- .main-column -->
  </ul><!-- .content-columns -->

  <?php

  include TPL_PATH . 'footer.php';

  ?>
