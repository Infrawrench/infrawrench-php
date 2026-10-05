<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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

final class VirtualTagInput implements \JsonSerializable
{
    /**
     * @param string $key How filters address the tag: `virtual_tag['team'] = 'payments'`. Immutable after creation, because saved filters, budgets, reports and exports store it.
     * @param list<VirtualTagRule> $rules Evaluated in order; the first rule a row matches decides its value.
     * @param string|null $defaultValue Value for rows no rule matches; null leaves them unset.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly array $rules,
        public readonly ?string $description = null,
        public readonly ?string $defaultValue = null,
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
            name: Coerce::toString($data['name'] ?? null),
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): VirtualTagRule => VirtualTagRule::fromArray(Coerce::toArray($item))),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            defaultValue: Coerce::toStringOrNull($data['defaultValue'] ?? null),
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
            'key' => $this->key,
            'name' => $this->name,
            'rules' => array_map(static fn (VirtualTagRule $item): array => $item->toArray(), $this->rules),
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->defaultValue !== null) {
            $payload['defaultValue'] = $this->defaultValue;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
