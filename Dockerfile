FROM php:8.2-cli
WORKDIR /usr/src/myapp
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql
COPY . /usr/src/myapp
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]

