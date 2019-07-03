# MVC

## Setup

### Config

In order to get the whole framework up and running copy the file `config.sample.php` to `config.php` and add your configuration to it. Please note that the `APP_BASE` constant should be an absolute path to make sure that all CSS and image includes work.

### Database

Feel free to import the `shop.sql` file into your MySQL database. It contains some sample data.

## Docker

You might have Docker and Docker Compose installed on your system. In that case you can run `docker-compose up` from the command line to start the containers. Note that you still have to import the `shop.sql`file into the database. Anyway, you can just copy the `config.docker.php` file to `config.php` and everything should work.