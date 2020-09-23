<?php

namespace Wuwx\InfoPlus\Tests\Task;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Wuwx\InfoPlus\Application;

class ClientTest extends TestCase
{
    protected $app;

    public function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $this->app = new Application([
            "base_uri"      => $_ENV["INFOPLUS_BASE_URI"],
            "client_id"     => $_ENV["INFOPLUS_CLIENT_ID"],
            "client_secret" => $_ENV["INFOPLUS_CLIENT_SECRET"],
        ]);
    }

    public function testUpdate()
    {
        $response = $this->app["process"]->create([
            "code" => "wuwx_test",
            "userId" => "wqnpmzhynxzloavvhj7j",
            "data" => json_encode([
                "fieldYY" => "测试",
            ]),
        ]);

        $response = $this->app["process"]->find($response['entities'][0]);

        $response = $this->app["task"]->update($response['entities'][0]['tasks'][0]['id'], [
            "userId" => "wqnpmzhynxzloavvhj7j",
            "actionCode" => "action1",
            "remark" => "remark",
        ]);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }

}