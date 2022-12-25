<p align="center"><a href="https://www.guildmortgage.com/" target="_blank"><img src="https://www.guildmortgage.com/wp-content/uploads/2016/11/Guild_Logo_RGB_Full.png" width="25%"></a></p>

# Developer test for Guild / Laravel

## Given

- You have a loan application
  - The loan application has 2 borrowers
    - One borrower has a job
    - The other borrower has a job and a bank account

## Requirements

- Fork this git repository and create a feature branch for your changes
- Install a fresh copy of Laravel
- Create some simple database tables to represent the above scenario
  - By simple I mean just the basics of what's really needed for this exercise
  - For example, the borrower should have a name, but we don't need date of birth, social security number or contact information for this exercise
  - Though I would like to see the standard date fields as part of the design (ie. created, updated, deleted)
- Write a query (or queries) that shows the total annual income and bank account values for the application
- Expose an API end point to show the results of the query (or queries)
  - All output should be in JSON format
- Write a unit test on at least one method in the project
  - I'm deliberatly keeping this requirement vague to give you freedom to decide what to test and how
- Update this README file with any installation instructions needed so we can clone and run your code
- Create a Github Pull Request against this repo with your changes

## What we're looking for

- Your general skill-set with PHP and MySQL
- Your general architecture skills
- How well you know your way around Laravel
- Your ability to write unit tests
- Coding style
- How well you adhere to the PSR standards
- Usage of design patterns in your code

## Installation instructions

- Clone the repository
- Setup Laravel development environment as normal (This codebase is using Laravel 9 & PHP 8)
- Run `composer install`
- Update your `.env` file per Laravels instructions.
- Run `php artisan migrate`
- Run `php artisan db:seed`
- You can view all loan applications using the endpoint `/api/loan-applications`
- To visit a specific endpoint use `api-loan-applications/{id}`
- To run tests we are use `php artisan test`

The Local DB is configured to use SQL Lite (This codebase is also configured to work with MySQL)

The endpoint returns JSON and this JSON contains the `total annual income` per borrower and the `bank account balance` per borrower as well as the combined amount.

There isn't any authentication setup for the API routes. Typically I setup APITokens, but for simplicity and test application purposes there isn't any setup. If needed I'd use a bearer token on the header request body and setup middleware in the routes.
