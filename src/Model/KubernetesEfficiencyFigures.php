<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class KubernetesEfficiencyFigures implements \JsonSerializable
{
    /**
     * @param float $used Capacity measurably used (and mounted volumes, load balancers).
     * @param float $unused Requested but measured unused.
     * @param float $unmeasured Allocated with no usage data.
     * @param float $idle Capacity nobody requested, unrequested GPUs, unattached volumes.
     * @param float $overhead System-reserved node capacity and the control-plane fee.
     * @param float $allocated used + unused + unmeasured.
     * @param float|null $efficiency 0..1 on the report's basis; null when unmeasured.
     */
    public function __construct(
        public readonly float $total,
        public readonly float $used,
        public readonly float $unused,
        public readonly float $unmeasured,
        public readonly float $idle,
        public readonly float $overhead,
        public readonly float $allocated,
        public readonly ?float $efficiency,
        public readonly ?float $measuredShare,
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
            total: Coerce::toFloat($data['total'] ?? null),
            used: Coerce::toFloat($data['used'] ?? null),
            unused: Coerce::toFloat($data['unused'] ?? null),
            unmeasured: Coerce::toFloat($data['unmeasured'] ?? null),
            idle: Coerce::toFloat($data['idle'] ?? null),
            overhead: Coerce::toFloat($data['overhead'] ?? null),
            allocated: Coerce::toFloat($data['allocated'] ?? null),
            efficiency: Coerce::toFloatOrNull($data['efficiency'] ?? null),
            measuredShare: Coerce::toFloatOrNull($data['measuredShare'] ?? null),
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
            'total' => $this->total,
            'used' => $this->used,
            'unused' => $this->unused,
            'unmeasured' => $this->unmeasured,
            'idle' => $this->idle,
            'overhead' => $this->overhead,
            'allocated' => $this->allocated,
            'efficiency' => $this->efficiency,
            'measuredShare' => $this->measuredShare,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
