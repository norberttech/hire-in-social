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

namespace ITOffers\Offers\Application\Command\Specialization;

use ITOffers\Component\CQRS\System\Handler;
use ITOffers\Offers\Application\Specialization\Specialization;
use ITOffers\Offers\Application\Specialization\Specializations;

final class CreateSpecializationHandler implements Handler
{
    private Specializations $specializations;

    public function __construct(Specializations $specializations)
    {
        $this->specializations = $specializations;
    }

    public function handles() : string
    {
        return CreateSpecialization::class;
    }

    public function __invoke(CreateSpecialization $command) : void
    {
        $this->specializations->add(new Specialization($command->slug()));
    }
}
