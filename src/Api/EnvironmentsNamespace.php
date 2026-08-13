<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\EnvironmentCaptureDraft;
use Infrawrench\Sdk\Model\EnvironmentCaptureRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->environments` */
final class EnvironmentsNamespace extends ApiNamespace
{
    /** `$client->environments->instances` */
    public readonly EnvironmentsInstancesNamespace $instances;

    /** `$client->environments->settings` */
    public readonly EnvironmentsSettingsNamespace $settings;

    /** `$client->environments->templates` */
    public readonly EnvironmentsTemplatesNamespace $templates;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->instances = new EnvironmentsInstancesNamespace($this->transport);
        $this->settings = new EnvironmentsSettingsNamespace($this->transport);
        $this->templates = new EnvironmentsTemplatesNamespace($this->transport);
    }

    /**
     * Preview a template capture
     *
     * Turn a selection of live resources into a draft template. **Persists nothing** — the editor
     * shows the draft so the user can choose which fields to vary before saving. The shape of
     * every member comes from the plugin's own `getCreateConfig`: a captured value with no
     * matching create field is dropped, and a resource type the plugin cannot create is reported
     * in `skipped` with a reason rather than silently omitted. Recorded output references whose
     * target is also in the selection are preserved as `output` field values; a value that is
     * exactly another selected resource's external id becomes a `member-id`.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/environments/capture
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function capture(?string $orgId = null, ?EnvironmentCaptureRequest $body = null, ?RequestOptions $options = null): EnvironmentCaptureDraft
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/environments/capture',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentCaptureDraft::fromArray(Coerce::toArray($data));
    }
}
