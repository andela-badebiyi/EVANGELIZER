<?php

namespace bd\tests;
use bd\EvangelistStatus;

class EvangelistStatusTest extends \PHPUnit_Framework_TestCase
{
    private $evangelist;
    
    /**
     * @expectedException bd\InvalidGitUserException
     */
    public function testForNoArgumentInInitialization()
    {
        $this->evangelist = new EvangelistStatus();
    }
    
    public function testEvangelistInitialization()
    {
        $username = "andela-badebiyi";
        $this->evangelist = new EvangelistStatus($username);
        $this->assertEquals($username, $this->evangelist->getUser());
    }
    
    public function testEvangelistStatus()
    {
        $this->evangelist = new EvangelistStatus("andela-badebiyi");
        $this->assertInternalType('string', $this->evangelist->getStatus());
        $this->assertEquals(
            "You are unworthy of any ranking brother Adebiyi Bodunde, you have failed us!!",
            $this->evangelist->getStatus()
        );
        
        $this->evangelist->setUser("andela-anandaa");
        $this->assertEquals(
            "You are a Senior Evangelist: Great Work brother Anthony Nandaa!! Your reward is in programming heaven.",
            $this->evangelist->getStatus()
        );
    }
    
    /**
     * @expectedException bd\InvalidGitUserException
     */
    public function testInvalidUsername()
    {
        $this->evangelist = new EvangelistStatus("andela-gjames1112121");
        $this->evangelist->getStatus();
    }
}
