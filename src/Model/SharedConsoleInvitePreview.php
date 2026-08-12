<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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

final class SharedConsoleInvitePreview implements \JsonSerializable
{
    /** @param bool|null $rejoin You are already on this console and would resume. */
    public function __construct(
        public readonly SharedConsole $share,
        public readonly bool $joinable,
        public readonly ?bool $rejoin = null,
        public readonly ?string $error = null,
        public readonly ?string $code = null,
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
            share: SharedConsole::fromArray(Coerce::toArray($data['share'] ?? null)),
            joinable: Coerce::toBool($data['joinable'] ?? null),
            rejoin: Coerce::toBoolOrNull($data['rejoin'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            code: Coerce::toStringOrNull($data['code'] ?? null),
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
            'share' => $this->share->toArray(),
            'joinable' => $this->joinable,
        ];
        if ($this->rejoin !== null) {
            $payload['rejoin'] = $this->rejoin;
        }
        if ($this->error !== null) {
            $payload['error'] = $this->error;
        }
        if ($this->code !== null) {
            $payload['code'] = $this->code;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
