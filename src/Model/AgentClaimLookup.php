<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class AgentClaimLookup implements \JsonSerializable
{
    /**
     * @param list<AgentClaimMergeTarget> $mergeTargets Organizations this user may merge the workspace into: ones they already belong to AND hold `accounts:write` in. A merge writes cloud credentials, so membership alone is not enough — the confirm route enforces the same rule.
     */
    public function __construct(
        public readonly string $registrationId,
        public readonly string $workspaceName,
        public readonly ?int $trialExpiresInMs,
        public readonly array $mergeTargets,
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
            registrationId: Coerce::toString($data['registrationId'] ?? null),
            workspaceName: Coerce::toString($data['workspaceName'] ?? null),
            trialExpiresInMs: Coerce::toIntOrNull($data['trialExpiresInMs'] ?? null),
            mergeTargets: Coerce::mapList($data['mergeTargets'] ?? null, static fn (mixed $item): AgentClaimMergeTarget => AgentClaimMergeTarget::fromArray(Coerce::toArray($item))),
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
            'registrationId' => $this->registrationId,
            'workspaceName' => $this->workspaceName,
            'trialExpiresInMs' => $this->trialExpiresInMs,
            'mergeTargets' => array_map(static fn (AgentClaimMergeTarget $item): array => $item->toArray(), $this->mergeTargets),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
