<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class RevnuCheckoutMeasurement implements \JsonSerializable
{
    /**
     * @param string|null $anonymousId Opaque Revnu visitor id captured in the browser at checkout. Invalid values are ignored.
     * @param 'granted'|'denied'|'pending'|null $consentState Analytics consent for this checkout. A purchase with no saved answer is reported as unanswered, and one that was declined is not reported. Never copied into Stripe.
     */
    public function __construct(
        public readonly ?string $anonymousId = null,
        public readonly ?string $consentState = null,
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
            anonymousId: Coerce::toStringOrNull($data['anonymousId'] ?? null),
            consentState: Coerce::toStringOrNull($data['consentState'] ?? null),
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
        ];
        if ($this->anonymousId !== null) {
            $payload['anonymousId'] = $this->anonymousId;
        }
        if ($this->consentState !== null) {
            $payload['consentState'] = $this->consentState;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
