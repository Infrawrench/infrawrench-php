<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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
use Infrawrench\Sdk\Model\AuditResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->auditLogs` */
final class AuditLogsNamespace extends ApiNamespace
{
    /**
     * List audit log entries (paginated, filterable)
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/audit-logs
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?int $page = null, ?int $pageSize = null, ?string $action = null, ?string $entityType = null, ?string $userId = null, ?string $apiKeyId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): AuditResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/audit-logs',
                pathParams: ['orgId' => $orgId],
                query: ['page' => $page, 'pageSize' => $pageSize, 'action' => $action, 'entityType' => $entityType, 'userId' => $userId, 'apiKeyId' => $apiKeyId, 'from' => $from, 'to' => $to],
            ),
            $options,
        );

        return AuditResponse::fromArray(Coerce::toArray($data));
    }
}
