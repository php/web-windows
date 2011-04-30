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
								Team Leader, Developer
							</p>
						</li>
						<li>
							<strong>Kalle Sommer Nielsen</strong>
							<p>
								Developer
							</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>Garrett Serack</strong>
							<p>
								PGO Builds &amp; Tools
							</p>
						</li>
						<li>
							<strong>Robert Richards</strong>
							<p>
								Developer
							</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>Kanwaljeet Singla</strong>
							<p>
								Windows Installer	
							</p>
						</li>
						<li>
							<strong>Venkat Raman Don</strong>
							<p>QA Windows Installer</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>John Mertic</strong>
							<p>
								Windows Installer
							</p>
						</li>
						<li>
							<strong>Alex Schoenmaker</strong>
							<p>
								Sys Admin, web and snaps infrastructure
							</p>
						</li>
					</ul>
					<div style="clear: left;"></div>
				   </p>
                               </div><!-- .info -->
 
                               <div class="info entry"><!-- .info -->
                                   <h3 class="summary entry-title">Contributors</h3>
                                   <p>
					<ul>
						<li>Elizabeth Marie Smith</li>
					</ul>
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
