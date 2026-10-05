<?php

/*
 * infrawrench/sdk v1.63.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.63.0).
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
final class GithubRepoRef implements \JsonSerializable
{
    /**
     * @param int $installationId A GitHub App installation connected to the organization (`/github/status`).
     * @param string $fullName `owner/name`, as listed by `/github/repos`.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $fullName,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            fullName: Coerce::toString($data['fullName'] ?? null),
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
            'installationId' => $this->installationId,
            'fullName' => $this->fullName,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
