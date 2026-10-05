<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

final class CostReportBulkProblem implements \JsonSerializable
{
    /**
     * @param 'report'|'folder'|'target' $kind
     * @param string|null $name The item's name, or null when it does not exist or is not visible to the caller.
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $id,
        public readonly ?string $name,
        public readonly string $message,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            message: Coerce::toString($data['message'] ?? null),
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
            'kind' => $this->kind,
            'id' => $this->id,
            'name' => $this->name,
            'message' => $this->message,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
