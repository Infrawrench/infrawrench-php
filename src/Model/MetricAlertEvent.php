<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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

final class MetricAlertEvent implements \JsonSerializable
{
    /**
     * @param 'firing'|'resolved' $status
     * @param float $observedValue Worst sample observed in the breaching window, in the metric's unit.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $ruleId,
        public readonly string $ruleName,
        public readonly string $resourceId,
        public readonly string $resourceName,
        public readonly string $status,
        public readonly float $observedValue,
        public readonly string $firedAt,
        public readonly ?string $resolvedAt,
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
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            ruleName: Coerce::toString($data['ruleName'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            observedValue: Coerce::toFloat($data['observedValue'] ?? null),
            firedAt: Coerce::toString($data['firedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
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
            'ruleId' => $this->ruleId,
            'ruleName' => $this->ruleName,
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'status' => $this->status,
            'observedValue' => $this->observedValue,
            'firedAt' => $this->firedAt,
            'resolvedAt' => $this->resolvedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
