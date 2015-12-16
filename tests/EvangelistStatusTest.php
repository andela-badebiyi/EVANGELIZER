<?php

namespace bd\tests;
use bd\EvangelistStatus;

class EvangelistStatusTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Tests for exception when initialized without the username argument
     * @expectedException bd\InvalidGitUserException
     */
    public function testForNoArgumentInInitialization()
    {
        $evangelist = new EvangelistStatus();
    }
    
    /**
     * Tests to see that the EvangelistStatus class initializes properly
     */
    public function testEvangelistInitialization()
    {
        $username = "andela-badebiyi";
        $evangelist = new EvangelistStatus($username);
        $this->assertEquals($username, $evangelist->getUser());
    }
    
    /**
     * Tests that the evangelistStatus class outputs the retrieves the correct status
     */
    public function testEvangelistStatus()
    {
        $evangelist = new EvangelistStatus("andela-badebiyi");
        $this->assertInternalType('string', $evangelist->getStatus());
        $this->assertEquals(
            "You are unworthy of any ranking brother Adebiyi Bodunde, you have failed us!!",
            $evangelist->getStatus()
        );
        
        $evangelist->setUser("andela-anandaa");
        $this->assertEquals(
            "You are a Senior Evangelist: Great Work brother Anthony Nandaa!! Your reward is in programming heaven.",
            $evangelist->getStatus()
        );
    }
    
    /**
     * Tests for an invalid github username
     * @expectedException bd\InvalidGitUserException
     */
    public function testInvalidUsername()
    {
        $evangelist = new EvangelistStatus("andela-gjames1112121");
        $evangelist->getStatus();
    }
}
