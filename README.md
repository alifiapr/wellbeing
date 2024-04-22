<p align="center">
<a href="https://unnes-wellbeing.alifiapr.my.id" target="_blank">
<img src="./public/assets/images/logo.png" width="200" alt="Laravel Logo">
</a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About UNNES WELLBEING

Selamat datang di pusat konseling mahasiswa UNNES! Kami hadir untuk mendukung kesejahteraan anda dalam menemukan konselor berpengalaman dan ruang aman untuk berbicara. Fasilitas kami meliputi:

- Aksesibilitas & Fleksibilitas
- Kemudahan Booking
- Kenyamanan & Privasi
- Konseling Offline & Online


## Installation [Ubuntu with Apache]

- Connect machine via SSH
- ```sudo apt update && sudo apt upgrade```
- Install Apache ```sudo apt install -y apache2```
- Install PHP 8.2 ```sudo add-apt-repository ppa:ondrej/php```
- ```sudo apt install php8.2 php8.2-curl php8.2-gd php8.2-dom php8.2-mbstring php8.2-xml php8.2-mysql zip unzip```
- Install MySQL ```sudo apt install -y mysql-server```
- Create new database named ```laravel```
- Install git ```sudo apt install -y git```
- Clone repo into /var/www/
- Inside repo directory, write ```cp .env.example .env``` to create environment file
- Change database configuration inside .env file
- ```sudo composer install``` then ```php artisan key:generate``` and then ```php artisan migrate:fresh --seed```
- Install latest nodejs by following this instruction https://nodejs.org/en/download/package-manager
- Inside repo directory, ```chown -R www-data storage``` then ```chown -R www-data bootstrap/cache```
- Next is change php version in apache, from 8.1 to 8.2 we installed earlier
- enable php8.2 ```sudo a2enmod php8.2``` and then disable php8.1 ```sudo a2dismod```
- Configure virtual host
- ```nano /etc/apache2/sites-available/laravel.conf```
- paste this
```
<VirtualHost *:80>
    ServerName [yourdomain.com]
    DocumentRoot [/var/www/path_to_repo]

    <Directory [/var/www/path_to_repo]>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/demo-error.log
    CustomLog ${APACHE_LOG_DIR}/demo-access.log combined
</VirtualHost>
```
- Disable default virtual host configuration ```sudo a2dissite 000-default.conf```
- Enable the configuration we made earlier ```sudo a2ensite laravel.conf```
- ```sudo a2enmod rewrite``` then ```sudo systemctl restart apache2```
- Inside repo directory, run ```npm run build```
- Web should run by now
- If you want to enable chat feature, just enter the Pusher key and secret at .env file, and then run ```npm run build```
- If error, contact owner

