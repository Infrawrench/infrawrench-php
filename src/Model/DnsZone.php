<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class DnsZone implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param bool $isPrivate Split-horizon/internal zone; listed but never analysed for takeover.
     * @param int $recordCount Records synced into this zone.
     * @param int|null $providerRecordCount The provider's own record count, when reported. May exceed `recordCount` — several plugins list zones without listing their records.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $domain,
        public readonly ?string $status,
        public readonly bool $isPrivate,
        public readonly int $recordCount,
        public readonly ?int $providerRecordCount,
        public readonly int $danglingCount,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            domain: Coerce::toString($data['domain'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            isPrivate: Coerce::toBool($data['isPrivate'] ?? null),
            recordCount: Coerce::toInt($data['recordCount'] ?? null),
            providerRecordCount: Coerce::toIntOrNull($data['providerRecordCount'] ?? null),
            danglingCount: Coerce::toInt($data['danglingCount'] ?? null),
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
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'domain' => $this->domain,
            'status' => $this->status,
            'isPrivate' => $this->isPrivate,
            'recordCount' => $this->recordCount,
            'providerRecordCount' => $this->providerRecordCount,
            'danglingCount' => $this->danglingCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
