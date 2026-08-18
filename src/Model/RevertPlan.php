<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class RevertPlan implements \JsonSerializable
{
    /**
     * @param list<RevertFieldPlan> $fields Every field of the recorded diff, in the order the event recorded them.
     * @param list<string> $revertibleFields The keys that would actually be written.
     * @param string|null $blockedReason Why nothing would be written, or null when something would.
     */
    public function __construct(
        public readonly array $fields,
        public readonly array $revertibleFields,
        public readonly bool $revertible,
        public readonly ?string $blockedReason,
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
            fields: Coerce::mapList($data['fields'] ?? null, static fn (mixed $item): RevertFieldPlan => RevertFieldPlan::fromArray(Coerce::toArray($item))),
            revertibleFields: Coerce::mapList($data['revertibleFields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            revertible: Coerce::toBool($data['revertible'] ?? null),
            blockedReason: Coerce::toStringOrNull($data['blockedReason'] ?? null),
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
            'fields' => array_map(static fn (RevertFieldPlan $item): array => $item->toArray(), $this->fields),
            'revertibleFields' => $this->revertibleFields,
            'revertible' => $this->revertible,
            'blockedReason' => $this->blockedReason,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
