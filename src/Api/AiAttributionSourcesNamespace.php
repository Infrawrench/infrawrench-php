<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
use Infrawrench\Sdk\Model\AiRequestSource;
use Infrawrench\Sdk\Model\AiRequestSourceInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->aiAttribution->sources` */
final class AiAttributionSourcesNamespace extends ApiNamespace
{
    /**
     * Add a request-log source
     *
     * Governed by `org:settings:write`: a source authorizes a daily read of the org's request
     * logs, and the Bedrock CloudWatch kind runs a Logs Insights query billed to the org's own AWS
     * account per GB scanned. Audit-logged.
     *
     * POST /api/org/{orgId}/ai-attribution/sources
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(AiRequestSourceInput $body, ?string $orgId = null, ?RequestOptions $options = null): AiRequestSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ai-attribution/sources',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AiRequestSource::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a request-log source
     *
     * DELETE /api/org/{orgId}/ai-attribution/sources/{id}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ai-attribution/sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List request-log sources
     *
     * GET /api/org/{orgId}/ai-attribution/sources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{sources: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/sources',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Read one request-log source
     *
     * GET /api/org/{orgId}/ai-attribution/sources/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdAiAttributionSourcesId(string $id, ?string $orgId = null, ?RequestOptions $options = null): AiRequestSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return AiRequestSource::fromArray(Coerce::toArray($data));
    }

    /**
     * Re-read a source's history from a day
     *
     * Aggregates keep only mapped metadata keys, so a newly mapped dimension reaches history only
     * by re-reading it. Clamped to the source kind's history limit.
     *
     * POST /api/org/{orgId}/ai-attribution/sources/{id}/recollect
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param array{from: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function recollect(string $id, array $body, ?string $orgId = null, ?RequestOptions $options = null): AiRequestSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ai-attribution/sources/{id}/recollect',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return AiRequestSource::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a request-log source
     *
     * Pointing a source at a different location restarts its collection history.
     *
     * PUT /api/org/{orgId}/ai-attribution/sources/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, AiRequestSourceInput $body, ?string $orgId = null, ?RequestOptions $options = null): AiRequestSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ai-attribution/sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AiRequestSource::fromArray(Coerce::toArray($data));
    }
}
