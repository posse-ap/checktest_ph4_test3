FROM php:8.2.14-fpm
COPY php.ini /usr/local/etc/php/

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
  libzip-dev \
  zlib1g-dev \
  mariadb-client \
  unzip \
  curl \
  && docker-php-ext-install zip

RUN apt-get install -y vim \
  && docker-php-ext-install zip pdo_mysql sockets

# Composer2.X install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update --2
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# PHPの設定ファイルをコピー
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# ワーキングディレクトリを設定
WORKDIR /work/web
