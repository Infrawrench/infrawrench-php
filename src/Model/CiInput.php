<?php

/*
 * infrawrench/sdk v1.118.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.118.0).
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

final class CiInput implements \JsonSerializable
{
    /**
     * @param 'string'|'boolean'|'choice'|'number' $type
     * @param bool $required A run cannot start without a value; an empty one counts as none.
     * @param string|null $default As text: `true` or `false` for a boolean, the number as written.
     * @param list<string>|null $options2 A `choice` input's values.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly bool $required,
        public readonly ?string $description = null,
        public readonly ?string $default = null,
        public readonly ?array $options2 = null,
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
            type: Coerce::toString($data['type'] ?? null),
            required: Coerce::toBool($data['required'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            default: Coerce::toStringOrNull($data['default'] ?? null),
            options2: Coerce::nullable($data['options'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'type' => $this->type,
            'required' => $this->required,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->default !== null) {
            $payload['default'] = $this->default;
        }
        if ($this->options2 !== null) {
            $payload['options'] = $this->options2;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
