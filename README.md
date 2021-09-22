
Weather Forecast API 

1.Database Details
  I have created a MYSQL database named weatherforecastapidb and table named weatherforecastdetails inside the database.
  The script for generating database is attached to this project as .sql File.

  Table is prepopulated with two rows consisting of provided Tokens 

2) Framwork and technologies:
  Used Symfony framework and utilized the framework as a base for my code. I haven't used any ORM but used manual php to mysql database connection.
  Started local server using: symfony server:start
  The route to access the data: https://127.0.0.1:8000/api/weather/office/forecast

3)Application Details
  The application consists of a controller,service layer and database layer.
  Controller : ForecastController.php
  ServiceLayer: 1) ApiWeatherGov.php 2)ForecastService.php
  Data Layer: ForecastDataLayer.php
  Model: ApiTokenModel.php
