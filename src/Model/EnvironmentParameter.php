<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class EnvironmentParameter implements \JsonSerializable
{
    /**
     * @param 'string'|'number'|'select' $type
     * @param list<array{id: string, label: string}>|null $options2
     */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly string $type,
        public readonly bool $required,
        public readonly ?string $defaultValue = null,
        public readonly ?array $options2 = null,
        public readonly ?string $description = null,
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
            label: Coerce::toString($data['label'] ?? null),
            type: Coerce::toString($data['type'] ?? null),
            required: Coerce::toBool($data['required'] ?? null),
            defaultValue: Coerce::toStringOrNull($data['defaultValue'] ?? null),
            options2: Coerce::nullable($data['options'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            description: Coerce::toStringOrNull($data['description'] ?? null),
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
            'label' => $this->label,
            'type' => $this->type,
            'required' => $this->required,
        ];
        if ($this->defaultValue !== null) {
            $payload['defaultValue'] = $this->defaultValue;
        }
        if ($this->options2 !== null) {
            $payload['options'] = $this->options2;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
