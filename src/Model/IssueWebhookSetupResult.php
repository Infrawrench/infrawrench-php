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

final class IssueWebhookSetupResult implements \JsonSerializable
{
    /**
     * @param string|null $secret Jira manual mode only: the signing secret to paste into Jira's webhook form. Returned this once; it is stored encrypted and never read back.
     * @param string|null $fallbackReason Why automatic registration fell back to manual.
     */
    public function __construct(
        public readonly IssueWebhookState $webhook,
        public readonly ?string $secret = null,
        public readonly ?string $fallbackReason = null,
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
            webhook: IssueWebhookState::fromArray(Coerce::toArray($data['webhook'] ?? null)),
            secret: Coerce::toStringOrNull($data['secret'] ?? null),
            fallbackReason: Coerce::toStringOrNull($data['fallbackReason'] ?? null),
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
            'webhook' => $this->webhook->toArray(),
        ];
        if ($this->secret !== null) {
            $payload['secret'] = $this->secret;
        }
        if ($this->fallbackReason !== null) {
            $payload['fallbackReason'] = $this->fallbackReason;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
