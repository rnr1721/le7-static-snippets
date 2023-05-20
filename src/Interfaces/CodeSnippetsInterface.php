<?php

declare(strict_types=1);

namespace Core\Interfaces;

interface CodeSnippetsInterface
{

    /**
     * Register snippet
     * @param string $partName Snippet key
     * @param string $file Filename
     * @param bool $prod Is production
     * @return bool
     */
    public function register(string $partName, string $file, bool $prod = true): bool;

    /**
     * Get snippet or default value
     * @param string $partName Snippet key
     * @param string|null $default Default value if not exists
     * @return string|null
     */
    public function get(string $partName, string|null $default = null): string|null;

    /**
     * Get snipper or default value
     * @param string $partName Snippet key
     * @return string|null
     */
    public function __get(string $partName): string|null;

    /**
     * Set diffetent then code_parts name for cache
     * @param string $name Name for cache
     * @return self
     */
    public function setCacheName(string $name = 'code_parts'): self;
}
