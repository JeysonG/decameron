**Digital Ocean**

Create droplet Ubuntu22

**Config server**

sudo apt-get update
sudo apt-get upgrade

**Required packages**
sudo aptinstall apache2 apache2-utils
systemctl start apache2
sudo apt install php php-pgsql libapache2-mod-php
sudo apt install postgresql postgresql-contrib

**postgres user**
sudo -i -u postgres
psql
ALTER USER postgres with password '<pwd>';
\q
exit

**Required folder**
mkdir ~/web
sudo vim /etc/apache2/sites-available/webserver.dev.conf

(Inside this file:
<VirtualHost \*:80>
ServerAdmin <email>
ServerName webserver.dev
DocumentRoot /home/user/web
<Directory /home/user/web>
Options Indexes FollowSymLinks Multiviews
DirectoryIndex index.html index.php
AllowOverride All
Order Allow,Deny
Allow from all
Require all granted
</Directory>
</VirtualHost>

)

**Run webserver config**

sudo a2ensite webserver.dev.conf
sudo a2enmod rewrite

**Go to folder where will live our project**
cd /var/www/html

**Requeired packages**
apt-get install composer
apt install zip unzip php-zip
apt-get update
apt-get install phpmyadmin
add-apt-repository ppa:ondrej/php

**Config SWAP for avoid problems when deploy project**

/bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
/sbin/mkswap /var/swap.1
/sbin/swapon /var/swap.1
**Clone repository**

install git

sudo apt install git

git clone [https://github.com/JeysonG/decameron.git](https://github.com/JeysonG/decameron.git)

cd decameron

compose install
chown -R www-data:www-data /var/www/html/decameron
chmod -R 755 /var/www/html/decameron/storage

sudo nano /etc/apache2/sites-available/000-default.conf

edit this file

```
ServerAdmin webmaster@localhost
DocumentRoot /var/www/html/decameron/public

<Directory /var/www/html/decameron/public/>
	Options Indexes FollowSymLinks
	AllowOverride All
	Require all granted
</Directory>

```

systemctl restart apache2

**posgresql config**

cd /etc/postgresql/14/main
sudo nano postgresql.conf

listen_adresses = '\*'

sudo nano pg_hba.conf

comment the last lines

change 127.0.0.1/32 to "all"

sudo /etc/init.d/postgresql restart

**Init DB cameron with dump to Digital Ocean server IP**

modifyo .env of laravel app
