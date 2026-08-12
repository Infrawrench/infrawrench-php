<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class PickerResource implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $outputKey,
        public readonly string $outputValue,
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
            label: Coerce::toString($data['label'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            outputKey: Coerce::toString($data['outputKey'] ?? null),
            outputValue: Coerce::toString($data['outputValue'] ?? null),
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
            'label' => $this->label,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'outputKey' => $this->outputKey,
            'outputValue' => $this->outputValue,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
