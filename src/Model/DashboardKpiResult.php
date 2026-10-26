<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class DashboardKpiResult implements \JsonSerializable
{
    /** @param 'money'|'money_per_unit'|'percent'|'count'|'quantity' $unit */
    public function __construct(
        public readonly ?float $value,
        public readonly string $unit,
        public readonly ?float $previous,
        public readonly ?float $change,
        public readonly ?float $changePercent,
        public readonly bool $upIsGood,
        public readonly ?string $currency = null,
        public readonly ?string $perUnit = null,
        public readonly ?string $from = null,
        public readonly ?string $to = null,
        public readonly ?string $previousFrom = null,
        public readonly ?string $previousTo = null,
        public readonly ?string $sourceName = null,
        public readonly ?float $limit = null,
        public readonly ?string $note = null,
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
            value: Coerce::toFloatOrNull($data['value'] ?? null),
            unit: Coerce::toString($data['unit'] ?? null),
            previous: Coerce::toFloatOrNull($data['previous'] ?? null),
            change: Coerce::toFloatOrNull($data['change'] ?? null),
            changePercent: Coerce::toFloatOrNull($data['changePercent'] ?? null),
            upIsGood: Coerce::toBool($data['upIsGood'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            perUnit: Coerce::toStringOrNull($data['perUnit'] ?? null),
            from: Coerce::toStringOrNull($data['from'] ?? null),
            to: Coerce::toStringOrNull($data['to'] ?? null),
            previousFrom: Coerce::toStringOrNull($data['previousFrom'] ?? null),
            previousTo: Coerce::toStringOrNull($data['previousTo'] ?? null),
            sourceName: Coerce::toStringOrNull($data['sourceName'] ?? null),
            limit: Coerce::toFloatOrNull($data['limit'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
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
            'value' => $this->value,
            'unit' => $this->unit,
            'previous' => $this->previous,
            'change' => $this->change,
            'changePercent' => $this->changePercent,
            'upIsGood' => $this->upIsGood,
        ];
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->perUnit !== null) {
            $payload['perUnit'] = $this->perUnit;
        }
        if ($this->from !== null) {
            $payload['from'] = $this->from;
        }
        if ($this->to !== null) {
            $payload['to'] = $this->to;
        }
        if ($this->previousFrom !== null) {
            $payload['previousFrom'] = $this->previousFrom;
        }
        if ($this->previousTo !== null) {
            $payload['previousTo'] = $this->previousTo;
        }
        if ($this->sourceName !== null) {
            $payload['sourceName'] = $this->sourceName;
        }
        if ($this->limit !== null) {
            $payload['limit'] = $this->limit;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
