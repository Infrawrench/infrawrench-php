<?php

/*
 * infrawrench/sdk v0.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.13.0).
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
 * Resource type id. Note: not every plugin exposes every type — see the plugin's `resourceTypes`
 * for the valid (pluginId, typeId) pairs.
 *
 * The values `ResourceTypeId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ResourceTypeId
{
    public const ACCESS_APPLICATION = 'access-application';
    public const ACCESS_POLICY = 'access-policy';
    public const ACCOUNT = 'account';
    public const ACM_CERTIFICATE = 'acm-certificate';
    public const AGENT_API_KEY = 'agent-api-key';
    public const AI_GATEWAY = 'ai-gateway';
    public const AI_SEARCH = 'ai-search';
    public const ALB = 'alb';
    public const ALERT_POLICY = 'alert-policy';
    public const ALLOYDB_CLUSTER = 'alloydb-cluster';
    public const ALLOYDB_INSTANCE = 'alloydb-instance';
    public const API_GATEWAY = 'api-gateway';
    public const API_KEY = 'api-key';
    public const APP = 'app';
    public const APP_ENGINE_SERVICE = 'app-engine-service';
    public const APPRUNNER_SERVICE = 'apprunner-service';
    public const ARTIFACT_REGISTRY_REPO = 'artifact-registry-repo';
    public const AUDIT_EVENT = 'audit-event';
    public const AUTO_SCALING_GROUP = 'auto-scaling-group';
    public const AZURE_AKS_CLUSTER = 'azure-aks-cluster';
    public const AZURE_APP_GATEWAY = 'azure-app-gateway';
    public const AZURE_APP_REGISTRATION = 'azure-app-registration';
    public const AZURE_APP_SERVICE = 'azure-app-service';
    public const AZURE_CONTAINER_INSTANCE = 'azure-container-instance';
    public const AZURE_CONTAINER_REGISTRY = 'azure-container-registry';
    public const AZURE_COSMOS_DB = 'azure-cosmos-db';
    public const AZURE_DISK = 'azure-disk';
    public const AZURE_DNS_ZONE = 'azure-dns-zone';
    public const AZURE_EVENT_HUB = 'azure-event-hub';
    public const AZURE_FIREWALL = 'azure-firewall';
    public const AZURE_FUNCTION_APP = 'azure-function-app';
    public const AZURE_KEY_VAULT = 'azure-key-vault';
    public const AZURE_LOAD_BALANCER = 'azure-load-balancer';
    public const AZURE_LOG_ANALYTICS = 'azure-log-analytics';
    public const AZURE_MANAGED_IDENTITY = 'azure-managed-identity';
    public const AZURE_MYSQL_FLEXIBLE = 'azure-mysql-flexible';
    public const AZURE_NAT_GATEWAY = 'azure-nat-gateway';
    public const AZURE_NSG = 'azure-nsg';
    public const AZURE_POSTGRES_FLEXIBLE = 'azure-postgres-flexible';
    public const AZURE_PRIVATE_DNS_ZONE = 'azure-private-dns-zone';
    public const AZURE_PUBLIC_IP = 'azure-public-ip';
    public const AZURE_REDIS_CACHE = 'azure-redis-cache';
    public const AZURE_RESOURCE_GROUP = 'azure-resource-group';
    public const AZURE_ROUTE_TABLE = 'azure-route-table';
    public const AZURE_SERVICE_BUS = 'azure-service-bus';
    public const AZURE_SQL_DATABASE = 'azure-sql-database';
    public const AZURE_STORAGE_ACCOUNT = 'azure-storage-account';
    public const AZURE_SUBNET = 'azure-subnet';
    public const AZURE_VM = 'azure-vm';
    public const AZURE_VNET = 'azure-vnet';
    public const BACKEND_SERVICE = 'backend-service';
    public const BACKUP_VAULT = 'backup-vault';
    public const BALANCE = 'balance';
    public const BATCH = 'batch';
    public const BATCH_INFERENCE_JOB = 'batch-inference-job';
    public const BATCH_JOB_QUEUE = 'batch-job-queue';
    public const BEDROCK_MODEL = 'bedrock-model';
    public const BIGQUERY_DATASET = 'bigquery-dataset';
    public const BIGQUERY_TABLE = 'bigquery-table';
    public const BIGTABLE_INSTANCE = 'bigtable-instance';
    public const BLOCK_VOLUME = 'block-volume';
    public const CACHE_RULE = 'cache-rule';
    public const CACHED_CONTENT = 'cached-content';
    public const CERTIFICATE = 'certificate';
    public const CH_DATABASE = 'ch-database';
    public const CH_SERVICE = 'ch-service';
    public const CLOUD_ARMOR_POLICY = 'cloud-armor-policy';
    public const CLOUD_BUILD_TRIGGER = 'cloud-build-trigger';
    public const CLOUD_DEPLOY_PIPELINE = 'cloud-deploy-pipeline';
    public const CLOUD_DNS_RECORD_SET = 'cloud-dns-record-set';
    public const CLOUD_DNS_ZONE = 'cloud-dns-zone';
    public const CLOUD_FUNCTION = 'cloud-function';
    public const CLOUD_NAT = 'cloud-nat';
    public const CLOUD_ROUTER = 'cloud-router';
    public const CLOUD_RUN_SERVICE = 'cloud-run-service';
    public const CLOUD_SCHEDULER_JOB = 'cloud-scheduler-job';
    public const CLOUD_TASKS_QUEUE = 'cloud-tasks-queue';
    public const CLOUDFORMATION_STACK = 'cloudformation-stack';
    public const CLOUDFRONT_DISTRIBUTION = 'cloudfront-distribution';
    public const CLOUDSQL_INSTANCE = 'cloudsql-instance';
    public const CLOUDTRAIL_TRAIL = 'cloudtrail-trail';
    public const CLOUDWATCH_ALARM = 'cloudwatch-alarm';
    public const CLOUDWATCH_LOG_GROUP = 'cloudwatch-log-group';
    public const CODEBUILD_PROJECT = 'codebuild-project';
    public const CODEPIPELINE_PIPELINE = 'codepipeline-pipeline';
    public const COGNITO_USER_POOL = 'cognito-user-pool';
    public const COLLECTION = 'collection';
    public const COMPOSER_ENVIRONMENT = 'composer-environment';
    public const CONTAINER = 'container';
    public const CUSTOM_HOSTNAME = 'custom-hostname';
    public const CUSTOM_VOICE = 'custom-voice';
    public const D1_DATABASE = 'd1-database';
    public const DATABRICKS_APP = 'databricks-app';
    public const DATABRICKS_CATALOG = 'databricks-catalog';
    public const DATABRICKS_CLUSTER = 'databricks-cluster';
    public const DATABRICKS_CLUSTER_POLICY = 'databricks-cluster-policy';
    public const DATABRICKS_DASHBOARD = 'databricks-dashboard';
    public const DATABRICKS_FUNCTION = 'databricks-function';
    public const DATABRICKS_JOB = 'databricks-job';
    public const DATABRICKS_MODEL_VERSION = 'databricks-model-version';
    public const DATABRICKS_NODE_TYPE = 'databricks-node-type';
    public const DATABRICKS_PIPELINE = 'databricks-pipeline';
    public const DATABRICKS_REGISTERED_MODEL = 'databricks-registered-model';
    public const DATABRICKS_REPO = 'databricks-repo';
    public const DATABRICKS_SCHEMA = 'databricks-schema';
    public const DATABRICKS_SECRET_SCOPE = 'databricks-secret-scope';
    public const DATABRICKS_SERVING_ENDPOINT = 'databricks-serving-endpoint';
    public const DATABRICKS_SQL_QUERY = 'databricks-sql-query';
    public const DATABRICKS_SQL_WAREHOUSE = 'databricks-sql-warehouse';
    public const DATABRICKS_TABLE = 'databricks-table';
    public const DATABRICKS_VECTOR_SEARCH_ENDPOINT = 'databricks-vector-search-endpoint';
    public const DATABRICKS_VECTOR_SEARCH_INDEX = 'databricks-vector-search-index';
    public const DATABRICKS_VOLUME = 'databricks-volume';
    public const DATABRICKS_WORKSPACE_OBJECT = 'databricks-workspace-object';
    public const DATAFLOW_JOB = 'dataflow-job';
    public const DATASET = 'dataset';
    public const DB_USER = 'db-user';
    public const DEDICATED_INFERENCE = 'dedicated-inference';
    public const DEPLOYED_MODEL = 'deployed-model';
    public const DEPLOYMENT = 'deployment';
    public const DNS_RECORD = 'dns-record';
    public const DOCKER_CONTAINER = 'docker-container';
    public const DOCKER_IMAGE = 'docker-image';
    public const DOCKER_NETWORK = 'docker-network';
    public const DOCKER_VOLUME = 'docker-volume';
    public const DOCUMENTDB_CLUSTER = 'documentdb-cluster';
    public const DOKS_CLUSTER = 'doks-cluster';
    public const DOMAIN = 'domain';
    public const DROPLET = 'droplet';
    public const DURABLE_OBJECT_NAMESPACE = 'durable-object-namespace';
    public const DYNAMODB_TABLE = 'dynamodb-table';
    public const EBS_VOLUME = 'ebs-volume';
    public const EC2_INSTANCE = 'ec2-instance';
    public const ECR_REPOSITORY = 'ecr-repository';
    public const ECS_SERVICE = 'ecs-service';
    public const EFS_FILE_SYSTEM = 'efs-file-system';
    public const EKS_CLUSTER = 'eks-cluster';
    public const ELASTIC_IP = 'elastic-ip';
    public const ELASTICACHE_CLUSTER = 'elasticache-cluster';
    public const EMAIL_ROUTING_RULE = 'email-routing-rule';
    public const EMBED_JOB = 'embed-job';
    public const ENDPOINT = 'endpoint';
    public const EVAL = 'eval';
    public const EVALUATION = 'evaluation';
    public const EVENTBRIDGE_RULE = 'eventbridge-rule';
    public const FILE = 'file';
    public const FILE_SEARCH_DOCUMENT = 'file-search-document';
    public const FILE_SEARCH_STORE = 'file-search-store';
    public const FINE_TUNE = 'fine-tune';
    public const FINE_TUNING_JOB = 'fine-tuning-job';
    public const FINETUNED_MODEL = 'finetuned-model';
    public const FIRESTORE_DATABASE = 'firestore-database';
    public const FIREWALL = 'firewall';
    public const FIREWALL_RULE = 'firewall-rule';
    public const FLOATING_IP = 'floating-ip';
    public const FOLDER = 'folder';
    public const FORWARDING_RULE = 'forwarding-rule';
    public const GATEWAY = 'gateway';
    public const GCE_DISK = 'gce-disk';
    public const GCE_INSTANCE = 'gce-instance';
    public const GCP_SERVICE_ACCOUNT = 'gcp-service-account';
    public const GCS_BUCKET = 'gcs-bucket';
    public const GEN_AI_AGENT = 'gen-ai-agent';
    public const GEN_AI_KNOWLEDGE_BASE = 'gen-ai-knowledge-base';
    public const GEN_AI_MODEL_ROUTER = 'gen-ai-model-router';
    public const GKE_CLUSTER = 'gke-cluster';
    public const GLUE_DATABASE = 'glue-database';
    public const GROQ_BATCH = 'groq-batch';
    public const GROQ_FILE = 'groq-file';
    public const GROQ_FINE_TUNING = 'groq-fine-tuning';
    public const GROQ_MODEL = 'groq-model';
    public const HARDWARE = 'hardware';
    public const HEALTH_CHECK = 'health-check';
    public const HEALTHCHECK = 'healthcheck';
    public const HISTORY_ITEM = 'history-item';
    public const HYPERDRIVE = 'hyperdrive';
    public const IAM_ROLE = 'iam-role';
    public const IAM_USER = 'iam-user';
    public const IMAGE = 'image';
    public const INFERENCE_BATCH = 'inference-batch';
    public const INSTANCE = 'instance';
    public const INSTANCE_GROUP = 'instance-group';
    public const INSTANCE_TEMPLATE = 'instance-template';
    public const INTERNET_GATEWAY = 'internet-gateway';
    public const INVITE = 'invite';
    public const IP_ACCESS_RULE = 'ip-access-rule';
    public const IP_ALLOCATION = 'ip-allocation';
    public const JOB = 'job';
    public const K8S_CLUSTER = 'k8s-cluster';
    public const K8S_CONFIGMAP = 'k8s-configmap';
    public const K8S_CRONJOB = 'k8s-cronjob';
    public const K8S_DAEMONSET = 'k8s-daemonset';
    public const K8S_DEPLOYMENT = 'k8s-deployment';
    public const K8S_INGRESS = 'k8s-ingress';
    public const K8S_JOB = 'k8s-job';
    public const K8S_NAMESPACE = 'k8s-namespace';
    public const K8S_POD = 'k8s-pod';
    public const K8S_SECRET = 'k8s-secret';
    public const K8S_SERVICE = 'k8s-service';
    public const K8S_STATEFULSET = 'k8s-statefulset';
    public const KAFKA_CLUSTER = 'kafka-cluster';
    public const KAFKA_CONSUMER_GROUP = 'kafka-consumer-group';
    public const KAFKA_TOPIC = 'kafka-topic';
    public const KAPSULE_CLUSTER = 'kapsule-cluster';
    public const KINESIS_STREAM = 'kinesis-stream';
    public const KMS_KEY = 'kms-key';
    public const KMS_KEY_RING = 'kms-key-ring';
    public const KV_NAMESPACE = 'kv-namespace';
    public const LAMBDA_FUNCTION = 'lambda-function';
    public const LOAD_BALANCER = 'load-balancer';
    public const LOG_SINK = 'log-sink';
    public const LOGPUSH_JOB = 'logpush-job';
    public const MACHINE = 'machine';
    public const MANAGED_DATABASE = 'managed-database';
    public const MANAGED_DB = 'managed-db';
    public const MANAGED_ENDPOINT = 'managed-endpoint';
    public const MANAGED_KUBE = 'managed-kube';
    public const MEDIA_ASSET = 'media-asset';
    public const MEMBER = 'member';
    public const MEMCACHED_INSTANCE = 'memcached-instance';
    public const MEMORYSTORE_MEMCACHED = 'memorystore-memcached';
    public const MEMORYSTORE_REDIS = 'memorystore-redis';
    public const MESSAGE_BATCH = 'message-batch';
    public const MISTRAL_API_KEY = 'mistral-api-key';
    public const MISTRAL_BATCH_JOB = 'mistral-batch-job';
    public const MISTRAL_FILE = 'mistral-file';
    public const MISTRAL_FINE_TUNING_JOB = 'mistral-fine-tuning-job';
    public const MISTRAL_MODEL = 'mistral-model';
    public const MISTRAL_VOICE = 'mistral-voice';
    public const MODEL = 'model';
    public const MODEL_API_KEY = 'model-api-key';
    public const MODEL_ENDPOINT = 'model-endpoint';
    public const MONGODB_DATABASE = 'mongodb-database';
    public const MQ_BROKER = 'mq-broker';
    public const MSK_CLUSTER = 'msk-cluster';
    public const MSSQL_DATABASE = 'mssql-database';
    public const MYSQL_DATABASE = 'mysql-database';
    public const NAT_GATEWAY = 'nat-gateway';
    public const NEON_AI_GATEWAY = 'neon-ai-gateway';
    public const NEON_AUTH = 'neon-auth';
    public const NEON_AUTH_DOMAIN = 'neon-auth-domain';
    public const NEON_AUTH_OAUTH_PROVIDER = 'neon-auth-oauth-provider';
    public const NEON_BRANCH = 'neon-branch';
    public const NEON_BUCKET = 'neon-bucket';
    public const NEON_CREDENTIAL = 'neon-credential';
    public const NEON_DATA_API = 'neon-data-api';
    public const NEON_DATABASE = 'neon-database';
    public const NEON_ENDPOINT = 'neon-endpoint';
    public const NEON_FUNCTION = 'neon-function';
    public const NEON_PROJECT = 'neon-project';
    public const NEON_ROLE = 'neon-role';
    public const NEON_SNAPSHOT = 'neon-snapshot';
    public const NEPTUNE_CLUSTER = 'neptune-cluster';
    public const NETLIFY_BUILD_HOOK = 'netlify-build-hook';
    public const NETLIFY_DEPLOY = 'netlify-deploy';
    public const NETLIFY_DNS_RECORD = 'netlify-dns-record';
    public const NETLIFY_DNS_ZONE = 'netlify-dns-zone';
    public const NETLIFY_ENV_VAR = 'netlify-env-var';
    public const NETLIFY_FORM = 'netlify-form';
    public const NETLIFY_SITE = 'netlify-site';
    public const NETWORK = 'network';
    public const NFS_SHARE = 'nfs-share';
    public const NOTIFICATION_POLICY = 'notification-policy';
    public const OBJECT_STORAGE_BUCKET = 'object-storage-bucket';
    public const OPENSEARCH_CLUSTER = 'opensearch-cluster';
    public const OPENSEARCH_DOMAIN = 'opensearch-domain';
    public const ORGANIZATION_USER = 'organization-user';
    public const PAGE_RULE = 'page-rule';
    public const PG_DATABASE = 'pg-database';
    public const PG_SCHEMA = 'pg-schema';
    public const PLACEMENT_GROUP = 'placement-group';
    public const PREDICTION = 'prediction';
    public const PRIMARY_IP = 'primary-ip';
    public const PRIVATE_NETWORK = 'private-network';
    public const PROJECT = 'project';
    public const PROJECT_API_KEY = 'project-api-key';
    public const PRONUNCIATION_DICT = 'pronunciation-dict';
    public const PRONUNCIATION_DICTIONARY = 'pronunciation-dictionary';
    public const PROVIDER = 'provider';
    public const PS_BACKUP = 'ps-backup';
    public const PS_BRANCH = 'ps-branch';
    public const PS_DATABASE = 'ps-database';
    public const PS_DEPLOY_REQUEST = 'ps-deploy-request';
    public const PS_PASSWORD = 'ps-password';
    public const PUBSUB_SUBSCRIPTION = 'pubsub-subscription';
    public const PUBSUB_TOPIC = 'pubsub-topic';
    public const QUEUE = 'queue';
    public const QUOTA = 'quota';
    public const R2_BUCKET = 'r2-bucket';
    public const RATE_LIMIT_RULE = 'rate-limit-rule';
    public const RDB_INSTANCE = 'rdb-instance';
    public const RDS_CLUSTER = 'rds-cluster';
    public const RDS_INSTANCE = 'rds-instance';
    public const REDIRECT_RULE = 'redirect-rule';
    public const REDIS_INSTANCE = 'redis-instance';
    public const REDSHIFT_CLUSTER = 'redshift-cluster';
    public const ROUTE_TABLE = 'route-table';
    public const ROUTE53_HEALTH_CHECK = 'route53-health-check';
    public const ROUTE53_HOSTED_ZONE = 'route53-hosted-zone';
    public const ROUTE53_RECORD_SET = 'route53-record-set';
    public const S3_BUCKET = 's3-bucket';
    public const SAGEMAKER_ENDPOINT = 'sagemaker-endpoint';
    public const SECRET = 'secret';
    public const SECRET_MANAGER_SECRET = 'secret-manager-secret';
    public const SECRETS_MANAGER_SECRET = 'secrets-manager-secret';
    public const SECURITY_GROUP = 'security-group';
    public const SERVER = 'server';
    public const SNAPSHOT = 'snapshot';
    public const SNS_TOPIC = 'sns-topic';
    public const SPACES_BUCKET = 'spaces-bucket';
    public const SPANNER_BACKUP = 'spanner-backup';
    public const SPANNER_DATABASE = 'spanner-database';
    public const SPANNER_INSTANCE = 'spanner-instance';
    public const SPECTRUM_APPLICATION = 'spectrum-application';
    public const SQS_QUEUE = 'sqs-queue';
    public const SSH_KEY = 'ssh-key';
    public const SSH_TARGET = 'ssh-target';
    public const SSL_CERTIFICATE = 'ssl-certificate';
    public const SSM_PARAMETER = 'ssm-parameter';
    public const STATIC_IP = 'static-ip';
    public const STEP_FUNCTION = 'step-function';
    public const SUBNET = 'subnet';
    public const SUPERVISED_FINE_TUNING_JOB = 'supervised-fine-tuning-job';
    public const TARGET_GROUP = 'target-group';
    public const TRAINING = 'training';
    public const TRANSCRIPT = 'transcript';
    public const TRANSCRIPTION = 'transcription';
    public const TRANSFORMATION = 'transformation';
    public const TUNED_MODEL = 'tuned-model';
    public const TUNNEL = 'tunnel';
    public const TURNSTILE_WIDGET = 'turnstile-widget';
    public const TURSO_API_TOKEN = 'turso-api-token';
    public const TURSO_DATABASE = 'turso-database';
    public const TURSO_DATABASE_INSTANCE = 'turso-database-instance';
    public const TURSO_GROUP = 'turso-group';
    public const TURSO_LOCATION = 'turso-location';
    public const TURSO_ORGANIZATION_INVITE = 'turso-organization-invite';
    public const TURSO_ORGANIZATION_MEMBER = 'turso-organization-member';
    public const UPLOAD_PRESET = 'upload-preset';
    public const VECTOR_STORE = 'vector-store';
    public const VECTORIZE_INDEX = 'vectorize-index';
    public const VERCEL_DEPLOYMENT = 'vercel-deployment';
    public const VERCEL_DOMAIN = 'vercel-domain';
    public const VERCEL_ENV_VAR = 'vercel-env-var';
    public const VERCEL_PROJECT = 'vercel-project';
    public const VERCEL_TEAM = 'vercel-team';
    public const VERTEX_AI_ENDPOINT = 'vertex-ai-endpoint';
    public const VERTEX_GEMINI_MODEL = 'vertex-gemini-model';
    public const VOCABULARY = 'vocabulary';
    public const VOICE = 'voice';
    public const VOLUME = 'volume';
    public const VPC = 'vpc';
    public const VPC_NETWORK = 'vpc-network';
    public const WAF_WEB_ACL = 'waf-web-acl';
    public const WAITING_ROOM = 'waiting-room';
    public const WORKER = 'worker';
    public const WORKER_ROUTE = 'worker-route';
    public const WORKERS_AI_MODEL = 'workers-ai-model';
    public const WORKFLOW = 'workflow';
    public const WORKSPACE = 'workspace';
    public const ZONE = 'zone';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::ACCESS_APPLICATION,
            self::ACCESS_POLICY,
            self::ACCOUNT,
            self::ACM_CERTIFICATE,
            self::AGENT_API_KEY,
            self::AI_GATEWAY,
            self::AI_SEARCH,
            self::ALB,
            self::ALERT_POLICY,
            self::ALLOYDB_CLUSTER,
            self::ALLOYDB_INSTANCE,
            self::API_GATEWAY,
            self::API_KEY,
            self::APP,
            self::APP_ENGINE_SERVICE,
            self::APPRUNNER_SERVICE,
            self::ARTIFACT_REGISTRY_REPO,
            self::AUDIT_EVENT,
            self::AUTO_SCALING_GROUP,
            self::AZURE_AKS_CLUSTER,
            self::AZURE_APP_GATEWAY,
            self::AZURE_APP_REGISTRATION,
            self::AZURE_APP_SERVICE,
            self::AZURE_CONTAINER_INSTANCE,
            self::AZURE_CONTAINER_REGISTRY,
            self::AZURE_COSMOS_DB,
            self::AZURE_DISK,
            self::AZURE_DNS_ZONE,
            self::AZURE_EVENT_HUB,
            self::AZURE_FIREWALL,
            self::AZURE_FUNCTION_APP,
            self::AZURE_KEY_VAULT,
            self::AZURE_LOAD_BALANCER,
            self::AZURE_LOG_ANALYTICS,
            self::AZURE_MANAGED_IDENTITY,
            self::AZURE_MYSQL_FLEXIBLE,
            self::AZURE_NAT_GATEWAY,
            self::AZURE_NSG,
            self::AZURE_POSTGRES_FLEXIBLE,
            self::AZURE_PRIVATE_DNS_ZONE,
            self::AZURE_PUBLIC_IP,
            self::AZURE_REDIS_CACHE,
            self::AZURE_RESOURCE_GROUP,
            self::AZURE_ROUTE_TABLE,
            self::AZURE_SERVICE_BUS,
            self::AZURE_SQL_DATABASE,
            self::AZURE_STORAGE_ACCOUNT,
            self::AZURE_SUBNET,
            self::AZURE_VM,
            self::AZURE_VNET,
            self::BACKEND_SERVICE,
            self::BACKUP_VAULT,
            self::BALANCE,
            self::BATCH,
            self::BATCH_INFERENCE_JOB,
            self::BATCH_JOB_QUEUE,
            self::BEDROCK_MODEL,
            self::BIGQUERY_DATASET,
            self::BIGQUERY_TABLE,
            self::BIGTABLE_INSTANCE,
            self::BLOCK_VOLUME,
            self::CACHE_RULE,
            self::CACHED_CONTENT,
            self::CERTIFICATE,
            self::CH_DATABASE,
            self::CH_SERVICE,
            self::CLOUD_ARMOR_POLICY,
            self::CLOUD_BUILD_TRIGGER,
            self::CLOUD_DEPLOY_PIPELINE,
            self::CLOUD_DNS_RECORD_SET,
            self::CLOUD_DNS_ZONE,
            self::CLOUD_FUNCTION,
            self::CLOUD_NAT,
            self::CLOUD_ROUTER,
            self::CLOUD_RUN_SERVICE,
            self::CLOUD_SCHEDULER_JOB,
            self::CLOUD_TASKS_QUEUE,
            self::CLOUDFORMATION_STACK,
            self::CLOUDFRONT_DISTRIBUTION,
            self::CLOUDSQL_INSTANCE,
            self::CLOUDTRAIL_TRAIL,
            self::CLOUDWATCH_ALARM,
            self::CLOUDWATCH_LOG_GROUP,
            self::CODEBUILD_PROJECT,
            self::CODEPIPELINE_PIPELINE,
            self::COGNITO_USER_POOL,
            self::COLLECTION,
            self::COMPOSER_ENVIRONMENT,
            self::CONTAINER,
            self::CUSTOM_HOSTNAME,
            self::CUSTOM_VOICE,
            self::D1_DATABASE,
            self::DATABRICKS_APP,
            self::DATABRICKS_CATALOG,
            self::DATABRICKS_CLUSTER,
            self::DATABRICKS_CLUSTER_POLICY,
            self::DATABRICKS_DASHBOARD,
            self::DATABRICKS_FUNCTION,
            self::DATABRICKS_JOB,
            self::DATABRICKS_MODEL_VERSION,
            self::DATABRICKS_NODE_TYPE,
            self::DATABRICKS_PIPELINE,
            self::DATABRICKS_REGISTERED_MODEL,
            self::DATABRICKS_REPO,
            self::DATABRICKS_SCHEMA,
            self::DATABRICKS_SECRET_SCOPE,
            self::DATABRICKS_SERVING_ENDPOINT,
            self::DATABRICKS_SQL_QUERY,
            self::DATABRICKS_SQL_WAREHOUSE,
            self::DATABRICKS_TABLE,
            self::DATABRICKS_VECTOR_SEARCH_ENDPOINT,
            self::DATABRICKS_VECTOR_SEARCH_INDEX,
            self::DATABRICKS_VOLUME,
            self::DATABRICKS_WORKSPACE_OBJECT,
            self::DATAFLOW_JOB,
            self::DATASET,
            self::DB_USER,
            self::DEDICATED_INFERENCE,
            self::DEPLOYED_MODEL,
            self::DEPLOYMENT,
            self::DNS_RECORD,
            self::DOCKER_CONTAINER,
            self::DOCKER_IMAGE,
            self::DOCKER_NETWORK,
            self::DOCKER_VOLUME,
            self::DOCUMENTDB_CLUSTER,
            self::DOKS_CLUSTER,
            self::DOMAIN,
            self::DROPLET,
            self::DURABLE_OBJECT_NAMESPACE,
            self::DYNAMODB_TABLE,
            self::EBS_VOLUME,
            self::EC2_INSTANCE,
            self::ECR_REPOSITORY,
            self::ECS_SERVICE,
            self::EFS_FILE_SYSTEM,
            self::EKS_CLUSTER,
            self::ELASTIC_IP,
            self::ELASTICACHE_CLUSTER,
            self::EMAIL_ROUTING_RULE,
            self::EMBED_JOB,
            self::ENDPOINT,
            self::EVAL,
            self::EVALUATION,
            self::EVENTBRIDGE_RULE,
            self::FILE,
            self::FILE_SEARCH_DOCUMENT,
            self::FILE_SEARCH_STORE,
            self::FINE_TUNE,
            self::FINE_TUNING_JOB,
            self::FINETUNED_MODEL,
            self::FIRESTORE_DATABASE,
            self::FIREWALL,
            self::FIREWALL_RULE,
            self::FLOATING_IP,
            self::FOLDER,
            self::FORWARDING_RULE,
            self::GATEWAY,
            self::GCE_DISK,
            self::GCE_INSTANCE,
            self::GCP_SERVICE_ACCOUNT,
            self::GCS_BUCKET,
            self::GEN_AI_AGENT,
            self::GEN_AI_KNOWLEDGE_BASE,
            self::GEN_AI_MODEL_ROUTER,
            self::GKE_CLUSTER,
            self::GLUE_DATABASE,
            self::GROQ_BATCH,
            self::GROQ_FILE,
            self::GROQ_FINE_TUNING,
            self::GROQ_MODEL,
            self::HARDWARE,
            self::HEALTH_CHECK,
            self::HEALTHCHECK,
            self::HISTORY_ITEM,
            self::HYPERDRIVE,
            self::IAM_ROLE,
            self::IAM_USER,
            self::IMAGE,
            self::INFERENCE_BATCH,
            self::INSTANCE,
            self::INSTANCE_GROUP,
            self::INSTANCE_TEMPLATE,
            self::INTERNET_GATEWAY,
            self::INVITE,
            self::IP_ACCESS_RULE,
            self::IP_ALLOCATION,
            self::JOB,
            self::K8S_CLUSTER,
            self::K8S_CONFIGMAP,
            self::K8S_CRONJOB,
            self::K8S_DAEMONSET,
            self::K8S_DEPLOYMENT,
            self::K8S_INGRESS,
            self::K8S_JOB,
            self::K8S_NAMESPACE,
            self::K8S_POD,
            self::K8S_SECRET,
            self::K8S_SERVICE,
            self::K8S_STATEFULSET,
            self::KAFKA_CLUSTER,
            self::KAFKA_CONSUMER_GROUP,
            self::KAFKA_TOPIC,
            self::KAPSULE_CLUSTER,
            self::KINESIS_STREAM,
            self::KMS_KEY,
            self::KMS_KEY_RING,
            self::KV_NAMESPACE,
            self::LAMBDA_FUNCTION,
            self::LOAD_BALANCER,
            self::LOG_SINK,
            self::LOGPUSH_JOB,
            self::MACHINE,
            self::MANAGED_DATABASE,
            self::MANAGED_DB,
            self::MANAGED_ENDPOINT,
            self::MANAGED_KUBE,
            self::MEDIA_ASSET,
            self::MEMBER,
            self::MEMCACHED_INSTANCE,
            self::MEMORYSTORE_MEMCACHED,
            self::MEMORYSTORE_REDIS,
            self::MESSAGE_BATCH,
            self::MISTRAL_API_KEY,
            self::MISTRAL_BATCH_JOB,
            self::MISTRAL_FILE,
            self::MISTRAL_FINE_TUNING_JOB,
            self::MISTRAL_MODEL,
            self::MISTRAL_VOICE,
            self::MODEL,
            self::MODEL_API_KEY,
            self::MODEL_ENDPOINT,
            self::MONGODB_DATABASE,
            self::MQ_BROKER,
            self::MSK_CLUSTER,
            self::MSSQL_DATABASE,
            self::MYSQL_DATABASE,
            self::NAT_GATEWAY,
            self::NEON_AI_GATEWAY,
            self::NEON_AUTH,
            self::NEON_AUTH_DOMAIN,
            self::NEON_AUTH_OAUTH_PROVIDER,
            self::NEON_BRANCH,
            self::NEON_BUCKET,
            self::NEON_CREDENTIAL,
            self::NEON_DATA_API,
            self::NEON_DATABASE,
            self::NEON_ENDPOINT,
            self::NEON_FUNCTION,
            self::NEON_PROJECT,
            self::NEON_ROLE,
            self::NEON_SNAPSHOT,
            self::NEPTUNE_CLUSTER,
            self::NETLIFY_BUILD_HOOK,
            self::NETLIFY_DEPLOY,
            self::NETLIFY_DNS_RECORD,
            self::NETLIFY_DNS_ZONE,
            self::NETLIFY_ENV_VAR,
            self::NETLIFY_FORM,
            self::NETLIFY_SITE,
            self::NETWORK,
            self::NFS_SHARE,
            self::NOTIFICATION_POLICY,
            self::OBJECT_STORAGE_BUCKET,
            self::OPENSEARCH_CLUSTER,
            self::OPENSEARCH_DOMAIN,
            self::ORGANIZATION_USER,
            self::PAGE_RULE,
            self::PG_DATABASE,
            self::PG_SCHEMA,
            self::PLACEMENT_GROUP,
            self::PREDICTION,
            self::PRIMARY_IP,
            self::PRIVATE_NETWORK,
            self::PROJECT,
            self::PROJECT_API_KEY,
            self::PRONUNCIATION_DICT,
            self::PRONUNCIATION_DICTIONARY,
            self::PROVIDER,
            self::PS_BACKUP,
            self::PS_BRANCH,
            self::PS_DATABASE,
            self::PS_DEPLOY_REQUEST,
            self::PS_PASSWORD,
            self::PUBSUB_SUBSCRIPTION,
            self::PUBSUB_TOPIC,
            self::QUEUE,
            self::QUOTA,
            self::R2_BUCKET,
            self::RATE_LIMIT_RULE,
            self::RDB_INSTANCE,
            self::RDS_CLUSTER,
            self::RDS_INSTANCE,
            self::REDIRECT_RULE,
            self::REDIS_INSTANCE,
            self::REDSHIFT_CLUSTER,
            self::ROUTE_TABLE,
            self::ROUTE53_HEALTH_CHECK,
            self::ROUTE53_HOSTED_ZONE,
            self::ROUTE53_RECORD_SET,
            self::S3_BUCKET,
            self::SAGEMAKER_ENDPOINT,
            self::SECRET,
            self::SECRET_MANAGER_SECRET,
            self::SECRETS_MANAGER_SECRET,
            self::SECURITY_GROUP,
            self::SERVER,
            self::SNAPSHOT,
            self::SNS_TOPIC,
            self::SPACES_BUCKET,
            self::SPANNER_BACKUP,
            self::SPANNER_DATABASE,
            self::SPANNER_INSTANCE,
            self::SPECTRUM_APPLICATION,
            self::SQS_QUEUE,
            self::SSH_KEY,
            self::SSH_TARGET,
            self::SSL_CERTIFICATE,
            self::SSM_PARAMETER,
            self::STATIC_IP,
            self::STEP_FUNCTION,
            self::SUBNET,
            self::SUPERVISED_FINE_TUNING_JOB,
            self::TARGET_GROUP,
            self::TRAINING,
            self::TRANSCRIPT,
            self::TRANSCRIPTION,
            self::TRANSFORMATION,
            self::TUNED_MODEL,
            self::TUNNEL,
            self::TURNSTILE_WIDGET,
            self::TURSO_API_TOKEN,
            self::TURSO_DATABASE,
            self::TURSO_DATABASE_INSTANCE,
            self::TURSO_GROUP,
            self::TURSO_LOCATION,
            self::TURSO_ORGANIZATION_INVITE,
            self::TURSO_ORGANIZATION_MEMBER,
            self::UPLOAD_PRESET,
            self::VECTOR_STORE,
            self::VECTORIZE_INDEX,
            self::VERCEL_DEPLOYMENT,
            self::VERCEL_DOMAIN,
            self::VERCEL_ENV_VAR,
            self::VERCEL_PROJECT,
            self::VERCEL_TEAM,
            self::VERTEX_AI_ENDPOINT,
            self::VERTEX_GEMINI_MODEL,
            self::VOCABULARY,
            self::VOICE,
            self::VOLUME,
            self::VPC,
            self::VPC_NETWORK,
            self::WAF_WEB_ACL,
            self::WAITING_ROOM,
            self::WORKER,
            self::WORKER_ROUTE,
            self::WORKERS_AI_MODEL,
            self::WORKFLOW,
            self::WORKSPACE,
            self::ZONE,
        ];
    }
}
