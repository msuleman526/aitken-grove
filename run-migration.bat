@echo off
cd /d "C:\laragon\www\aitken-grove"
php artisan migrate --force
pause