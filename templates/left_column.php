                    <li id="left-column">
                        <div class="content">
                        
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>PHP For Windows</h3>
                                    <p>
                                    This site is dedicated to supporting PHP on Microsoft Windows. 
                                    It also supports ports of PHP extensions or features as well as 
                                    providing special builds for the various Windows architectures.</p>
                                    <p>
                                    If you like to build your own PHP binaries, instructions can be found on the 
                                    <a href="https://wiki.php.net/internals/windows/stepbystepbuild">Wiki</a>.
                                    </p>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>PECL For Windows</h3>
                                    <p>
                                    <a href="http://pecl.php.net">PECL extensions</a> for Windows is being worked on.
                                    The interface on the <a href="http://pecl.php.net">pecl website</a>
                                    will most likely be updated to offer Windows DLL download right from that website.<br /><br />

                                    In the meantime, some extensions can be found 
                                    <a href="http://windows.php.net/downloads/pecl/releases/">here</a>.
                                    </p>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

<?php
if ((isset($mode) && ($mode == 'snapshots' || $mode == 'qa'))
 || strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE
 || strpos($_SERVER['SCRIPT_FILENAME'], 'qa') !== FALSE
 || strpos($_SERVER['SCRIPT_FILENAME'], 'download') == FALSE
 )

{
?>
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>Which version do I choose?</h3> <br/>

									<h4>IIS</h4>
									<p>If you are using PHP with IIS you should use the Non-Thread Safe (NTS) versions of PHP.</p>

									<h4>Apache</h4>
									<p>Please use the Apache builds provided by <a href="http://apachelounge.com">Apache Lounge</a>.
									They also provide VC11 builds of Apache for <a href="http://www.apachelounge.com/viewtopic.php?p=23836">x86 and x64</a>.
									We use their binaries to build the Apache SAPIs.</p>

                                    <p>If you are using PHP with Apache 1 or Apache2 from <strong>apache.org</strong> (not recommended) you need to use the older VC6 versions of PHP
									compiled with the legacy Visual Studio 6 compiler. Do <b>NOT</b> use VC9+ versions of PHP with the apache.org binaries.</p>

									<h4>VC9 and VC11</h4>
									<p>More recent versions of PHP are built with VC9 or VC11 (Visual Studio 2008 and 2012 compiler respectively) and 
									include improvements in performance and stability.</p>

									<p>The VC9 builds require you to have the <i>Visual C++ Redistributable for Visual Studio 2008 SP1</i> <a href="http://www.microsoft.com/en-us/download/details.aspx?id=5582">x86</a> or <a href="http://www.microsoft.com/en-us/download/details.aspx?id=15336">x64</a> installed. </p>
									<p>The VC11 builds require to have the <i>Visual C++ Redistributable for Visual Studio 2012</i> <a href="http://www.microsoft.com/en-us/download/details.aspx?id=30679">x86 or x64</a> installed.</p>

									<h4>What is PGO?</h4>
									<p><a href="http://msdn.microsoft.com/en-us/library/e7k32f4k%28v=vs.110%29.aspx" target="_blank">Profile Guided Optimization</a> is an optimization
									feature available in Microsoft's Visual C++ compiler that allows you to optimize an output file based on profiling data collected during test runs of the application or module.<p>
									<p><strong>Links:</strong></p>
									<ul>
										<li><a href="http://msdn.microsoft.com/en-us/library/e7k32f4k%28v=vs.110%29.aspx" target="_blank">PGO on MSDN</a></li>
										<li><a href="http://blogs.msdn.com/b/vcblog/archive/2013/05/06/speeding-up-php-performance-for-your-application-using-profile-guided-optimization-pgo.aspx" target="_blank">Visual C++ Team Blog - PGO with PHP</a></li>
										<li><a href="http://www.ksingla.net/2010/05/php-pgo-build-for-maximum-performance-on-windows/" target="_blank">PHP PGO build for maximum performance</a> (old)</li>
									</ul>
	
<?php
if ((isset($mode) && ($mode == 'snapshots' || $mode == 'qa'))
|| strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE
|| strpos($_SERVER['SCRIPT_FILENAME'], 'qa') !== FALSE)

{
?>
				    <p>These binaries are NOT intended for production use; please use the binaries at PHP Windows <a href="/download/">downloads</a>.</p>
<?php
}
?>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>Archives</h3>
                                    <p>
                                    Past releases are available from our <a href="http://windows.php.net/downloads/releases/archives/">archives</a>, older versions 
                                    not found there can be found at the <a href="http://museum.php.net/">Museum</a>.
                                    </p>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->



<?php
if ((isset($mode) && $mode == 'snapshots') 
|| strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE)

{
?>
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>
                               <div class="info"><!-- .info -->

                                    <h3>Builds time (EST, Europe)</h3>
                                    <p>PHP 5.3 is built every hour</p>
				    
				    <p>PHP 5.2 two times per day</p>
                                </div><!-- .info -->
                               <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

<?php
}
?>

<?php
}
?>
                        </div> <!-- .content -->
                    </li><!-- #left-column -->
