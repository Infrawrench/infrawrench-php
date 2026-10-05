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

/** The API may send `null` in place of this object. */
final class RerateCoverage implements \JsonSerializable
{
    /**
     * @param array<string, array{listPriced: float, listTotal: float, fallback: float}> $byCurrency
     * @param list<array{pluginId: string, service: string, currency: string, listPriced: float, fallback: float}> $services
     */
    public function __construct(
        public readonly array $byCurrency,
        public readonly array $services,
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
            byCurrency: Coerce::mapValues($data['byCurrency'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'byCurrency' => $this->byCurrency,
            'services' => $this->services,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
