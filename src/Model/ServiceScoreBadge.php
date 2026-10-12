<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class ServiceScoreBadge implements \JsonSerializable
{
    public function __construct(
        public readonly string $scorecardId,
        public readonly string $scorecardName,
        public readonly ?float $score,
        public readonly ?string $level,
        public readonly ?string $levelName,
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
            scorecardId: Coerce::toString($data['scorecardId'] ?? null),
            scorecardName: Coerce::toString($data['scorecardName'] ?? null),
            score: Coerce::toFloatOrNull($data['score'] ?? null),
            level: Coerce::toStringOrNull($data['level'] ?? null),
            levelName: Coerce::toStringOrNull($data['levelName'] ?? null),
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
            'scorecardId' => $this->scorecardId,
            'scorecardName' => $this->scorecardName,
            'score' => $this->score,
            'level' => $this->level,
            'levelName' => $this->levelName,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
