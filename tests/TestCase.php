<?php

namespace Jwalbeli\Crudapi\Tests;
use Jwalbeli\Crudapi\Crudapi;
use Jwalbeli\Crudapi\DemoPackageServiceProvider;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
//   use CreatesApplication;

  public function setUp(): void
  {
    parent::setUp();
    $this->withoutExceptionHandling();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
              DemoPackageServiceProvider::class,
    ];
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
