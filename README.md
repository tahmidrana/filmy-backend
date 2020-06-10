## Project Setup Guidelines
***
### Server Requirements
- PHP - 7.2
- MySql - 5.7
***
### Please follow each steps below to run the project

- Go to project root directory
- Open cmd/terminal on project root directory
- Run command: ***`cp .env.example .env`***
- To install project dependencies run: ***`composer install`***
- Run: ***`php artisan key:generate`***
- Frontend setup:
    - After composer packages installed, install npm packages using: ***`npm install`***
    - Now run this command to make production build of vue files: ***`npm run prod`***
- Database Setup
    - Create a database on mysql server
    - Update `.env` file with database name and credentials
    - To make database tables run: ***`php artisan migrate`***
    - Run this command to seed database with demo data: ***`php artisan db:seed`***
- Run the application: ***`php artisan serve`***
- Go to `localhost:8000` from any browser to use the system
***
### Default User Credential
> After successful database setup and seed, if you want to login to system, use below credentials
- Email: johndoe@example.com
- Password: password
***
### Usage guidelines
> After opening the application on a browser a user is landed on the home page where he will see list of movies. This system has an easy navigation menu on top of page. Follow given instructions below to perform some action on the system
- Creating a new film record:  
    - Click the `Create` menu from the top navigation bar
    - Fill up all the fields of the form and submit
- View film detail
    - Click on a film title/name from home page
- Commenting on a film
    - A user needs to be logged in to comment on a film
    - Write comment on comment text field and click `comment button`
- Registration
    - To register on the system, click on the `Register` menu from top navigation bar
    - Give you `name`, `email address`, `password`, `confirm password` and click `Register` button
- Login
    - A user must be registered to login to the system
    - To login to the system click on the `Login` menu from top navigation bar
    - Give your `email` and `password` on respective fields and then click `Login` button
- Logout
    - Logout menu will be visible on the top navigation bar if user is logged in
    - Click on the Logout menu to logout from the system