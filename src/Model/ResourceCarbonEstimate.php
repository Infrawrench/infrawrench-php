<?php

/*
 * infrawrench/sdk v1.104.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.104.0).
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

final class ResourceCarbonEstimate implements \JsonSerializable
{
    /**
     * @param CarbonFootprint|null $estimate Monthly (730 h) footprint, or null.
     * @param 'unsupported-provider'|'unknown-region'|'unknown-size'|null $reason
     * @param bool $inScope False when the type declares nothing to read: a bucket, a DNS record.
     * @param 'instance'|'aggregate' $role `aggregate`: a group (a managed cluster) whose machines are also listed in their own right; shown per resource, never summed into the org total.
     * @param array{cpuUtilization: float, coefficientSource: string, coefficientVintage: string, scope: string} $assumptions
     */
    public function __construct(
        public readonly ?CarbonFootprint $estimate,
        public readonly ?string $reason,
        public readonly bool $inScope,
        public readonly string $role,
        public readonly array $assumptions,
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
            estimate: Coerce::nullable($data['estimate'] ?? null, static fn (mixed $value): CarbonFootprint => CarbonFootprint::fromArray(Coerce::toArray($value))),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            inScope: Coerce::toBool($data['inScope'] ?? null),
            role: Coerce::toString($data['role'] ?? null),
            assumptions: Coerce::toArray($data['assumptions'] ?? null),
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
            'estimate' => $this->estimate?->toArray(),
            'reason' => $this->reason,
            'inScope' => $this->inScope,
            'role' => $this->role,
            'assumptions' => $this->assumptions,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
