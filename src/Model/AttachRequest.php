<?php

/*
 * infrawrench/sdk v0.14.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.14.1).
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

final class AttachRequest implements \JsonSerializable
{
    public function __construct(
        public readonly string $pluginId,
        public readonly string $accountId,
        public readonly string $sourceTypeId,
        public readonly string $sourceResourceId,
        public readonly string $targetTypeId,
        public readonly string $targetResourceId,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            sourceTypeId: Coerce::toString($data['sourceTypeId'] ?? null),
            sourceResourceId: Coerce::toString($data['sourceResourceId'] ?? null),
            targetTypeId: Coerce::toString($data['targetTypeId'] ?? null),
            targetResourceId: Coerce::toString($data['targetResourceId'] ?? null),
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
            'pluginId' => $this->pluginId,
            'accountId' => $this->accountId,
            'sourceTypeId' => $this->sourceTypeId,
            'sourceResourceId' => $this->sourceResourceId,
            'targetTypeId' => $this->targetTypeId,
            'targetResourceId' => $this->targetResourceId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
