<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

/** The API may send `null` in place of this object. */
final class LinearIntegration implements \JsonSerializable
{
    /**
     * @param string $keyHint Redacted marker for the stored personal API key, e.g. `…a7f2`. The key itself is never returned.
     * @param string|null $defaultTeamId Team the file-issue window preselects. A Linear team id, not a team key.
     * @param bool $acknowledgeOnDone When an issue filed for a cost anomaly moves to done, record the anomaly as explained.
     */
    public function __construct(
        public readonly string $keyHint,
        public readonly ?string $defaultTeamId,
        public readonly bool $acknowledgeOnDone,
        public readonly IssueWebhookState $webhook,
        public readonly string $updatedAt,
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
            keyHint: Coerce::toString($data['keyHint'] ?? null),
            defaultTeamId: Coerce::toStringOrNull($data['defaultTeamId'] ?? null),
            acknowledgeOnDone: Coerce::toBool($data['acknowledgeOnDone'] ?? null),
            webhook: IssueWebhookState::fromArray(Coerce::toArray($data['webhook'] ?? null)),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'keyHint' => $this->keyHint,
            'defaultTeamId' => $this->defaultTeamId,
            'acknowledgeOnDone' => $this->acknowledgeOnDone,
            'webhook' => $this->webhook->toArray(),
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
