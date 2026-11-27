<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class OffboardingSummary implements \JsonSerializable
{
    /**
     * @param string $email Lower-cased.
     * @param string|null $userId Their Infrawrench user id, when they had an account.
     * @param list<string> $aliases Handles and other addresses providers know them by, normalized.
     * @param 'open'|'completed'|'canceled' $status `open` while the checklist is being worked through; `completed` and `canceled` freeze it as evidence (a rescan no longer changes it).
     * @param 'manual'|'directory' $source `manual` when somebody started it; `directory` when an identity directory reported the person deprovisioned.
     * @param bool $scanTruncated The last scan matched more synced resources than one scan reads, so some may be missing.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly ?string $name,
        public readonly ?string $userId,
        public readonly array $aliases,
        public readonly string $status,
        public readonly string $source,
        public readonly ?string $sourceDetail,
        public readonly ?string $startedByName,
        public readonly ?string $note,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $completedAt,
        public readonly ?string $lastScannedAt,
        public readonly bool $scanTruncated,
        public readonly OffboardingProgress $progress,
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
            email: Coerce::toString($data['email'] ?? null),
            name: Coerce::toStringOrNull($data['name'] ?? null),
            userId: Coerce::toStringOrNull($data['userId'] ?? null),
            aliases: Coerce::mapList($data['aliases'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            status: Coerce::toString($data['status'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            sourceDetail: Coerce::toStringOrNull($data['sourceDetail'] ?? null),
            startedByName: Coerce::toStringOrNull($data['startedByName'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
            lastScannedAt: Coerce::toStringOrNull($data['lastScannedAt'] ?? null),
            scanTruncated: Coerce::toBool($data['scanTruncated'] ?? null),
            progress: OffboardingProgress::fromArray(Coerce::toArray($data['progress'] ?? null)),
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
            'email' => $this->email,
            'name' => $this->name,
            'userId' => $this->userId,
            'aliases' => $this->aliases,
            'status' => $this->status,
            'source' => $this->source,
            'sourceDetail' => $this->sourceDetail,
            'startedByName' => $this->startedByName,
            'note' => $this->note,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'completedAt' => $this->completedAt,
            'lastScannedAt' => $this->lastScannedAt,
            'scanTruncated' => $this->scanTruncated,
            'progress' => $this->progress->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
