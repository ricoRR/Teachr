<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7uLwRN8\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7uLwRN8/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7uLwRN8.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7uLwRN8\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container7uLwRN8\App_KernelDevDebugContainer([
    'container.build_hash' => '7uLwRN8',
    'container.build_id' => '6089fd31',
    'container.build_time' => 1733201977,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container7uLwRN8');
