## Event System Exercise

An app to create multiple events for a given date built using the following technologies:

- [Laravel](https://laravel.com/) - The PHP Framework for Web Artisans
- [Vue.js](https://vuejs.org/) - The Progressive JavaScript Framework
- [Tailwindcss](https://tailwindcss.com/) - A utility-first CSS framework for rapidly building custom designs.

## 🌐 Preview

Visit: [128.199.224.8](http://128.199.224.8) to see the preview

## 🚀 Quick start

```bash
# First, install project dependencies:
composer install
yarn install

# Then, build the front-end assets:
yarn dev

# Finally, start the development server:
php artisan serve
```

## ⚡️ Server Installation

How I installed & setup the server

```bash
# Just a good practice.
apt-get update
apt-get install -y software-properties-common zip unzip

# Add PHP to the apt repository list.
add-apt-repository -y ppa:ondrej/php
apt-get update

## Install PHP + Extensions.
apt-get install -y php7.4-fpm
apt-get install -y php7.4-{curl,mbstring,pdo,pgsql,xml}

## Install Composer
apt-get install -y composer

## Install NGINX
apt-get install -y nginx

## Start NGINX
systemctl start nginx
```

## 💡 Application Setup

How I setup the Laravel application inside the server

```bash
# Clone the project
git config --global credential.helper store # Prevents promting credentials the second time.
git clone https://github.com/palonponjovertlota/event-system-exercise.git /var/www/event-system-exercise

# Set proper file permissions
find /var/www/event-system-exercise -type f -exec chmod 644 {} \;
find /var/www/event-system-exercise -type d -exec chmod 755 {} \;

# Configure NGINX
cp /var/www/event-system-exercise/nginx.conf /etc/nginx/sites-available/
ln -s /etc/nginx/sites-available/nginx.conf /etc/nginx/sites-enabled/
nginx -t # Check if configurations are valid
systemctl reload nginx
```
