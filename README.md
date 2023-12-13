The Laravel "vendor" folder is not included here on GitHub. Remember to add it to your local project after cloning this repository.

To run this app on your local machine:<br><br>
Install composer. In the project directory command prompt, run:
```
composer install
```
In the .env file, you'll notice the DB_DATABASE variable is set to "tasks". Create a database called "tasks" in your PHPMyAdmin (I use XAMPP for my local web server). Notice that the APP_URL is set to "http://localhost:8085". You may need to set your local web server VirtualHost to listen on this port. Otherwise, you'll get Not Found errors when trying to hit the API.
<br><br>
In the screenshot "httpd.conf", I'm listening to multiple port numbers. You may need to adjust your httpd.conf file similarly.
<br><br>
I also added some VirtualHosts to my httpd-vhosts.conf file located in xampp/apache/conf/extra directory. See the screenshot for more info. <b>Important:</b> Whichever VirtualHost port number you decide to use and add to this file, make sure to change the "DocumentRoot" directory to the "public" folder within the project on your local machine. Otherwise, you may notice CORS errors when running the app.
<br><br>
Once your local server is up and running, in the project directory, run:
```
php artisan migrate
php artisan db:seed
```
<br>
Alternatively, you may run the "reset_db.bat" file to migrate and seed the database.
```
reset_db.bat
```
<br>
Then generate an App Key:
```
php artisan key:generate
```
<br>
Once you're up and running, head over to the Vue.js side of the project for the User Interface. 
<br><br>
