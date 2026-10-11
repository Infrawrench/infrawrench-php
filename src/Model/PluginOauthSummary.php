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

/**
 * Present only when this server can connect the plugin through provider OAuth (the plugin supports
 * it and the server has a client configured). See `POST /provider-oauth/{pluginId}/authorize`.
 *
 * Spec schema: `PluginOAuthSummary`.
 */
final class PluginOauthSummary implements \JsonSerializable
{
    /**
     * @param 'read-only'|'read-write'|'full' $access What the granted token can do. `full` means the provider offers no narrower scope.
     * @param 'rotating'|'reusable'|'none' $refresh How the server keeps the access token valid: `rotating` and `reusable` refresh it before expiry, `none` means it does not expire.
     * @param string $tokenField The credential field the connection fills with the access token.
     * @param list<'server'|'desktop'> $clients OAuth clients the plugin declares. Always contains `server` here; `desktop` means the desktop app can also connect accounts it stores locally.
     */
    public function __construct(
        public readonly string $access,
        public readonly string $refresh,
        public readonly string $tokenField,
        public readonly array $clients,
        public readonly ?string $docsUrl = null,
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
            access: Coerce::toString($data['access'] ?? null),
            refresh: Coerce::toString($data['refresh'] ?? null),
            tokenField: Coerce::toString($data['tokenField'] ?? null),
            clients: Coerce::mapList($data['clients'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            docsUrl: Coerce::toStringOrNull($data['docsUrl'] ?? null),
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
            'access' => $this->access,
            'refresh' => $this->refresh,
            'tokenField' => $this->tokenField,
            'clients' => $this->clients,
        ];
        if ($this->docsUrl !== null) {
            $payload['docsUrl'] = $this->docsUrl;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
