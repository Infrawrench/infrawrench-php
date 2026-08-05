<?php

/*
 * infrawrench/sdk v0.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.35.0).
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

final class MomentFeedStatus implements \JsonSerializable
{
    /**
     * @param MomentFeedId::* $feed
     * @param 'ok'|'omitted'|'error' $status `omitted` = the caller lacks the feed's read permission; `error` = the feed's query failed but the rest of the response is still valid (partial-failure tolerance).
     * @param string|null $error Short failure reason when `status` is `error`.
     * @param bool|null $truncated True when the feed hit its row cap and events were dropped.
     */
    public function __construct(
        public readonly string $feed,
        public readonly string $status,
        public readonly ?string $error = null,
        public readonly ?bool $truncated = null,
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
            feed: Coerce::toString($data['feed'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            truncated: Coerce::toBoolOrNull($data['truncated'] ?? null),
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
            'feed' => $this->feed,
            'status' => $this->status,
        ];
        if ($this->error !== null) {
            $payload['error'] = $this->error;
        }
        if ($this->truncated !== null) {
            $payload['truncated'] = $this->truncated;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
