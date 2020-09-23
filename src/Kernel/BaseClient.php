<?php


namespace Wuwx\InfoPlus\Kernel;


class BaseClient
{
    protected $app;
    protected $client;

    public function __construct($app)
    {
        $this->app = $app;
        $this->client = $this->app['client'];
    }
}