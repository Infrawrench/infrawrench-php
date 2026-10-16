<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class IssueWebhookState implements \JsonSerializable
{
    /**
     * @param 'registered'|'manual'|null $mode `registered`: created in the tracker by Infrawrench. `manual`: created by a person with the URL and secret from here. Null: no webhook; statuses come from the poll.
     * @param string|null $url The receiver URL the tracker posts to.
     * @param string|null $lastDeliveryAt When the last correctly signed delivery arrived.
     */
    public function __construct(
        public readonly ?string $mode,
        public readonly ?string $url,
        public readonly ?string $lastDeliveryAt,
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
            mode: Coerce::toStringOrNull($data['mode'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            lastDeliveryAt: Coerce::toStringOrNull($data['lastDeliveryAt'] ?? null),
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
            'mode' => $this->mode,
            'url' => $this->url,
            'lastDeliveryAt' => $this->lastDeliveryAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
