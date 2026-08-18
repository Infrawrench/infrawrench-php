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

/**
 * The values `SshKeyType` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SshKeyType
{
    public const SSH_RSA = 'ssh-rsa';
    public const SSH_ED25519 = 'ssh-ed25519';
    public const SSH_DSS = 'ssh-dss';
    public const ECDSA_SHA2_NISTP256 = 'ecdsa-sha2-nistp256';
    public const ECDSA_SHA2_NISTP384 = 'ecdsa-sha2-nistp384';
    public const ECDSA_SHA2_NISTP521 = 'ecdsa-sha2-nistp521';
    public const SK_SSH_ED25519_OPENSSH_COM = 'sk-ssh-ed25519@openssh.com';
    public const SK_ECDSA_SHA2_NISTP256_OPENSSH_COM = 'sk-ecdsa-sha2-nistp256@openssh.com';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::SSH_RSA,
            self::SSH_ED25519,
            self::SSH_DSS,
            self::ECDSA_SHA2_NISTP256,
            self::ECDSA_SHA2_NISTP384,
            self::ECDSA_SHA2_NISTP521,
            self::SK_SSH_ED25519_OPENSSH_COM,
            self::SK_ECDSA_SHA2_NISTP256_OPENSSH_COM,
        ];
    }
}
