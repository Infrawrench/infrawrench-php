<?php

/*
 * infrawrench/sdk v0.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.25.0).
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
 * A permission string. Roles may grant exact permissions like the entries in this enum, or
 * wildcards (e.g. `resources:*:read`, `*`).
 *
 * The values `Permission` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class Permission
{
    public const ACCOUNTS_READ = 'accounts:read';
    public const ACCOUNTS_WRITE = 'accounts:write';
    public const ACCOUNTS_DELETE = 'accounts:delete';
    public const RESOURCES_READ = 'resources:read';
    public const RESOURCES_WRITE = 'resources:write';
    public const RESOURCES_DELETE = 'resources:delete';
    public const RESOURCES_EXECUTE = 'resources:execute';
    public const SECRETS_READ = 'secrets:read';
    public const SECRETS_WRITE = 'secrets:write';
    public const STORAGE_READ = 'storage:read';
    public const STORAGE_WRITE = 'storage:write';
    public const DASHBOARDS_READ = 'dashboards:read';
    public const DASHBOARDS_WRITE = 'dashboards:write';
    public const DEPLOYMENTS_READ = 'deployments:read';
    public const DEPLOYMENTS_PLAN = 'deployments:plan';
    public const DEPLOYMENTS_WRITE = 'deployments:write';
    public const COSTS_READ = 'costs:read';
    public const COSTS_WRITE = 'costs:write';
    public const BUDGETS_READ = 'budgets:read';
    public const BUDGETS_WRITE = 'budgets:write';
    public const FREEZES_READ = 'freezes:read';
    public const FREEZES_WRITE = 'freezes:write';
    public const FREEZES_OVERRIDE = 'freezes:override';
    public const AUDIT_READ = 'audit:read';
    public const TEAM_READ = 'team:read';
    public const TEAM_INVITE = 'team:invite';
    public const TEAM_ROLE_WRITE = 'team:role:write';
    public const TEAM_REMOVE = 'team:remove';
    public const APIKEYS_READ = 'apikeys:read';
    public const APIKEYS_WRITE = 'apikeys:write';
    public const BILLING_READ = 'billing:read';
    public const BILLING_WRITE = 'billing:write';
    public const SSH_KEYS_READ = 'ssh-keys:read';
    public const SSH_KEYS_WRITE = 'ssh-keys:write';
    public const BASTIONS_READ = 'bastions:read';
    public const BASTIONS_WRITE = 'bastions:write';
    public const CHAT_READ = 'chat:read';
    public const CHAT_WRITE = 'chat:write';
    public const PAGES_WRITE = 'pages:write';
    public const ORG_SETTINGS_WRITE = 'org:settings:write';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::ACCOUNTS_READ,
            self::ACCOUNTS_WRITE,
            self::ACCOUNTS_DELETE,
            self::RESOURCES_READ,
            self::RESOURCES_WRITE,
            self::RESOURCES_DELETE,
            self::RESOURCES_EXECUTE,
            self::SECRETS_READ,
            self::SECRETS_WRITE,
            self::STORAGE_READ,
            self::STORAGE_WRITE,
            self::DASHBOARDS_READ,
            self::DASHBOARDS_WRITE,
            self::DEPLOYMENTS_READ,
            self::DEPLOYMENTS_PLAN,
            self::DEPLOYMENTS_WRITE,
            self::COSTS_READ,
            self::COSTS_WRITE,
            self::BUDGETS_READ,
            self::BUDGETS_WRITE,
            self::FREEZES_READ,
            self::FREEZES_WRITE,
            self::FREEZES_OVERRIDE,
            self::AUDIT_READ,
            self::TEAM_READ,
            self::TEAM_INVITE,
            self::TEAM_ROLE_WRITE,
            self::TEAM_REMOVE,
            self::APIKEYS_READ,
            self::APIKEYS_WRITE,
            self::BILLING_READ,
            self::BILLING_WRITE,
            self::SSH_KEYS_READ,
            self::SSH_KEYS_WRITE,
            self::BASTIONS_READ,
            self::BASTIONS_WRITE,
            self::CHAT_READ,
            self::CHAT_WRITE,
            self::PAGES_WRITE,
            self::ORG_SETTINGS_WRITE,
        ];
    }
}
