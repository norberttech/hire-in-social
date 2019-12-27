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

namespace HireInSocial\Application\Command\Specialization;

use HireInSocial\Application\Command\ClassCommand;
use HireInSocial\Application\System\Command;

class RemoveFacebookChannel implements Command
{
    use ClassCommand;

    /**
     * @var string
     */
    private $specSlug;

    public function __construct(string $specSlug)
    {
        $this->specSlug = $specSlug;
    }

    public function specSlug() : string
    {
        return $this->specSlug;
    }
}
