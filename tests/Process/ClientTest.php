<?php
namespace Wuwx\InfoPlus\Tests\Process;

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

    public function testCreate()
    {
        $response = $this->app["process"]->create([
            "code" => "wuwx_test",
            "userId" => "wqnpmzhynxzloavvhj7j",
            "data" => json_encode([
                "fieldYY" => "测试",
            ]),
        ]);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }

    public function testFind()
    {
        $response = $this->app["process"]->find(6807);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }
}