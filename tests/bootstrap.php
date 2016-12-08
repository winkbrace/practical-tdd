<?php declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

define('CONFIG_PATH', __DIR__ . '/../config');
define('TESTS_PATH', __DIR__);

putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . TESTS_PATH . '/testdb.sqlite');

function reset_test_db()
{
    chdir(TESTS_PATH);
    copy('stubs/stub-testdb.sqlite', 'testdb.sqlite');
    chdir(TESTS_PATH . '/..');
}
reset_test_db();

// boot Laravel
require_once __DIR__ . '/../bootstrap/autoload.php';
