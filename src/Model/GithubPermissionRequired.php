<?php

/*
 * infrawrench/sdk v1.57.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.57.0).
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

/**
 * The installation has not accepted the permission this needs. An owner of the GitHub account
 * approves it from `manageUrl`.
 */
final class GithubPermissionRequired implements \JsonSerializable
{
    /**
     * @param 'github_permission_required' $code
     * @param list<string> $permissions
     */
    public function __construct(
        public readonly string $error,
        public readonly string $code,
        public readonly array $permissions,
        public readonly int $installationId,
        public readonly ?string $accountLogin,
        public readonly ?string $manageUrl,
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
            error: Coerce::toString($data['error'] ?? null),
            code: Coerce::toString($data['code'] ?? null),
            permissions: Coerce::mapList($data['permissions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            installationId: Coerce::toInt($data['installationId'] ?? null),
            accountLogin: Coerce::toStringOrNull($data['accountLogin'] ?? null),
            manageUrl: Coerce::toStringOrNull($data['manageUrl'] ?? null),
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
            'error' => $this->error,
            'code' => $this->code,
            'permissions' => $this->permissions,
            'installationId' => $this->installationId,
            'accountLogin' => $this->accountLogin,
            'manageUrl' => $this->manageUrl,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
