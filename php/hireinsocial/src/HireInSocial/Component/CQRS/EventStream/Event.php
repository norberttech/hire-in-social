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

namespace HireInSocial\Component\CQRS\EventStream;

use Ramsey\Uuid\UuidInterface;

interface Event
{
    public function id() : UuidInterface;

    public function occurredAt() : \DateTimeImmutable;

    public function payload() : array;
}
