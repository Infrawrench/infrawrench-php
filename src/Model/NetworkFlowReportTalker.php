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

final class NetworkFlowReportTalker implements \JsonSerializable
{
    /**
     * @param NetworkFlowTrafficClass::* $scope
     * @param 'egress'|'ingress' $direction
     * @param 'resolved'|'unattributed' $attribution
     * @param int $days Days in the window the pair appeared on.
     * @param bool $sampled True when the pair's bytes came from a sampled flow source.
     */
    public function __construct(
        public readonly NetworkFlowReportEndpoint $source,
        public readonly NetworkFlowReportEndpoint $destination,
        public readonly string $scope,
        public readonly string $direction,
        public readonly string $attribution,
        public readonly float $bytes,
        public readonly float $packets,
        public readonly float $estimatedCost,
        public readonly string $currency,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly int $days,
        public readonly bool $sampled,
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
            source: NetworkFlowReportEndpoint::fromArray(Coerce::toArray($data['source'] ?? null)),
            destination: NetworkFlowReportEndpoint::fromArray(Coerce::toArray($data['destination'] ?? null)),
            scope: Coerce::toString($data['scope'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            attribution: Coerce::toString($data['attribution'] ?? null),
            bytes: Coerce::toFloat($data['bytes'] ?? null),
            packets: Coerce::toFloat($data['packets'] ?? null),
            estimatedCost: Coerce::toFloat($data['estimatedCost'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            days: Coerce::toInt($data['days'] ?? null),
            sampled: Coerce::toBool($data['sampled'] ?? null),
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
            'source' => $this->source->toArray(),
            'destination' => $this->destination->toArray(),
            'scope' => $this->scope,
            'direction' => $this->direction,
            'attribution' => $this->attribution,
            'bytes' => $this->bytes,
            'packets' => $this->packets,
            'estimatedCost' => $this->estimatedCost,
            'currency' => $this->currency,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'days' => $this->days,
            'sampled' => $this->sampled,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
