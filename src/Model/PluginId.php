<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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
    public const AIVEN = 'aiven';
    public const ALGOLIA = 'algolia';
    public const ALIBABA_CLOUD = 'alibaba-cloud';
    public const ANTHROPIC = 'anthropic';
    public const ANYSCALE = 'anyscale';
    public const ASSEMBLYAI = 'assemblyai';
    public const AUTH0 = 'auth0';
    public const AWS = 'aws';
    public const AXIOM = 'axiom';
    public const AZURE = 'azure';
    public const BACKBLAZE_B2 = 'backblaze-b2';
    public const BASETEN = 'baseten';
    public const BETTER_STACK = 'better-stack';
    public const BITBUCKET = 'bitbucket';
    public const BUILDKITE = 'buildkite';
    public const BUNNY = 'bunny';
    public const CARTESIA = 'cartesia';
    public const CEREBRAS = 'cerebras';
    public const CHECKLY = 'checkly';
    public const CHRONOSPHERE = 'chronosphere';
    public const CIRCLECI = 'circleci';
    public const CIVO = 'civo';
    public const CLERK = 'clerk';
    public const CLICKHOUSE = 'clickhouse';
    public const CLOUDFLARE = 'cloudflare';
    public const CLOUDINARY = 'cloudinary';
    public const COCKROACHDB_CLOUD = 'cockroachdb-cloud';
    public const COHERE = 'cohere';
    public const CONFLUENT_CLOUD = 'confluent-cloud';
    public const CONSUL = 'consul';
    public const CONVEX = 'convex';
    public const CORALOGIX = 'coralogix';
    public const COREWEAVE = 'coreweave';
    public const COUCHBASE_CAPELLA = 'couchbase-capella';
    public const CRUSOE = 'crusoe';
    public const CURSOR = 'cursor';
    public const DATABRICKS = 'databricks';
    public const DATADOG = 'datadog';
    public const DATASTAX_ASTRA = 'datastax-astra';
    public const DEEPGRAM = 'deepgram';
    public const DEEPSEEK = 'deepseek';
    public const DEPOT = 'depot';
    public const DEVIN = 'devin';
    public const DIGITALOCEAN = 'digitalocean';
    public const DOCKER = 'docker';
    public const DOCKER_HUB = 'docker-hub';
    public const DOPPLER = 'doppler';
    public const DYNATRACE = 'dynatrace';
    public const ELASTIC_CLOUD = 'elastic-cloud';
    public const ELEVENLABS = 'elevenlabs';
    public const EXOSCALE = 'exoscale';
    public const FAL = 'fal';
    public const FASTLY = 'fastly';
    public const FIREWORKS = 'fireworks';
    public const FLY = 'fly';
    public const GCP = 'gcp';
    public const GEMINI = 'gemini';
    public const GITHUB = 'github';
    public const GITLAB = 'gitlab';
    public const GLADIA = 'gladia';
    public const GRAFANA_CLOUD = 'grafana-cloud';
    public const GROQ = 'groq';
    public const HASHICORP_VAULT = 'hashicorp-vault';
    public const HCP_TERRAFORM = 'hcp-terraform';
    public const HEROKU = 'heroku';
    public const HETZNER = 'hetzner';
    public const HONEYCOMB = 'honeycomb';
    public const HUGGINGFACE = 'huggingface';
    public const IBM_CLOUD = 'ibm-cloud';
    public const INCIDENT_IO = 'incident-io';
    public const INFISICAL = 'infisical';
    public const INFLUXDB_CLOUD = 'influxdb-cloud';
    public const JFROG = 'jfrog';
    public const KAFKA = 'kafka';
    public const KOYEB = 'koyeb';
    public const KUBERNETES = 'kubernetes';
    public const LAMBDA_CLOUD = 'lambda-cloud';
    public const LINODE = 'linode';
    public const MAILGUN = 'mailgun';
    public const MEMCACHED = 'memcached';
    public const METRONOME = 'metronome';
    public const MISTRAL = 'mistral';
    public const MODAL = 'modal';
    public const MONGODB = 'mongodb';
    public const MONGODB_ATLAS = 'mongodb-atlas';
    public const MSSQL = 'mssql';
    public const MYSQL = 'mysql';
    public const NATS = 'nats';
    public const NEON = 'neon';
    public const NETLIFY = 'netlify';
    public const NEWRELIC = 'newrelic';
    public const NOMAD = 'nomad';
    public const NORTHFLANK = 'northflank';
    public const OKTA = 'okta';
    public const OPENAI = 'openai';
    public const OPENROUTER = 'openrouter';
    public const OPENSEARCH = 'opensearch';
    public const OPENSTACK = 'openstack';
    public const ORACLE_CLOUD = 'oracle-cloud';
    public const OVH = 'ovh';
    public const PAGERDUTY = 'pagerduty';
    public const PAPERSPACE = 'paperspace';
    public const PERPLEXITY = 'perplexity';
    public const PINECONE = 'pinecone';
    public const PLANETSCALE = 'planetscale';
    public const POSTGRES = 'postgres';
    public const POSTHOG = 'posthog';
    public const POSTMARK = 'postmark';
    public const PROMETHEUS = 'prometheus';
    public const PROXMOX = 'proxmox';
    public const PULUMI_CLOUD = 'pulumi-cloud';
    public const QDRANT_CLOUD = 'qdrant-cloud';
    public const RABBITMQ = 'rabbitmq';
    public const RAILWAY = 'railway';
    public const REDIS = 'redis';
    public const REDIS_CLOUD = 'redis-cloud';
    public const RENDER = 'render';
    public const REPLICATE = 'replicate';
    public const RESEND = 'resend';
    public const REVAI = 'revai';
    public const RUNPOD = 'runpod';
    public const S3_COMPATIBLE = 's3-compatible';
    public const SAMBANOVA = 'sambanova';
    public const SCALEWAY = 'scaleway';
    public const SENDGRID = 'sendgrid';
    public const SENTRY = 'sentry';
    public const SNOWFLAKE = 'snowflake';
    public const SPACELIFT = 'spacelift';
    public const SPEECHMATICS = 'speechmatics';
    public const SPLUNK_OBSERVABILITY = 'splunk-observability';
    public const SSH = 'ssh';
    public const STRIPE = 'stripe';
    public const SUPABASE = 'supabase';
    public const TAILSCALE = 'tailscale';
    public const TEMPORAL_CLOUD = 'temporal-cloud';
    public const TIMESCALE = 'timescale';
    public const TOGETHER = 'together';
    public const TURSO = 'turso';
    public const TWILIO = 'twilio';
    public const UPCLOUD = 'upcloud';
    public const UPLOADTHING = 'uploadthing';
    public const UPSTASH = 'upstash';
    public const VAST_AI = 'vast-ai';
    public const VERCEL = 'vercel';
    public const VOYAGE = 'voyage';
    public const VSPHERE = 'vsphere';
    public const VULTR = 'vultr';
    public const WASABI = 'wasabi';
    public const WEAVIATE_CLOUD = 'weaviate-cloud';
    public const WORKOS = 'workos';
    public const XAI = 'xai';
    public const XATA = 'xata';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::AIVEN,
            self::ALGOLIA,
            self::ALIBABA_CLOUD,
            self::ANTHROPIC,
            self::ANYSCALE,
            self::ASSEMBLYAI,
            self::AUTH0,
            self::AWS,
            self::AXIOM,
            self::AZURE,
            self::BACKBLAZE_B2,
            self::BASETEN,
            self::BETTER_STACK,
            self::BITBUCKET,
            self::BUILDKITE,
            self::BUNNY,
            self::CARTESIA,
            self::CEREBRAS,
            self::CHECKLY,
            self::CHRONOSPHERE,
            self::CIRCLECI,
            self::CIVO,
            self::CLERK,
            self::CLICKHOUSE,
            self::CLOUDFLARE,
            self::CLOUDINARY,
            self::COCKROACHDB_CLOUD,
            self::COHERE,
            self::CONFLUENT_CLOUD,
            self::CONSUL,
            self::CONVEX,
            self::CORALOGIX,
            self::COREWEAVE,
            self::COUCHBASE_CAPELLA,
            self::CRUSOE,
            self::CURSOR,
            self::DATABRICKS,
            self::DATADOG,
            self::DATASTAX_ASTRA,
            self::DEEPGRAM,
            self::DEEPSEEK,
            self::DEPOT,
            self::DEVIN,
            self::DIGITALOCEAN,
            self::DOCKER,
            self::DOCKER_HUB,
            self::DOPPLER,
            self::DYNATRACE,
            self::ELASTIC_CLOUD,
            self::ELEVENLABS,
            self::EXOSCALE,
            self::FAL,
            self::FASTLY,
            self::FIREWORKS,
            self::FLY,
            self::GCP,
            self::GEMINI,
            self::GITHUB,
            self::GITLAB,
            self::GLADIA,
            self::GRAFANA_CLOUD,
            self::GROQ,
            self::HASHICORP_VAULT,
            self::HCP_TERRAFORM,
            self::HEROKU,
            self::HETZNER,
            self::HONEYCOMB,
            self::HUGGINGFACE,
            self::IBM_CLOUD,
            self::INCIDENT_IO,
            self::INFISICAL,
            self::INFLUXDB_CLOUD,
            self::JFROG,
            self::KAFKA,
            self::KOYEB,
            self::KUBERNETES,
            self::LAMBDA_CLOUD,
            self::LINODE,
            self::MAILGUN,
            self::MEMCACHED,
            self::METRONOME,
            self::MISTRAL,
            self::MODAL,
            self::MONGODB,
            self::MONGODB_ATLAS,
            self::MSSQL,
            self::MYSQL,
            self::NATS,
            self::NEON,
            self::NETLIFY,
            self::NEWRELIC,
            self::NOMAD,
            self::NORTHFLANK,
            self::OKTA,
            self::OPENAI,
            self::OPENROUTER,
            self::OPENSEARCH,
            self::OPENSTACK,
            self::ORACLE_CLOUD,
            self::OVH,
            self::PAGERDUTY,
            self::PAPERSPACE,
            self::PERPLEXITY,
            self::PINECONE,
            self::PLANETSCALE,
            self::POSTGRES,
            self::POSTHOG,
            self::POSTMARK,
            self::PROMETHEUS,
            self::PROXMOX,
            self::PULUMI_CLOUD,
            self::QDRANT_CLOUD,
            self::RABBITMQ,
            self::RAILWAY,
            self::REDIS,
            self::REDIS_CLOUD,
            self::RENDER,
            self::REPLICATE,
            self::RESEND,
            self::REVAI,
            self::RUNPOD,
            self::S3_COMPATIBLE,
            self::SAMBANOVA,
            self::SCALEWAY,
            self::SENDGRID,
            self::SENTRY,
            self::SNOWFLAKE,
            self::SPACELIFT,
            self::SPEECHMATICS,
            self::SPLUNK_OBSERVABILITY,
            self::SSH,
            self::STRIPE,
            self::SUPABASE,
            self::TAILSCALE,
            self::TEMPORAL_CLOUD,
            self::TIMESCALE,
            self::TOGETHER,
            self::TURSO,
            self::TWILIO,
            self::UPCLOUD,
            self::UPLOADTHING,
            self::UPSTASH,
            self::VAST_AI,
            self::VERCEL,
            self::VOYAGE,
            self::VSPHERE,
            self::VULTR,
            self::WASABI,
            self::WEAVIATE_CLOUD,
            self::WORKOS,
            self::XAI,
            self::XATA,
        ];
    }
}
