<?php

namespace Wuwx\InfoPlus\Task;

use Wuwx\InfoPlus\Kernel\BaseClient;

class Client extends BaseClient
{
    public function update($id, $params)
    {
        return $this->client->post("/apis/v2/task/{$id}", $params);
    }
}