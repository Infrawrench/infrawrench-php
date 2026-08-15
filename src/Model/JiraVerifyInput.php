<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

/**
 * Supply all three to test credentials that have not been saved yet; send an empty object to
 * re-test the stored ones.
 */
final class JiraVerifyInput implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $siteUrl = null,
        public readonly ?string $accountEmail = null,
        public readonly ?string $apiToken = null,
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
            siteUrl: Coerce::toStringOrNull($data['siteUrl'] ?? null),
            accountEmail: Coerce::toStringOrNull($data['accountEmail'] ?? null),
            apiToken: Coerce::toStringOrNull($data['apiToken'] ?? null),
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
        if ($this->siteUrl !== null) {
            $payload['siteUrl'] = $this->siteUrl;
        }
        if ($this->accountEmail !== null) {
            $payload['accountEmail'] = $this->accountEmail;
        }
        if ($this->apiToken !== null) {
            $payload['apiToken'] = $this->apiToken;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
