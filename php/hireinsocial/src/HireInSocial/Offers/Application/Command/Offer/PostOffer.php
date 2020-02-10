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

namespace HireInSocial\Offers\Application\Command\Offer;

use HireInSocial\Component\CQRS\System\Command;
use HireInSocial\Offers\Application\Command\ClassCommand;
use HireInSocial\Offers\Application\Command\Offer\Offer\Offer;

final class PostOffer implements Command
{
    use ClassCommand;

    /**
     * @var string
     */
    private $offerId;

    /**
     * @var string
     */
    private $specialization;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var Offer
     */
    private $offer;

    /**
     * @var string|null
     */
    private $offerPDFPath;

    public function __construct(
        string $offerId,
        string $specialization,
        string $locale,
        string $userId,
        Offer $offer,
        ?string $offerPDFPath = null
    ) {
        $this->userId = $userId;
        $this->offer = $offer;
        $this->locale = $locale;
        $this->specialization = $specialization;
        $this->offerPDFPath = $offerPDFPath;
        $this->offerId = $offerId;
    }

    public function offerId() : string
    {
        return $this->offerId;
    }

    public function specialization() : string
    {
        return $this->specialization;
    }

    public function locale() : string
    {
        return $this->locale;
    }

    public function userId() : string
    {
        return $this->userId;
    }

    public function offer() : Offer
    {
        return $this->offer;
    }

    public function offerPDFPath() : ?string
    {
        return $this->offerPDFPath;
    }
}
