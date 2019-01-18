## Dependencies

### alice / faker

```bash
composer require --dev nelmio/alice
```

### phpcs

```bash
composer require --dev "squizlabs/php_codesniffer=*"
```

https://raw.githubusercontent.com/tentacode/el-professor/master/.phpcs.xml

### phpstan

```bash
composer require --dev phpstan/phpstan
```

### security check

```bash
composer require sensiolabs/security-checker
bin/security-checker security:check
```

### phpspec

```bash
composer require phpspec/phpspec
```

https://github.com/tentacode/el-professor/blob/master/.phpspec.yml

### behat

```bash
composer require --dev behat/behat
bin/behat --init
```

Mink :

```bash
composer require --dev behat/mink
composer require --dev behat/mink-extension
composer require --dev behat/mink-browserkit-driver
composer require --dev behat/mink-goutte-driver
```


https://github.com/tentacode/el-professor/blob/master/behat.yml.dist

### travis

https://github.com/tentacode/el-professor/blob/master/.travis.yml