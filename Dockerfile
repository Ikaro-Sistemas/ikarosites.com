FROM wordpress:latest

# Instalar extensões adicionais se necessário
# RUN docker-php-ext-install pdo pdo_mysql

# Configurações recomendadas para opcache (opcional, para performance)
# COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini

WORKDIR /var/www/html
