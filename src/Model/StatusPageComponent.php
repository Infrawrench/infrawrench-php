<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class StatusPageComponent implements \JsonSerializable
{
    /**
     * @param string|null $label Public name; null falls back to the probe's own name.
     * @param int $position Ascending display order.
     * @param string $probeName The probe's internal name — editor-only.
     * @param 'up'|'down'|'unknown' $probeStatus
     * @param bool $probeEnabled False when the probe is paused.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $probeId,
        public readonly ?string $label,
        public readonly ?string $groupName,
        public readonly int $position,
        public readonly string $probeName,
        public readonly string $probeStatus,
        public readonly bool $probeEnabled,
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
            probeId: Coerce::toString($data['probeId'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
            groupName: Coerce::toStringOrNull($data['groupName'] ?? null),
            position: Coerce::toInt($data['position'] ?? null),
            probeName: Coerce::toString($data['probeName'] ?? null),
            probeStatus: Coerce::toString($data['probeStatus'] ?? null),
            probeEnabled: Coerce::toBool($data['probeEnabled'] ?? null),
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
            'id' => $this->id,
            'probeId' => $this->probeId,
            'label' => $this->label,
            'groupName' => $this->groupName,
            'position' => $this->position,
            'probeName' => $this->probeName,
            'probeStatus' => $this->probeStatus,
            'probeEnabled' => $this->probeEnabled,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
