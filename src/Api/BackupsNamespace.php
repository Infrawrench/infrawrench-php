<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\BackupCoverageResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->backups` */
final class BackupsNamespace extends ApiNamespace
{
    /** `$client->backups->policies` */
    public readonly BackupsPoliciesNamespace $policies;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->policies = new BackupsPoliciesNamespace($this->transport);
    }

    /**
     * List backup coverage across synced resources
     *
     * What protects the organization's stateful resources, what does not, and which backups
     * protect nothing. Derived from already-synced inventory using the `backupRole` and
     * `backupPolicy` declarations plugins carry on their resource types — no provider API calls
     * are made and results reflect the last sync. Findings are recomputed on every read rather
     * than stored. Orphaned backups carry a trailing-30-day spend quote when billing data is
     * available.
     *
     * GET /api/org/{orgId}/backups
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): BackupCoverageResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/backups',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return BackupCoverageResponse::fromArray(Coerce::toArray($data));
    }
}
