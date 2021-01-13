# Php-blog
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/67655362551a412b9e931837105af165)](https://app.codacy.com/gh/Eredost/Php-blog?utm_source=github.com&utm_medium=referral&utm_content=Eredost/Php-blog&utm_campaign=Badge_Grade)

Fifth project of the OpenClassrooms PHP application developer path.

This project consists of developing a professional blog, this one must allow on the one hand to be able to present myself, the services that I offer, my experiences, but also to have a blog part where users can read my articles and interact through comments.

## Installation

**In order to run the project, you must have at least PHP version 7.3 as well as the Composer dependency manager.**

 1. First, you have to install the Composer dependencies

        > composer install

 2. Then, you need to create your database so that you can export the 'data/blog.sql' file containing the tables, and a set of fake data.

 3. And finally, you need to create a new configuration file 'database.conf' in the config folder, with 'database.dist.conf' for model containing the information relating to the connection to the database

        // config/database.conf
        ; Database config

        DB_HOST=localhost
        DB_USERNAME=root
        DB_PASSWORD=
        DB_NAME=blog

## Additional docs

  - [Kanban (Trello)](https://trello.com/b/hIOdepqM/blog-php)
  - [Application mockups (Figma)](https://www.figma.com/file/f9XSRrlVWCuRx1RA6ROrlh/PHP-Blog?node-id=0%3A1)
