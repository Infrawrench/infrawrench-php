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

/**
 * Lists AND-compose; values within a list OR. An absent or empty list does not filter. Without
 * `accountIds`, Kubernetes cluster traffic is left out (it re-cuts bytes a cloud flow log already
 * counts); naming a cluster's account includes it.
 */
final class NetworkFlowReportFilters implements \JsonSerializable
{
    /**
     * @param list<string>|null $accountIds
     * @param list<string>|null $networks VPC / network ids, matched at either end.
     * @param list<string>|null $regions Provider regions, matched at either end.
     * @param list<string>|null $zones Availability zone ids, matched at either end.
     * @param list<string>|null $sourceRefs Source endpoint refs, as `report-options` lists them.
     * @param list<string>|null $destinationRefs Destination endpoint refs, as `report-options` lists them.
     * @param list<string>|null $services The peer's provider service (`s3`, `dynamodb`).
     * @param list<string>|null $resourceTypes The peer's resource type id.
     * @param list<NetworkFlowTrafficClass::*>|null $trafficClasses
     * @param list<'egress'|'ingress'>|null $directions
     */
    public function __construct(
        public readonly ?array $accountIds = null,
        public readonly ?array $networks = null,
        public readonly ?array $regions = null,
        public readonly ?array $zones = null,
        public readonly ?array $sourceRefs = null,
        public readonly ?array $destinationRefs = null,
        public readonly ?array $services = null,
        public readonly ?array $resourceTypes = null,
        public readonly ?array $trafficClasses = null,
        public readonly ?array $directions = null,
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
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            networks: Coerce::nullable($data['networks'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            regions: Coerce::nullable($data['regions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            zones: Coerce::nullable($data['zones'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            sourceRefs: Coerce::nullable($data['sourceRefs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            destinationRefs: Coerce::nullable($data['destinationRefs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            services: Coerce::nullable($data['services'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            resourceTypes: Coerce::nullable($data['resourceTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            trafficClasses: Coerce::nullable($data['trafficClasses'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            directions: Coerce::nullable($data['directions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        ];
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }
        if ($this->networks !== null) {
            $payload['networks'] = $this->networks;
        }
        if ($this->regions !== null) {
            $payload['regions'] = $this->regions;
        }
        if ($this->zones !== null) {
            $payload['zones'] = $this->zones;
        }
        if ($this->sourceRefs !== null) {
            $payload['sourceRefs'] = $this->sourceRefs;
        }
        if ($this->destinationRefs !== null) {
            $payload['destinationRefs'] = $this->destinationRefs;
        }
        if ($this->services !== null) {
            $payload['services'] = $this->services;
        }
        if ($this->resourceTypes !== null) {
            $payload['resourceTypes'] = $this->resourceTypes;
        }
        if ($this->trafficClasses !== null) {
            $payload['trafficClasses'] = $this->trafficClasses;
        }
        if ($this->directions !== null) {
            $payload['directions'] = $this->directions;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
