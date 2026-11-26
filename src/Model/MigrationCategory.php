<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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
 * What a resource is across providers, as its plugin declares it. Resources are matched to the
 * target's type of the same category.
 *
 * The values `MigrationCategory` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class MigrationCategory
{
    public const VM = 'vm';
    public const KUBERNETES_CLUSTER = 'kubernetes-cluster';
    public const KUBERNETES_NODE_POOL = 'kubernetes-node-pool';
    public const MANAGED_POSTGRES = 'managed-postgres';
    public const MANAGED_MYSQL = 'managed-mysql';
    public const MANAGED_REDIS = 'managed-redis';
    public const MANAGED_MONGODB = 'managed-mongodb';
    public const OBJECT_STORAGE = 'object-storage';
    public const BLOCK_VOLUME = 'block-volume';
    public const FILE_STORAGE = 'file-storage';
    public const LOAD_BALANCER = 'load-balancer';
    public const CONTAINER_APP = 'container-app';
    public const SERVERLESS_FUNCTION = 'serverless-function';
    public const CONTAINER_REGISTRY = 'container-registry';
    public const STATIC_IP = 'static-ip';
    public const DNS_ZONE = 'dns-zone';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::VM,
            self::KUBERNETES_CLUSTER,
            self::KUBERNETES_NODE_POOL,
            self::MANAGED_POSTGRES,
            self::MANAGED_MYSQL,
            self::MANAGED_REDIS,
            self::MANAGED_MONGODB,
            self::OBJECT_STORAGE,
            self::BLOCK_VOLUME,
            self::FILE_STORAGE,
            self::LOAD_BALANCER,
            self::CONTAINER_APP,
            self::SERVERLESS_FUNCTION,
            self::CONTAINER_REGISTRY,
            self::STATIC_IP,
            self::DNS_ZONE,
        ];
    }
}
