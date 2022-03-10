<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit;

class Config {
    /**
     * @var mixed
     */
    private $cache;

    /**
     * @var bool
     */
    private bool $debug;

    /**
     * @var string
     */
    private string $framework;

    /**
     * @var array
     */
    private array $framework_path;

    /**
     * @param array $options
     */
    public function __construct(array $options = []) {
        $options = array_merge([
            'cache'          => false, // Cache object (depends on tpl engine), absolute path or false.
            'debug'          => false, // TPL engine debugging (if supported by engine).
            'framework'      => 'bootstrap5', // CSS Framework. Possible value: bootstrap5|semanticui2
            'framework_path' => [
                // Path to CSS Framework, each Framework can be in different path.
                'bootstrap5'  => __DIR__.'/../resources/bootstrap5',
                'semanticui2' => __DIR__.'/../resources/semanticui2',
            ],
        ], $options);

        $this->cache = $options['cache'];
        $this->debug = $options['debug'];
        $this->framework = $options['framework'];
        $this->framework_path = $options['framework_path'];
    }

    /**
     * Get cache.
     *
     * @return mixed
     */
    public function getCache() {
        return $this->cache;
    }

    /**
     * Set cache.
     *
     * @param mixed $cache Cache object,path or bool.
     */
    public function setCache($cache): void {
        $this->cache = $cache;
    }

    /**
     * Get debug option.
     *
     * @return bool
     */
    public function getDebug(): bool {
        return $this->debug;
    }

    /**
     * Enable TPL debugging.
     *
     * @return void
     */
    public function enableDebug(): void {
        $this->debug = true;
    }

    /**
     * Get the currently loaded framework.
     *
     * @return string
     */
    public function getFramework(): string {
        return $this->framework;
    }

    /**
     * Set the framework.
     *
     * @param string $framework Framework name.
     */
    public function setFramework(string $framework): void {
        $this->framework = $framework;
    }

    /**
     * Get path of the currently loaded framework.
     *
     * @param string $framework Framework name.
     *
     * @return string
     */
    public function getFrameworkPath(string $framework): string {
        return $this->framework_path[$framework];
    }

    /**
     * Set path to the framework.
     *
     * @param string $framework Framework name.
     * @param string $path      Absolute path to the famework.
     *
     * @return void
     */
    public function setFrameworkPath(string $framework, string $path): void {
        $this->framework_path[$framework] = $path;
    }
}
