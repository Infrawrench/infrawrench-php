<?php

/*
 * infrawrench/sdk v1.7.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.7.0).
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

/** The API may send `null` in place of this object. */
final class JiraIntegration implements \JsonSerializable
{
    /**
     * @param string $tokenHint Redacted marker for the stored API token, e.g. `…a7f2`. The token itself is never returned.
     */
    public function __construct(
        public readonly string $siteUrl,
        public readonly string $accountEmail,
        public readonly string $tokenHint,
        public readonly ?string $defaultProjectKey,
        public readonly ?string $defaultIssueTypeId,
        public readonly string $updatedAt,
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
            siteUrl: Coerce::toString($data['siteUrl'] ?? null),
            accountEmail: Coerce::toString($data['accountEmail'] ?? null),
            tokenHint: Coerce::toString($data['tokenHint'] ?? null),
            defaultProjectKey: Coerce::toStringOrNull($data['defaultProjectKey'] ?? null),
            defaultIssueTypeId: Coerce::toStringOrNull($data['defaultIssueTypeId'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'siteUrl' => $this->siteUrl,
            'accountEmail' => $this->accountEmail,
            'tokenHint' => $this->tokenHint,
            'defaultProjectKey' => $this->defaultProjectKey,
            'defaultIssueTypeId' => $this->defaultIssueTypeId,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
