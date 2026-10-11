<?php

/*
 * infrawrench/sdk v1.80.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.80.0).
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

/** Spec schema: `ProviderOAuthAuthorizeRequest`. */
final class ProviderOauthAuthorizeRequest implements \JsonSerializable
{
    /**
     * @param 'web'|'desktop' $returnTo `web`: the callback page posts the result to the window that opened it (`window.opener.postMessage`, targeted at this server's app origin). `desktop`: the callback redirects to `infrawrench://provider-oauth?payload=<base64url JSON>`.
     * @param string|null $accountId Reconnecting an existing account: its id. Echoed in the result so the client knows which account to update.
     */
    public function __construct(
        public readonly string $returnTo,
        public readonly ?string $accountId = null,
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
            returnTo: Coerce::toString($data['returnTo'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
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
            'returnTo' => $this->returnTo,
        ];
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
