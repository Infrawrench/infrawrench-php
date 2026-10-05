<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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

final class CurrencySettings implements \JsonSerializable
{
    /**
     * @param string|null $displayCurrency The currency converted amounts are expressed in, or `null` for no conversion at all. `null` is the default and the state of every organization that has not opted in: cost data is stored per currency and never merged unless you ask.
     * @param bool $autoRates Fill days no stated rate covers from the automatic daily ECB reference-rate feed. Off by default. A stated rate always wins over the feed for the days it covers. Currencies the ECB does not publish are manual-only.
     * @param 'daily'|'month_end' $rateBasis Which automatic (feed) rate converts a day's spend. `daily`: the rate published for that day, carried forward over weekends and holidays. `month_end`: the rate in force on the last day of that day's month, so a whole month converts at one rate. Stated rates always apply to the days their own dates cover, whatever the basis.
     */
    public function __construct(
        public readonly ?string $displayCurrency,
        public readonly bool $autoRates,
        public readonly string $rateBasis,
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
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
