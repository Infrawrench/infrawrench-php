<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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

final class CostReportBulkError implements \JsonSerializable
{
    /**
     * @param list<CostReportBulkProblem>|null $problems Every item that blocked the request. Present when the body was well-formed.
     * @param list<mixed>|null $issues
     */
    public function __construct(
        public readonly string $error,
        public readonly ?array $problems = null,
        public readonly ?array $issues = null,
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
            error: Coerce::toString($data['error'] ?? null),
            problems: Coerce::nullable($data['problems'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostReportBulkProblem => CostReportBulkProblem::fromArray(Coerce::toArray($item)))),
            issues: Coerce::toListOrNull($data['issues'] ?? null),
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
            'error' => $this->error,
        ];
        if ($this->problems !== null) {
            $payload['problems'] = array_map(static fn (CostReportBulkProblem $item): array => $item->toArray(), $this->problems);
        }
        if ($this->issues !== null) {
            $payload['issues'] = $this->issues;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
