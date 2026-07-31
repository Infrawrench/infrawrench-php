<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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

final class ChildTypeRef implements \JsonSerializable
{
    /** @param list<array<string, mixed>>|null $fields */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly bool $supportsCreate,
        public readonly ?string $pluralDisplayName = null,
        public readonly ?array $fields = null,
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
            id: Coerce::toString($data['id'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            supportsCreate: Coerce::toBool($data['supportsCreate'] ?? null),
            pluralDisplayName: Coerce::toStringOrNull($data['pluralDisplayName'] ?? null),
            fields: Coerce::nullable($data['fields'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
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
            'id' => $this->id,
            'displayName' => $this->displayName,
            'supportsCreate' => $this->supportsCreate,
        ];
        if ($this->pluralDisplayName !== null) {
            $payload['pluralDisplayName'] = $this->pluralDisplayName;
        }
        if ($this->fields !== null) {
            $payload['fields'] = $this->fields;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
