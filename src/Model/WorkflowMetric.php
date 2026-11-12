<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class WorkflowMetric implements \JsonSerializable
{
    /**
     * @param string $organizationId Organization id
     * @param string $type `number`, `string` or `boolean`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $workflowId,
        public readonly string $key,
        public readonly string $label,
        public readonly string $type,
        public readonly ?string $unit,
        public readonly mixed $value,
        public readonly int $syncVersion,
        public readonly ?string $deletedAt,
        public readonly string $updatedAt,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            workflowId: Coerce::toString($data['workflowId'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            type: Coerce::toString($data['type'] ?? null),
            unit: Coerce::toStringOrNull($data['unit'] ?? null),
            value: $data['value'] ?? null,
            syncVersion: Coerce::toInt($data['syncVersion'] ?? null),
            deletedAt: Coerce::toStringOrNull($data['deletedAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'organizationId' => $this->organizationId,
            'workflowId' => $this->workflowId,
            'key' => $this->key,
            'label' => $this->label,
            'type' => $this->type,
            'unit' => $this->unit,
            'value' => $this->value,
            'syncVersion' => $this->syncVersion,
            'deletedAt' => $this->deletedAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
