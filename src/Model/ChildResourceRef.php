<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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

final class ChildResourceRef implements \JsonSerializable
{
    /** @param array<string, mixed>|null $fields */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly string $resourceTypeId,
        public readonly string $pluginId,
        public readonly string $accountId,
        public readonly ?StatusDot $status = null,
        public readonly ?array $fields = null,
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
            displayName: Coerce::toString($data['displayName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            status: Coerce::nullable($data['status'] ?? null, static fn (mixed $value): StatusDot => StatusDot::fromArray(Coerce::toArray($value))),
            fields: Coerce::toArrayOrNull($data['fields'] ?? null),
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
            'id' => $this->id,
            'displayName' => $this->displayName,
            'resourceTypeId' => $this->resourceTypeId,
            'pluginId' => $this->pluginId,
            'accountId' => $this->accountId,
        ];
        if ($this->status !== null) {
            $payload['status'] = $this->status->toArray();
        }
        if ($this->fields !== null) {
            $payload['fields'] = $this->fields;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
