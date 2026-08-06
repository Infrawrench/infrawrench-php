<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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
use Infrawrench\Sdk\Model\AttachRequest;
use Infrawrench\Sdk\Model\CreateConfigRequest;
use Infrawrench\Sdk\Model\CreateCostEstimateRequest;
use Infrawrench\Sdk\Model\CreatePricingRequest;
use Infrawrench\Sdk\Model\CreateResourceRequest;
use Infrawrench\Sdk\Model\CreateResourceResponse;
use Infrawrench\Sdk\Model\CredentialExport;
use Infrawrench\Sdk\Model\DescribeRequest;
use Infrawrench\Sdk\Model\DescribeResponse;
use Infrawrench\Sdk\Model\ExportCredentialRequest;
use Infrawrench\Sdk\Model\FieldActionRequest;
use Infrawrench\Sdk\Model\FieldActionResponse;
use Infrawrench\Sdk\Model\ImportYamlRequest;
use Infrawrench\Sdk\Model\InvokeActionRequest;
use Infrawrench\Sdk\Model\LogsRequest;
use Infrawrench\Sdk\Model\LogsResponse;
use Infrawrench\Sdk\Model\MetricsRequest;
use Infrawrench\Sdk\Model\MetricsResponse;
use Infrawrench\Sdk\Model\NoSqlCommandRequest;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\PeerPane;
use Infrawrench\Sdk\Model\PeerPanesRequest;
use Infrawrench\Sdk\Model\PickerResource;
use Infrawrench\Sdk\Model\PickerResourcesRequest;
use Infrawrench\Sdk\Model\PluginId;
use Infrawrench\Sdk\Model\ResourceDetail;
use Infrawrench\Sdk\Model\ResourceTypeId;
use Infrawrench\Sdk\Model\UpdateResourceRequest;
use Infrawrench\Sdk\Model\UpdateResourceResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->resources` */
final class ResourcesNamespace extends ApiNamespace
{
    /** `$client->resources->manifest` */
    public readonly ResourcesManifestNamespace $manifest;

    /** `$client->resources->secretVersions` */
    public readonly ResourcesSecretVersionsNamespace $secretVersions;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->manifest = new ResourcesManifestNamespace($this->transport);
        $this->secretVersions = new ResourcesSecretVersionsNamespace($this->transport);
    }

    /**
     * Attach a resource onto another (e.g. disk → VM)
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/attach
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function attach(AttachRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/attach',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Create a new resource via its plugin
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/create
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 422: Blocked by the organization's tag policy: the submitted fields are missing a
     * required tag (or carry a disallowed value). Retry with the `x-tag-policy-override: true`
     * header if you hold `tag-policy:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CreateResourceRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CreateResourceResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/create',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CreateResourceResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Get the dynamic create form for a resource type
     *
     * Calls the plugin's `getCreateConfig`. The returned `CreateResourceConfig` is plugin-shaped —
     * see `JsonObject`.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/create-config
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, mixed>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function createConfig(CreateConfigRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/create-config',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Cost estimate for the current create form values
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/create-cost-estimate
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{estimate: array<string, mixed>|null}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function createCostEstimate(CreateCostEstimateRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/create-cost-estimate',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Pricing per size for a create form
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/create-pricing
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, array<string, mixed>>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function createPricing(CreatePricingRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/create-pricing',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapValues($data, static fn (mixed $item): array => Coerce::toArray($item));
    }

    /**
     * Delete a resource via the plugin
     *
     * _Requires permission: `resources:delete`._
     *
     * DELETE /api/org/{orgId}/resources/{pluginId}/{typeId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $pluginId, string $typeId, string $resourceId, string $accountId, ?string $orgId = null, ?string $parentResourceId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                query: ['resourceId' => $resourceId, 'accountId' => $accountId, 'parentResourceId' => $parentResourceId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get human-readable describe text for a resource
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/describe
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function describe(string $pluginId, string $typeId, DescribeRequest $body, ?string $orgId = null, ?RequestOptions $options = null): DescribeResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/describe',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DescribeResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Full resource detail page payload
     *
     * Performs a live `listResources` against the provider, falls back to DB on failure, and
     * returns the plugin's `renderDetail` schema plus host-derived flags (SQL/KV/SSH availability,
     * child resources, peer panes, etc).
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resources/{pluginId}/{typeId}/detail
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'true'|'false'|null $includePeerPanes Default true. If false, peer panes are returned as stubs.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function detail(string $pluginId, string $typeId, string $resourceId, ?string $orgId = null, ?string $accountId = null, ?string $parentResourceId = null, ?string $includePeerPanes = null, ?RequestOptions $options = null): ResourceDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/detail',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                query: ['resourceId' => $resourceId, 'accountId' => $accountId, 'parentResourceId' => $parentResourceId, 'includePeerPanes' => $includePeerPanes],
            ),
            $options,
        );

        return ResourceDetail::fromArray(Coerce::toArray($data));
    }

    /**
     * Export a credential file for a resource (one-time reveal)
     *
     * _Requires permission: `secrets:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/export-credential
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function exportCredential(string $pluginId, string $typeId, ExportCredentialRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CredentialExport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/export-credential',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CredentialExport::fromArray(Coerce::toArray($data));
    }

    /**
     * Execute an in-form field action (e.g. generate an IAM role)
     *
     * Calls the plugin's `executeFieldAction`. Returns `{ value }` to assign to the field; for
     * `select` fields the optional `option` should be spliced into the options list so the new
     * value can be displayed.
     *
     * POST /api/org/{orgId}/resources/field-action
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function fieldAction(FieldActionRequest $body, ?string $orgId = null, ?RequestOptions $options = null): FieldActionResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/field-action',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return FieldActionResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Bulk-import resources from YAML (kubectl apply -f equivalent)
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/import-yaml
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, mixed>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function importYaml(string $pluginId, ImportYamlRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/import-yaml',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Invoke a plugin-defined action on a resource
     *
     * Actions the plugin marks `destructive: true` in its detail schema are blocked with `423`
     * while an org change freeze is in effect.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/invoke-action
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function invokeAction(InvokeActionRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/invoke-action',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Fetch logs for a resource
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/logs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function logs(string $pluginId, string $typeId, LogsRequest $body, ?string $orgId = null, ?RequestOptions $options = null): LogsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/logs',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return LogsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Fetch metric series for a resource
     *
     * Historical points from the metrics store when the resource has accumulated any (resources
     * pinned to a dashboard are polled continuously); otherwise the series are fetched live from
     * the provider on demand.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/metrics
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function metrics(string $pluginId, string $typeId, MetricsRequest $body, ?string $orgId = null, ?RequestOptions $options = null): MetricsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/metrics',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MetricsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a NoSQL document-browser command (e.g. MongoDB shell)
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/resources/nosql-command
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{result: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function nosqlCommand(NoSqlCommandRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/nosql-command',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Lazy-fetch peer-integration panes for a resource
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/peer-panes
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PeerPane>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function peerPanes(string $pluginId, string $typeId, PeerPanesRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/peer-panes',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PeerPane => PeerPane::fromArray(Coerce::toArray($item)));
    }

    /**
     * Fetch options for a `resource-picker` field
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resources/picker-resources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PickerResource>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function pickerResources(PickerResourcesRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/picker-resources',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PickerResource => PickerResource::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a resource via its plugin
     *
     * Applies the supplied field changes upstream and persists the refreshed fields/display name
     * to the DB. The body's `fields` map only carries the keys the caller actually changed.
     * Blocked with `423` while an org change freeze is in effect (this is also the path that
     * applies right-sizing recommendations); every applied update is audit-logged.
     *
     * POST /api/org/{orgId}/resources/update
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(UpdateResourceRequest $body, ?string $orgId = null, ?RequestOptions $options = null): UpdateResourceResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/update',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return UpdateResourceResponse::fromArray(Coerce::toArray($data));
    }
}
