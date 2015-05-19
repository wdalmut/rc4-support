# RC4 support

RC4 implementation for PHP

## Usage

```php
<?php

$rc4 = new RC4("some-super-secret-key");

// Use __invoke magic function
echo $rc4("something-to-obfuscate") . PHP_EOL;

// Or use a direct method
echo $rc4->rc4("something-to-obfuscate") . PHP_EOL;
```

## Tests

Just run them

```sh
./vendor/bin/phpunit tests
```

