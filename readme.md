## NinjaClicks

NinjaClicks is Vue.js SPA built to allow the viewing of click date on the web backed by a Laravel application with a GraphQL api. NinjaClicks charts click data over time grouped by Provider as well as displaying clicks data in a table.

## Installation and Setup

Once you have the project located on your computer navigate to the root of the project and execute the following commands in your terminal:

1. `composer install`
2. `cp .env.example .env`
3. Set your database connection info in the new `.env` file
3. `php artisan key:generate`
4. `php artisan jwt:secret` (not really necessary at this point because I didn't finish auth on the front end yet)
5. `php artisan migrate`
if you already had the provider and clicks tables set up with data (`test_db.sql` is provided if you do not already have a database set up and would like to use the .sql file), run
    6. `php artisan db:seed --class="ProviderColorsSeeder"`
or if you did not have the provider and clicks tables already set with data, run
    6. `php artisan db:seed --class="ProviderTableSeeder"`
7. `npm install`
8. `npm run prod`
9. `php artisan serve`

## Future Improvements

- [x] Create interface for Clicks and Provider repositories and bind implementations in ioc container and use repos in GraphQL query classes
- [ ] Put Provider chart and Clicks table behind auth on SPA
- [ ] Periodically poll api for new entries
- [ ] Flesh out GraphQL queries with things like pagination
- [ ] Add ability to choose which Providers to chart
- [ ] Add chart options like bar chart
