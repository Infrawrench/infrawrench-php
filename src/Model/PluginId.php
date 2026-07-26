<?php

/*
 * infrawrench/sdk v0.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.4.0).
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
 * Manifest id of an installed plugin.
 *
 * The values `PluginId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class PluginId
{
    public const AWS = 'aws';
    public const AZURE = 'azure';
    public const CLICKHOUSE = 'clickhouse';
    public const CLOUDFLARE = 'cloudflare';
    public const CLOUDINARY = 'cloudinary';
    public const DATABRICKS = 'databricks';
    public const DIGITALOCEAN = 'digitalocean';
    public const DOCKER = 'docker';
    public const FLY = 'fly';
    public const GCP = 'gcp';
    public const HETZNER = 'hetzner';
    public const KAFKA = 'kafka';
    public const KUBERNETES = 'kubernetes';
    public const MEMCACHED = 'memcached';
    public const MONGODB = 'mongodb';
    public const MSSQL = 'mssql';
    public const MYSQL = 'mysql';
    public const NEON = 'neon';
    public const NETLIFY = 'netlify';
    public const OPENSEARCH = 'opensearch';
    public const OVH = 'ovh';
    public const PLANETSCALE = 'planetscale';
    public const POSTGRES = 'postgres';
    public const REDIS = 'redis';
    public const SCALEWAY = 'scaleway';
    public const SSH = 'ssh';
    public const TURSO = 'turso';
    public const VERCEL = 'vercel';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::AWS,
            self::AZURE,
            self::CLICKHOUSE,
            self::CLOUDFLARE,
            self::CLOUDINARY,
            self::DATABRICKS,
            self::DIGITALOCEAN,
            self::DOCKER,
            self::FLY,
            self::GCP,
            self::HETZNER,
            self::KAFKA,
            self::KUBERNETES,
            self::MEMCACHED,
            self::MONGODB,
            self::MSSQL,
            self::MYSQL,
            self::NEON,
            self::NETLIFY,
            self::OPENSEARCH,
            self::OVH,
            self::PLANETSCALE,
            self::POSTGRES,
            self::REDIS,
            self::SCALEWAY,
            self::SSH,
            self::TURSO,
            self::VERCEL,
        ];
    }
}
