<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class CiUsage implements \JsonSerializable
{
    /**
     * @param float|'Infinity'|'-Infinity'|'NaN' $vcpuSeconds
     * @param float|'Infinity'|'-Infinity'|'NaN' $memoryGibSeconds
     * @param float|'Infinity'|'-Infinity'|'NaN' $storageGibHours
     * @param float|'Infinity'|'-Infinity'|'NaN'|null $storageBytes
     */
    public function __construct(
        public readonly string $month,
        public readonly int $runs,
        public readonly float|string $vcpuSeconds,
        public readonly float|string $memoryGibSeconds,
        public readonly float|string $storageGibHours,
        public readonly float|string|null $storageBytes,
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
            month: Coerce::toString($data['month'] ?? null),
            runs: Coerce::toInt($data['runs'] ?? null),
            vcpuSeconds: $data['vcpuSeconds'] ?? null,
            memoryGibSeconds: $data['memoryGibSeconds'] ?? null,
            storageGibHours: $data['storageGibHours'] ?? null,
            storageBytes: $data['storageBytes'] ?? null,
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
            'month' => $this->month,
            'runs' => $this->runs,
            'vcpuSeconds' => $this->vcpuSeconds,
            'memoryGibSeconds' => $this->memoryGibSeconds,
            'storageGibHours' => $this->storageGibHours,
            'storageBytes' => $this->storageBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
