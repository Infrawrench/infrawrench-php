<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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

final class DnsRecord implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id of the record itself.
     * @param PluginId::* $pluginId
     * @param string|null $zoneResourceId Owning zone's resource id, or null when the record could not be attributed.
     * @param string $name Fully qualified, lowercased, no trailing dot.
     * @param bool $proxied Whether the provider proxies the record (Cloudflare's orange cloud).
     * @param list<DnsRecordTarget> $targets
     * @param 'owned'|'dangling'|'external'|'not-analysed' $status Worst classification across `targets`.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly ?string $zoneResourceId,
        public readonly ?string $zoneDomain,
        public readonly string $name,
        public readonly string $type,
        public readonly ?float $ttl,
        public readonly ?float $priority,
        public readonly bool $proxied,
        public readonly array $targets,
        public readonly string $status,
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
            zoneResourceId: Coerce::toStringOrNull($data['zoneResourceId'] ?? null),
            zoneDomain: Coerce::toStringOrNull($data['zoneDomain'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            type: Coerce::toString($data['type'] ?? null),
            ttl: Coerce::toFloatOrNull($data['ttl'] ?? null),
            priority: Coerce::toFloatOrNull($data['priority'] ?? null),
            proxied: Coerce::toBool($data['proxied'] ?? null),
            targets: Coerce::mapList($data['targets'] ?? null, static fn (mixed $item): DnsRecordTarget => DnsRecordTarget::fromArray(Coerce::toArray($item))),
            status: Coerce::toString($data['status'] ?? null),
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
            'zoneResourceId' => $this->zoneResourceId,
            'zoneDomain' => $this->zoneDomain,
            'name' => $this->name,
            'type' => $this->type,
            'ttl' => $this->ttl,
            'priority' => $this->priority,
            'proxied' => $this->proxied,
            'targets' => array_map(static fn (DnsRecordTarget $item): array => $item->toArray(), $this->targets),
            'status' => $this->status,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
