<?php

declare(strict_types=1);

namespace Liquetsoft\CbrfService\Laravel\Tests;

use Illuminate\Contracts\Foundation\Application;
use Liquetsoft\CbrfService\CbrfDaily;
use Liquetsoft\CbrfService\Laravel\CbrfDailyWrapper;
use Liquetsoft\CbrfService\Laravel\LiquetsoftCbrfServiceBundleServiceProvider;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @internal
 */
final class LiquetsoftCbrfServiceBundleServiceProviderTest extends BaseCase
{
    /**
     * @test
     *
     * @psalm-suppress MixedArrayAssignment
     * @psalm-suppress MixedArgument
     */
    public function testRegisterService(): void
    {
        $registered = [];

        /** @var Application&MockObject */
        $app = $this->getMockBuilder(Application::class)->getMock();
        $app->method('singleton')
            ->willReturnCallback(
                function (string $abstract, mixed $complete) use (&$registered): void {
                    $registered[$abstract] = $complete;
                }
            );

        $module = new LiquetsoftCbrfServiceBundleServiceProvider($app);
        $module->register();

        $this->assertArrayHasKey(CbrfDaily::class, $registered);
        $this->assertIsCallable($registered[CbrfDaily::class]);
        $this->assertInstanceOf(CbrfDaily::class, \call_user_func($registered[CbrfDaily::class]));
    }

    /**
     * @test
     *
     * @psalm-suppress MixedArrayAssignment
     * @psalm-suppress MixedArgument
     */
    public function testRegisterWrapper(): void
    {
        $registered = [];

        /** @var Application&MockObject */
        $app = $this->getMockBuilder(Application::class)->getMock();
        $app->method('singleton')
            ->willReturnCallback(
                function (string $abstract, mixed $complete) use (&$registered): void {
                    $registered[$abstract] = $complete;
                }
            );

        $module = new LiquetsoftCbrfServiceBundleServiceProvider($app);
        $module->register();

        $this->assertArrayHasKey(CbrfDailyWrapper::class, $registered);
        $this->assertSame($registered[CbrfDailyWrapper::class], CbrfDailyWrapper::class);
    }

    /**
     * @test
     */
    public function testProvides(): void
    {
        /** @var Application */
        $app = $this->getMockBuilder(Application::class)->getMock();

        $module = new LiquetsoftCbrfServiceBundleServiceProvider($app);
        $res = $module->provides();

        $this->assertSame(
            [
                CbrfDaily::class,
                CbrfDailyWrapper::class,
            ],
            $res
        );
    }
}
