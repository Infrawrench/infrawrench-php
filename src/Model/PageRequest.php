<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

final class PageRequest implements \JsonSerializable
{
    /**
     * @param string $source Stable name for the system raising the page: letters, digits, `.`, `_` and `-`. It is the notification's sender, and it scopes the cooldown — two services paging under the same key never throttle each other.
     * @param string $message The alert text. Becomes the SMS and notification body.
     * @param string|null $title Short headline for the notification. Defaults to `source`.
     * @param string|null $key Throttle key, `default` when unset. Pages sharing a key are suppressed while that key is in cooldown, so a per-object key (a host, a cluster id) alerts per object while the default key alerts once for the whole source.
     * @param int|null $cooldownMinutes Minutes to suppress repeat pages under the same key. Defaults to 60; `0` sends every time.
     * @param bool|null $voice Also place a voice call to recipients who opted into voice. Off by default — reserve it for things worth waking someone up for.
     */
    public function __construct(
        public readonly string $source,
        public readonly string $message,
        public readonly ?string $title = null,
        public readonly ?string $key = null,
        public readonly ?int $cooldownMinutes = null,
        public readonly ?bool $voice = null,
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
            source: Coerce::toString($data['source'] ?? null),
            message: Coerce::toString($data['message'] ?? null),
            title: Coerce::toStringOrNull($data['title'] ?? null),
            key: Coerce::toStringOrNull($data['key'] ?? null),
            cooldownMinutes: Coerce::toIntOrNull($data['cooldownMinutes'] ?? null),
            voice: Coerce::toBoolOrNull($data['voice'] ?? null),
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
            'source' => $this->source,
            'message' => $this->message,
        ];
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }
        if ($this->key !== null) {
            $payload['key'] = $this->key;
        }
        if ($this->cooldownMinutes !== null) {
            $payload['cooldownMinutes'] = $this->cooldownMinutes;
        }
        if ($this->voice !== null) {
            $payload['voice'] = $this->voice;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
