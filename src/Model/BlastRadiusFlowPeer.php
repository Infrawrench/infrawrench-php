<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class BlastRadiusFlowPeer implements \JsonSerializable
{
    /**
     * @param string $ref The peer's flow ref; a provider resource id, or a class token like `internet`.
     * @param 'egress'|'ingress' $direction Relative to the resource being deleted, not to the row the provider captured.
     * @param string $scope The boundary the traffic crossed.
     * @param int $days Days in the window this peer appeared on; a spike versus a standing flow.
     * @param string|null $resourceId The peer's Infrawrench resource id when its flow ref resolved to exactly one synced resource. Null when it resolved to none (an endpoint outside the organization) and also when it resolved to several; a provider id is only unique within one plugin and account, and a flow record does not name the peer's account, so a contested ref is reported unlinked with the reason in `unchecked` rather than attributed to a guess.
     */
    public function __construct(
        public readonly string $ref,
        public readonly string $label,
        public readonly string $direction,
        public readonly string $scope,
        public readonly float $bytes,
        public readonly float $estimatedCost,
        public readonly string $currency,
        public readonly int $days,
        public readonly ?string $resourceId,
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
            direction: Coerce::toString($data['direction'] ?? null),
            scope: Coerce::toString($data['scope'] ?? null),
            bytes: Coerce::toFloat($data['bytes'] ?? null),
            estimatedCost: Coerce::toFloat($data['estimatedCost'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            days: Coerce::toInt($data['days'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
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
            'direction' => $this->direction,
            'scope' => $this->scope,
            'bytes' => $this->bytes,
            'estimatedCost' => $this->estimatedCost,
            'currency' => $this->currency,
            'days' => $this->days,
            'resourceId' => $this->resourceId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
