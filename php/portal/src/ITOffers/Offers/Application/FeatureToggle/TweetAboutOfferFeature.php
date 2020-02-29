<?php

declare(strict_types=1);

/*
 * This file is part of the itoffers.online project.
 *
 * (c) Norbert Orzechowicz <norbert@orzechowicz.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ITOffers\Offers\Application\FeatureToggle;

use ITOffers\Component\CQRS\System\Command;
use ITOffers\Component\FeatureToggle\Feature;
use ITOffers\Offers\Application\Command\Twitter\TweetAboutOffer;

final class TweetAboutOfferFeature implements Feature
{
    public const NAME = 'tweet_about_offer';

    private bool $enabled;

    public function __construct(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    public function isEnabled() : bool
    {
        return $this->enabled;
    }

    public function name() : string
    {
        return self::NAME;
    }

    public function isRelatedTo(Command $command) : bool
    {
        return \get_class($command) === TweetAboutOffer::class;
    }
}
