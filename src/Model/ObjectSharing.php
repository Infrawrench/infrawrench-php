<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

final class ObjectSharing implements \JsonSerializable
{
    /**
     * @param ShareableObjectType::* $objectType
     * @param OrgAccessLevel::* $orgAccess
     * @param list<ObjectAccessGrant> $grants
     * @param 'owner'|'editor'|'viewer'|'none' $callerLevel What the caller can do with this object.
     * @param array{folderId: string, folderName: string, level: 'owner'|'editor'|'viewer'|'none'}|null $inheritedFrom Access the containing folder's explicit sharing already gives the caller.
     */
    public function __construct(
        public readonly string $objectType,
        public readonly string $objectId,
        public readonly string $orgAccess,
        public readonly array $grants,
        public readonly string $callerLevel,
        public readonly ?array $inheritedFrom,
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
            objectType: Coerce::toString($data['objectType'] ?? null),
            objectId: Coerce::toString($data['objectId'] ?? null),
            orgAccess: Coerce::toString($data['orgAccess'] ?? null),
            grants: Coerce::mapList($data['grants'] ?? null, static fn (mixed $item): ObjectAccessGrant => ObjectAccessGrant::fromArray(Coerce::toArray($item))),
            callerLevel: Coerce::toString($data['callerLevel'] ?? null),
            inheritedFrom: Coerce::toArrayOrNull($data['inheritedFrom'] ?? null),
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
            'objectType' => $this->objectType,
            'objectId' => $this->objectId,
            'orgAccess' => $this->orgAccess,
            'grants' => array_map(static fn (ObjectAccessGrant $item): array => $item->toArray(), $this->grants),
            'callerLevel' => $this->callerLevel,
            'inheritedFrom' => $this->inheritedFrom,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
