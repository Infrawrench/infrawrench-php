<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class BlastRadiusReport implements \JsonSerializable
{
    /**
     * @param list<BlastRadiusDependant> $dependants Affected resources, direct first then by depth.
     * @param list<BlastRadiusReference> $references Objects naming the resource without depending on it, user-facing ones first.
     * @param list<BlastRadiusFlowPeer> $flowPeers Measured network peers over the last 14 days, heaviest first. Empty when flow collection is off — see `unchecked`.
     * @param array{bytes: float, estimatedCost: float, currency: string}|null $flowTotals Totals over `flowPeers`, or null when traffic could not be measured at all. Zeroed totals mean collection is on and the resource is quiet; null means nobody looked.
     * @param list<BlastRadiusGap> $unchecked What the report could not look at. An empty `dependants` list with a non-empty `unchecked` list is not a clean bill of health, and surfaces must not render it as one.
     * @param 'none'|'low'|'medium'|'high'|'unknown' $severity `high` for anything user-facing or five or more direct dependants; `unknown` when nothing was found but something could not be checked.
     * @param string $headline One sentence, ready to render.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly ?BlastRadiusNode $resource,
        public readonly array $dependants,
        public readonly int $directCount,
        public readonly int $transitiveCount,
        public readonly array $references,
        public readonly array $flowPeers,
        public readonly ?array $flowTotals,
        public readonly array $unchecked,
        public readonly string $severity,
        public readonly string $headline,
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
            resource: Coerce::nullable($data['resource'] ?? null, static fn (mixed $value): BlastRadiusNode => BlastRadiusNode::fromArray(Coerce::toArray($value))),
            dependants: Coerce::mapList($data['dependants'] ?? null, static fn (mixed $item): BlastRadiusDependant => BlastRadiusDependant::fromArray(Coerce::toArray($item))),
            directCount: Coerce::toInt($data['directCount'] ?? null),
            transitiveCount: Coerce::toInt($data['transitiveCount'] ?? null),
            references: Coerce::mapList($data['references'] ?? null, static fn (mixed $item): BlastRadiusReference => BlastRadiusReference::fromArray(Coerce::toArray($item))),
            flowPeers: Coerce::mapList($data['flowPeers'] ?? null, static fn (mixed $item): BlastRadiusFlowPeer => BlastRadiusFlowPeer::fromArray(Coerce::toArray($item))),
            flowTotals: Coerce::toArrayOrNull($data['flowTotals'] ?? null),
            unchecked: Coerce::mapList($data['unchecked'] ?? null, static fn (mixed $item): BlastRadiusGap => BlastRadiusGap::fromArray(Coerce::toArray($item))),
            severity: Coerce::toString($data['severity'] ?? null),
            headline: Coerce::toString($data['headline'] ?? null),
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
            'resourceId' => $this->resourceId,
            'resource' => $this->resource?->toArray(),
            'dependants' => array_map(static fn (BlastRadiusDependant $item): array => $item->toArray(), $this->dependants),
            'directCount' => $this->directCount,
            'transitiveCount' => $this->transitiveCount,
            'references' => array_map(static fn (BlastRadiusReference $item): array => $item->toArray(), $this->references),
            'flowPeers' => array_map(static fn (BlastRadiusFlowPeer $item): array => $item->toArray(), $this->flowPeers),
            'flowTotals' => $this->flowTotals,
            'unchecked' => array_map(static fn (BlastRadiusGap $item): array => $item->toArray(), $this->unchecked),
            'severity' => $this->severity,
            'headline' => $this->headline,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
