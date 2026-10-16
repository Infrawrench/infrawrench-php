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

final class ExchangeRateImportRequest implements \JsonSerializable
{
    /**
     * @param string $csv The file's text, with a header row. Columns (matched by name, case and punctuation insensitive): `from`, `to`, `rate`, and either `effective_from` (+ optional `effective_to`) or `billing_period` (`YYYY-MM`, shorthand for that month's first and last day). Comma, semicolon, tab or pipe delimited. At most 2,000 rows.
     * @param bool|null $dryRun Classify every row and write nothing. The preview the settings page shows.
     * @param bool|null $skipInvalid Write the valid rows even when some rows are invalid. Without it an upload with any invalid row writes nothing.
     */
    public function __construct(
        public readonly string $csv,
        public readonly ?bool $dryRun = null,
        public readonly ?bool $skipInvalid = null,
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
            csv: Coerce::toString($data['csv'] ?? null),
            dryRun: Coerce::toBoolOrNull($data['dryRun'] ?? null),
            skipInvalid: Coerce::toBoolOrNull($data['skipInvalid'] ?? null),
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
            'csv' => $this->csv,
        ];
        if ($this->dryRun !== null) {
            $payload['dryRun'] = $this->dryRun;
        }
        if ($this->skipInvalid !== null) {
            $payload['skipInvalid'] = $this->skipInvalid;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
