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

final class CiResourceGrant implements \JsonSerializable
{
    /**
     * @param list<string> $outputs
     * @param list<string>|null $repos Repositories (`owner/name`). Null: every repository the organization runs CI for.
     * @param string|null $branchPattern Branches it holds for: globs separated by commas, where `*` stops at `/` and `**` does not (`main, release/*`). Null: every branch.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $resourceId,
        public readonly string $resourceTypeId,
        public readonly string $resourceName,
        public readonly string $ciName,
        public readonly array $outputs,
        public readonly ?string $secretVersion,
        public readonly ?array $repos,
        public readonly ?string $branchPattern,
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
            id: Coerce::toString($data['id'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            ciName: Coerce::toString($data['ciName'] ?? null),
            outputs: Coerce::mapList($data['outputs'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            secretVersion: Coerce::toStringOrNull($data['secretVersion'] ?? null),
            repos: Coerce::nullable($data['repos'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            branchPattern: Coerce::toStringOrNull($data['branchPattern'] ?? null),
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
            'id' => $this->id,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'resourceId' => $this->resourceId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceName' => $this->resourceName,
            'ciName' => $this->ciName,
            'outputs' => $this->outputs,
            'secretVersion' => $this->secretVersion,
            'repos' => $this->repos,
            'branchPattern' => $this->branchPattern,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
