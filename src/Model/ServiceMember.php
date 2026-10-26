<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class ServiceMember implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'manual'|'rule' $source
     * @param int|null $ruleIndex Index into `rules` for `rule` members.
     * @param bool $missing The resource was deleted upstream.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceName,
        public readonly ?string $externalId,
        public readonly string $source,
        public readonly ?int $ruleIndex,
        public readonly ?ServiceMemberOwner $owner,
        public readonly bool $missing,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            ruleIndex: Coerce::toIntOrNull($data['ruleIndex'] ?? null),
            owner: Coerce::nullable($data['owner'] ?? null, static fn (mixed $value): ServiceMemberOwner => ServiceMemberOwner::fromArray(Coerce::toArray($value))),
            missing: Coerce::toBool($data['missing'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceName' => $this->resourceName,
            'externalId' => $this->externalId,
            'source' => $this->source,
            'ruleIndex' => $this->ruleIndex,
            'owner' => $this->owner?->toArray(),
            'missing' => $this->missing,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
