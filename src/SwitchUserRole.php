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
class SwitchUserRole extends Role
{
    private $deprecationTriggered = false;
    private $source;

    /**
     * @throws \LogicException
     */
    public function getSource()
    {
        $this->throwLogicException();
    }
}
