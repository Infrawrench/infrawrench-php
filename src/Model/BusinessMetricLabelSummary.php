<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class BusinessMetricLabelSummary implements \JsonSerializable
{
    /** @param list<string> $values Distinct values, alphabetical, at most 500. */
    public function __construct(
        public readonly string $key,
        public readonly array $values,
        public readonly bool $truncated,
        public readonly mixed $mapping,
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
            key: Coerce::toString($data['key'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            truncated: Coerce::toBool($data['truncated'] ?? null),
            mapping: $data['mapping'] ?? null,
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
            'key' => $this->key,
            'values' => $this->values,
            'truncated' => $this->truncated,
            'mapping' => $this->mapping,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
