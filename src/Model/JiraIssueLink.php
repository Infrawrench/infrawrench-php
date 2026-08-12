<?php

/*
 * infrawrench/sdk v1.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.16.0).
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

final class JiraIssueLink implements \JsonSerializable
{
    /** @param JiraSourceKind::* $sourceKind */
    public function __construct(
        public readonly string $id,
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $issueKey,
        public readonly string $issueUrl,
        public readonly ?string $createdByUserId,
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
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            issueKey: Coerce::toString($data['issueKey'] ?? null),
            issueUrl: Coerce::toString($data['issueUrl'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
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
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'issueKey' => $this->issueKey,
            'issueUrl' => $this->issueUrl,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
