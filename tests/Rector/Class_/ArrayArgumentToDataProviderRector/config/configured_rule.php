<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Rector\PHPUnit\Rector\Class_\ArrayArgumentToDataProviderRector;
use Rector\PHPUnit\ValueObject\ArrayArgumentToDataProvider;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/../../../../../config/config.php');

    $services = $containerConfigurator->services();

    $services->set(ArrayArgumentToDataProviderRector::class)
        ->configure([
            new ArrayArgumentToDataProvider(TestCase::class, 'doTestMultiple', 'doTestSingle', 'variable'),
        ]);
};
