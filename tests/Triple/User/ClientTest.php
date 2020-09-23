<?php

namespace Wuwx\InfoPlus\Tests\Triple\User;

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
            "base_uri"   => $_ENV["INFOPLUS_BASE_URI"],
            "app_id"     => $_ENV["INFOPLUS_APP_ID"],
            "app_secret" => $_ENV["INFOPLUS_APP_SECRET"],
        ]);
    }

    public function testFind()
    {
        $response = $this->app["triple.user"]->find("wechat_test1");
        $this->assertEquals("USER_NOT_FOUND", data_get($response, "ecode"));
    }

    public function testCreate()
    {
        $response = $this->app["triple.user"]->create([
            "code"        => "wechat_test1",
            "name"        => "wechat_test1",
        ]);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }

    public function testUpdate()
    {
        $response = $this->app["triple.user"]->update("wechat_test1", [
            "name"        => "wechat_test3",
        ]);

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }

    public function testDelete()
    {
        $response = $this->app["triple.user"]->delete("wechat_test1");

        $this->assertEquals("SUCCEED", data_get($response, "ecode"));
    }
}