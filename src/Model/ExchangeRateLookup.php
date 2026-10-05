<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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

final class ExchangeRateLookup implements \JsonSerializable
{
    /**
     * @param string $fromCurrency ISO 4217 code, upper-case.
     * @param string $toCurrency ISO 4217 code, upper-case.
     * @param 'daily'|'month_end' $rateBasis Which automatic (feed) rate converts a day's spend. `daily`: the rate published for that day, carried forward over weekends and holidays. `month_end`: the rate in force on the last day of that day's month, so a whole month converts at one rate. Stated rates always apply to the days their own dates cover, whatever the basis.
     * @param float|null $rate Multiply an amount in `fromCurrency` by this. `null`: no rate applies.
     * @param 'manual'|'ecb'|null $source `manual`: a rate your organization stated. `ecb`: the automatic European Central Bank euro reference rate (crossed through EUR when neither side is EUR).
     * @param string|null $rateDate The stated rate's effective date, or the ECB publication date used.
     */
    public function __construct(
        public readonly string $fromCurrency,
        public readonly string $toCurrency,
        public readonly string $date,
        public readonly string $rateBasis,
        public readonly ?float $rate,
        public readonly ?string $source,
        public readonly ?string $rateDate,
        public readonly ?string $manualRateId,
        public readonly string $explanation,
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
            fromCurrency: Coerce::toString($data['fromCurrency'] ?? null),
            toCurrency: Coerce::toString($data['toCurrency'] ?? null),
            date: Coerce::toString($data['date'] ?? null),
            rateBasis: Coerce::toString($data['rateBasis'] ?? null),
            rate: Coerce::toFloatOrNull($data['rate'] ?? null),
            source: Coerce::toStringOrNull($data['source'] ?? null),
            rateDate: Coerce::toStringOrNull($data['rateDate'] ?? null),
            manualRateId: Coerce::toStringOrNull($data['manualRateId'] ?? null),
            explanation: Coerce::toString($data['explanation'] ?? null),
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
            'fromCurrency' => $this->fromCurrency,
            'toCurrency' => $this->toCurrency,
            'date' => $this->date,
            'rateBasis' => $this->rateBasis,
            'rate' => $this->rate,
            'source' => $this->source,
            'rateDate' => $this->rateDate,
            'manualRateId' => $this->manualRateId,
            'explanation' => $this->explanation,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
