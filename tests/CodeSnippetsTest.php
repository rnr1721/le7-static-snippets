<?php

declare(strict_types=1);

use Core\CodeParts\CodeSnippetsDefault;
use Core\Testing\MegaFactory;

require_once 'vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

class CodeSnippetsTest extends PHPUnit\Framework\TestCase
{

    private string $tempDir = '';
    private string $testDir = '';
    private MegaFactory $megaFactory;

    protected function setUp(): void
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->testDir = getcwd() . $ds . 'tests';
        $this->tempDir = $this->testDir . $ds . 'temp';
        $this->megaFactory = new MegaFactory($this->testDir);
        $this->megaFactory->mkdir($this->tempDir);
    }

    public function testWithoutCacheProduction()
    {
        $this->getWithoutCache(true);
    }

    public function testWithCacheProduction()
    {
        $this->getWithoutCache(false);
    }

    public function getWithoutCache(bool $isProduction)
    {
        $codeSnippets = new CodeSnippetsDefault();
        $file = $this->tempDir . DIRECTORY_SEPARATOR . 'snippets_bottom.txt';
        $codeSnippets->register('snippets_bottom', $file, $isProduction);
        file_put_contents($file, 'test data for snippet');
        $result = $codeSnippets->get('snippets_bottom', '');
        if ($isProduction) {
            $this->assertEquals('test data for snippet', $result);
        } else {
            $this->assertEquals('<!-- Statistics assets here -->', $result);
        }
    }
    
}
