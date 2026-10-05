<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
 * What an installation has **accepted**. An installation made before issue filing existed shows
 * `issues: none` until an owner of the GitHub account approves the app's updated permissions.
 */
final class GithubInstallationAccess implements \JsonSerializable
{
    /**
     * @param 'none'|'read'|'write'|'admin' $issues
     * @param 'none'|'read'|'write'|'admin' $pullRequests
     * @param 'none'|'read'|'write'|'admin' $contents
     * @param bool $checked False when GitHub could not be asked; the levels are then all `none`.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly ?string $accountLogin,
        public readonly string $issues,
        public readonly string $pullRequests,
        public readonly string $contents,
        public readonly bool $suspended,
        public readonly ?string $manageUrl,
        public readonly bool $checked,
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
            accountLogin: Coerce::toStringOrNull($data['accountLogin'] ?? null),
            issues: Coerce::toString($data['issues'] ?? null),
            pullRequests: Coerce::toString($data['pullRequests'] ?? null),
            contents: Coerce::toString($data['contents'] ?? null),
            suspended: Coerce::toBool($data['suspended'] ?? null),
            manageUrl: Coerce::toStringOrNull($data['manageUrl'] ?? null),
            checked: Coerce::toBool($data['checked'] ?? null),
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
            'accountLogin' => $this->accountLogin,
            'issues' => $this->issues,
            'pullRequests' => $this->pullRequests,
            'contents' => $this->contents,
            'suspended' => $this->suspended,
            'manageUrl' => $this->manageUrl,
            'checked' => $this->checked,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
