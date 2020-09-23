<?php

namespace Wuwx\InfoPlus\Position\User;

use Wuwx\InfoPlus\Kernel\BaseClient;

class Client extends BaseClient
{
    public function create($position, $params)
    {
        return $this->client->put("/apis/v2/position/{$position}/users", $params);
    }
}