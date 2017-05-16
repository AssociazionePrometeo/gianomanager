#!/bin/sh

requirements=("php" "composer" "npm")

# Check requirements
for cmd in "${requirements[@]}"; do
    if  ! command -v $cmd >/dev/null 2>&1; then
        echo "Requirement not satisfied: please install $cmd and try again."
        exit 1
    fi
done

# Install composer dependencies
echo "\n"
echo "=================================================="
echo "= Installing composer dependencies               ="
echo "=================================================="
echo "\n"

composer install

# Configuration
cp -n .env.example .env

echo "\n"
echo "=================================================="
echo "= We need some info to configure the database    ="
echo "=================================================="
echo "\n"

read -e -p "Database host: " db_host
if [ ! -z "$db_host" ]; then
    sed -i '' "s/DB_HOST=.*/DB_HOST=$db_host/" .env
fi

read -e -p "Database name: " db_name
if [ ! -z "$db_name" ]; then
    sed -i '' "s/DB_DATABASE=.*/DB_DATABASE=$db_name/" .env
fi

read -e -p "Database user: " db_user
if [ ! -z "$db_user" ]; then
    sed -i '' "s/DB_USERNAME=.*/DB_USERNAME=$db_user/" .env
fi

read -e -p "Database password: " db_pass
if [ ! -z "$db_pass" ]; then
    sed -i '' "s/DB_PASSWORD=.*/DB_PASSWORD=$db_pass/" .env
fi

# Generate an app key
php artisan key:generate


echo "\n"
echo "=================================================="
echo "= Preparing the database structure               ="
echo "=================================================="
echo "\n"

php artisan migrate
php artisan db:seed

echo "\n"
echo "=================================================="
echo "= Compiling the assets                           ="
echo "=================================================="
echo "\n"

npm install
npm run dev


echo "\n"
echo "=================================================="
echo "= All done!                                      ="
echo "=================================================="
echo "You can now run the development server with 'php artisan serve'"
echo "\n"
