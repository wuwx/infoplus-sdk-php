<?php
namespace Wuwx\InfoPlus\Kernel\Http;

use Zttp\Zttp;

class Client
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function put($url, $params = [])
    {
        $response = Zttp::withoutVerifying()->asFormParams()->withHeaders([
            "Authorization" => "Bearer " . $this->getToken(),
        ])->put($this->app['config']['base_uri'] . $url, $params);

        return $response->json();
    }

    public function post($url, $params = [])
    {
        $response = Zttp::withoutVerifying()->asFormParams()->withHeaders([
            "Authorization" => "Bearer " . $this->getToken(),
        ])->post($this->app['config']['base_uri'] . $url, $params);

        return $response->json();
    }

    public function get($url, $params = [])
    {
        $response = Zttp::withoutVerifying()->withHeaders([
            "Authorization" => "Bearer " . $this->getToken(),
        ])->get($this->app['config']['base_uri'] . $url, $params);

        return $response->json();
    }

    public function delete($url, $params = [])
    {
        $response = Zttp::withoutVerifying()->withHeaders([
            "Authorization" => "Bearer " . $this->getToken(),
        ])->delete($this->app['config']['base_uri'] . $url, $params);

        return $response->json();
    }

    public function getToken()
    {
        $response = Zttp::withoutVerifying()->asFormParams()
            ->post($this->app['config']['base_uri'] . "/oauth2/token", [
                "client_id" => $this->app['config']['client_id'],
                "client_secret" => $this->app['config']['client_secret'],
                "grant_type"=> "client_credentials",
                "scope" => "sys_start sys_process sys_submit sys_triple sys_triple_edit"
            ]);

        $access_token = data_get($response->json(), "access_token");

        return $access_token;
    }
}