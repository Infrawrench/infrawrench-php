<?php

/*
 * infrawrench/sdk v1.54.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.54.0).
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

final class GithubIssueLink implements \JsonSerializable
{
    /**
     * @param GithubIssueSourceKind::* $sourceKind
     * @param string $fingerprint Hash of the finding; also written into the issue body as a hidden marker.
     * @param 'open'|'closed' $state
     */
    public function __construct(
        public readonly string $id,
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $fingerprint,
        public readonly string $repo,
        public readonly int $installationId,
        public readonly int $issueNumber,
        public readonly string $issueUrl,
        public readonly string $state,
        public readonly bool $autoFiled,
        public readonly ?int $pullRequestNumber,
        public readonly ?string $pullRequestUrl,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly ?string $resolvedAt,
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
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            fingerprint: Coerce::toString($data['fingerprint'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            installationId: Coerce::toInt($data['installationId'] ?? null),
            issueNumber: Coerce::toInt($data['issueNumber'] ?? null),
            issueUrl: Coerce::toString($data['issueUrl'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            autoFiled: Coerce::toBool($data['autoFiled'] ?? null),
            pullRequestNumber: Coerce::toIntOrNull($data['pullRequestNumber'] ?? null),
            pullRequestUrl: Coerce::toStringOrNull($data['pullRequestUrl'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
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
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'fingerprint' => $this->fingerprint,
            'repo' => $this->repo,
            'installationId' => $this->installationId,
            'issueNumber' => $this->issueNumber,
            'issueUrl' => $this->issueUrl,
            'state' => $this->state,
            'autoFiled' => $this->autoFiled,
            'pullRequestNumber' => $this->pullRequestNumber,
            'pullRequestUrl' => $this->pullRequestUrl,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'resolvedAt' => $this->resolvedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
