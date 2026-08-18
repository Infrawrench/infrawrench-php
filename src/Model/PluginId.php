<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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
    public const ANTHROPIC = 'anthropic';
    public const ASSEMBLYAI = 'assemblyai';
    public const AWS = 'aws';
    public const AZURE = 'azure';
    public const CARTESIA = 'cartesia';
    public const CLICKHOUSE = 'clickhouse';
    public const CLOUDFLARE = 'cloudflare';
    public const CLOUDINARY = 'cloudinary';
    public const COHERE = 'cohere';
    public const DATABRICKS = 'databricks';
    public const DEEPGRAM = 'deepgram';
    public const DEEPSEEK = 'deepseek';
    public const DIGITALOCEAN = 'digitalocean';
    public const DOCKER = 'docker';
    public const ELEVENLABS = 'elevenlabs';
    public const FIREWORKS = 'fireworks';
    public const FLY = 'fly';
    public const GCP = 'gcp';
    public const GEMINI = 'gemini';
    public const GLADIA = 'gladia';
    public const GROQ = 'groq';
    public const HETZNER = 'hetzner';
    public const KAFKA = 'kafka';
    public const KUBERNETES = 'kubernetes';
    public const MEMCACHED = 'memcached';
    public const MISTRAL = 'mistral';
    public const MONGODB = 'mongodb';
    public const MSSQL = 'mssql';
    public const MYSQL = 'mysql';
    public const NEON = 'neon';
    public const NETLIFY = 'netlify';
    public const OPENAI = 'openai';
    public const OPENROUTER = 'openrouter';
    public const OPENSEARCH = 'opensearch';
    public const OVH = 'ovh';
    public const PLANETSCALE = 'planetscale';
    public const POSTGRES = 'postgres';
    public const REDIS = 'redis';
    public const REPLICATE = 'replicate';
    public const REVAI = 'revai';
    public const SCALEWAY = 'scaleway';
    public const SPEECHMATICS = 'speechmatics';
    public const SSH = 'ssh';
    public const TOGETHER = 'together';
    public const TURSO = 'turso';
    public const UPLOADTHING = 'uploadthing';
    public const VERCEL = 'vercel';
    public const WORKOS = 'workos';
    public const XAI = 'xai';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::ANTHROPIC,
            self::ASSEMBLYAI,
            self::AWS,
            self::AZURE,
            self::CARTESIA,
            self::CLICKHOUSE,
            self::CLOUDFLARE,
            self::CLOUDINARY,
            self::COHERE,
            self::DATABRICKS,
            self::DEEPGRAM,
            self::DEEPSEEK,
            self::DIGITALOCEAN,
            self::DOCKER,
            self::ELEVENLABS,
            self::FIREWORKS,
            self::FLY,
            self::GCP,
            self::GEMINI,
            self::GLADIA,
            self::GROQ,
            self::HETZNER,
            self::KAFKA,
            self::KUBERNETES,
            self::MEMCACHED,
            self::MISTRAL,
            self::MONGODB,
            self::MSSQL,
            self::MYSQL,
            self::NEON,
            self::NETLIFY,
            self::OPENAI,
            self::OPENROUTER,
            self::OPENSEARCH,
            self::OVH,
            self::PLANETSCALE,
            self::POSTGRES,
            self::REDIS,
            self::REPLICATE,
            self::REVAI,
            self::SCALEWAY,
            self::SPEECHMATICS,
            self::SSH,
            self::TOGETHER,
            self::TURSO,
            self::UPLOADTHING,
            self::VERCEL,
            self::WORKOS,
            self::XAI,
        ];
    }
}
