<?php

/*
 * infrawrench/sdk v1.58.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.58.0).
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

final class AiAttributionStats implements \JsonSerializable
{
    /**
     * @param list<AiSourceMatchStats> $sources
     * @param list<AiProviderCoverage> $providers
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly array $sources,
        public readonly array $providers,
        public readonly int $attributedDays,
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
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): AiSourceMatchStats => AiSourceMatchStats::fromArray(Coerce::toArray($item))),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): AiProviderCoverage => AiProviderCoverage::fromArray(Coerce::toArray($item))),
            attributedDays: Coerce::toInt($data['attributedDays'] ?? null),
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
            'from' => $this->from,
            'to' => $this->to,
            'sources' => array_map(static fn (AiSourceMatchStats $item): array => $item->toArray(), $this->sources),
            'providers' => array_map(static fn (AiProviderCoverage $item): array => $item->toArray(), $this->providers),
            'attributedDays' => $this->attributedDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
