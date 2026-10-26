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

final class NetworkFlowReportPoint implements \JsonSerializable
{
    /**
     * @param float $bytes Observed bytes (decimal: a GB is 10^9 bytes).
     * @param float $estimatedCost Bytes priced at the provider's published list rate for the boundary crossed. Always an estimate: free allowances, volume tiers and negotiated rates are not modelled.
     * @param float $sampledBytes Of `bytes`, those from a flow source that samples. The plugin already scaled them up; they are counted and labelled, never dropped.
     * @param float $sampledCost Of `estimatedCost`, the part priced from sampled bytes.
     * @param float $unattributedBytes Of `bytes`, those that could not be tied to a workload at one end.
     * @param float $truncatedBytes Of `bytes`, the per-day remainder below the stored pair cap.
     */
    public function __construct(
        public readonly string $bucket,
        public readonly float $bytes,
        public readonly float $estimatedCost,
        public readonly float $sampledBytes,
        public readonly float $sampledCost,
        public readonly float $unattributedBytes,
        public readonly float $truncatedBytes,
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
            bucket: Coerce::toString($data['bucket'] ?? null),
            bytes: Coerce::toFloat($data['bytes'] ?? null),
            estimatedCost: Coerce::toFloat($data['estimatedCost'] ?? null),
            sampledBytes: Coerce::toFloat($data['sampledBytes'] ?? null),
            sampledCost: Coerce::toFloat($data['sampledCost'] ?? null),
            unattributedBytes: Coerce::toFloat($data['unattributedBytes'] ?? null),
            truncatedBytes: Coerce::toFloat($data['truncatedBytes'] ?? null),
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
            'bucket' => $this->bucket,
            'bytes' => $this->bytes,
            'estimatedCost' => $this->estimatedCost,
            'sampledBytes' => $this->sampledBytes,
            'sampledCost' => $this->sampledCost,
            'unattributedBytes' => $this->unattributedBytes,
            'truncatedBytes' => $this->truncatedBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
