To make this work

You need to import the fleet.sql into the mysql database.
Configure the database information in application/config/database.php


Logging of user request and response has beed done for each requests.
To view the logs, application/logs

Authentication have been handled in header of each request.
Header should contains auth-key and auth-secret which needs to sent on every request.