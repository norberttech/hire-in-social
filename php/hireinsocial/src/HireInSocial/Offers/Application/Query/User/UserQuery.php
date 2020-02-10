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

namespace HireInSocial\Offers\Application\Query\User;

use HireInSocial\Component\CQRS\System\Query;
use HireInSocial\Offers\Application\Query\User\Model\User;

interface UserQuery extends Query
{
    public function findByFacebook(string $facebookUserAppId) : ?User;

    public function findByLinkedIn(string $linkedInUserAppId) : ?User;

    public function findById(string $id) : ?User;

    public function findByEmail(string $email) : ?User;
}
