<?php

/*
 * infrawrench/sdk v1.99.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.99.0).
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

final class CurrencySettingsInput implements \JsonSerializable
{
    /**
     * @param mixed $rateBasis Which automatic (feed) rate converts a day's spend. `daily`: the rate published for that day, carried forward over weekends and holidays. `month_end`: the rate in force on the last day of that day's month, so a whole month converts at one rate. Stated rates always apply to the days their own dates cover, whatever the basis.
     */
    public function __construct(
        public readonly mixed $displayCurrency,
        public readonly mixed $autoRates = null,
        public readonly mixed $rateBasis = null,
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
            displayCurrency: $data['displayCurrency'] ?? null,
            autoRates: $data['autoRates'] ?? null,
            rateBasis: $data['rateBasis'] ?? null,
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
            'displayCurrency' => $this->displayCurrency,
        ];
        if ($this->autoRates !== null) {
            $payload['autoRates'] = $this->autoRates;
        }
        if ($this->rateBasis !== null) {
            $payload['rateBasis'] = $this->rateBasis;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
