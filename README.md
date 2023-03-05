# Weather-List

Stay ahead of the weather with our Laravel and VueJS powered app. Keep track of the forecast for a set of users and plan your day accordingly. With intuitive design and reliable weather data from top APIs, our app has got you covered, rain or shine. Download now and never get caught in the rain again.

<img src="./weather-list.png" />

## Development Instructions

The backend is built on [Laravel](https://laravel.com/docs) and the frontend in [VueJS](https://vuejs.org/guide/introduction.html) please consult their respective documentations for more information about these technologies.

### Requirements

- [Docker](https://docs.docker.com)
- [Docker compose](https://docs.docker.com/compose)
- [Nodejs v18](https://nodejs.org/en/download/)

### Setup

- Clone repository: `git clone git@github.com:Fenn-CS/weather-list.git`
### API
- Navigate to api dir: `cd /api`
- Setup environment file: `cp .env.example .env`
    - Make sure to set `OPEN_WEATHER_MAP_BASE_URL="https://api.openweathermap.org/data/2.5/"` and your corresponding API Key via `OPEN_WEATHER_MAP_API_KEY="REDACTED-SECRET"`
- Start docker containers `docker compose up` (add `-d` to run detached)
- Connect to container to run commands: `docker-compose run app bash`
  - Make sure you are in the `/var/www/html` path
  - Install php dependencies: `composer install`
  - Setup app key: `php artisan key:generate`
  - Migrate database: `php artisan migrate` 
  - Seed database: `php artisan db:seed`
  - Run tests: `php artisan test`
- Visit api: `http://localhost:8000`

### Sysadmin

We have a background activity that is run every hour to update user-weather information. The sysadmin can force update or rush the queue by running: 

- `php artisan fetch:weather-data`

### Frontend
- Navigate to client dir; `cd /frontend` 
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`
