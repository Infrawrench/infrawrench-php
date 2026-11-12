<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class TunnelSshAttachResult implements \JsonSerializable
{
    /**
     * @param list<array{label: string, ok: bool, detail?: string}> $steps
     * @param string|null $connectCommand How to reach the service once the setup finished: an `ssh` or `cloudflared` command, or the URL.
     */
    public function __construct(
        public readonly array $steps,
        public readonly ?string $connectCommand = null,
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
            steps: Coerce::mapList($data['steps'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            connectCommand: Coerce::toStringOrNull($data['connectCommand'] ?? null),
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
            'steps' => $this->steps,
        ];
        if ($this->connectCommand !== null) {
            $payload['connectCommand'] = $this->connectCommand;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
