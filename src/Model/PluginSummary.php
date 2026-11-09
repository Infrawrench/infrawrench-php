<?php

/*
 * infrawrench/sdk v1.101.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.101.0).
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

final class PluginSummary implements \JsonSerializable
{
    /**
     * @param list<CredentialField> $credentialFields
     * @param array{label: string, defaultPort: int, credentials: array<string, string>}|null $sshTunnel Present when the plugin can be reached through an SSH tunnel to a remote host.
     * @param bool|null $jumpHost This plugin's accounts are SSH hosts that other accounts can connect through.
     * @param 'keys'|'documents'|null $kvBrowser Which browser the plugin's connections open: `documents` for collections of JSON documents, `keys` for the key-value console. Absent means `keys`, or that the plugin has no key-value driver.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly string $logoSvg,
        public readonly array $credentialFields,
        public readonly mixed $preflight,
        public readonly ?PluginOauthSummary $oauth = null,
        public readonly ?array $sshTunnel = null,
        public readonly ?bool $jumpHost = null,
        public readonly ?string $kvBrowser = null,
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
            id: Coerce::toString($data['id'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            logoSvg: Coerce::toString($data['logoSvg'] ?? null),
            credentialFields: Coerce::mapList($data['credentialFields'] ?? null, static fn (mixed $item): CredentialField => CredentialField::fromArray(Coerce::toArray($item))),
            preflight: $data['preflight'] ?? null,
            oauth: Coerce::nullable($data['oauth'] ?? null, static fn (mixed $value): PluginOauthSummary => PluginOauthSummary::fromArray(Coerce::toArray($value))),
            sshTunnel: Coerce::toArrayOrNull($data['sshTunnel'] ?? null),
            jumpHost: Coerce::toBoolOrNull($data['jumpHost'] ?? null),
            kvBrowser: Coerce::toStringOrNull($data['kvBrowser'] ?? null),
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
            'id' => $this->id,
            'displayName' => $this->displayName,
            'logoSvg' => $this->logoSvg,
            'credentialFields' => array_map(static fn (CredentialField $item): array => $item->toArray(), $this->credentialFields),
            'preflight' => $this->preflight,
        ];
        if ($this->oauth !== null) {
            $payload['oauth'] = $this->oauth->toArray();
        }
        if ($this->sshTunnel !== null) {
            $payload['sshTunnel'] = $this->sshTunnel;
        }
        if ($this->jumpHost !== null) {
            $payload['jumpHost'] = $this->jumpHost;
        }
        if ($this->kvBrowser !== null) {
            $payload['kvBrowser'] = $this->kvBrowser;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
