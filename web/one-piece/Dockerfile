FROM php:8.2-apache
RUN apt-get update && \
  apt-get install -y --no-install-recommends \
  sqlite3 \
  libsqlite3-dev && \
  rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_sqlite

COPY index.php /var/www/html/index.php
COPY style.css /var/www/html/style.css
COPY images/ /var/www/html/images/
COPY db/af8b5cbe045dd970c81e77acd7ad0d40.db /var/www/html/db/af8b5cbe045dd970c81e77acd7ad0d40.db

# Ensure the database file has correct permissions (read-only for security)
RUN chmod 444 /var/www/html/db/af8b5cbe045dd970c81e77acd7ad0d40.db

# Expose port 80 (default for Apache)
EXPOSE 80
