<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class SshFanoutTarget implements \JsonSerializable
{
    /**
     * @param 'account'|'resource' $kind
     * @param list<string> $tags
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $label,
        public readonly string $pluginId,
        public readonly bool $running,
        public readonly bool $needsKey,
        public readonly array $tags,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $host = null,
        public readonly ?string $defaultUsername = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            running: Coerce::toBool($data['running'] ?? null),
            needsKey: Coerce::toBool($data['needsKey'] ?? null),
            tags: Coerce::mapList($data['tags'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            host: Coerce::toStringOrNull($data['host'] ?? null),
            defaultUsername: Coerce::toStringOrNull($data['defaultUsername'] ?? null),
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
            'kind' => $this->kind,
            'id' => $this->id,
            'accountId' => $this->accountId,
            'label' => $this->label,
            'pluginId' => $this->pluginId,
            'running' => $this->running,
            'needsKey' => $this->needsKey,
            'tags' => $this->tags,
        ];
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->host !== null) {
            $payload['host'] = $this->host;
        }
        if ($this->defaultUsername !== null) {
            $payload['defaultUsername'] = $this->defaultUsername;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
