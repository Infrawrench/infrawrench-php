<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

/** The caller's cost visibility scope. Every cost read enforces it server-side. */
final class CostVisibilitySummary implements \JsonSerializable
{
    /**
     * @param bool $restricted False means the caller sees every cost row the organization holds.
     * @param list<CostVisibilitySource> $sources Every scope that applies to the caller. A cost row must match all of them.
     */
    public function __construct(
        public readonly bool $restricted,
        public readonly array $sources,
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
            restricted: Coerce::toBool($data['restricted'] ?? null),
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): CostVisibilitySource => CostVisibilitySource::fromArray(Coerce::toArray($item))),
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
            'restricted' => $this->restricted,
            'sources' => array_map(static fn (CostVisibilitySource $item): array => $item->toArray(), $this->sources),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
