# RepLinkApk WebStore
 Make your own local or online Web Store for Android Apps using [Apache Web Server][xampp-link] on Windows. Easy setup that works with [RepLinkApk Manager][rla-manager] repositories or Original local [F-Droid][f-droid] repositories.
 
 [![WebStore Basic Tutorial](https://img.youtube.com/vi/qHImm0yUIHY/0.jpg)](https://www.youtube.com/watch?v=qHImm0yUIHY&t=422s "RepLinkApk Web Store Video")
 
 [f-droid]: https://f-droid.org/
 [rla-manager]: https://github.com/tomriddle537/RepLinkApk-Manager
 [fossdroid-link]: https://fossdroid.com/

## Requirements
* PHP >=5.6 or PHP 7
* Apache >=2.4 and Up
* Set local or online alias for each repository you make and one alias for the web store.<br>
I recommend using [XAMPP][xampp-link] because it makes extra easy to config the server. 
Config the webstore alias an directory polices in `httpd-vhosts.conf` file:<br>
<kbd>RouteToXampp</kbd>/<kbd>xampp</kbd>/<kbd>apache</kbd>/<kbd>conf</kbd>/<kbd>extra</kbd>/<kbd>httpd-vhosts.conf</kbd>
<br>and enable correspondent module of apache web server.<br>
<kbd>RouteToXampp</kbd>/<kbd>xampp</kbd>/<kbd>apache</kbd>/<kbd>conf</kbd>/<kbd>httpd.conf</kbd><br>
    ```
    LoadModule vhost_alias_module modules/mod_vhost_alias.so
    ```

 ### Note 1
 When using XAMPP you have to make a change in `httpd-autoindex.conf` file because of a default alias that it uses to redirect icons folder.
 <kbd>RouteToXampp</kbd>/<kbd>xampp</kbd>/<kbd>apache</kbd>/<kbd>conf</kbd>/<kbd>extra</kbd>/<kbd>httpd-autoindex.conf</kbd>
 Search for line:<br>
    ```
    Alias /icons/ ...
    ```
 <br>And comment it out like this<br>
    ```
    #Alias /icons/ ...
    ```	

[xampp-link]: https://www.apachefriends.org/download.html

 ### Note 2
 If you use an Original local [F-Droid][f-droid] repository you have to change the name of `index.xml` file to `replink.xml`. But if you are not an expert I suggest to use [RepLinkApk Manager][rla-manager] to manage your repositories of Android apps.
 
 ### Note 3
 For including screenshots to an app, it has to be manually added for now. Browse your repositories files to:<br>
 "\<drive\>:/\<route-to-repositories\>/\<repository\>/\<app-package-id\>/\<language\>/phoneScreenshots/"
 <br>Then put there all the screenshots that you want.
 
 ## Basic Usage 
 
 1. Install [XAMPP][xampp-link]
 1. Copy/Clone code files, setup aliases and setup XAMPP. (read Requirements)
 1. Setup the Repositories route in `config.php` file; set variable `$repositoriesRoute` like "C:\\\\route\\\\to\\\\repos\\\\like\\\\this\\\\"<br> ./<kbd>config</kbd>/<kbd>config.php</kbd>
 1. Enter the store alias on your browser
 1. Done
 
 ## Features
 
 1. `Main/Welcome Screen` with the repositories list and it's descriptions.
 1. `Apps List` with pagination and badges for New/Updated and With Screenshots apps.
 1. `Filter by Category` apps list screen.
 1. `Order by Added/Updated/A-Z/Size`.
 1. `App Details Screen` with detailed information, download links and screenshots gallery.
 1. `Full Material and Responsive` design.
 1. `Search Screen` and a small quick/ajax search on every screen. 

 
 ## Finishing
* Developer: [@tomriddle537][developer]
* License: GPLv3
* Credits to [F-Droid][f-droid] for the repository structure idea. Credits to [Fossdroid][fossdroid-link] for some of the design ideas.
Share this with your friends and feel free to buy me a cup of coffee. ;) 
 * Bitcoin:
 bc1qpd4kw5ca8vva62rfldp6vakm84reu9shtgluzw
 * ETH:
 0xdEb6B5f1d3c3f19a936953CB4a17F2F8268AB24D

[developer]: https://github.com/tomriddle537/

 ### Note
The website code is provided AS IS with NO WARRANTY OF ANY KIND.
