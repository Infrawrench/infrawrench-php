<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class GithubPullRequestInput implements \JsonSerializable
{
    /**
     * @param GithubIssueSourceKind::* $sourceKind
     * @param array{kind: 'resize', recommendedSizeId: string}|array{kind: 'remove'} $change
     */
    public function __construct(
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $resourceId,
        public readonly array $change,
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
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            change: $data['change'] ?? null,
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
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'resourceId' => $this->resourceId,
            'change' => $this->change,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
