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

final class AgentClaimRequest implements \JsonSerializable
{
    /**
     * @param 'adopt'|'merge'|null $mode `adopt` keeps the workspace as its own organization and stops the clock. `merge` moves its cloud accounts into an organization you already belong to and destroys the trial. Defaults to `adopt`.
     * @param string|null $targetOrganizationId Required when `mode` is merge.
     * @param bool|null $moveHistory Merge only: also re-parent the trial's metrics and cost history. Off by default — it changes numbers the target organization may already be reporting on. Needs `costs:write`.
     */
    public function __construct(
        public readonly string $code,
        public readonly ?string $mode = null,
        public readonly ?string $targetOrganizationId = null,
        public readonly ?bool $moveHistory = null,
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
            code: Coerce::toString($data['code'] ?? null),
            mode: Coerce::toStringOrNull($data['mode'] ?? null),
            targetOrganizationId: Coerce::toStringOrNull($data['targetOrganizationId'] ?? null),
            moveHistory: Coerce::toBoolOrNull($data['moveHistory'] ?? null),
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
            'code' => $this->code,
        ];
        if ($this->mode !== null) {
            $payload['mode'] = $this->mode;
        }
        if ($this->targetOrganizationId !== null) {
            $payload['targetOrganizationId'] = $this->targetOrganizationId;
        }
        if ($this->moveHistory !== null) {
            $payload['moveHistory'] = $this->moveHistory;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
