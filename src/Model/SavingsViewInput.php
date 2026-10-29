<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class SavingsViewInput implements \JsonSerializable
{
    /** @param SavingsFindingStatusFilter::*|null $status */
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $status = null,
        public readonly ?SavingsFindingFilter $filter = null,
        public readonly ?SavingsFindingSort $sort = null,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            filter: Coerce::nullable($data['filter'] ?? null, static fn (mixed $value): SavingsFindingFilter => SavingsFindingFilter::fromArray(Coerce::toArray($value))),
            sort: Coerce::nullable($data['sort'] ?? null, static fn (mixed $value): SavingsFindingSort => SavingsFindingSort::fromArray(Coerce::toArray($value))),
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
            'name' => $this->name,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->status !== null) {
            $payload['status'] = $this->status;
        }
        if ($this->filter !== null) {
            $payload['filter'] = $this->filter->toArray();
        }
        if ($this->sort !== null) {
            $payload['sort'] = $this->sort->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
