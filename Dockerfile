# syntax=docker/dockerfile:1.4

FROM php:8.0.9-apache

ENV SRVROOT=/etc/apache2/

WORKDIR /app

COPY . .

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    ln -s /app/site/project/root /var/www/root && \
    ln -s /app/site/project/interim /var/www/interim && \
    ln -s /app/site/project/public /var/www/public && \
    a2enmod rewrite && \
    apt-get -y update && \
    apt-get -y install --no-install-recommends default-jre-headless git minify wget && \
    mkdir -p /usr/local/lib/gclosure && \
    wget -q -O /usr/local/lib/gclosure/closure-compiler.jar \
      https://repo1.maven.org/maven2/com/google/javascript/closure-compiler/v20240317/closure-compiler-v20240317.jar && \
    rm -rf /var/lib/apt/lists/*

EXPOSE 80

ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
