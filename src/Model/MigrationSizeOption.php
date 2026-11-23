<?php

/*
 * infrawrench/sdk v1.125.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.125.0).
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

final class MigrationSizeOption implements \JsonSerializable
{
    /**
     * @param MigrationMoney|null $monthly One unit, per month; null if unpriced.
     * @param bool $meetsSpec Meets or exceeds the source's known vCPUs, memory and GPUs.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly ?float $vcpus,
        public readonly ?float $memoryGb,
        public readonly ?float $gpuCount,
        public readonly ?string $gpuModel,
        public readonly ?MigrationMoney $monthly,
        public readonly bool $meetsSpec,
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
            label: Coerce::toString($data['label'] ?? null),
            vcpus: Coerce::toFloatOrNull($data['vcpus'] ?? null),
            memoryGb: Coerce::toFloatOrNull($data['memoryGb'] ?? null),
            gpuCount: Coerce::toFloatOrNull($data['gpuCount'] ?? null),
            gpuModel: Coerce::toStringOrNull($data['gpuModel'] ?? null),
            monthly: Coerce::nullable($data['monthly'] ?? null, static fn (mixed $value): MigrationMoney => MigrationMoney::fromArray(Coerce::toArray($value))),
            meetsSpec: Coerce::toBool($data['meetsSpec'] ?? null),
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
            'label' => $this->label,
            'vcpus' => $this->vcpus,
            'memoryGb' => $this->memoryGb,
            'gpuCount' => $this->gpuCount,
            'gpuModel' => $this->gpuModel,
            'monthly' => $this->monthly?->toArray(),
            'meetsSpec' => $this->meetsSpec,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
