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

final class FxFeedStatus implements \JsonSerializable
{
    /**
     * @param 'ecb' $source
     * @param string|null $latestRateDate Newest publication stored, or null before the first successful fetch.
     * @param list<string> $currencies Currencies in the newest publication, plus EUR. Any other currency is manual-only: it converts only at a rate you state.
     * @param string|null $lastError Error from the most recent failed fetch; cleared on success.
     */
    public function __construct(
        public readonly string $source,
        public readonly string $sourceName,
        public readonly string $sourceUrl,
        public readonly ?string $latestRateDate,
        public readonly ?string $earliestRateDate,
        public readonly array $currencies,
        public readonly ?string $lastSuccessAt,
        public readonly ?string $lastError,
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
            source: Coerce::toString($data['source'] ?? null),
            sourceName: Coerce::toString($data['sourceName'] ?? null),
            sourceUrl: Coerce::toString($data['sourceUrl'] ?? null),
            latestRateDate: Coerce::toStringOrNull($data['latestRateDate'] ?? null),
            earliestRateDate: Coerce::toStringOrNull($data['earliestRateDate'] ?? null),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            lastSuccessAt: Coerce::toStringOrNull($data['lastSuccessAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
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
            'source' => $this->source,
            'sourceName' => $this->sourceName,
            'sourceUrl' => $this->sourceUrl,
            'latestRateDate' => $this->latestRateDate,
            'earliestRateDate' => $this->earliestRateDate,
            'currencies' => $this->currencies,
            'lastSuccessAt' => $this->lastSuccessAt,
            'lastError' => $this->lastError,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
