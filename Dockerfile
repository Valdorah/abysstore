# On part d'une image php 8.0 alpine
FROM php:8.4-cli-alpine

# On se place dans le dossier de travail, où se trouvera notre application
WORKDIR /app

# On copie les fichiers de configuration de PHP
COPY docker/php/config/ /usr/local/etc/php/

# On installe les dépendances nécessaires
RUN apk add icu-dev && docker-php-ext-configure intl && docker-php-ext-install intl pdo pdo_mysql && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && \
    apk add --no-cache bash && \
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && \
    apk add symfony-cli

# On copie le composer.json et le composer.lock pour installer les dépendances
COPY composer.json composer.lock ./

# On copie le reste des fichiers
COPY . .

CMD ["symfony", "server:start", "--no-tls", "--allow-http", "--allow-all-ip"]

