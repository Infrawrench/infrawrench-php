<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class CiSshKeyLending implements \JsonSerializable
{
    /**
     * @param list<string>|null $repos Repositories (`owner/name`). Null: every repository the organization runs CI for.
     * @param string|null $branchPattern Branches it holds for: globs separated by commas, where `*` stops at `/` and `**` does not (`main, release/*`). Null: every branch.
     */
    public function __construct(
        public readonly string $sshKeyId,
        public readonly string $keyName,
        public readonly string $ownerUserId,
        public readonly ?string $ownerName,
        public readonly string $ciName,
        public readonly ?array $repos,
        public readonly ?string $branchPattern,
        public readonly bool $mine,
        public readonly string $createdAt,
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
            sshKeyId: Coerce::toString($data['sshKeyId'] ?? null),
            keyName: Coerce::toString($data['keyName'] ?? null),
            ownerUserId: Coerce::toString($data['ownerUserId'] ?? null),
            ownerName: Coerce::toStringOrNull($data['ownerName'] ?? null),
            ciName: Coerce::toString($data['ciName'] ?? null),
            repos: Coerce::nullable($data['repos'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            branchPattern: Coerce::toStringOrNull($data['branchPattern'] ?? null),
            mine: Coerce::toBool($data['mine'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'sshKeyId' => $this->sshKeyId,
            'keyName' => $this->keyName,
            'ownerUserId' => $this->ownerUserId,
            'ownerName' => $this->ownerName,
            'ciName' => $this->ciName,
            'repos' => $this->repos,
            'branchPattern' => $this->branchPattern,
            'mine' => $this->mine,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
