<?php

use League\Uri\Modifier;
use Rector\Config\RectorConfig;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPhpVersion(PhpVersion::PHP_84)
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withRules([
        ExplicitNullableParamTypeRector::class,
    ])
    // league/uri-components 7.6/7.7 deprecations
    ->withConfiguredRule(RenameStaticMethodRector::class, [
        new RenameStaticMethod(Modifier::class, 'from', Modifier::class, 'wrap'),
    ])
    ->withConfiguredRule(RenameMethodRector::class, [
        new MethodCallRename(Modifier::class, 'getUri', 'unwrap'),
        new MethodCallRename(Modifier::class, 'appendSegment', 'appendPath'),
    ]);
