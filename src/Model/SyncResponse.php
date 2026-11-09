<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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

final class SyncResponse implements \JsonSerializable
{
    /**
     * @param list<array{resourceTypeId: string, message: string}>|null $incompleteLists Resource types left as they were because their list could not be read whole: too long to read, or a page from the provider that was not a list. The stored rows are kept rather than pruned against part of a list.
     */
    public function __construct(
        public readonly int $synced,
        public readonly ?array $incompleteLists = null,
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
            synced: Coerce::toInt($data['synced'] ?? null),
            incompleteLists: Coerce::nullable($data['incompleteLists'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
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
            'synced' => $this->synced,
        ];
        if ($this->incompleteLists !== null) {
            $payload['incompleteLists'] = $this->incompleteLists;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
