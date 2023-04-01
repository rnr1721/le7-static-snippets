# le7-static-snippets
Static code parts for le7 PHP MVC framework or ant PHP project

It is often necessary to display static code on a web page, such as Google Analytics codes or other metrics. This class allows you to register one or more elements and get them by key. In this case, the code will be displayed only in production mode, and stubs will be shown in development mode.

## Requirements

- PHP 8.1 or higher.
- Composer 2.0 or higher.

## What it can?

- read static code from text files for example for web pages only in production mode
- use PSR cache (optional), for read one file or cache item and not many
- The cache only works if the cache element is injected in the class when the class is created.

## Installation

```shell
composer require rnr1721/le7-static-snippets
```

## Testing

```shell
composer test
```

## How it works?

```php
use Core\CodeParts\CodeSnippetsDefault;

    $codeSnippets = new CodeSnippetsDefault();

    // Here we register file
    // File must be exists!
    // If file not exists there are no error, only stub will be displayed
    $file1 = '/home/www/mysite.com/mydomain/snippet_top.txt';
    $file2 = '/home/www/mysite.com/mydomain/snippet_bottom.txt';
    $file3 = '/home/www/mysite.com/mydomain/snippet_middle.txt';
    // third parameter ts production or none
    $codeSnippets->register('snippets_top', $file1, true);
    $codeSnippets->register('snippets_bottom', $file2, true);
    $codeSnippets->register('snippets_middle', $file2, false);

    // Now we can read file contents to display it on web page
    // Second parameter is a defaults that will be displayed if file not exists or when it not production
    $result1 = $codeSnippets->get('snippets_top', '');
    $result2 = $codeSnippets->get('snippets_bottom', '');
    $result3 = $codeSnippets->get('snippets_middle', '');

```
