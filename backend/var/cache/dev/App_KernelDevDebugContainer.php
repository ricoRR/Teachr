<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWTsWjKa\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWTsWjKa/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWTsWjKa.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWTsWjKa\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWTsWjKa\App_KernelDevDebugContainer([
    'container.build_hash' => 'WTsWjKa',
    'container.build_id' => '54d5266c',
    'container.build_time' => 1733214968,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWTsWjKa');
