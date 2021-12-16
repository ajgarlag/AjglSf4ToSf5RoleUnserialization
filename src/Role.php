<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Role;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Antonio J. García Lagar <aj@garcialagar.es>
 *
 * @internal
 * @final
 * @deprecated See https://github.com/symfony/symfony/pull/22048
 */
class Role
{
    private $role;

    /**
     * @throws \LogicException
     */
    public function __construct()
    {
        $this->throwLogicException();
    }

    /**
     * @throws \LogicException
     */
    protected function throwLogicException()
    {
        throw new \LogicException('This class exists only to prevent session unserialization errors when migrating from Symfony 4.4 to Symfony 5.');
    }

    /**
     * @throws \LogicException
     */
    public function getRole()
    {
        $this->throwLogicException();
    }

    /**
     * @throws \LogicException
     */
    public function __toString(): string
    {
        $this->throwLogicException();
    }
}
