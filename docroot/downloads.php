<?php
$title_page = 'Release Downloads';
include 'config.php';
define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

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
                            <div class="adv-block"><!-- .adv-block -->
                                <span class="corners-top"><span></span></span>
                                
                                <div class="info entry"><!-- .info -->
                                    <h2 name="top" id="top">PHP Windows Downloads</h2>
                                    
                                    <select onchange="window.location.hash=this.options[this.selectedIndex].value">
                                        <option value="top" selected="true">Select an option to direct access...</option>
                                        <optgroup label="PHP 5.3.0">
                                            <option value="php-5.3.0-zts">PHP 5.3.0 Thread Safe (Classic version)</option>
                                            <option value="php-5.3.0-nonzts">PHP 5.3.0 Non Thread Safe</option>
                                            <option value="php-5.3.0-msizts">PHP 5.3.0 Installer Thread Safe</option>
                                            <option value="php-5.3.0-msinonzts">PHP 5.3.0 Installer Non Thread Safe</option>
                                            <option value="php-5.3.0-source">PHP 5.3.0 Source</option>
                                        </optgroup>
<!--                                        <optgroup label="PHP 6.0.0">
                                            <option value="php-6.0.0-source">PHP 6.0.0 Source</option>
                                            <option value="php-6.0.0-zts">PHP 6.0.0 ZTS</option>
                                            <option value="php-6.0.0-nonzts">PHP 6.0.0 Non ZTS</option>
                                            <option value="php-6.0.0-msizts">PHP 6.0.0 Installer ZTS</option>
                                            <option value="php-6.0.0-msinonzts">PHP 6.0.0 Installer Non ZTS</option>
                                        </optgroup>-->
                                    </select>
                                </div><!-- .info -->
                                
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .adv-block -->
                            
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info entry"><!-- .info -->
                                    <h3 id="php-5.3.0" name="php-5.3.0" class="summary entry-title">PHP 5.3.0alpha2</h3>
                                    
                                    <p class="news-date"></p>
                                    <div class="newsImage"></div>
                                    
                                    <div>
                                        <div class="innerbox">
                                            <span class="corners-top"><span></span></span>
                                            
                                            <h4 id="php-5.3.0-msizts" name="php-5.3.0-msizts">Installer Thread Safe</h4>

                                            <p>
                                                <ul>
                                                    <li>
                                                        <a href="http://downloads.php.net/pierre/php-5.3.0alpha2-win32-installer.msi">PHP 5.3.0alpha2 (classic)</a> [9,347Kb] -  01 Sep 2008<br />
                                                        <span class="md5sum">md5: </span>
                                                    </li>
                                                </ul>
                                            </p>
                                            
                                            <span class="corners-bottom"><span></span></span>
                                        </div><!-- .innerbox -->
                                        
                                        <div class="innerbox">
                                            <span class="corners-top"><span></span></span>
                                            
                                            <h4 id="php-5.3.0-msinonzts" name="php-5.3.0-msinonzts">Installer Non Thread Safe</h4>

											<p>
											<ul>
											<li>
											<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-nts-win32-installer.msi">PHP 5.3.0alpha2 (classic)</a> [9,347Kb] -  01 Sep 2008<br />
											<span class="md5sum">md5: </span>
											</li>
											</ul>
											</p>
                                            
                                            <span class="corners-bottom"><span></span></span>
                                        </div><!-- .innerbox -->


                                        <div class="innerbox">
                                            <span class="corners-top"><span></span></span>
                                            
                                            <h4 id="php-5.3.0-zts" name="php-5.3.0-zts">Thread Safe</h4>

                                            <p>
                                                <ul>
                                                    <li>
                                                       <a href="http://downloads.php.net/pierre/php-5.3.0alpha2-Win32.zip">PHP 5.3.0alpha2 (classic)</a> - 2 September 2008<br /> 
                                                       <span class="md5sum">md5: f8000adb25cc745336ff6e3a0e5d19e9</span>
                                                        <blockquote><strong>Note:</strong> Default builds, compatible with official apache releases, IIS or fcgi</blockquote>
                                                        <a href="http://downloads.php.net/pierre/php-debug-pack-5.3.0alpha2-Win32.zip">Debug pack</a>
                                                    </li>
						    <li>
						    	<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-Win32-VC9.zip">PHP 5.3.0alpha2 VC9 x86</a> - 2 September 2008<br />
							<span class="md5sum">md5: acd06f16b7ae0d13669e1f25d64bd479</span>
<!--	    						<blockquote><strong>Update 2008/09/12:</strong>Fix missing XML support, no src change</blockquote>-->

	    						<blockquote><strong>Note:</strong>VC9 x86 builds, not compatible with official apache releases.<br />
							    Experimental builds for x86 platform.
		    					</blockquote>
		    					<a href="http://downloads.php.net/pierre/php-debug-pack-5.3.0alpha2-Win32-VC9.zip">Debug pack</a>
						    </li>
						    <li>
						    	<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-Win32-VC9-x64.zip">PHP 5.3.0alpha2 VC9 x64</a> - 2 September 2008<br />
    							<span class="md5sum">md5: acd06f16b7ae0d13669e1f25d64bd479</span>
    							<blockquote><strong>Note:</strong>VC9 x64 builds, not compatible with official apache releases.<br />
    							Experimental builds for x64 platform.
    							</blockquote>
						    </li>
                                                </ul>
                                            </p>
                                            
                                            <span class="corners-bottom"><span></span></span>
                                        </div><!-- .innerbox -->

                                        <div class="innerbox">
                                            <span class="corners-top"><span></span></span>
                                            
                                            <h4 id="php-5.3.0-nonzts" name="php-5.3.0-nonzts">Non Thread Safe</h4>
                                            <p>
                                                <ul>
						<li>
						<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-nts-Win32.zip">PHP 5.3.0alpha2</a> - 2 September 2008<br />
						<span class="md5sum">md5: c676d255835d7e80dcf65cb99118f75c</span>
						<blockquote><strong>Note:</strong> Default builds. Should be used only with FastCGI or CLI (IIS6/7, apache, lighttpd)</blockquote>
						<a href="http://downloads.php.net/pierre/php-debug-pack-5.3.0alpha2-nts-Win32.zip">Debug pack</a>
						</li>
						<li>
						<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-nts-Win32-VC9.zip">PHP 5.3.0alpha2 VC9 x86</a> - 2 September 2008<br />
						<span class="md5sum">md5: 06c011984031e11c6554c7adb28aca9f</span>
<!--						<blockquote><strong>Update 2008/09/12:</strong>Fix missing XML support, no src change</blockquote>-->

						<blockquote><strong>Note:</strong>VC9 build x86. Should be used only with FastCGI or CLI (IIS6/7, apache, lighttpd)</blockquote>
						</li>

						<li>
						<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-nts-Win32-VC9-x64.zip">PHP 5.3.0alpha2 VC9 x64</a> - 2 September 2008<br />
						<span class="md5sum">md5: c959208d7949c258cfbfe3048e3569a9</span>
						<blockquote><strong>Note:</strong>VC9 build x64. Should be used only with FastCGI or CLI (IIS6/7, apache, lighttpd)</blockquote>
						</li>

                                                </ul>
                                            </p>
                                            
                                            <span class="corners-bottom"><span></span></span>
                                        </div><!-- .innerbox -->
                                        
                                        <div class="innerbox">
                                            <span class="corners-top"><span></span></span>
                                            
                                            <h4 id="php-5.3.0-source" name="php-5.3.0-source">Source Code</h4>
                                            
                                            <p>These links represent the source code of PHP version 5.3.0alpha2.</p>

											<p>
											<ul>
											<li>
											<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-src.zip">zip</a> - 02 September 2008<br />
											</li>
											<li>
											<a href="http://downloads.php.net/pierre/php-5.3.0alpha2-src.7z">7zip</a> - 02 September 2008<br />
											</li>
											</ul>
                                            </p>
                                            
                                            <span class="corners-bottom"><span></span></span>
                                        </div><!-- .innerbox -->


                                    </div>
                                </div><!-- .info -->
                                
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->
                        </div> <!-- .content -->
                    </li><!-- #main-column -->

                </ul> <!-- #content-columns -->
            </li> <!-- #content -->

<?php

include TPL_PATH . 'footer.php';

?>
