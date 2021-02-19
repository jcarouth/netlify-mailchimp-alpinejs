FROM phusion/baseimage:bionic-1.0.0-amd64

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
  && add-apt-repository -y ppa:ondrej/php \
  && install_clean \
    git \
    nginx \
    nodejs \
    php7.4-bcmath \
    php7.4-cli \
    php7.4-common \
    php7.4-curl \
    php7.4-gd \
    php7.4-imagick \
    php7.4-intl \
    php7.4-mbstring \
    php7.4-xml \
    php7.4-zip \
    zip \
    unzip

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY docker/etc /etc/
RUN chmod +x /etc/service/*/run

WORKDIR /app

CMD [ "/sbin/my_init" ]
