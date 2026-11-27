<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class OffboardingPatchInput implements \JsonSerializable
{
    /**
     * @param list<string>|null $aliases
     * @param 'open'|'completed'|'canceled'|null $status `open` while the checklist is being worked through; `completed` and `canceled` freeze it as evidence (a rescan no longer changes it).
     */
    public function __construct(
        public readonly ?array $aliases = null,
        public readonly ?string $note = null,
        public readonly ?string $status = null,
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
            aliases: Coerce::nullable($data['aliases'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
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
        ];
        if ($this->aliases !== null) {
            $payload['aliases'] = $this->aliases;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->status !== null) {
            $payload['status'] = $this->status;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
