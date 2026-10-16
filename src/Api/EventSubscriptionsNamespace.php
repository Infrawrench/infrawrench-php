<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\EventSubscription;
use Infrawrench\Sdk\Model\EventSubscriptionInput;
use Infrawrench\Sdk\Model\EventSubscriptionOptions;
use Infrawrench\Sdk\Model\EventSubscriptionWithSecret;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->eventSubscriptions` */
final class EventSubscriptionsNamespace extends ApiNamespace
{
    /** `$client->eventSubscriptions->deliveries` */
    public readonly EventSubscriptionsDeliveriesNamespace $deliveries;

    /** `$client->eventSubscriptions->get` */
    public readonly EventSubscriptionsGetNamespace $get;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->deliveries = new EventSubscriptionsDeliveriesNamespace($this->transport);
        $this->get = new EventSubscriptionsGetNamespace($this->transport);
    }

    /**
     * List event types and their payload schemas
     *
     * Every event a subscription can receive, with the JSON Schema of its `data`.
     *
     * GET /api/org/{orgId}/event-subscriptions/catalog
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{eventTypes: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function catalog(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/event-subscriptions/catalog',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Create an event subscription
     *
     * Returns the signing secret once. Responds 403 when the filters include cost events and the
     * caller lacks costs:read, 409 at the per-org limit.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/event-subscriptions
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?EventSubscriptionInput $body = null, ?RequestOptions $options = null): EventSubscriptionWithSecret
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/event-subscriptions',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EventSubscriptionWithSecret::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an event subscription
     *
     * Its delivery log goes with it.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/event-subscriptions/{id}
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
                path: '/api/org/{orgId}/event-subscriptions/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Picker options for the subscription form
     *
     * Connected accounts, environment values seen on resource tags, and every resource that can
     * receive events.
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/event-subscriptions/options
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function options(?string $orgId = null, ?RequestOptions $options = null): EventSubscriptionOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/event-subscriptions/options',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return EventSubscriptionOptions::fromArray(Coerce::toArray($data));
    }

    /**
     * Reroll a webhook signing secret
     *
     * Returns the new secret once. The previous secret keeps signing (a second v1 in the signature
     * header) for 24 hours.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/event-subscriptions/{id}/reroll-secret
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rerollSecret(string $id, ?string $orgId = null, ?RequestOptions $options = null): EventSubscriptionWithSecret
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/event-subscriptions/{id}/reroll-secret',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return EventSubscriptionWithSecret::fromArray(Coerce::toArray($data));
    }

    /**
     * Send a test event
     *
     * Sends an `infrawrench.test` event and returns the attempt. Tried once, never retried, and
     * not counted toward auto-disable. Works on a disabled subscription.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/event-subscriptions/{id}/test
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{delivery: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function test(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/event-subscriptions/{id}/test',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Replace an event subscription
     *
     * Whole-object update. The destination kind cannot change. Re-enabling a subscription that was
     * turned off automatically clears its failure history.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/event-subscriptions/{id}
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
    public function update(string $id, ?string $orgId = null, ?EventSubscriptionInput $body = null, ?RequestOptions $options = null): EventSubscription
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/event-subscriptions/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EventSubscription::fromArray(Coerce::toArray($data));
    }
}
