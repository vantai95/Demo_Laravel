**SYSTEM REQUIREMENTS**  
PHP >= 7.1.3  
MySQL  
NodeJS  

install composer  
install laravel  
npm install gulp -g  

**DEVELOPMENT MODE**  

_RUN WEB_  
php artisan key:generate  
composer install  
npm install  
npm run dev  
php artisan migrate  
php artisan db:seed (optional)  
php artisan  

**PRODUCTION BUILD**  

_COPY DISTRIBUTION_  
composer install  
npm install  
npm run prod  
gulp  

_UPDATE DISTRIBUTION_  
cd ../dist  
composer dump-autoload  
