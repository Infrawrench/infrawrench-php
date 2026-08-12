<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class JiraIntegrationInput implements \JsonSerializable
{
    /**
     * @param string $siteUrl Jira Cloud site address. Must resolve to a .atlassian.net (or legacy .jira.com) host; a bare hostname and a pasted board or issue URL are both accepted and normalized.
     * @param string $accountEmail Atlassian account email — the username half of the basic-auth pair.
     * @param string|null $apiToken API token from id.atlassian.com. Omit to keep the stored token; required on first connect.
     */
    public function __construct(
        public readonly string $siteUrl,
        public readonly string $accountEmail,
        public readonly ?string $apiToken = null,
        public readonly ?string $defaultProjectKey = null,
        public readonly ?string $defaultIssueTypeId = null,
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
            apiToken: Coerce::toStringOrNull($data['apiToken'] ?? null),
            defaultProjectKey: Coerce::toStringOrNull($data['defaultProjectKey'] ?? null),
            defaultIssueTypeId: Coerce::toStringOrNull($data['defaultIssueTypeId'] ?? null),
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
            'siteUrl' => $this->siteUrl,
            'accountEmail' => $this->accountEmail,
        ];
        if ($this->apiToken !== null) {
            $payload['apiToken'] = $this->apiToken;
        }
        if ($this->defaultProjectKey !== null) {
            $payload['defaultProjectKey'] = $this->defaultProjectKey;
        }
        if ($this->defaultIssueTypeId !== null) {
            $payload['defaultIssueTypeId'] = $this->defaultIssueTypeId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
