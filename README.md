[![StyleCI](https://styleci.io/repos/47965981/shield)](https://styleci.io/repos/47965981)
[![Circle CI](https://circleci.com/gh/andela-badebiyi/checkpoint_one_bee.svg?style=svg)](https://circleci.com/gh/andela-badebiyi/checkpoint_one_bee)


#Checkpoint One
##Summary
This is my second checkpoint project for my andela simulations. This project interfaces with the GITHub api and fetches a users GITHub data. It fetches the numbers of repos a user has and determines the users Evangelical Status based on his/her number of repos.

* 5 - 10 repos (Junior Evangelist)
* 11 - 20 repos (Associate Evangelist)
* > 21 repos (Senior Evangelist)

The `src` directory contains two files. The first file is a class that handles the custom Exceptions that are generated and the second file is a class that interfaces with the GITHub api, fetches and processes the users data and returns the users status.

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

##Requirements

* [PHP](http://php.net/releases/5_4_0.php)
* [PHPUnit](https://phpunit.de/)

##Testing
Move to your root directory in your terminal and run `phpunit`
