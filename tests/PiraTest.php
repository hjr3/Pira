<?php
require_once 'PHPUnit/Extensions/Database/TestCase.php';

require_once __DIR__ . '/../library/Pira.php';

class PiraTest extends PHPUnit_Framework_TestCase
{
    protected $url;
    protected $user;
    protected $pass;
    protected $issue;

    protected function setUp()
    {
        // @todo hook these up to env variables to automate tests
        $this->url = 'http://jira.example.net';
        $this->user = 'user';
        $this->pass = 'secret';
        $this->issue = 'ISSUE-123';
    }

    public function testConstructor()
    {
        $pira = new Pira($this->url, $this->user, $this->pass);

        $this->assertAttributeNotEquals(null, 'client', $pira);
        $this->assertAttributeEquals($this->user, 'user', $pira);
        $this->assertAttributeEquals($this->pass, 'pass', $pira);
    }

    public function testLogin()
    {
        $pira = new Pira($this->url, $this->user, $this->pass);
        $pira->login();

        $this->assertAttributeNotEquals(null, 'auth', $pira);
    }

    public function testGetIssue()
    {
        $pira = new Pira($this->url, $this->user, $this->pass);
        $pira->login();
        $pira->getIssue($this->issue);
    }
}
