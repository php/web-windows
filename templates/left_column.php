                    <li id="left-column">
                        <div class="content">
                        
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>PHP For Windows</h3>
                                    <p>
					This site is dedicated to supporting PHP on Microsoft Windows. 
					It also supports ports of PHP extensions or features as well as 
					providing special builds for the various Windows architectures.
                                    </p>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->
<?php
if (strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE
 || strpos($_SERVER['SCRIPT_FILENAME'], 'qa') !== FALSE)

{
?>
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

                                <div class="info"><!-- .info -->

                                    <h3>Which version do I choose?</h3>
                                    <p>If you are using PHP with Apache 1 or Apache2 
				    from apache.org you need to use the VC6 versions of PHP</p>
				    
				    <p>If you are using PHP with IIS you should use the VC9 versions of PHP</p>
				    
				    <p>VC6 Versions are compiled with the legacy Visual Studio 6 compiler</p>
				    
				    <p>VC9 Versions are compiled with the Visual Studio 2008 compiler and 
				    have improvements in performance and stability. The VC9 versions 
				    require you to have the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=9B2DA534-3E03-4391-8A4D-074B9F2BC1BF">Microsoft 2008 C++ Runtime </a> installed</p>
				    <p>Do <b>NOT</b> use VC9 version with apache.org binaries</b>
	
<?php
if (strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE
|| strpos($_SERVER['SCRIPT_FILENAME'], 'qa') !== FALSE)

{
?>
				    <p>These packages are NOT intended for production use; please use the packages at PHP downloads.</p>
<?php
}
?>

                                </div><!-- .info -->

                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->
                            <div class="block"><!-- .block -->
                                <span class="corners-top"><span></span></span>

<?php
if (strpos($_SERVER['SCRIPT_FILENAME'], 'snapshots') !== FALSE)

{
?>
                               <div class="info"><!-- .info -->

                                    <h3>Builds time (EST, Europe)</h3>
                                    <p>PHP 5.3 is built every hour</p>
				    
				    <p>PHP 6.0 eight times per day</p>
				    
				    <p>PHP 5.2 two times per day</p>
                                </div><!-- .info -->

<?php
}
?>
                               <span class="corners-bottom"><span></span></span>
                            </div><!-- .block -->

<?php
}
?>
                        </div> <!-- .content -->
                    </li><!-- #left-column -->
