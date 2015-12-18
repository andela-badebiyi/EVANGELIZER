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
     * Tests for an invalid github username
     * @expectedException bd\InvalidGitUserException
     */
    public function testInvalidUsername()
    {
        $evangelist = new EvangelistStatus("andela-gjames1112121");
        $evangelist->getStatus();
    }
    
    /**
     * Tests that the evangelistStatus class outputs the retrieves the correct status
     */
    public function testNoEvangelistStatus()
    {
        $evangelist = new EvangelistStatus("andela-badebiyi");
        $this->assertEquals(
            "Adebiyi Bodunde you are unworthy of any ranking beloved, you have failed us!!",
            $evangelist->getStatus()
        );
    }
    
    /**
     * Tests that the evangelistStatus class outputs the retrieves the correct status
     * @expectedException bd\InvalidGitUserException
     */
    public function testEvangelistStatus()
    {
        $evangelist = new EvangelistStatus("andela-gjames");
        $this->assertInternalType('string', $evangelist->getStatus());
        $this->assertEquals(
            "George James you are unworthy of any ranking beloved, you have failed us!!",
            $evangelist->getStatus()
        );
        $evangelist = new EvangelistStatus();
    }
    
}
