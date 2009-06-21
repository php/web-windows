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

 
				       <div class="info entry"><!-- .info -->
					   <h3 class="summary entry-title">PHP 5.2.9-2 (Windows) released</h3>
					   <p class="news-date"><abbr class="published newsdate" title="2009-04-07T21:03:42+02:00">07-Apr-2009</abbr></p>
					   <div class="newsImage"></div>
					   <div>
<p>The PHP Development Team would like to announce the availability of a new Windows build for PHP - PHP 5.2.9-2</p>
<p>This release focuses on fixing security flaws in the included OpenSSL library (CVE-2009-0590, CVE-2009-0591 and CVE-2009-0789). The security advisory is available <a href="http://openssl.org/news/secadv_20090325.txt"> here</a>.</p>
<p>The OpenSSL library has been updated to 0.9.8k, which includes fixes for these flaws.</p>
<p>Note: Only the Windows binaries are affected. There are no changes to the PHP sources, therefore no source releases are necessary.</p>
<p>Binaries are available in our <a href="/download/">downloads page</a></p>
</div>
                               </div><!-- .info -->
	 
				       <div class="info entry"><!-- .info -->
					   <h3 class="summary entry-title">PHP 5.2.9-1 (Windows) released</h3>
					   <p class="news-date"><abbr class="published newsdate" title="2009-03-10T21:03:42+02:00">10-Mar-2009</abbr></p>
					   <div class="newsImage"></div>
					   <div>
						<p>The PHP Development Team would like to announce the availability of a new Windows build of PHP - PHP 5.2.9-1</p>
				     	<p>This release focuses on fixing a security flaw introduced by the cURL library (CVE-2009-0037). Please see the following for a full description: <a href="http://curl.haxx.se/docs/adv_20090303.html">http://curl.haxx.se/docs/adv_20090303.html</a></p>
			     		<p>Please note that the cURL related function is disabled when open_basedir or safe_mode enabled.</p>
		     			<p>Note: Only the Windows packages are affected.</p>
					<p>Binaries are available in our <a href="/download/">downloads page</a></p>
                                    </div>
                               </div><!-- .info -->
                                <div class="info entry"><!-- .info -->
                                    <h3 class="summary entry-title">PHP 5.2.9 released</h3>
                                    <p class="news-date"><abbr class="published newsdate" title="2009-02-26T21:03:42+02:00">26-Feb-2009</abbr></p>
                                    <div class="newsImage"></div>
                                    <div>
                                        <p>PHP 5.2.9 is now available. Get it <a href="/download/">here</a>.</p>
					<p>The OpenSSL library has been updated to its latest version, 0.9.8j</p>
					<p>This release has been the occasion to greatly improve the installer, it should now 
					work smoothly on every supported platform.</p>
					<p>For the full list of changes, see the <a href="http://www.php.net/releases/5_2_9.php">announcement</a> .
                                    </div>
                                </div><!-- .info -->
 

                                <div class="info entry"><!-- .info -->
                                    <h3 class="summary entry-title">PHP 5.2.9RC3 released</h3>
                                    <p class="news-date"><abbr class="published newsdate" title="2009-02-19T21:03:42+02:00">19-Feb-2009</abbr></p>
                                    <div class="newsImage"></div>
                                    <div>
                                        <p>PHP 5.2.9RC3 is now available for testing. Get it <a href="/qa/">here</a>.</p>
                                    </div>
                                </div><!-- .info -->
 
                                <div class="info entry"><!-- .info -->
                                    <h3 class="summary entry-title">Installer and non thread safe builds available for the snapshots</h3>
                                    <p class="news-date"><abbr class="published newsdate" title="2008-10-23T11:03:42+02:00">23-Oct-2008</abbr></p>
                                    <div class="newsImage"></div>
                                    <div>
                                        <p>The NTS builds and the installers are now available for all php branches and builds.</p>
                                    </div>
                                </div><!-- .info -->
 
                                <div class="info entry"><!-- .info -->
                                    <h3 class="summary entry-title">Snapshots are now online</h3>
                                    <p class="news-date"><abbr class="published newsdate" title="2008-10-81T13:03:42+02:00">08-Oct-2008</abbr></p>
                                    <div class="newsImage"></div>
                                    <div>
                                        <p>The snapshots are back online, with more choices and quality builds. The new Visual c++ 2008 builds are
					now available for PHP 5.3 and 6.0!</p>
					<p>x64 experimental snapshots should be available in the next days</p>
                                    </div>
                                </div><!-- .info -->
 
                                <div class="info entry"><!-- .info -->
                                    <h3 class="summary entry-title">New website for PHP Windows</h3>

                                    <p class="news-date"><abbr class="published newsdate" title="2008-08-01">01-Sep-2008</abbr></p>
                                    <div class="newsImage"></div>
                                    <div>
                                        <p>
                                            <br />
                                            The PHP Windows Development team would like to announce this new website.
                                            Here you will find information specifically related to Windows, such as
                                            downloads, snapshots and documentation.<br />
                                            <br />
                                            Only the downloads are available for now.
                                        </p>
                                    </div>
                                </div><!-- .info -->
                                
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

                            <p class="t-center">
                                <!--
                                <a href="http://windows.php.net/archive/index.php"><strong>News Archive</strong></a>
                                -->
                            </p>
                        </div> <!-- .content -->
                    </li><!-- .main-column -->

                </ul> <!-- .content-columns -->
            </li> <!-- .content -->

<?php

include TPL_PATH . 'footer.php';

?>