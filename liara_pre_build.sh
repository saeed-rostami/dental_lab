apt-get update;
apt-get install php8.3-dev  -y --allow-unauthenticated;
pecl install mongodb;
printf "extension=mongodb.so\n" > /etc/php/8.3/mods-available/mongodb.ini;
phpenmod -v 8.3 mongodb;
