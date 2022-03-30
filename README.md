## For running project

Needs to write following commands after cloning the repository:

composer install

copy .env.example .env

You should change DB credentials in .env file and create new empty database which the name should be the same with DB_DATABASE

Then, commands:

php artisan migrate --seed

For running server:

php artisan serve

## APIs
Country List
http://localhost:8000/api/country?name=Canada

Save PDF
http://localhost:8000/api/proposal
you should send form-data, key=proposal, value=pdf file
