## Setup Instructions

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Configure database
5. Run migrations:
   php artisan migrate
6. Generate app key:
   php artisan key:generate

## Scheduler

To run the scheduler locally:
php artisan schedule:work

## Queue Worker

Set queue connection to database and run:
php artisan queue:work


