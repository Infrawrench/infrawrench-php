<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class CiAccessOverview implements \JsonSerializable
{
    /**
     * @param list<CiConnectionAccess> $connections
     * @param list<CiResourceGrant> $grants
     * @param list<CiSshKeyLending> $sshKeys
     */
    public function __construct(
        public readonly ?string $viewerUserId,
        public readonly array $connections,
        public readonly array $grants,
        public readonly array $sshKeys,
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
            viewerUserId: Coerce::toStringOrNull($data['viewerUserId'] ?? null),
            connections: Coerce::mapList($data['connections'] ?? null, static fn (mixed $item): CiConnectionAccess => CiConnectionAccess::fromArray(Coerce::toArray($item))),
            grants: Coerce::mapList($data['grants'] ?? null, static fn (mixed $item): CiResourceGrant => CiResourceGrant::fromArray(Coerce::toArray($item))),
            sshKeys: Coerce::mapList($data['sshKeys'] ?? null, static fn (mixed $item): CiSshKeyLending => CiSshKeyLending::fromArray(Coerce::toArray($item))),
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
            'viewerUserId' => $this->viewerUserId,
            'connections' => array_map(static fn (CiConnectionAccess $item): array => $item->toArray(), $this->connections),
            'grants' => array_map(static fn (CiResourceGrant $item): array => $item->toArray(), $this->grants),
            'sshKeys' => array_map(static fn (CiSshKeyLending $item): array => $item->toArray(), $this->sshKeys),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
