<?php

/*
 * infrawrench/sdk v1.62.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.62.0).
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

final class PriceCatalogSpecs implements \JsonSerializable
{
    public function __construct(
        public readonly ?float $vcpus = null,
        public readonly ?float $memoryGb = null,
        public readonly ?float $gpuCount = null,
        public readonly ?string $gpuModel = null,
        public readonly ?float $gpuMemoryGb = null,
        public readonly ?float $storageGb = null,
        public readonly ?string $storageType = null,
        public readonly ?string $architecture = null,
        public readonly ?string $network = null,
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
            vcpus: Coerce::toFloatOrNull($data['vcpus'] ?? null),
            memoryGb: Coerce::toFloatOrNull($data['memoryGb'] ?? null),
            gpuCount: Coerce::toFloatOrNull($data['gpuCount'] ?? null),
            gpuModel: Coerce::toStringOrNull($data['gpuModel'] ?? null),
            gpuMemoryGb: Coerce::toFloatOrNull($data['gpuMemoryGb'] ?? null),
            storageGb: Coerce::toFloatOrNull($data['storageGb'] ?? null),
            storageType: Coerce::toStringOrNull($data['storageType'] ?? null),
            architecture: Coerce::toStringOrNull($data['architecture'] ?? null),
            network: Coerce::toStringOrNull($data['network'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
        ];
        if ($this->vcpus !== null) {
            $payload['vcpus'] = $this->vcpus;
        }
        if ($this->memoryGb !== null) {
            $payload['memoryGb'] = $this->memoryGb;
        }
        if ($this->gpuCount !== null) {
            $payload['gpuCount'] = $this->gpuCount;
        }
        if ($this->gpuModel !== null) {
            $payload['gpuModel'] = $this->gpuModel;
        }
        if ($this->gpuMemoryGb !== null) {
            $payload['gpuMemoryGb'] = $this->gpuMemoryGb;
        }
        if ($this->storageGb !== null) {
            $payload['storageGb'] = $this->storageGb;
        }
        if ($this->storageType !== null) {
            $payload['storageType'] = $this->storageType;
        }
        if ($this->architecture !== null) {
            $payload['architecture'] = $this->architecture;
        }
        if ($this->network !== null) {
            $payload['network'] = $this->network;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
