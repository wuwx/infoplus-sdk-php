<?php
namespace Wuwx\InfoPlus\Triple\User;

use Wuwx\InfoPlus\Kernel\BaseClient;

class Client extends BaseClient
{
    public function find($id)
    {
        return $this->client->get("/apis/v2/triple/user/{$id}");
    }

    public function create($params)
    {
        return $this->client->put("/apis/v2/triple/user", $params);
    }

    public function update($id, $params)
    {
        return $this->client->post("/apis/v2/triple/user/{$id}", $params);
    }

    public function delete($id)
    {
        return $this->client->delete("/apis/v2/triple/user/{$id}");
    }
}