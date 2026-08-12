<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class CostCentreInput implements \JsonSerializable
{
    /**
     * @param string|null $parentId Cost centre to nest this one under; null is the top level. On an update, moving a centre is this field changing — omitting it leaves the centre where it is. Rejected with 400 when the parent is unknown, is the centre itself or one of its own descendants, or when the resulting tree would be more than 4 levels deep (measured over the whole subtree being moved).
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $parentId = null,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            parentId: Coerce::toStringOrNull($data['parentId'] ?? null),
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
            'name' => $this->name,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->parentId !== null) {
            $payload['parentId'] = $this->parentId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
