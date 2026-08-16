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

final class JiraVerifyResult implements \JsonSerializable
{
    public function __construct(
        public readonly bool $ok,
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly ?string $emailAddress,
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
            ok: Coerce::toBool($data['ok'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            emailAddress: Coerce::toStringOrNull($data['emailAddress'] ?? null),
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
            'ok' => $this->ok,
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'emailAddress' => $this->emailAddress,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
