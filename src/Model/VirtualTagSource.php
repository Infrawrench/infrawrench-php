<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

final class VirtualTagSource implements \JsonSerializable
{
    /**
     * @param string|null $valuePrefix Prepended to the copied value, e.g. `az-`.
     * @param string|null $query Cost-query-language filter that must also hold for this key to be read, e.g. `provider = 'azure'`. Null for always.
     */
    public function __construct(
        public readonly string $tagKey,
        public readonly ?string $valuePrefix = null,
        public readonly ?string $query = null,
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
            tagKey: Coerce::toString($data['tagKey'] ?? null),
            valuePrefix: Coerce::toStringOrNull($data['valuePrefix'] ?? null),
            query: Coerce::toStringOrNull($data['query'] ?? null),
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
            'tagKey' => $this->tagKey,
        ];
        if ($this->valuePrefix !== null) {
            $payload['valuePrefix'] = $this->valuePrefix;
        }
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
