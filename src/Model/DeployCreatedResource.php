<?php

/*
 * infrawrench/sdk v0.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.27.0).
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

final class DeployCreatedResource implements \JsonSerializable
{
    /** @param array{pluginId: string, parentResourceId: string}|null $sidecar */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $accountId,
        public readonly string $resourceTypeId,
        public readonly string $resourceId,
        public readonly string $displayName,
        public readonly ?string $externalId = null,
        public readonly ?array $sidecar = null,
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
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            sidecar: Coerce::toArrayOrNull($data['sidecar'] ?? null),
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
            'pluginId' => $this->pluginId,
            'accountId' => $this->accountId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
        ];
        if ($this->externalId !== null) {
            $payload['externalId'] = $this->externalId;
        }
        if ($this->sidecar !== null) {
            $payload['sidecar'] = $this->sidecar;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
