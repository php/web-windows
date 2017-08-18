<?php

// ----------------------------------------------------------------------------
// Config
// ----------------------------------------------------------------------------

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

/** @var string $news_feed_url */
$news_feed_url = 'http://php.net/feed.atom';

/** @var array $news_feed_categories */
$news_feed_categories = ['releases'];

/** @var int $max_news_feed_items */
$max_news_feed_items = 10;

/** @var string $path_to_news_file */
$path_to_news_file = __DIR__ . '/../docroot/news.php';

// ----------------------------------------------------------------------------
// Get RSS
// ----------------------------------------------------------------------------

$feed = file_get_contents($news_feed_url);
$xml = simplexml_load_string($feed);
if (!$xml) {
    die('Error: Could not load Atom/Rss feed' . PHP_EOL);
}

// ----------------------------------------------------------------------------
// Extract news from RSS
// ----------------------------------------------------------------------------

$i = 0;
$buffer = '';
foreach ($xml as $node) {
    if ($i >= $max_news_feed_items) {
        break;
    }

    // Example: <category term="releases" label="New PHP release"/>
    $found_category = false;
    foreach ($node->category as $category) {
        if (isset($category['term']) && in_array($category['term'], $news_feed_categories)) {
            $found_category = true;
            break;
        }
    }
    if (!$found_category) {
        continue;
    }

    // Get title, date, and HTML
    if ($node->title) {
        $title = "<h3 class='summary entry-title'>{$node->title}</h3>";
    }
    if ($node->published) {
        $time = strtotime($node->published);
        $human_readable = date('d M Y', $time);
        $for_tools = date(DATE_W3C, $time);
        $date = "<p class='news-date'><time datetime='{$for_tools}'>{$human_readable}</time></p>";
    }
    if ($node->content->div && $node->content->div instanceof \SimpleXMLElement) {
        $info = $node->content->div->asXml();
        $info = preg_replace(['/<div.*?>/', '/<\/div>/'], '', $info);
    }

    // Append to buffer
    if (isset($title, $date, $info)) {
        ob_start();
        ?>

<div class="info entry">
    <!-- .info -->
    <?php echo $title . PHP_EOL; ?>
    <?php echo $date . PHP_EOL; ?>
    <div>
        <?php echo $info ; ?>
    </div>
</div><!-- .info -->

        <?php
        $buffer .= ob_get_clean();
        unset($title, $date, $info);
        ++$i;
    }
}

// ----------------------------------------------------------------------------
// Write news to file
// ----------------------------------------------------------------------------

if (empty($buffer)) {
    die("Error: No news?" . PHP_EOL);
}

$bytes = file_put_contents($path_to_news_file, $buffer);
if ($bytes === false) {
    die("Error: Could not write to: {$path_to_news_file}" . PHP_EOL);
}

echo "Ok!" . PHP_EOL;
