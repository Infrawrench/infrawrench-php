<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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
final class AgentSettings implements \JsonSerializable
{
    /**
     * @param 'codex'|'claude-code' $tool
     * @param array<string, string> $fields
     * @param 'terminal'|'t3-code'|null $surface
     * @param list<string>|null $serviceAccountIds Accounts whose plugin installs a service on the VM over SSH after setup (e.g. Tailscale). See GET /resources/ssh-install/accounts.
     * @param 't3-connect'|'tailscale'|null $t3Access
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $tool,
        public readonly array $fields,
        public readonly ?string $surface = null,
        public readonly ?array $serviceAccountIds = null,
        public readonly ?string $t3Access = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            tool: Coerce::toString($data['tool'] ?? null),
            fields: Coerce::mapValues($data['fields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            surface: Coerce::toStringOrNull($data['surface'] ?? null),
            serviceAccountIds: Coerce::nullable($data['serviceAccountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            t3Access: Coerce::toStringOrNull($data['t3Access'] ?? null),
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
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'tool' => $this->tool,
            'fields' => $this->fields,
        ];
        if ($this->surface !== null) {
            $payload['surface'] = $this->surface;
        }
        if ($this->serviceAccountIds !== null) {
            $payload['serviceAccountIds'] = $this->serviceAccountIds;
        }
        if ($this->t3Access !== null) {
            $payload['t3Access'] = $this->t3Access;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
