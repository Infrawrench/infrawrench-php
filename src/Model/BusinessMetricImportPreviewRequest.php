<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class BusinessMetricImportPreviewRequest implements \JsonSerializable
{
    /**
     * @param array<string, string> $params The source plugin's form values, keyed by field (see `GET /business-metrics/importer-sources`). SQL fields must be a single SELECT or WITH statement; `{{from}}`, `{{to}}`, `{{to_exclusive}}` and `{{timezone}}` are replaced with quoted literals.
     * @param string|null $from Default: 14 days ending yesterday.
     * @param BusinessMetricImportAggregation::*|null $aggregation
     * @param bool|null $dryRun Validate with the provider without reading data, where the source supports it.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly array $params,
        public readonly ?string $from = null,
        public readonly ?string $to = null,
        public readonly ?string $timezone = null,
        public readonly ?string $aggregation = null,
        public readonly ?bool $dryRun = null,
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
            from: Coerce::toStringOrNull($data['from'] ?? null),
            to: Coerce::toStringOrNull($data['to'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            aggregation: Coerce::toStringOrNull($data['aggregation'] ?? null),
            dryRun: Coerce::toBoolOrNull($data['dryRun'] ?? null),
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
        if ($this->from !== null) {
            $payload['from'] = $this->from;
        }
        if ($this->to !== null) {
            $payload['to'] = $this->to;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->aggregation !== null) {
            $payload['aggregation'] = $this->aggregation;
        }
        if ($this->dryRun !== null) {
            $payload['dryRun'] = $this->dryRun;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
