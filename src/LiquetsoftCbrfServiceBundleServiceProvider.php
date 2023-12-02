<?php

declare(strict_types=1);

namespace Liquetsoft\CbrfService\Laravel;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Liquetsoft\CbrfService\CbrfDaily;
use Liquetsoft\CbrfService\CbrfFactory;

/**
 * Service provider for LiquetsoftCbrfService bundle.
 */
final class LiquetsoftCbrfServiceBundleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public const BUNDLE_PREFIX = 'liquetsoft_cbrfservice';

    /**
     * {@inheritdoc}
     *
     * @psalm-suppress MixedArgument
     */
    public function register(): void
    {
        $this->app->singleton(
            CbrfDaily::class,
            fn (): CbrfDaily => CbrfFactory::createDaily()
        );

        $this->app->singleton(
            CbrfDailyWrapper::class,
            CbrfDailyWrapper::class
        );
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            CbrfDaily::class,
            CbrfDailyWrapper::class,
        ];
    }
}
