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

final class CurrencyConfig implements \JsonSerializable
{
    /**
     * @param string|null $displayCurrency ISO 4217 code, upper-case.
     * @param 'daily'|'month_end' $rateBasis Which automatic (feed) rate converts a day's spend. `daily`: the rate published for that day, carried forward over weekends and holidays. `month_end`: the rate in force on the last day of that day's month, so a whole month converts at one rate. Stated rates always apply to the days their own dates cover, whatever the basis.
     * @param list<ExchangeRate> $rates
     */
    public function __construct(
        public readonly ?string $displayCurrency,
        public readonly bool $autoRates,
        public readonly string $rateBasis,
        public readonly array $rates,
        public readonly FxFeedStatus $feed,
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
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
            autoRates: Coerce::toBool($data['autoRates'] ?? null),
            rateBasis: Coerce::toString($data['rateBasis'] ?? null),
            rates: Coerce::mapList($data['rates'] ?? null, static fn (mixed $item): ExchangeRate => ExchangeRate::fromArray(Coerce::toArray($item))),
            feed: FxFeedStatus::fromArray(Coerce::toArray($data['feed'] ?? null)),
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
            'displayCurrency' => $this->displayCurrency,
            'autoRates' => $this->autoRates,
            'rateBasis' => $this->rateBasis,
            'rates' => array_map(static fn (ExchangeRate $item): array => $item->toArray(), $this->rates),
            'feed' => $this->feed->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
