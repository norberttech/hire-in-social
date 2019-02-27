<?php

declare(strict_types=1);

/*
 * This file is part of the Hire in Social project.
 *
 * (c) Norbert Orzechowicz <norbert@orzechowicz.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Functional;

use function App\symfony;
use function HireInSocial\bootstrap;
use function HireInSocial\dbal;
use function HireInSocial\system;
use HireInSocial\Application\System;
use HireInSocial\Application\Config;
use HireInSocial\Tests\Application\Context\DatabaseContext;
use HireInSocial\Tests\Application\Context\ThrottleContext;
use App\SymfonyKernel;
use Predis\Client;

class WebTestCase extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
    protected static $config;
    protected static $system;

    /**
     * @var \HireInSocial\Tests\Application\Context\SystemContext
     */
    protected $systemContext;

    /**
     * @var DatabaseContext
     */
    protected $databaseContext;

    /**
     * @var ThrottleContext
     */
    protected $throttleContext;

    protected static function getKernelClass()
    {
        return SymfonyKernel::class; // TODO: Change the autogenerated stub
    }

    protected static function createKernel(array $options = [])
    {
        return symfony(static::config(), static::system());
    }

    protected static function config() : Config
    {
        if (!static::$config) {
            static::$config = bootstrap(ROOT_DIR);
        }

        if (static::$config->getString(Config::ENV) !== 'test') {
            throw new \RuntimeException(sprintf('Expected environment "test" but got "%s"', static::$config->getString(Config::ENV)));
        }

        return static::$config;
    }

    protected static function system() : System
    {
        if (!static::$system) {
            static::$system = system(static::config());
        }

        return static::$system;
    }

    public function setUp()
    {
        $config = static::config();

        $this->systemContext = new \HireInSocial\Tests\Application\Context\SystemContext(static::system());
        $this->databaseContext = new DatabaseContext(dbal($config));
        $this->throttleContext = new ThrottleContext(new Client($config->getString(Config::REDIS_DSN)));

        $this->databaseContext->purgeDatabase();
        $this->throttleContext->purgeThrottles();
    }
}
