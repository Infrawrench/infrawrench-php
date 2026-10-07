<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

/** The API may send `null` in place of this object. */
final class SavingsShortfall implements \JsonSerializable
{
    /**
     * @param 'below_projection'|'grew_back' $kind `below_projection`: the trailing realized rate is under the org's threshold share of the projected rate; `grew_back`: post-action spend is above the pre-action baseline.
     * @param float $realizedPerDay Currency units (not cents), in the row's currency.
     * @param float|null $projectedPerDay Currency units (not cents), in the row's currency.
     */
    public function __construct(
        public readonly string $kind,
        public readonly float $realizedPerDay,
        public readonly ?float $projectedPerDay,
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
            kind: Coerce::toString($data['kind'] ?? null),
            realizedPerDay: Coerce::toFloat($data['realizedPerDay'] ?? null),
            projectedPerDay: Coerce::toFloatOrNull($data['projectedPerDay'] ?? null),
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
            'kind' => $this->kind,
            'realizedPerDay' => $this->realizedPerDay,
            'projectedPerDay' => $this->projectedPerDay,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
