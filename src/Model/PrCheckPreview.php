<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PrCheckPreview implements \JsonSerializable
{
    /** @param string $markdown The check run summary, as GitHub renders it. */
    public function __construct(
        public readonly ?PrCheckReport $report,
        public readonly mixed $conclusion,
        public readonly string $title,
        public readonly string $markdown,
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
            report: Coerce::nullable($data['report'] ?? null, static fn (mixed $value): PrCheckReport => PrCheckReport::fromArray(Coerce::toArray($value))),
            conclusion: $data['conclusion'] ?? null,
            title: Coerce::toString($data['title'] ?? null),
            markdown: Coerce::toString($data['markdown'] ?? null),
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
            'report' => $this->report?->toArray(),
            'conclusion' => $this->conclusion,
            'title' => $this->title,
            'markdown' => $this->markdown,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
