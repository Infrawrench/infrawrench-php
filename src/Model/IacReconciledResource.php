<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class IacReconciledResource implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'managed'|'drifted'|'unmanaged' $status `managed`: matched a state entry and agrees with it. `drifted`: matched, but live fields differ. `unmanaged`: in inventory, absent from state — somebody made it by hand.
     * @param 'import-id'|'external-id'|'identifier'|null $matchedBy How the match was made, so it can be argued with.
     * @param list<IacFieldChange> $drift
     * @param string|null $unmappableReason Set when no Terraform block could be produced for this resource, which makes its drift unknowable. Never reported as "no drift".
     * @param array<string, mixed>|null $owner Resource owner annotation, populated for unmanaged resources.
     * @param string|null $firstSeenAt When the change timeline first recorded this resource appearing.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly string $status,
        public readonly ?string $terraformType,
        public readonly ?string $terraformAddress,
        public readonly ?string $matchedBy,
        public readonly array $drift,
        public readonly ?string $unmappableReason,
        public readonly ?array $owner,
        public readonly ?string $firstSeenAt,
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
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            terraformType: Coerce::toStringOrNull($data['terraformType'] ?? null),
            terraformAddress: Coerce::toStringOrNull($data['terraformAddress'] ?? null),
            matchedBy: Coerce::toStringOrNull($data['matchedBy'] ?? null),
            drift: Coerce::mapList($data['drift'] ?? null, static fn (mixed $item): IacFieldChange => IacFieldChange::fromArray(Coerce::toArray($item))),
            unmappableReason: Coerce::toStringOrNull($data['unmappableReason'] ?? null),
            owner: Coerce::toArrayOrNull($data['owner'] ?? null),
            firstSeenAt: Coerce::toStringOrNull($data['firstSeenAt'] ?? null),
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
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'status' => $this->status,
            'terraformType' => $this->terraformType,
            'terraformAddress' => $this->terraformAddress,
            'matchedBy' => $this->matchedBy,
            'drift' => array_map(static fn (IacFieldChange $item): array => $item->toArray(), $this->drift),
            'unmappableReason' => $this->unmappableReason,
            'owner' => $this->owner,
            'firstSeenAt' => $this->firstSeenAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
