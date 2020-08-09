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
 
                               <div class="info entry"><!-- this are our team players ;) -->
                                   <h3 class="summary entry-title">Development Team</h3>
                                   <p></p>
					<ul class="flex">
						<li>
							<strong>Kalle Sommer Nielsen</strong>
							<p>
								Developer
							</p>
						</li>
						<li>
							<strong><a href="http://people.php.net/ab">Anatol Belski</a></strong>
							<p>
								Development and Q/A
							</p>
						</li>
						<li>
							<strong>Alex Schoenmaker</strong>
							<p>
								Sys Admin, web and snaps infrastructure
							</p>
						</li>
						<li>
							<strong><a href="http://people.php.net/cmb">Christoph M. Becker</a></strong>
							<p>
								Development and Q/A
							</p>
						</li>
						<li>
							<strong><a href="http://people.php.net/dalehirt">Dale Hirt</a></strong>
							<p>
								Team Leader, Automation
							</p>
						</li>
					</ul>
                               </div><!-- .info -->
 
                               <div class="info entry"><!-- this are our former team players ;) -->
                                   <h3 class="summary entry-title">Former Team Members</h3>
                                   <p></p>
					<ul class="flex">
						<li>
							<strong>Pierre Joye</strong>
							<p>
								Team Leader, Developer
							</p>
						</li>
						<li>
							<strong>Stephen Zarkos</strong>
							<p>
								Team Leader, Builds, PGO &amp; Performance
							</p>
						</li>
						<li>
							<strong>Allen Truong</strong>
							<p>
								Q/A and Automation
							</p>
						</li>
						<li>
							<strong>Matt Ficken</strong>
							<p>
								Q/A and Automation
							</p>
						</li>
						<li>
							<strong>John Mertic</strong>
							<p>
								Windows Installer
							</p>
						</li>
						<li>
							<strong>Garrett Serack</strong>
							<p>
								PGO Builds &amp; Tools
							</p>
						</li>
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
						<li>
							<strong>Robert Richards</strong>
							<p>
								Developer
							</p>
						</li>
					</ul>
                                </div><!-- .info -->

 <div class="info entry"><!-- .info -->
                                   <h3 class="summary entry-title">Contributors</h3>
                                   <p></p>
					<ul class="flex">
						<li>Elizabeth Marie Smith</li>
					</ul>
                               </div><!-- .info -->
                                
                               <div class="info entry"><!-- .info -->
                                   <h3 class="summary entry-title">Contact</h3>
                                   <p></p>
					<ul>
						<li>#winphp-dev on freenode</li>
						<li><a href="https://www.php.net/mailing-lists.php#internals">Windows Internals mailing list</a></li>
					</ul>
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
