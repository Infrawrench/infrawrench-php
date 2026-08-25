<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class CalendarSubscription implements \JsonSerializable
{
    /**
     * @param list<'change-freeze'|'sleep-schedule'|'expiry'|'commitment-expiry'|'workflow-schedule'|'incident'> $kinds Kinds the feed carries. Empty means every kind, including ones added later.
     * @param string|null $lastAccessedAt Last fetch, written at most hourly. Its purpose is answering 'is anyone still using this?' before revoking, which an hour of staleness cannot change.
     * @param string|null $url The subscription URL, returned **only** by the create call — the token it contains is stored hashed and cannot be shown again. Lose it and mint a new feed.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $kinds,
        public readonly string $createdAt,
        public readonly ?string $lastAccessedAt,
        public readonly ?string $revokedAt,
        public readonly ?string $url = null,
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
            name: Coerce::toString($data['name'] ?? null),
            kinds: Coerce::mapList($data['kinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            lastAccessedAt: Coerce::toStringOrNull($data['lastAccessedAt'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'id' => $this->id,
            'name' => $this->name,
            'kinds' => $this->kinds,
            'createdAt' => $this->createdAt,
            'lastAccessedAt' => $this->lastAccessedAt,
            'revokedAt' => $this->revokedAt,
        ];
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
