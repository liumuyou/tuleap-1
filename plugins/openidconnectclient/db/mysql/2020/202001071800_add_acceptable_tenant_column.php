<?php
/**
 * Copyright (c) Enalean, 2020-Present. All Rights Reserved.
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
 */

declare(strict_types=1);

// phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace,Squiz.Classes.ValidClassName.NotCamelCaps
final class b202001071800_add_acceptable_tenant_column extends ForgeUpgrade_Bucket
{
    public function description(): string
    {
        return 'Add column acceptable_tenant_auth_identifier to the plugin_openidconnectclient_provider_azure_ad table';
    }

    public function preUp(): void
    {
        $this->db = $this->getApi('ForgeUpgrade_Bucket_Db');
    }

    public function up(): void
    {
        if ($this->db->columnNameExists('plugin_openidconnectclient_provider_azure_ad', 'acceptable_tenant_auth_identifier')) {
            return;
        }

        $sql = 'ALTER TABLE plugin_openidconnectclient_provider_azure_ad
                ADD COLUMN acceptable_tenant_auth_identifier VARCHAR(32) NOT NULL DEFAULT "tenant_specific"';
        if ($this->db->dbh->exec($sql) === false) {
            throw new ForgeUpgrade_Bucket_Exception_UpgradeNotComplete(
                'An error occurred while adding column acceptable_tenant_auth_identifier to the plugin_openidconnectclient_provider_azure_ad table'
            );
        }

        $sql = 'ALTER TABLE plugin_openidconnectclient_provider_azure_ad
                ALTER acceptable_tenant_auth_identifier DROP DEFAULT';
        if ($this->db->dbh->exec($sql) === false) {
            throw new ForgeUpgrade_Bucket_Exception_UpgradeNotComplete(
                'An error occurred while removing the default value of the column acceptable_tenant_auth_identifier of the plugin_openidconnectclient_provider_azure_ad table'
            );
        }
    }
}
