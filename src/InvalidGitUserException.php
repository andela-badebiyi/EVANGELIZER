<?php
/**
 * This is a custom Exception class.
 * This is a custom exception class which is used by the EvangelistStatus class
 * it is thrown whenever an invalid github username is supplied to the 
 * EvangelistStatus class
 *
 * @author Adebiyi Bodunde
 */
namespace bd;

class InvalidGitUserException extends \Exception
{
    /**
     * Overrides the parent constructor method 
     */
    public function __construct($message = null, $code = 1)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return string Returns the error message that accompanies the custom exception
     */
    public function errorMessage()
    {
        $errorMsg = "The Github username you entered doesn't exist";

        return $errorMsg;
    }
    /**
     * @return int Returns the error code that accompanies the custom exception
     */

    public function errorCode()
    {
        return 1;
    }
}
