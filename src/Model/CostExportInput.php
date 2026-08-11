<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class CostExportInput implements \JsonSerializable
{
    /**
     * @param 'csv'|'ndjson' $format
     * @param 'daily'|'weekly'|'monthly' $cadence How often a run happens and — because a run writes one object per period — what a period is: a calendar day, an ISO week (Monday-start), or a calendar month.
     * @param int $hour Local hour in `timezone` a run fires at.
     * @param string $timezone IANA zone, e.g. `Europe/Berlin`. Validated against `Intl`.
     * @param int $restatementDays Trailing days of already-written periods each run re-exports. Providers restate spend for days after the fact, so the object written for yesterday is not final; every period overlapping this window is rebuilt in full at its existing key, which overwrites rather than duplicates. 0 disables it and is only correct for an org whose providers never revise.
     * @param array{kind: 's3', bucket: string, prefix: string, region: string, endpoint: string, forcePathStyle: bool}|array{kind: 'http', method: 'POST'|'PUT', urlHint: string} $destination
     * @param string|null $accessKeyId S3 only. Write-only; omit on update to keep the stored credential.
     * @param string|null $secretAccessKey S3 only. Write-only, never returned.
     * @param string|null $url HTTPS destinations only. Write-only, never returned — a signed URL carries its own signature, so it is treated as a bearer credential.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $format,
        public readonly CostExportQuery $query,
        public readonly string $cadence,
        public readonly int $hour,
        public readonly string $timezone,
        public readonly int $restatementDays,
        public readonly bool $enabled,
        public readonly array $destination,
        public readonly ?string $accessKeyId = null,
        public readonly ?string $secretAccessKey = null,
        public readonly ?string $url = null,
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
            name: Coerce::toString($data['name'] ?? null),
            format: Coerce::toString($data['format'] ?? null),
            query: CostExportQuery::fromArray(Coerce::toArray($data['query'] ?? null)),
            cadence: Coerce::toString($data['cadence'] ?? null),
            hour: Coerce::toInt($data['hour'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            restatementDays: Coerce::toInt($data['restatementDays'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            destination: $data['destination'] ?? null,
            accessKeyId: Coerce::toStringOrNull($data['accessKeyId'] ?? null),
            secretAccessKey: Coerce::toStringOrNull($data['secretAccessKey'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
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
            'name' => $this->name,
            'format' => $this->format,
            'query' => $this->query->toArray(),
            'cadence' => $this->cadence,
            'hour' => $this->hour,
            'timezone' => $this->timezone,
            'restatementDays' => $this->restatementDays,
            'enabled' => $this->enabled,
            'destination' => $this->destination,
        ];
        if ($this->accessKeyId !== null) {
            $payload['accessKeyId'] = $this->accessKeyId;
        }
        if ($this->secretAccessKey !== null) {
            $payload['secretAccessKey'] = $this->secretAccessKey;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
