<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PrCheckRepository implements \JsonSerializable
{
    /**
     * @param int $installationId A GitHub App installation connected to the organization (`/github/status`).
     * @param string $repo `owner/name`, as listed by `/github/repos`.
     * @param bool $enabled Post checks on this repository's pull requests. Off keeps the settings.
     * @param bool $commentEnabled Also keep one summary comment on each infrastructure pull request, edited in place on every push rather than re-posted. Needs the installation's `pull_requests: write`.
     * @param float|null $costThreshold Monthly cost increase, in the estimate's currency (USD for every provider that prices today), above which the check concludes `thresholdConclusion`. Null never trips. An increase that could not be priced never trips it either.
     * @param PrCheckThresholdConclusion::* $thresholdConclusion
     * @param list<string> $directories Path prefixes the check looks in, without leading or trailing slashes. Empty covers the whole repository.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $repo,
        public readonly bool $enabled,
        public readonly bool $commentEnabled,
        public readonly ?float $costThreshold,
        public readonly string $thresholdConclusion,
        public readonly array $directories,
        public readonly string $id,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            repo: Coerce::toString($data['repo'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            commentEnabled: Coerce::toBool($data['commentEnabled'] ?? null),
            costThreshold: Coerce::toFloatOrNull($data['costThreshold'] ?? null),
            thresholdConclusion: Coerce::toString($data['thresholdConclusion'] ?? null),
            directories: Coerce::mapList($data['directories'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            id: Coerce::toString($data['id'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'repo' => $this->repo,
            'enabled' => $this->enabled,
            'commentEnabled' => $this->commentEnabled,
            'costThreshold' => $this->costThreshold,
            'thresholdConclusion' => $this->thresholdConclusion,
            'directories' => $this->directories,
            'id' => $this->id,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
