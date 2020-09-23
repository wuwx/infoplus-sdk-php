<?php

namespace Wuwx\InfoPlus\Process;

use Wuwx\InfoPlus\Kernel\BaseClient;

class Client extends BaseClient
{
    public function create($params)
    {
        return $this->client->put("/apis/v2/process", $params);
    }

    public function find($id)
    {
        return $this->client->get("/apis/v2/process/{$id}");
    }
}