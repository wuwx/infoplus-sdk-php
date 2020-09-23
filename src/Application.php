<?php
namespace Wuwx\InfoPlus;

use Pimple\Container;
use Tightenco\Collect\Support\Collection;

class Application extends Container
{
    public function __construct($config = [], array $values = array())
    {
        parent::__construct($values);

        $this['config'] = function () use ($config) {
            return new Collection($config);
        };

        $this['client'] = function ($app) {
            return new Kernel\Http\Client($app);
        };

        $this['triple.dept'] = function ($app) {
            return new Triple\Dept\Client($app);
        };
        $this['triple.post'] = function ($app) {
            return new Triple\Post\Client($app);
        };
        $this['triple.user'] = function ($app) {
            return new Triple\User\Client($app);
        };

        $this['position.user'] = function ($app) {
            return new Position\User\Client($app);
        };
    }

    public function __get($name)
    {
        return $this[$name];
    }
}