<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

final class Resource implements \JsonSerializable
{
    /**
     * @param array<string, mixed> $fieldsJson
     * @param array<string, mixed> $outputsJson
     */
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly array $fieldsJson,
        public readonly array $outputsJson,
        public readonly mixed $parentResourceId,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            fieldsJson: Coerce::toArray($data['fieldsJson'] ?? null),
            outputsJson: Coerce::toArray($data['outputsJson'] ?? null),
            parentResourceId: $data['parentResourceId'] ?? null,
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
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'fieldsJson' => $this->fieldsJson,
            'outputsJson' => $this->outputsJson,
            'parentResourceId' => $this->parentResourceId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
