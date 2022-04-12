# oracle

This post shows how to install XAMPP on Windows to run PHP applications that connect to a remote Oracle Database. (If you use macOS, see Installing XAMPP on macOS for PHP and Oracle Database).

XAMPP is an open source package that contains Apache, PHP and many PHP 'extensions'. One of these extension is PHP OCI8 which connects to Oracle Database.

To install XAMPP:

Download "XAMPP for Windows" and follow the installer wizard.
Start the Apache server via the XAMPP control panel.

Visit http://localhost/oracle/phpinfo.php via your browser to see the architecture and thread safety mode of the installed PHP. Please note this is the architecture of the installed PHP and not the architecture of your machine. It’s possible to run a x86 PHP on an x64 machine.


[Optional] Oracle OCI8 is pre-installed in XAMPP but if you need a newer version you can download an updated OCI8 PECL package from pecl.php.net. Pick an OCI8 release and select the DLL according to the architecture and thread safety mode. For example, if PHP is x86 and thread safety enabled, download "7.2 Thread Safe (TS) x86". Then replace "C:\xampp\php\ext\php_oci8_12c.dll" with the new "php_oci8_12c.dll" from the OCI8 PECL package.
screenshot of PECL OCI8 download page


Edit "C:\xampp\php\php.ini" and uncomment the line "extension=oci8_12c". Make sure "extension_dir" is set to the directory containing the PHP extension DLLs. For example, extension_dir="C:\xampp\php\ext"

https://www.oracle.com/database/technologies/instant-client/downloads.html
Download the Oracle Instant Client Basic package and SDK from above link. Select the correct architecture to align with PHP's.

After downloading the instant client and SDK extract the files in a directory such as "C:\Oracle". A subdirectory "C:\Oracle\instantclient_12_2" will be created. Add this subdirectory to the PATH environment variable. You can update PATH in Control Panel -> System -> Advanced System Settings -> Advanced -> Environment Variables -> System Variables -> PATH. 

In my example I set it to "C:\Oracle\instantclient_12_2".
Restart the Apache server and check the phpinfo.php page again. It shows the OCI8 extension is loaded successfully.

(For Mac OS : Please check how to add path on mac using your configuration set to etiehr zshrc or bash_profile.)

To run your first OCI8 application, Visit http://localhost/oracle/test.php via browser.
