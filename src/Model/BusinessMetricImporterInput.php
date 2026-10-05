<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

final class BusinessMetricImporterInput implements \JsonSerializable
{
    /**
     * @param string $accountId A connected account whose plugin declares a business-metric source.
     * @param array<string, string> $params The source plugin's form values, keyed by field (see `GET /business-metrics/importer-sources`). SQL fields must be a single SELECT or WITH statement; `{{from}}`, `{{to}}`, `{{to_exclusive}}` and `{{timezone}}` are replaced with quoted literals.
     * @param BusinessMetricImportSchedule::*|null $schedule
     * @param int|null $backfillDays Trailing closed days each scheduled run restates, ending yesterday. Absent is 7.
     * @param string|null $timezone IANA timezone the days are counted in. Absent is `UTC`.
     * @param BusinessMetricImportAggregation::*|null $aggregation
     * @param bool|null $enabled Absent is true.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly array $params,
        public readonly ?string $schedule = null,
        public readonly ?int $backfillDays = null,
        public readonly ?string $timezone = null,
        public readonly ?string $aggregation = null,
        public readonly ?bool $enabled = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            params: Coerce::mapValues($data['params'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            schedule: Coerce::toStringOrNull($data['schedule'] ?? null),
            backfillDays: Coerce::toIntOrNull($data['backfillDays'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            aggregation: Coerce::toStringOrNull($data['aggregation'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
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
            'accountId' => $this->accountId,
            'params' => $this->params,
        ];
        if ($this->schedule !== null) {
            $payload['schedule'] = $this->schedule;
        }
        if ($this->backfillDays !== null) {
            $payload['backfillDays'] = $this->backfillDays;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->aggregation !== null) {
            $payload['aggregation'] = $this->aggregation;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
