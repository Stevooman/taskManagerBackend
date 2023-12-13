@ECHO OFF
REM run migrations
@ECHO ON

php artisan migrate:fresh

@ECHO OFF
REM run seeders
@ECHO ON

php artisan db:seed
pause