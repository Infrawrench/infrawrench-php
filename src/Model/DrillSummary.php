<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class DrillSummary implements \JsonSerializable
{
    /**
     * @param int $eligibleCount Resources with something to restore from. A resource with no backup cannot be drilled, and listing it here would duplicate the coverage page's own unprotected finding.
     * @param int|null $worstRtoMinutes Over currently-verified rows only; null when nothing is verified, never zero.
     */
    public function __construct(
        public readonly int $eligibleCount,
        public readonly int $verifiedCount,
        public readonly int $staleCount,
        public readonly int $failedCount,
        public readonly int $neverCount,
        public readonly ?int $worstRtoMinutes,
        public readonly ?int $medianRtoMinutes,
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
            eligibleCount: Coerce::toInt($data['eligibleCount'] ?? null),
            verifiedCount: Coerce::toInt($data['verifiedCount'] ?? null),
            staleCount: Coerce::toInt($data['staleCount'] ?? null),
            failedCount: Coerce::toInt($data['failedCount'] ?? null),
            neverCount: Coerce::toInt($data['neverCount'] ?? null),
            worstRtoMinutes: Coerce::toIntOrNull($data['worstRtoMinutes'] ?? null),
            medianRtoMinutes: Coerce::toIntOrNull($data['medianRtoMinutes'] ?? null),
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
            'eligibleCount' => $this->eligibleCount,
            'verifiedCount' => $this->verifiedCount,
            'staleCount' => $this->staleCount,
            'failedCount' => $this->failedCount,
            'neverCount' => $this->neverCount,
            'worstRtoMinutes' => $this->worstRtoMinutes,
            'medianRtoMinutes' => $this->medianRtoMinutes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
