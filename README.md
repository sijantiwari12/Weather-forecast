
#Weather Forecast API 
Steps to execute the program:
1.Execute the attached Script named weatherforecastdetails.sql in MYSQL environment.
2.Run the application.
3. Use PostMan or any api testing tool of your choice.
4. Hit the URL at  https://127.0.0.1:8000/api/weather/office/forecast  with HTTPGET method and pass a token named Api-Token.
5. If the token has a valid value then it should return the Json response.Otherwise it will return 401 Authentication Failed Message.

#Application Details
1.Database Details
    I have created a MYSQL database named weatherforecastapidb and table named weatherforecastdetails inside the database.
    The script for generating database is attached to this project as .sql File.
    Table is prepopulated with two rows consisting of provided Tokens 
    Columns:
    token->varchar(255),primary key
    usagecount->int,defaults to zero
    lastused->datetime, defaults to NULL


2) Backend Details
    The application consists of a controller,service layer and database layer.
    Controller : ForecastController.php
    ServiceLayer: 1) ApiWeatherGov.php 2)ForecastService.php
    Data Layer: ForecastDataLayer.php
    Model: ApiTokenModel.php

    
3) Framwork and technologies:
    I used Symfony framework and utilized the framework as a base for my code. I haven't used any ORM but used manual  php to connect to mysql database .
    Used Xampp
    Started local server using: symfony server:start
