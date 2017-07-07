<?php
include __DIR__ . '/../include/config.php';

define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

include TPL_PATH . 'header.php';
include TPL_PATH . 'news_line.php';

$title_page = 'Development Team and Contributors';

?>
            <li id="content">
                <ul id="content-columns">

<?php

include TPL_PATH . 'left_column.php';

?>

                    <li id="main-column">
                        <div class="content">
                            
                            <div class="block"><!-- .block -->
                               <span class="corners-top"><span></span></span>
 
                               <div class="info entry"><!-- this is our team players ;) -->
                                   <h3 class="summary entry-title">Development Team</h3>
                                   <p>
					<ul style="float: left;">
						<li>
							<strong>Pierre Joye</strong>
							<p>
								Runtime Development
							</p>
						</li>
						<li>
							<strong>Kalle Sommer Nielsen</strong>
							<p>
								Runtime Development
							</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>Anatol Belski</strong>
							<p>
								Runtime Development &amp; Quality Assurance
							</p>
						</li>
						<li>
							<strong>Matt Ficken</strong>
							<p>
								Quality Assurance &amp; Build Automation
							</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>Stephen Zarkos</strong>
							<p>
								Build Automation, PGO &amp; Performance
							</p>
						</li>
						<li>
							<strong>Alex Schoenmaker</strong>
							<p>
								Sysadmin &amp; Web and Snaps infrastructure
							</p>
						</li>
					</ul>
					<div style="clear: left;"></div>
				   </p>
                               </div><!-- .info -->
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->
                        </div> <!-- .content -->
                    </li><!-- main-column -->

                </ul> <!-- content-columns -->
            </li> <!-- content -->

<?php

include TPL_PATH . 'footer.php';

?>
