<?php

/*
 * (c)  Antonio J. García Lagar <aj@garcialagar.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * @author Antonio J. García Lagar <aj@garcialagar.es>
 */
class AcceptanceTest extends TestCase
{
    private $previousUnserializeCallback;

    protected function setUp(): void
    {
        $this->previousUnserializeCallback = ini_set('unserialize_callback_func', __CLASS__.'::handleUnserializeCallback');
    }

    protected function tearDown(): void
    {
        if (is_callable($this->previousUnserializeCallback)) {
            ini_set('unserialize_callback_func', $this->previousUnserializeCallback);
        }
    }

    public function testTokenWithRoleUnserialization(): void
    {
        $serializedToken = "C:74:\"Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken\":853:{a:3:{i:0;N;i:1;s:4:\"main\";i:2;a:5:{i:0;O:41:\"Symfony\Component\Security\Core\User\User\":8:{s:51:\"\0Symfony\Component\Security\Core\User\User\0username\";s:4:\"User\";s:51:\"\0Symfony\Component\Security\Core\User\User\0password\";s:6:\"foobar\";s:50:\"\0Symfony\Component\Security\Core\User\User\0enabled\";b:1;s:60:\"\0Symfony\Component\Security\Core\User\User\0accountNonExpired\";b:1;s:64:\"\0Symfony\Component\Security\Core\User\User\0credentialsNonExpired\";b:1;s:59:\"\0Symfony\Component\Security\Core\User\User\0accountNonLocked\";b:1;s:48:\"\0Symfony\Component\Security\Core\User\User\0roles\";a:1:{i:0;s:9:\"ROLE_USER\";}s:54:\"\0Symfony\Component\Security\Core\User\User\0extraFields\";a:0:{}}i:1;b:1;i:2;a:1:{i:0;O:41:\"Symfony\Component\Security\Core\Role\Role\":1:{s:47:\"\0Symfony\Component\Security\Core\Role\Role\0role\";s:9:\"ROLE_USER\";}}i:3;a:0:{}i:4;a:1:{i:0;s:9:\"ROLE_USER\";}}}}";
        $token = unserialize($serializedToken);
        $this->assertInstanceOf(TokenInterface::class, $token);
    }

    public function testTokenWithSwitchUserRoleUnserialization(): void
    {
        $serializedToken = "C:68:\"Symfony\Component\Security\Core\Authentication\Token\SwitchUserToken\":2162:{a:2:{i:0;C:74:\"Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken\":860:{a:3:{i:0;N;i:1;s:4:\"main\";i:2;a:5:{i:0;O:41:\"Symfony\Component\Security\Core\User\User\":8:{s:51:\"\0Symfony\Component\Security\Core\User\User\0username\";s:5:\"Admin\";s:51:\"\0Symfony\Component\Security\Core\User\User\0password\";s:6:\"foobar\";s:50:\"\0Symfony\Component\Security\Core\User\User\0enabled\";b:1;s:60:\"\0Symfony\Component\Security\Core\User\User\0accountNonExpired\";b:1;s:64:\"\0Symfony\Component\Security\Core\User\User\0credentialsNonExpired\";b:1;s:59:\"\0Symfony\Component\Security\Core\User\User\0accountNonLocked\";b:1;s:48:\"\0Symfony\Component\Security\Core\User\User\0roles\";a:1:{i:0;s:10:\"ROLE_ADMIN\";}s:54:\"\0Symfony\Component\Security\Core\User\User\0extraFields\";a:0:{}}i:1;b:1;i:2;a:1:{i:0;O:41:\"Symfony\Component\Security\Core\Role\Role\":1:{s:47:\"\0Symfony\Component\Security\Core\Role\Role\0role\";s:10:\"ROLE_ADMIN\";}}i:3;a:0:{}i:4;a:1:{i:0;s:10:\"ROLE_ADMIN\";}}}}i:1;a:3:{i:0;s:6:\"foobar\";i:1;s:4:\"main\";i:2;a:5:{i:0;O:41:\"Symfony\Component\Security\Core\User\User\":8:{s:51:\"\0Symfony\Component\Security\Core\User\User\0username\";s:4:\"User\";s:51:\"\0Symfony\Component\Security\Core\User\User\0password\";s:6:\"foobar\";s:50:\"\0Symfony\Component\Security\Core\User\User\0enabled\";b:1;s:60:\"\0Symfony\Component\Security\Core\User\User\0accountNonExpired\";b:1;s:64:\"\0Symfony\Component\Security\Core\User\User\0credentialsNonExpired\";b:1;s:59:\"\0Symfony\Component\Security\Core\User\User\0accountNonLocked\";b:1;s:48:\"\0Symfony\Component\Security\Core\User\User\0roles\";a:1:{i:0;s:9:\"ROLE_USER\";}s:54:\"\0Symfony\Component\Security\Core\User\User\0extraFields\";a:0:{}}i:1;b:1;i:2;a:2:{i:0;O:41:\"Symfony\Component\Security\Core\Role\Role\":1:{s:47:\"\0Symfony\Component\Security\Core\Role\Role\0role\";s:9:\"ROLE_USER\";}i:1;O:51:\"Symfony\Component\Security\Core\Role\SwitchUserRole\":3:{s:73:\"\0Symfony\Component\Security\Core\Role\SwitchUserRole\0deprecationTriggered\";b:0;s:59:\"\0Symfony\Component\Security\Core\Role\SwitchUserRole\0source\";r:3;s:47:\"\0Symfony\Component\Security\Core\Role\Role\0role\";s:19:\"ROLE_PREVIOUS_ADMIN\";}}i:3;a:0:{}i:4;a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:19:\"ROLE_PREVIOUS_ADMIN\";}}}}}";
        $token = unserialize($serializedToken);
        $this->assertInstanceOf(TokenInterface::class, $token);
    }

    public static function handleUnserializeCallback(string $class): void
    {
        self::fail('Class not found: '.$class);
    }
}
