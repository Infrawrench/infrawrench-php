<?php

/*
 * infrawrench/sdk v0.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.15.0).
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

final class ReorderRequest implements \JsonSerializable
{
    /**
     * @param list<array{kind: 'resource'|'workflow'|'widget', id: string}>|null $cards
     * @param list<string>|null $resourceIds
     */
    public function __construct(
        public readonly ?array $cards = null,
        public readonly ?array $resourceIds = null,
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
            cards: Coerce::nullable($data['cards'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            resourceIds: Coerce::nullable($data['resourceIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        ];
        if ($this->cards !== null) {
            $payload['cards'] = $this->cards;
        }
        if ($this->resourceIds !== null) {
            $payload['resourceIds'] = $this->resourceIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
