<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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

final class AccountTagCompliance implements \JsonSerializable
{
    /**
     * @param int $evaluated Resources whose stored record exposes a tag map (the scoreable set).
     * @param int|null $score Percent of evaluated resources carrying every required tag; null when none.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly int $totalResources,
        public readonly int $evaluated,
        public readonly int $compliant,
        public readonly ?int $score,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            totalResources: Coerce::toInt($data['totalResources'] ?? null),
            evaluated: Coerce::toInt($data['evaluated'] ?? null),
            compliant: Coerce::toInt($data['compliant'] ?? null),
            score: Coerce::toIntOrNull($data['score'] ?? null),
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
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'displayName' => $this->displayName,
            'totalResources' => $this->totalResources,
            'evaluated' => $this->evaluated,
            'compliant' => $this->compliant,
            'score' => $this->score,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
