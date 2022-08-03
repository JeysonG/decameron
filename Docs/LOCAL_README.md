**Install PHP y Apache2**

sudo add-apt-repository ppa:ondrej/php

sudo apt update

sudo apt upgrade

sudo apt install php8.1 apache2

sudo service apache2 start

**Install composer**

sudo apt install php-cli unzip

curl -sS [https://getcomposer.org/installer](https://getcomposer.org/installer) -o /tmp/composer-setup.php

HASH=`curl -sS <https://composer.github.io/installer.sig`>

php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;”

sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

**Install Postgresql**

sudo sh -c 'echo "deb [http://apt.postgresql.org/pub/repos/apt](http://apt.postgresql.org/pub/repos/apt) $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list'

wget --quiet -O - [https://www.postgresql.org/media/keys/ACCC4CF8.asc](https://www.postgresql.org/media/keys/ACCC4CF8.asc) | sudo apt-key add -

sudo apt-get update

sudo apt-get -y install postgresql postgresql-contrib

sudo apt-get install php8.1-pgsql

**Iniciar postgresql**

sudo service postgresql start

sudo -u postgres psql

psql -U <username> -h 127.0.0.1 -d postgres

**Restore local DB**

Restore dump-decameron-202208031228

**Laravel project**

git clone [https://github.com/JeysonG/decameron.git](https://github.com/JeysonG/decameron.git)

cd decameron

composer install --ignore-platform-req=ext-curl

php artisan serve
