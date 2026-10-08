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

final class BusinessMetricImportPreview implements \JsonSerializable
{
    /**
     * @param list<array{date: string, value: float, label?: string}> $values
     * @param list<string> $notes
     * @param array{valid: bool, message: string, bytesProcessed?: float}|null $dryRun
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly array $values,
        public readonly int $pointsRead,
        public readonly int $days,
        public readonly array $notes,
        public readonly int $durationMs,
        public readonly ?array $dryRun = null,
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
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            pointsRead: Coerce::toInt($data['pointsRead'] ?? null),
            days: Coerce::toInt($data['days'] ?? null),
            notes: Coerce::mapList($data['notes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            durationMs: Coerce::toInt($data['durationMs'] ?? null),
            dryRun: Coerce::toArrayOrNull($data['dryRun'] ?? null),
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
            'from' => $this->from,
            'to' => $this->to,
            'values' => $this->values,
            'pointsRead' => $this->pointsRead,
            'days' => $this->days,
            'notes' => $this->notes,
            'durationMs' => $this->durationMs,
        ];
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
