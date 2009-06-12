<?php
include "config.php";
define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
//define('TPL_PATH', CUR_PATH . 'templates' . DIRECTORY_SEPARATOR);

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
								Developer
							</p>
						</li>
						<li>
							<strong>Venkat Raman Don</strong>
							<p>
								Developer, Quality Assurance
							</p>
						</li>
					</ul>
					<ul style="float: left;">
						<li>
							<strong>John Mertic</strong>
							<p>
								Windows Installer
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