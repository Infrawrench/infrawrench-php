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

final class DoraSettingsUpdate implements \JsonSerializable
{
    /**
     * @param list<string>|null $productionEnvironments
     * @param list<string>|null $pipelinePatterns
     */
    public function __construct(
        public readonly ?int $failureWindowHours = null,
        public readonly ?array $productionEnvironments = null,
        public readonly ?array $pipelinePatterns = null,
        public readonly ?bool $countFailedDeploys = null,
        public readonly ?bool $includeResourceChanges = null,
        public readonly ?bool $digestEnabled = null,
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
            failureWindowHours: Coerce::toIntOrNull($data['failureWindowHours'] ?? null),
            productionEnvironments: Coerce::nullable($data['productionEnvironments'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            pipelinePatterns: Coerce::nullable($data['pipelinePatterns'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            countFailedDeploys: Coerce::toBoolOrNull($data['countFailedDeploys'] ?? null),
            includeResourceChanges: Coerce::toBoolOrNull($data['includeResourceChanges'] ?? null),
            digestEnabled: Coerce::toBoolOrNull($data['digestEnabled'] ?? null),
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
        if ($this->failureWindowHours !== null) {
            $payload['failureWindowHours'] = $this->failureWindowHours;
        }
        if ($this->productionEnvironments !== null) {
            $payload['productionEnvironments'] = $this->productionEnvironments;
        }
        if ($this->pipelinePatterns !== null) {
            $payload['pipelinePatterns'] = $this->pipelinePatterns;
        }
        if ($this->countFailedDeploys !== null) {
            $payload['countFailedDeploys'] = $this->countFailedDeploys;
        }
        if ($this->includeResourceChanges !== null) {
            $payload['includeResourceChanges'] = $this->includeResourceChanges;
        }
        if ($this->digestEnabled !== null) {
            $payload['digestEnabled'] = $this->digestEnabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
