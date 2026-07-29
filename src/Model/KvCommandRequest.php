<?php

/*
 * infrawrench/sdk v0.14.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.14.1).
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

final class KvCommandRequest implements \JsonSerializable
{
    /** @param list<string|float> $args */
    public function __construct(
        public readonly string $accountId,
        public readonly string $command,
        public readonly array $args,
        public readonly ?string $pluginId = null,
        public readonly ?string $parentResourceId = null,
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
            command: Coerce::toString($data['command'] ?? null),
            args: Coerce::toList($data['args'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            parentResourceId: Coerce::toStringOrNull($data['parentResourceId'] ?? null),
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
            'command' => $this->command,
            'args' => $this->args,
        ];
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->parentResourceId !== null) {
            $payload['parentResourceId'] = $this->parentResourceId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
