<?php

/*
 * infrawrench/sdk v1.105.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.105.0).
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

final class CiAccountCaches implements \JsonSerializable
{
    /**
     * @param float|'Infinity'|'-Infinity'|'NaN' $usedBytes
     * @param float|'Infinity'|'-Infinity'|'NaN'|null $quotaBytes
     * @param list<CiRepoCache> $repos
     * @param string|null $error Why the runners could not say what this account stores, when they could not.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $accountLogin,
        public readonly float|string $usedBytes,
        public readonly float|string|null $quotaBytes,
        public readonly array $repos,
        public readonly ?string $error,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            accountLogin: Coerce::toString($data['accountLogin'] ?? null),
            usedBytes: $data['usedBytes'] ?? null,
            quotaBytes: $data['quotaBytes'] ?? null,
            repos: Coerce::mapList($data['repos'] ?? null, static fn (mixed $item): CiRepoCache => CiRepoCache::fromArray(Coerce::toArray($item))),
            error: Coerce::toStringOrNull($data['error'] ?? null),
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
            'installationId' => $this->installationId,
            'accountLogin' => $this->accountLogin,
            'usedBytes' => $this->usedBytes,
            'quotaBytes' => $this->quotaBytes,
            'repos' => array_map(static fn (CiRepoCache $item): array => $item->toArray(), $this->repos),
            'error' => $this->error,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
