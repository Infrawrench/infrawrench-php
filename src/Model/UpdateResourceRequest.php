<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class UpdateResourceRequest implements \JsonSerializable
{
    /** @param array<string, string> $fields */
    public function __construct(
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceId,
        public readonly array $fields,
        public readonly ?string $parentResourceId = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            fields: Coerce::mapValues($data['fields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            parentResourceId: Coerce::toStringOrNull($data['parentResourceId'] ?? null),
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
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceId' => $this->resourceId,
            'fields' => $this->fields,
        ];
        if ($this->parentResourceId !== null) {
            $payload['parentResourceId'] = $this->parentResourceId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
