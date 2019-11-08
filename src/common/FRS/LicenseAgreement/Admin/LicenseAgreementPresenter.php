<?php
/**
 * Copyright (c) Enalean, 2019-Present. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);

namespace Tuleap\FRS\LicenseAgreement\Admin;

use Tuleap\FRS\LicenseAgreement\LicenseAgreementInterface;

/**
 * @psalm-immutable
 */
class LicenseAgreementPresenter
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $url;
    /**
     * @var bool
     */
    public $can_edit;

    public function __construct(\Project $project, LicenseAgreementInterface $license_agreement)
    {
        $this->id    = $license_agreement->getId();
        $this->title = $license_agreement->getTitle();
        $this->url   = EditLicenseAgreementController::getUrl($project, $license_agreement);
        $this->can_edit = $license_agreement->isModifiable();
    }
}