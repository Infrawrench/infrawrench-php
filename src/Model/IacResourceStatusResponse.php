<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class IacResourceStatusResponse implements \JsonSerializable
{
    /**
     * @param 'managed'|'drifted'|'unmanaged'|null $status
     * @param list<IacManagedBy> $managedBy The Terraform workspaces on git.infrawrench.com whose current state holds this resource. Independent of `status`, which is about uploaded state documents. A workspace of a private repository is listed only for a caller with `git:read` (or more) in the organization. Empty when none matched, or none the caller may see.
     */
    public function __construct(
        public readonly ?string $status,
        public readonly ?string $stateId,
        public readonly ?string $stateLabel,
        public readonly ?string $terraformAddress,
        public readonly int $driftFieldCount,
        public readonly array $managedBy,
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
            status: Coerce::toStringOrNull($data['status'] ?? null),
            stateId: Coerce::toStringOrNull($data['stateId'] ?? null),
            stateLabel: Coerce::toStringOrNull($data['stateLabel'] ?? null),
            terraformAddress: Coerce::toStringOrNull($data['terraformAddress'] ?? null),
            driftFieldCount: Coerce::toInt($data['driftFieldCount'] ?? null),
            managedBy: Coerce::mapList($data['managedBy'] ?? null, static fn (mixed $item): IacManagedBy => IacManagedBy::fromArray(Coerce::toArray($item))),
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
            'status' => $this->status,
            'stateId' => $this->stateId,
            'stateLabel' => $this->stateLabel,
            'terraformAddress' => $this->terraformAddress,
            'driftFieldCount' => $this->driftFieldCount,
            'managedBy' => array_map(static fn (IacManagedBy $item): array => $item->toArray(), $this->managedBy),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
