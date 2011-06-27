<?php

class Pira
{
    protected $auth;
    protected $client;
    protected $user;
    protected $pass;

    public function __construct($url, $user, $pass)
    {
        $endpoint = "{$url}/rpc/soap/jirasoapservice-v2?wsdl";
        $this->user = $user;
        $this->pass = $pass;

        $this->client = new SoapClient($endpoint);
    }

    public function login()
    {
        $this->auth = $this->client->login($this->user, $this->pass);
    }

    public function getIssue($key)
    {
        $response = $this->client->getIssue($this->auth, $key);
        return $response;
    }

    public function addComment($key, $comment)
    {
        $this->client->addComment($this->auth, $key, array('body' => $comment));
    }
}
