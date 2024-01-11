FROM php:8.1

RUN docker-php-ext-install pdo_mysql

# 依存関係のインストール
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql mbstring

# Composerのインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Laravelの依存関係をインストール
WORKDIR /var/www
COPY . /var/www
RUN composer install

# Node.jsとNPMのインストール
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get -y install nodejs

# Vue.jsの依存関係をインストール
COPY package*.json ./
RUN npm install
RUN npm i lodash
RUN npm run build

CMD php artisan serve --host=0.0.0.0 --port=8080

EXPOSE 8080
