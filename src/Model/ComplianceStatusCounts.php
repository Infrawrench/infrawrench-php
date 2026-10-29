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

final class ComplianceStatusCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $evidence,
        public readonly int $gaps,
        public readonly int $notApplicable,
        public readonly int $total,
        public readonly int $unowned,
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
            evidence: Coerce::toInt($data['evidence'] ?? null),
            gaps: Coerce::toInt($data['gaps'] ?? null),
            notApplicable: Coerce::toInt($data['notApplicable'] ?? null),
            total: Coerce::toInt($data['total'] ?? null),
            unowned: Coerce::toInt($data['unowned'] ?? null),
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
            'evidence' => $this->evidence,
            'gaps' => $this->gaps,
            'notApplicable' => $this->notApplicable,
            'total' => $this->total,
            'unowned' => $this->unowned,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
