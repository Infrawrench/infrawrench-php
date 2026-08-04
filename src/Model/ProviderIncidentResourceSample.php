<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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

final class ProviderIncidentResourceSample implements \JsonSerializable
{
    /**
     * @param string $id Resource id.
     * @param string|null $region The resource's region field, when it has one.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly string $resourceTypeId,
        public readonly ?string $region = null,
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
            id: Coerce::toString($data['id'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
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
            'id' => $this->id,
            'displayName' => $this->displayName,
            'resourceTypeId' => $this->resourceTypeId,
        ];
        if ($this->region !== null) {
            $payload['region'] = $this->region;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
