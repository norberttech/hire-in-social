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

namespace HireInSocial\Offers\Application\Query\Offer\Model\Offer;

use HireInSocial\Offers\Application\Query\Offer\Model\Offer\Description\Requirements;

final class Description
{
    /**
     * @var string
     */
    private $benefits;

    /**
     * @var Requirements
     */
    private $requirements;

    public function __construct(string $benefits, Requirements $requirements)
    {
        $this->benefits = $benefits;
        $this->requirements = $requirements;
    }

    public function requirements() : Requirements
    {
        return $this->requirements;
    }

    public function benefits() : string
    {
        return $this->benefits;
    }
}
