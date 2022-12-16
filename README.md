
# The Marketplace
> A simple e-commerce site written in PHP
> Live demo [_here_](https://mymarketplace-app.herokuapp.com/).

## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Setup](#setup)
* [Usage](#usage)
* [Project Status](#project-status)
* [Room for Improvement](#room-for-improvement)
* [Acknowledgements](#acknowledgements)
* [Contact](#contact)
* [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


## General Information
- This is a simple PHP based e-commerce app
- Project scope is to further my knowledge of PHP development
- For educational / testing purposes only



## Technologies Used
- PHP - 8.0.13
- MYSQL - 5.7
- Bootstrap - 5.1.3
- Jquery - 3.6.0 
- Jquery Validation - 1.19.3 
- AWS SDK 
- Stripe API (not implemented yet) 


## Features
- Browse and "purchase" products as guest
- View product comments as guest
- Signup/Login to additionally create/edit/delete products
- Signup/Login to add comments


## Setup
This project requires composer to be installed on your machine. After cloning the repo, run `composter install` to install project dependencies. The config.php file is setup for a Heroku deployment. Set your Heroku Config Vars to match the config.php file and deploy. Otherwise, update the config.php file with your own database and S3 bucket variables as necessary. Check /includes/init.php line 9 to ensure the correct config.php filepath is being used for your config variables.  


## Usage
After setup, you can serve the project locally or through your favorite deployment pipeline. The live version of this project is hosted via Heroku. Should you choose Heroku, you will need to use the ClearDB MYSQL addon or migrate your database to Postgres.  

## Project Status
Project is: _in progress_


## Room for Improvement
Room for improvement:
- Add pagination to view products page and comments on product page 
- Make short and long descriptions for products
- Add icons (stars) for product rating within comment
- Include product image in the product->update() function
- Continue to separate logic from view files / general project organization improvements
- Style/UI improvements, too many to list

To do:
- Incorporate Stripe API as checkout option 
- Add AWS S3 Bucket for product image uploads
- Update database to include created_at date for product sorting
- Update database to include created_at date for comment sorting
- Build Dockerfile 
- Build proper dev pipeline 
- Create separate admin and customer panels 


## Acknowledgements
- Much of the boilerplate for this project comes from: [this tutorial](https://www.udemy.com/course/php-for-beginners-/).



## Contact
Created by [@fig_dev](https://pfigdev.xyz) pfigdev@gmail.com


## License
This project is open source and available under the [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT).


