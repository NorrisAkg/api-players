## About Application

This application is an API providing to handle players informations.
It built using php framework laravel and an PostgreSql database
It expose endpoints to:

- List all players with filter
- Retrieve on player using his id
- Create new player
- Update existing player
- Delete one player

## Clone this project

To clone this project, run:

- git clone -b master https://github.com/NorrisAkg/api-players.git

## Install project dependencies

To install project dependencies, we have to run:

- composer install

## Set up environment varaiables

To set up the environment variables:

- create in the root a file named '.env'
- create in the root a file named '.env'
- copy the content of the '.env.example' file to the '.env file'
- provide database credentials
- then generate application key by running: "php artisan key:generate"
- finally run migrations and seeder by running: "php artisan migrate --seed"

### Run the application

To run application, we have to run this command: 

- php artisan serve

## Endpoints provided

To list all positions
- Endpoint:  http://localhost:8000/positions
- Method GET

To get one position with "id"
- Endpoint:  http://localhost:8000/positions/id
- Method GET

To list players
- Endpoint:  http://localhost:8000/players
- Method GET

To get one player with "id"
- Endpoint:  http://localhost:8000/players/id
- Method GET

To create new player
- Endpoint:  http://localhost:8000/players
- Method POST

To update existing player with "id"
- Endpoint:  http://localhost:8000/players/id
- Method PUT

To delete existing player with "id"
- Endpoint:  http://localhost:8000/players/id
- Method DELETE

To get player performance
- Endpoint:  http://localhost:8000/players/id/stats-avg
- Method GET

## Run tests

To execute applications test, run:

- ./vendor/bin/pest
