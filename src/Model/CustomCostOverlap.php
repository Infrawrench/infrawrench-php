<?php

/*
 * infrawrench/sdk v1.63.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.63.0).
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

final class CustomCostOverlap implements \JsonSerializable
{
    /**
     * @param 'overlap' $code
     * @param list<CustomCostUpload> $overlapping
     */
    public function __construct(
        public readonly string $error,
        public readonly string $code,
        public readonly array $overlapping,
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
            error: Coerce::toString($data['error'] ?? null),
            code: Coerce::toString($data['code'] ?? null),
            overlapping: Coerce::mapList($data['overlapping'] ?? null, static fn (mixed $item): CustomCostUpload => CustomCostUpload::fromArray(Coerce::toArray($item))),
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
            'error' => $this->error,
            'code' => $this->code,
            'overlapping' => array_map(static fn (CustomCostUpload $item): array => $item->toArray(), $this->overlapping),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
