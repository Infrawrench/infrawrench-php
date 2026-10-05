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

final class BusinessMetricImportRun implements \JsonSerializable
{
    /**
     * @param 'schedule'|'manual' $trigger
     * @param 'running'|'success'|'error' $status
     * @param string $from First day, inclusive, in the importer's timezone.
     * @param list<string> $notes
     */
    public function __construct(
        public readonly string $id,
        public readonly string $importerId,
        public readonly string $trigger,
        public readonly string $status,
        public readonly string $from,
        public readonly string $to,
        public readonly int $pointsRead,
        public readonly int $daysWritten,
        public readonly ?string $error,
        public readonly array $notes,
        public readonly string $startedAt,
        public readonly ?string $finishedAt,
        public readonly ?int $durationMs,
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
            importerId: Coerce::toString($data['importerId'] ?? null),
            trigger: Coerce::toString($data['trigger'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            pointsRead: Coerce::toInt($data['pointsRead'] ?? null),
            daysWritten: Coerce::toInt($data['daysWritten'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            notes: Coerce::mapList($data['notes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            finishedAt: Coerce::toStringOrNull($data['finishedAt'] ?? null),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
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
            'importerId' => $this->importerId,
            'trigger' => $this->trigger,
            'status' => $this->status,
            'from' => $this->from,
            'to' => $this->to,
            'pointsRead' => $this->pointsRead,
            'daysWritten' => $this->daysWritten,
            'error' => $this->error,
            'notes' => $this->notes,
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
            'durationMs' => $this->durationMs,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
