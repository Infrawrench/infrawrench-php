<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class NetworkFlowReportEndpoint implements \JsonSerializable
{
    /** @param string $network The endpoint's VPC / network id, when the provider reports it. */
    public function __construct(
        public readonly string $ref,
        public readonly string $label,
        public readonly string $zone,
        public readonly string $region,
        public readonly string $service,
        public readonly string $resourceTypeId,
        public readonly string $network,
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
            network: Coerce::toString($data['network'] ?? null),
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
            'network' => $this->network,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
