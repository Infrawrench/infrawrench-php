<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class NetworkFlowEndpoint implements \JsonSerializable
{
    /**
     * @param string $ref Stable endpoint identity — a provider resource id where one could be resolved, otherwise a class token (`internet`, `aws:s3`, `infrawrench:unattributed`). Never a raw IP address: addresses churn, so the same workload would be a different row every day.
     * @param string $resourceTypeId Set when `ref` is a resource this organization syncs, so the row can link out.
     */
    public function __construct(
        public readonly string $ref,
        public readonly string $label,
        public readonly string $zone,
        public readonly string $region,
        public readonly string $service,
        public readonly string $resourceTypeId,
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
            ref: Coerce::toString($data['ref'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            zone: Coerce::toString($data['zone'] ?? null),
            region: Coerce::toString($data['region'] ?? null),
            service: Coerce::toString($data['service'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'ref' => $this->ref,
            'label' => $this->label,
            'zone' => $this->zone,
            'region' => $this->region,
            'service' => $this->service,
            'resourceTypeId' => $this->resourceTypeId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
