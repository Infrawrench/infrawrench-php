<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

final class LogStreamSelector implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id of the stream to tail — or, for a sidecar stream, the peer plugin's own resource id (not a stored row).
     * @param PluginId::* $pluginId
     * @param string|null $parentResourceId Set for sidecar streams (e.g. a pod inside a managed cluster): the stored parent resource whose outputs mint the peer plugin's credentials. The logs endpoint routes through the peer client when present.
     * @param string|null $container Container to fetch when the resource has more than one; omit for the default.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly ?string $parentResourceId = null,
        public readonly ?string $container = null,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            parentResourceId: Coerce::toStringOrNull($data['parentResourceId'] ?? null),
            container: Coerce::toStringOrNull($data['container'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
        ];
        if ($this->parentResourceId !== null) {
            $payload['parentResourceId'] = $this->parentResourceId;
        }
        if ($this->container !== null) {
            $payload['container'] = $this->container;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
