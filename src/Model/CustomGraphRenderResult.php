<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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

final class CustomGraphRenderResult implements \JsonSerializable
{
    /**
     * @param array<string, mixed>|null $spec
     * @param list<array{level: 'info'|'warn'|'error', message: string}> $logs
     */
    public function __construct(
        public readonly bool $ok,
        public readonly ?array $spec,
        public readonly ?string $error,
        public readonly array $logs,
        public readonly string $renderedAt,
        public readonly int $durationMs,
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
            ok: Coerce::toBool($data['ok'] ?? null),
            spec: Coerce::toArrayOrNull($data['spec'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            logs: Coerce::mapList($data['logs'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            renderedAt: Coerce::toString($data['renderedAt'] ?? null),
            durationMs: Coerce::toInt($data['durationMs'] ?? null),
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
            'ok' => $this->ok,
            'spec' => $this->spec,
            'error' => $this->error,
            'logs' => $this->logs,
            'renderedAt' => $this->renderedAt,
            'durationMs' => $this->durationMs,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
