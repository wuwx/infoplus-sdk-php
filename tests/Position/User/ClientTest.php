<?php
namespace Wuwx\InfoPlus\Tests\Position\User;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Wuwx\InfoPlus\Application;

class ClientTest extends TestCase
{
    protected $app;

    public function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 3));
        $dotenv->load();

        $this->app = new Application([
            "base_uri"      => $_ENV["INFOPLUS_BASE_URI"],
            "client_id"     => $_ENV["INFOPLUS_CLIENT_ID"],
            "client_secret" => $_ENV["INFOPLUS_CLIENT_SECRET"],
        ]);
    }

    public function testCreate()
    {
        $response = $this->app["position.user"]->create("032700:9", [
            "code" => "wqnpmzhynxzloavvhj7j",
        ]);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }
}