<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class BusinessMetricSourceField implements \JsonSerializable
{
    /**
     * @param 'select'|'sql'|'text'|'number' $type
     * @param list<array{id: string, label: string, description?: string}>|null $options2
     * @param list<string>|null $dependsOn
     */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly string $type,
        public readonly ?bool $required = null,
        public readonly ?string $description = null,
        public readonly ?string $placeholder = null,
        public readonly ?string $defaultValue = null,
        public readonly ?array $options2 = null,
        public readonly ?array $dependsOn = null,
        public readonly ?bool $allowCustom = null,
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
            required: Coerce::toBoolOrNull($data['required'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            placeholder: Coerce::toStringOrNull($data['placeholder'] ?? null),
            defaultValue: Coerce::toStringOrNull($data['defaultValue'] ?? null),
            options2: Coerce::nullable($data['options'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            dependsOn: Coerce::nullable($data['dependsOn'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            allowCustom: Coerce::toBoolOrNull($data['allowCustom'] ?? null),
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
        ];
        if ($this->required !== null) {
            $payload['required'] = $this->required;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->placeholder !== null) {
            $payload['placeholder'] = $this->placeholder;
        }
        if ($this->defaultValue !== null) {
            $payload['defaultValue'] = $this->defaultValue;
        }
        if ($this->options2 !== null) {
            $payload['options'] = $this->options2;
        }
        if ($this->dependsOn !== null) {
            $payload['dependsOn'] = $this->dependsOn;
        }
        if ($this->allowCustom !== null) {
            $payload['allowCustom'] = $this->allowCustom;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
