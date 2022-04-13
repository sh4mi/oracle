# oracle


### Windows Users

This post shows how to install XAMPP on Windows to run PHP applications that connect to a remote Oracle Database.

XAMPP is an open source package that contains Apache, PHP and many PHP 'extensions'. One of these extension is PHP OCI8 which connects to Oracle Database.

<b>Step 1  Install XAMPP:</b>

Download "XAMPP for Windows" and follow the installer wizard.
Start the Apache server via the XAMPP control panel.

<b>Step 2  Clone or download code:</b><br>
clone or download code from https://github.com/sh4mi/oracle 
<br>save your code folder in C:\xampp\htdocs\

Visit http://localhost/oracle/phpinfo.php via your browser to see the architecture and thread safety mode of the installed PHP. Please note this is the architecture of the installed PHP and not the architecture of your machine. It’s possible to run a x86 PHP on an x64 machine.


<b>Step 3  Edit Php.ini</b><br>


Edit "C:\xampp\php\php.ini" and uncomment the line "extension=oci8_12c". Make sure "extension_dir" is set to the directory containing the PHP extension DLLs. For example, extension_dir="C:\xampp\php\ext"


<b>Step 4  Install Oracle Client for Windows</b><br>
https://www.oracle.com/database/technologies/instant-client/downloads.html
Download the Oracle Instant Client Basic package and SDK from above link. Select the correct architecture to align with PHP's.

After downloading the instant client and SDK extract the files in a directory such as "C:\Oracle". A subdirectory "C:\Oracle\instantclient_12_2" will be created. Add this subdirectory to the PATH environment variable. You can update PATH in Control Panel -> System -> Advanced System Settings -> Advanced -> Environment Variables -> System Variables -> PATH. 

In my example I set it to "C:\Oracle\instantclient_12_2".
Restart the Apache server and check the phpinfo.php page again. It shows the OCI8 extension is loaded successfully.


<b>Step 5  Run Code </b><br>
To run your first OCI8 application, Visit http://localhost/oracle/test.php via browser.


### MAC Users

This post shows how to install MAMP on MAC to run PHP applications that connect to a remote Oracle Database.

MAMP is an open source package that contains Apache, PHP and many PHP 'extensions'. One of these extension is PHP OCI8 which connects to Oracle Database.

<b>Step 1  Install MAMP:</b>

Download "MAMP for MAC" and follow the installer wizard.
Start the Apache server via the MAMP control panel.

<b>Step 2  Clone or download code:</b><br>
clone or download code from https://github.com/sh4mi/oracle 
<br>save your code folder in Applications/MAMP/htdocs/ Directory

Visit http://localhost/oracle/phpinfo.php via your browser to see the architecture and thread safety mode of the installed PHP. Please note this is the architecture of the installed PHP and not the architecture of your machine. It’s possible to run a x86 PHP on an x64 machine.


<b>Step 3  Edit Php.ini</b><br>


Edit "/Applications/MAMP/bin/php/php7.4.21/conf/php.ini" and uncomment the line "extension=oci8_12c". Please check your version accordingly.


<b>Step 4  Install Oracle Client for Windows</b><br>
https://www.oracle.com/database/technologies/instant-client/downloads.html
Download the Oracle Instant Client Basic package and SDK from above link. Select the correct architecture to align with PHP's.

After downloading the instant client and SDK extract the files in a directory such as "/Applications/MAMP/Oracle". A subdirectory "/Applications/MAMP/Oracle/instantclient_12_2" will be created.<br> Add this subdirectory to the PATH environment variable. You can update PATH using your MAC configuration either bash_profile or zsh_rc. please check this link to update your path. https://www.architectryan.com/2012/10/02/add-to-the-path-on-mac-os-x-mountain-lion/

In my example I set it to "/Applications/MAMP/Oracle/instantclient_12_2".
Restart the MAMP Apache server and check the phpinfo.php page again. It shows the OCI8 extension is loaded successfully.


<b>Step 5  Run Code </b><br>
To run your first OCI8 application, Visit http://localhost/oracle/test.php via browser.
