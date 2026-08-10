<?php

/*
 * infrawrench/sdk v1.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.4.0).
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

final class CreatePricingRequest implements \JsonSerializable
{
    /** @param list<array{id: string, vcpus: float, memoryMb: float}> $sizes */
    public function __construct(
        public readonly string $accountId,
        public readonly string $resourceTypeId,
        public readonly array $sizes,
        public readonly ?string $regionId = null,
        public readonly ?string $pluginId = null,
        public readonly ?string $parentResourceId = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            sizes: Coerce::mapList($data['sizes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            regionId: Coerce::toStringOrNull($data['regionId'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            parentResourceId: Coerce::toStringOrNull($data['parentResourceId'] ?? null),
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
            'accountId' => $this->accountId,
            'resourceTypeId' => $this->resourceTypeId,
            'sizes' => $this->sizes,
        ];
        if ($this->regionId !== null) {
            $payload['regionId'] = $this->regionId;
        }
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->parentResourceId !== null) {
            $payload['parentResourceId'] = $this->parentResourceId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
