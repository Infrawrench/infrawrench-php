<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class CostForecast implements \JsonSerializable
{
    /** @param list<string> $scenarioModelIds */
    public function __construct(
        public readonly string $id,
        public readonly string $reportId,
        public readonly string $name,
        public readonly ?string $description,
        public readonly array $scenarioModelIds,
        public readonly ?string $driverMetricId,
        public readonly bool $isDefault,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            reportId: Coerce::toString($data['reportId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            scenarioModelIds: Coerce::mapList($data['scenarioModelIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            driverMetricId: Coerce::toStringOrNull($data['driverMetricId'] ?? null),
            isDefault: Coerce::toBool($data['isDefault'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'reportId' => $this->reportId,
            'name' => $this->name,
            'description' => $this->description,
            'scenarioModelIds' => $this->scenarioModelIds,
            'driverMetricId' => $this->driverMetricId,
            'isDefault' => $this->isDefault,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
