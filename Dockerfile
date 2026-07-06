FROM php:8.3.35-cli

# Install dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql gd zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}