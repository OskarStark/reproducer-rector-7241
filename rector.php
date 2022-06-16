<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Php81\Rector\Class_\MyCLabsClassToEnumRector;
use Rector\Php81\Rector\MethodCall\MyCLabsMethodCallToEnumConstRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->parallel();
    $rectorConfig->paths([
        __DIR__.'/src',
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_81);
    $rectorConfig->importNames();
    $rectorConfig->disableImportShortClasses();

    $rectorConfig->rule(MyCLabsClassToEnumRector::class);
    $rectorConfig->rule(MyCLabsMethodCallToEnumConstRector::class);
};
