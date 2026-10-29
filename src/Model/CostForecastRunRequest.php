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

final class CostForecastRunRequest implements \JsonSerializable
{
    /**
     * @param string|null $from First projected day; defaults to (and is never earlier than) the day after the last day with observed spend.
     * @param string|null $to Last projected day; defaults to 90 days after the last observed day, at most 366.
     * @param string|null $forecastId A forecast id, `"baseline"` for the automatic forecast, or absent for the report's default (the automatic forecast when none is set).
     * @param list<string>|null $providers Narrow to these providers (plugin ids), ANDed with the report's filters.
     * @param list<string>|null $services Narrow to these services, ANDed with the report's filters.
     * @param bool|null $all Also return every named forecast, side by side.
     */
    public function __construct(
        public readonly ?string $from = null,
        public readonly ?string $to = null,
        public readonly ?string $forecastId = null,
        public readonly ?array $providers = null,
        public readonly ?array $services = null,
        public readonly ?float $confidenceLevel = null,
        public readonly ?bool $all = null,
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
            from: Coerce::toStringOrNull($data['from'] ?? null),
            to: Coerce::toStringOrNull($data['to'] ?? null),
            forecastId: Coerce::toStringOrNull($data['forecastId'] ?? null),
            providers: Coerce::nullable($data['providers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            services: Coerce::nullable($data['services'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            confidenceLevel: Coerce::toFloatOrNull($data['confidenceLevel'] ?? null),
            all: Coerce::toBoolOrNull($data['all'] ?? null),
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
        if ($this->from !== null) {
            $payload['from'] = $this->from;
        }
        if ($this->to !== null) {
            $payload['to'] = $this->to;
        }
        if ($this->forecastId !== null) {
            $payload['forecastId'] = $this->forecastId;
        }
        if ($this->providers !== null) {
            $payload['providers'] = $this->providers;
        }
        if ($this->services !== null) {
            $payload['services'] = $this->services;
        }
        if ($this->confidenceLevel !== null) {
            $payload['confidenceLevel'] = $this->confidenceLevel;
        }
        if ($this->all !== null) {
            $payload['all'] = $this->all;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
