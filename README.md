#vehicle-app

run composer update and add your own db settings

create the db schema : php app/console doctrine:schema:update

populate db script command => php app/console app:add-db-entries app/Resources/data/VehicleSample.json 

to run it : php app/console server:start
