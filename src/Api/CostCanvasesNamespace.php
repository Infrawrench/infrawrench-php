<?php

/*
 * infrawrench/sdk v1.55.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.55.0).
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
use Infrawrench\Sdk\Model\CostCanvas;
use Infrawrench\Sdk\Model\CostCanvasDraftInput;
use Infrawrench\Sdk\Model\CostCanvasInput;
use Infrawrench\Sdk\Model\CostCanvasRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costCanvases` */
final class CostCanvasesNamespace extends ApiNamespace
{
    /** `$client->costCanvases->notifications` */
    public readonly CostCanvasesNotificationsNamespace $notifications;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->notifications = new CostCanvasesNotificationsNamespace($this->transport);
    }

    /**
     * Open the caller's editing conversation for a canvas
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-canvases/{id}/conversation
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{model?: string, fresh?: bool}|null $body
     * @return array{conversationId: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function conversation(string $id, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases/{id}/conversation',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Create a cost canvas from a spec
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-canvases
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostCanvasInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvas
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostCanvas::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost canvas
     *
     * Soft delete. Its dashboard cards and delivery schedules go with it.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-canvases/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/cost-canvases/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Start a canvas from a description
     *
     * Creates an empty canvas and a chat conversation linked to it. Send `prompt` as the
     * conversation's first message (`POST /chat/conversations/{id}/messages`); the agent writes
     * the spec. Needs `chat:write` as well as `costs:write`.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-canvases/draft
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function draft(CostCanvasDraftInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvas
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases/draft',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostCanvas::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a cost canvas
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-canvases/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostCanvas
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-canvases/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostCanvas::fromArray(Coerce::toArray($data));
    }

    /**
     * List cost canvases
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-canvases
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostCanvas>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-canvases',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostCanvas => CostCanvas::fromArray(Coerce::toArray($item)));
    }

    /**
     * Export a cost canvas as a PDF
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-canvases/{id}/pdf
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $tz IANA zone the document's generated-at line is written in, e.g. `Europe/Berlin`. UTC when absent or unknown.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function pdf(string $id, ?string $orgId = null, ?string $tz = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-canvases/{id}/pdf',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['tz' => $tz],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Run an unsaved canvas spec
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/cost-canvases/preview
     *
     * Raises on 400: Bad request
     *
     * @param array{spec: array<string, mixed>, name?: string, includeChartData?: bool} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(array $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvasRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases/preview',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return CostCanvasRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Run (refresh) a cost canvas
     *
     * Re-executes every block's query. Deterministic; no model call.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/cost-canvases/{id}/run
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{includeChartData?: bool}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): CostCanvasRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return CostCanvasRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a cost canvas
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-canvases/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostCanvasInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvas
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-canvases/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostCanvas::fromArray(Coerce::toArray($data));
    }
}
