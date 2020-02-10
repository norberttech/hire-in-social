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

namespace HireInSocial\Offers\Application\Command\User;

use HireInSocial\Component\CQRS\System\Command;
use HireInSocial\Offers\Application\Command\ClassCommand;

final class AddExtraOffers implements Command
{
    use ClassCommand;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var int
     */
    private $count;

    /**
     * @var int
     */
    private $expiresInDays;

    public function __construct(string $userId, int $count, int $expiresInDays)
    {
        $this->userId = $userId;
        $this->count = $count;
        $this->expiresInDays = $expiresInDays;
    }

    /**
     * @return string
     */
    public function userId() : string
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function expiresInDays() : int
    {
        return $this->expiresInDays;
    }
}
