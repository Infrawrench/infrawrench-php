<?php

/*
 * infrawrench/sdk v0.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.13.0).
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

final class SearchHit implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $pluginDisplayName,
        public readonly string $pluginLogoSvg,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeLabel,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $displayName,
        public readonly ?string $subtitle = null,
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
            pluginDisplayName: Coerce::toString($data['pluginDisplayName'] ?? null),
            pluginLogoSvg: Coerce::toString($data['pluginLogoSvg'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeLabel: Coerce::toString($data['resourceTypeLabel'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            subtitle: Coerce::toStringOrNull($data['subtitle'] ?? null),
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
            'pluginId' => $this->pluginId,
            'pluginDisplayName' => $this->pluginDisplayName,
            'pluginLogoSvg' => $this->pluginLogoSvg,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeLabel' => $this->resourceTypeLabel,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'displayName' => $this->displayName,
        ];
        if ($this->subtitle !== null) {
            $payload['subtitle'] = $this->subtitle;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
