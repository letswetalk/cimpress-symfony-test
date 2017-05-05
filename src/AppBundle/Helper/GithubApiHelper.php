<?php

namespace AppBundle\Helper;

use Github\Client;
use Github\Exception\ErrorException;
use Github\ResultPager;

class GithubApiHelper {

    /** @var  Client $client */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRepoByName($repo) {
        try {
            $organizationApi = $this->client->api('organization');
            $paginator  = new ResultPager($this->client);
            $parameters = array($repo);
            return $paginator->fetchAll($organizationApi, 'repositories', $parameters);
        } catch (\Exception $e) {
            return null;
        }
    }

}