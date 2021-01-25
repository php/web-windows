# The sources of the PHP for Windows Website

## Local development

You need IIS and PHP.

* `git clone git@github.com:php/web-windows.git`
* adapt the `BASE_URL` and `APP_PATH` in `include\config.php` to point to the current working directory
* `php dev\generate_fake_downloads.php`
* `php script\generate_snap_page.php`
* set up IIS PHP Website for `APP_PATH` with `index.php` as default document
* set up TLS for that Website or comment out the HTTPS redirection section in `templates\web.config.tpl`
* visit `/listing.php`; this generates `web.config` in the docroot, so the Website is fully usable. You have to make sure that your Website configuration is done in the global `applicationHost.config`, or you have to integrate the local setup into `templates\web.config.tpl`.
