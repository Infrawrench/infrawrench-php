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

final class LeakedSecretDismiss implements \JsonSerializable
{
    /**
     * @param 'false-positive'|'wont-fix'|'used-in-tests' $reason
     * @param bool|null $resolveUpstream Close the finding on the scanner afterwards, when it can. Defaults to true.
     */
    public function __construct(
        public readonly string $reason,
        public readonly ?string $comment = null,
        public readonly ?bool $resolveUpstream = null,
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
            reason: Coerce::toString($data['reason'] ?? null),
            comment: Coerce::toStringOrNull($data['comment'] ?? null),
            resolveUpstream: Coerce::toBoolOrNull($data['resolveUpstream'] ?? null),
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
            'reason' => $this->reason,
        ];
        if ($this->comment !== null) {
            $payload['comment'] = $this->comment;
        }
        if ($this->resolveUpstream !== null) {
            $payload['resolveUpstream'] = $this->resolveUpstream;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
