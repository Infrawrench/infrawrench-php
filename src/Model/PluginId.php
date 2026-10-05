<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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
    public const ANYSCALE = 'anyscale';
    public const ASSEMBLYAI = 'assemblyai';
    public const AWS = 'aws';
    public const AZURE = 'azure';
    public const BASETEN = 'baseten';
    public const CARTESIA = 'cartesia';
    public const CIRCLECI = 'circleci';
    public const CLICKHOUSE = 'clickhouse';
    public const CLOUDFLARE = 'cloudflare';
    public const CLOUDINARY = 'cloudinary';
    public const COHERE = 'cohere';
    public const CONFLUENT_CLOUD = 'confluent-cloud';
    public const CORALOGIX = 'coralogix';
    public const COREWEAVE = 'coreweave';
    public const CRUSOE = 'crusoe';
    public const CURSOR = 'cursor';
    public const DATABRICKS = 'databricks';
    public const DATADOG = 'datadog';
    public const DEEPGRAM = 'deepgram';
    public const DEEPSEEK = 'deepseek';
    public const DEPOT = 'depot';
    public const DEVIN = 'devin';
    public const DIGITALOCEAN = 'digitalocean';
    public const DOCKER = 'docker';
    public const ELASTIC_CLOUD = 'elastic-cloud';
    public const ELEVENLABS = 'elevenlabs';
    public const FASTLY = 'fastly';
    public const FIREWORKS = 'fireworks';
    public const FLY = 'fly';
    public const GCP = 'gcp';
    public const GEMINI = 'gemini';
    public const GITHUB = 'github';
    public const GLADIA = 'gladia';
    public const GRAFANA_CLOUD = 'grafana-cloud';
    public const GROQ = 'groq';
    public const HETZNER = 'hetzner';
    public const KAFKA = 'kafka';
    public const KUBERNETES = 'kubernetes';
    public const LINODE = 'linode';
    public const MEMCACHED = 'memcached';
    public const METRONOME = 'metronome';
    public const MISTRAL = 'mistral';
    public const MODAL = 'modal';
    public const MONGODB = 'mongodb';
    public const MONGODB_ATLAS = 'mongodb-atlas';
    public const MSSQL = 'mssql';
    public const MYSQL = 'mysql';
    public const NEON = 'neon';
    public const NETLIFY = 'netlify';
    public const NEWRELIC = 'newrelic';
    public const OPENAI = 'openai';
    public const OPENROUTER = 'openrouter';
    public const OPENSEARCH = 'opensearch';
    public const ORACLE_CLOUD = 'oracle-cloud';
    public const OVH = 'ovh';
    public const PLANETSCALE = 'planetscale';
    public const POSTGRES = 'postgres';
    public const REDIS = 'redis';
    public const REDIS_CLOUD = 'redis-cloud';
    public const REPLICATE = 'replicate';
    public const REVAI = 'revai';
    public const SCALEWAY = 'scaleway';
    public const SENTRY = 'sentry';
    public const SNOWFLAKE = 'snowflake';
    public const SPEECHMATICS = 'speechmatics';
    public const SSH = 'ssh';
    public const TAILSCALE = 'tailscale';
    public const TEMPORAL_CLOUD = 'temporal-cloud';
    public const TOGETHER = 'together';
    public const TURSO = 'turso';
    public const TWILIO = 'twilio';
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
            self::ANYSCALE,
            self::ASSEMBLYAI,
            self::AWS,
            self::AZURE,
            self::BASETEN,
            self::CARTESIA,
            self::CIRCLECI,
            self::CLICKHOUSE,
            self::CLOUDFLARE,
            self::CLOUDINARY,
            self::COHERE,
            self::CONFLUENT_CLOUD,
            self::CORALOGIX,
            self::COREWEAVE,
            self::CRUSOE,
            self::CURSOR,
            self::DATABRICKS,
            self::DATADOG,
            self::DEEPGRAM,
            self::DEEPSEEK,
            self::DEPOT,
            self::DEVIN,
            self::DIGITALOCEAN,
            self::DOCKER,
            self::ELASTIC_CLOUD,
            self::ELEVENLABS,
            self::FASTLY,
            self::FIREWORKS,
            self::FLY,
            self::GCP,
            self::GEMINI,
            self::GITHUB,
            self::GLADIA,
            self::GRAFANA_CLOUD,
            self::GROQ,
            self::HETZNER,
            self::KAFKA,
            self::KUBERNETES,
            self::LINODE,
            self::MEMCACHED,
            self::METRONOME,
            self::MISTRAL,
            self::MODAL,
            self::MONGODB,
            self::MONGODB_ATLAS,
            self::MSSQL,
            self::MYSQL,
            self::NEON,
            self::NETLIFY,
            self::NEWRELIC,
            self::OPENAI,
            self::OPENROUTER,
            self::OPENSEARCH,
            self::ORACLE_CLOUD,
            self::OVH,
            self::PLANETSCALE,
            self::POSTGRES,
            self::REDIS,
            self::REDIS_CLOUD,
            self::REPLICATE,
            self::REVAI,
            self::SCALEWAY,
            self::SENTRY,
            self::SNOWFLAKE,
            self::SPEECHMATICS,
            self::SSH,
            self::TAILSCALE,
            self::TEMPORAL_CLOUD,
            self::TOGETHER,
            self::TURSO,
            self::TWILIO,
            self::UPLOADTHING,
            self::VERCEL,
            self::WORKOS,
            self::XAI,
        ];
    }
}
