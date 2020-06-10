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

namespace ITOffers\Component\Mailer;

use ArrayObject;

final class Attachments extends ArrayObject
{
    public function __construct(Attachment ...$attachments)
    {
        parent::__construct($attachments);
    }
}
