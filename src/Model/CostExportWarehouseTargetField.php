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

final class CostExportWarehouseTargetField implements \JsonSerializable
{
    /**
     * @param list<string> $dependsOn
     * @param bool $allowCustom A value outside the listed options is accepted (a table created on first run).
     */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly ?string $description,
        public readonly array $dependsOn,
        public readonly bool $optional,
        public readonly bool $allowCustom,
        public readonly ?string $placeholder,
        public readonly ?string $emptyLabel,
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
            description: Coerce::toStringOrNull($data['description'] ?? null),
            dependsOn: Coerce::mapList($data['dependsOn'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            optional: Coerce::toBool($data['optional'] ?? null),
            allowCustom: Coerce::toBool($data['allowCustom'] ?? null),
            placeholder: Coerce::toStringOrNull($data['placeholder'] ?? null),
            emptyLabel: Coerce::toStringOrNull($data['emptyLabel'] ?? null),
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
            'key' => $this->key,
            'label' => $this->label,
            'description' => $this->description,
            'dependsOn' => $this->dependsOn,
            'optional' => $this->optional,
            'allowCustom' => $this->allowCustom,
            'placeholder' => $this->placeholder,
            'emptyLabel' => $this->emptyLabel,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
