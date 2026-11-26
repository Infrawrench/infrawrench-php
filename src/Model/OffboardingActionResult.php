<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class OffboardingActionResult implements \JsonSerializable
{
    /**
     * @param OffboardingItem $item The row after the action. A provider that refused leaves it `failed` with `lastError`; the call itself still answers 200, because the checklist recorded the outcome.
     * @param string|null $message What the provider said happens next, when it said anything.
     */
    public function __construct(
        public readonly OffboardingItem $item,
        public readonly ?string $message,
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
            item: OffboardingItem::fromArray(Coerce::toArray($data['item'] ?? null)),
            message: Coerce::toStringOrNull($data['message'] ?? null),
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
            'item' => $this->item->toArray(),
            'message' => $this->message,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
