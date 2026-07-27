<?php

/*
 * infrawrench/sdk v0.8.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.8.0).
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

final class ArtifactsListRequest implements \JsonSerializable
{
    public function __construct(
        public readonly string $accountId,
        public readonly string $resourceId,
        public readonly string $resourceTypeId,
        public readonly ?string $pageToken = null,
        public readonly ?string $prefix = null,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            pageToken: Coerce::toStringOrNull($data['pageToken'] ?? null),
            prefix: Coerce::toStringOrNull($data['prefix'] ?? null),
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
            'resourceId' => $this->resourceId,
            'resourceTypeId' => $this->resourceTypeId,
        ];
        if ($this->pageToken !== null) {
            $payload['pageToken'] = $this->pageToken;
        }
        if ($this->prefix !== null) {
            $payload['prefix'] = $this->prefix;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
