<?php
/**
 * Custom Exception class.
 */
namespace bd;

class InvalidGitUserException extends \Exception
{
    public function __construct($message = null, $code = 1)
    {
        parent::__construct($message, $code);
    }

    public function errorMessage()
    {
        $errorMsg = "The Github username you entered doesn't exist";

        return $errorMsg;
    }

    public function errorCode()
    {
        return 1;
    }
}
