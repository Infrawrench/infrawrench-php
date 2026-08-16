<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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
use Infrawrench\Sdk\Model\DigestEmailRecipient;
use Infrawrench\Sdk\Model\DigestEmailRecipientCreate;
use Infrawrench\Sdk\Model\DigestEmailRecipientList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->digest->recipients` */
final class DigestRecipientsNamespace extends ApiNamespace
{
    /**
     * Add a digest email recipient
     *
     * Adding an address the organization already has is a no-op that returns the existing entry,
     * so a double submit cannot double-deliver.
     *
     * POST /api/org/{orgId}/digest/recipients
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?DigestEmailRecipientCreate $body = null, ?RequestOptions $options = null): DigestEmailRecipient
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/digest/recipients',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DigestEmailRecipient::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove a digest email recipient
     *
     * DELETE /api/org/{orgId}/digest/recipients/{recipientId}
     *
     * Raises on 404: Not found
     *
     * @param string $recipientId Recipient id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $recipientId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/digest/recipients/{recipientId}',
                pathParams: ['orgId' => $orgId, 'recipientId' => $recipientId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List the organization's digest email recipients
     *
     * Email is a digest-only transport, so its destinations are an organization-level address list
     * rather than a per-channel trigger. Addresses need not belong to Infrawrench users — a
     * finance alias is a valid recipient.
     *
     * GET /api/org/{orgId}/digest/recipients
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): DigestEmailRecipientList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/digest/recipients',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DigestEmailRecipientList::fromArray(Coerce::toArray($data));
    }
}
