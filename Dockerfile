FROM php:8.1.0-apache
WORKDIR /var/www/html

# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Mod Rewrite
RUN a2enmod rewrite

# Update and install necessary Linux libraries
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    npm \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev 

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Extensions
RUN docker-php-ext-install gettext intl pdo_mysql gd
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install Node.js v20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Verify Node.js and npm installation
RUN node -v
RUN npm -v
