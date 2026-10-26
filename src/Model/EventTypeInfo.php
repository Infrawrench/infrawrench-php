<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class EventTypeInfo implements \JsonSerializable
{
    /**
     * @param 'cost'|'security'|'reliability'|'access'|'operations'|'system' $category
     * @param EventSeverity::* $defaultSeverity
     * @param bool $carriesCost Receiving it needs costs:read as well as org:settings:write.
     * @param array<string, mixed> $schema JSON Schema of `data`.
     */
    public function __construct(
        public readonly string $type,
        public readonly int $version,
        public readonly string $label,
        public readonly string $description,
        public readonly string $category,
        public readonly string $defaultSeverity,
        public readonly bool $carriesCost,
        public readonly array $schema,
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
            type: Coerce::toString($data['type'] ?? null),
            version: Coerce::toInt($data['version'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            category: Coerce::toString($data['category'] ?? null),
            defaultSeverity: Coerce::toString($data['defaultSeverity'] ?? null),
            carriesCost: Coerce::toBool($data['carriesCost'] ?? null),
            schema: Coerce::toArray($data['schema'] ?? null),
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
            'type' => $this->type,
            'version' => $this->version,
            'label' => $this->label,
            'description' => $this->description,
            'category' => $this->category,
            'defaultSeverity' => $this->defaultSeverity,
            'carriesCost' => $this->carriesCost,
            'schema' => $this->schema,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
