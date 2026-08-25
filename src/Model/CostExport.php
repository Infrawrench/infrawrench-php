<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class CostExport implements \JsonSerializable
{
    /**
     * @param 'csv'|'ndjson' $format
     * @param 'daily'|'weekly'|'monthly' $cadence
     * @param array{kind: 's3', bucket: string, prefix: string, region: string, endpoint: string, forcePathStyle: bool}|array{kind: 'http', method: 'POST'|'PUT', urlHint: string} $destination
     * @param string|null $credentialHint Redacted marker, e.g. `AKIA…7F2Q`. No route ever returns the credential itself.
     * @param 'pending'|'succeeded'|'failed' $lastStatus
     * @param string|null $lastError Why the last run failed, verbatim from the destination where possible.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $format,
        public readonly CostExportQuery $query,
        public readonly string $cadence,
        public readonly int $hour,
        public readonly string $timezone,
        public readonly int $restatementDays,
        public readonly bool $enabled,
        public readonly array $destination,
        public readonly bool $hasCredentials,
        public readonly ?string $credentialHint,
        public readonly ?string $lastRunAt,
        public readonly string $lastStatus,
        public readonly ?string $lastError,
        public readonly ?int $lastObjectCount,
        public readonly ?int $lastRowCount,
        public readonly ?string $nextRunAt,
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
            name: Coerce::toString($data['name'] ?? null),
            format: Coerce::toString($data['format'] ?? null),
            query: CostExportQuery::fromArray(Coerce::toArray($data['query'] ?? null)),
            cadence: Coerce::toString($data['cadence'] ?? null),
            hour: Coerce::toInt($data['hour'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            restatementDays: Coerce::toInt($data['restatementDays'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            destination: $data['destination'] ?? null,
            hasCredentials: Coerce::toBool($data['hasCredentials'] ?? null),
            credentialHint: Coerce::toStringOrNull($data['credentialHint'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastStatus: Coerce::toString($data['lastStatus'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastObjectCount: Coerce::toIntOrNull($data['lastObjectCount'] ?? null),
            lastRowCount: Coerce::toIntOrNull($data['lastRowCount'] ?? null),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
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
            'name' => $this->name,
            'format' => $this->format,
            'query' => $this->query->toArray(),
            'cadence' => $this->cadence,
            'hour' => $this->hour,
            'timezone' => $this->timezone,
            'restatementDays' => $this->restatementDays,
            'enabled' => $this->enabled,
            'destination' => $this->destination,
            'hasCredentials' => $this->hasCredentials,
            'credentialHint' => $this->credentialHint,
            'lastRunAt' => $this->lastRunAt,
            'lastStatus' => $this->lastStatus,
            'lastError' => $this->lastError,
            'lastObjectCount' => $this->lastObjectCount,
            'lastRowCount' => $this->lastRowCount,
            'nextRunAt' => $this->nextRunAt,
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
