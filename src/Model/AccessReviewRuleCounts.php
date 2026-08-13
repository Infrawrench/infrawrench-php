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

final class AccessReviewRuleCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $accessReviewStalePrincipal,
        public readonly int $accessReviewAdminPrincipal,
        public readonly int $accessReviewKeyPastRotation,
        public readonly int $accessReviewNoRecordedOwner,
        public readonly int $accessReviewNoMfa,
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
            accessReviewStalePrincipal: Coerce::toInt($data['access-review:stale-principal'] ?? null),
            accessReviewAdminPrincipal: Coerce::toInt($data['access-review:admin-principal'] ?? null),
            accessReviewKeyPastRotation: Coerce::toInt($data['access-review:key-past-rotation'] ?? null),
            accessReviewNoRecordedOwner: Coerce::toInt($data['access-review:no-recorded-owner'] ?? null),
            accessReviewNoMfa: Coerce::toInt($data['access-review:no-mfa'] ?? null),
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
            'access-review:stale-principal' => $this->accessReviewStalePrincipal,
            'access-review:admin-principal' => $this->accessReviewAdminPrincipal,
            'access-review:key-past-rotation' => $this->accessReviewKeyPastRotation,
            'access-review:no-recorded-owner' => $this->accessReviewNoRecordedOwner,
            'access-review:no-mfa' => $this->accessReviewNoMfa,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
