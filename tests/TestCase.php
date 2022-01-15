<?php

namespace Jwalbeli\Crudapi\Tests;
use Jwalbeli\Crudapi\Crudapi;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
//   use CreatesApplication;

  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    /* return [
              'Acme\AcmeServiceProvider',
    ]; */
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }

    /**
     * Define routes setup.
     *
     * @param  \Illuminate\Routing\Router  $router
     *
     * @return void
     */
    protected function defineRoutes($router)
    {
        $router->get('/', [Crudapi::class, 'index']);
        $router->post('/posts', [Crudapi::class, 'store']);
        $router->patch('/posts/{id}', [Crudapi::class, 'update']);
        $router->delete('/posts/{id}', [Crudapi::class, 'destroy']);
    }
}
