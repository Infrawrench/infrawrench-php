<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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
use Infrawrench\Sdk\Model\ReportNotification;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReportNotifications` */
final class CostReportNotificationsNamespace extends ApiNamespace
{
    /**
     * List every delivery schedule in the organization
     *
     * All reports' schedules in one call — what the CLI's schedules column reads. Schedules of
     * deleted reports are excluded.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-report-notifications
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ReportNotification>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-report-notifications',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ReportNotification => ReportNotification::fromArray(Coerce::toArray($item)));
    }
}
