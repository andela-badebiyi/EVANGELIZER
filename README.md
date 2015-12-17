[![StyleCI](https://styleci.io/repos/47965981/shield)](https://styleci.io/repos/47965981)
[![Coverage Status](https://coveralls.io/repos/andela-badebiyi/checkpoint-1b/badge.svg?branch=developer&service=github)](https://coveralls.io/github/andela-badebiyi/checkpoint-1b?branch=developer)
[![Build Status](https://travis-ci.org/andela-badebiyi/checkpoint-1b.svg)](https://travis-ci.org/andela-badebiyi/checkpoint-1b)

#Checkpoint One
##Summary
This is my second checkpoint project for my andela simulations. This project interfaces with the GitHub API and fetches a users GitHub data. It fetches the numbers of repos a user has and determines the users Evangelical Status based on his/her number of repos.

* 5 - 10 repos (Junior Evangelist)
* 11 - 20 repos (Associate Evangelist)
* > 21 repos (Senior Evangelist)

The `src` directory contains two files. The first file is a class that handles the custom Exceptions that are generated and the second file is a class that interfaces with the GitHub API, fetches and processes the users data and returns the users status.

##Usage

```php
//create an instance and initialize
$username = "andela-badebiyi";
$evangelist = new EvangelistStatus($username); 

//fetch user status
try{
  $evangelist->getStatus();
}
catch(InvalidGitUserException $e){
  echo $e->errorMessage();
}
```
##Installation
From your root directory run `composer install`. This would install all the necessary dependencies

##Requirements

* [PHP](http://php.net/releases/5_4_0.php)
* [PHPUnit](https://phpunit.de/)

##Testing
Move to your root directory in your terminal and run `phpunit`
