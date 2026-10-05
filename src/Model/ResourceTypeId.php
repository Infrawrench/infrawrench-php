<?php

/*
 * infrawrench/sdk v1.56.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.56.0).
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
    public const ACCESS_KEY = 'access-key';
    public const ACCESS_POLICY = 'access-policy';
    public const ACCESS_POLICY_TOKEN = 'access-policy-token';
    public const ACCOUNT = 'account';
    public const ACM_CERTIFICATE = 'acm-certificate';
    public const ACTIONS_CACHE = 'actions-cache';
    public const ADMIN_API_KEY = 'admin-api-key';
    public const AGENT = 'agent';
    public const AGENT_API_KEY = 'agent-api-key';
    public const AGENT_CONFIG = 'agent-config';
    public const AGENT_SESSION = 'agent-session';
    public const AGENT_VARIABLE = 'agent-variable';
    public const AI_GATEWAY = 'ai-gateway';
    public const AI_SEARCH = 'ai-search';
    public const ALB = 'alb';
    public const ALERT = 'alert';
    public const ALERT_CONDITION = 'alert-condition';
    public const ALERT_CONFIGURATION = 'alert-configuration';
    public const ALERT_POLICY = 'alert-policy';
    public const ALERT_RULE = 'alert-rule';
    public const ALIGNMENT_JOB = 'alignment-job';
    public const ALLOYDB_CLUSTER = 'alloydb-cluster';
    public const ALLOYDB_INSTANCE = 'alloydb-instance';
    public const ANALYTICS_ENGINE_DATASET = 'analytics-engine-dataset';
    public const API_GATEWAY = 'api-gateway';
    public const API_KEY = 'api-key';
    public const API_TOKEN = 'api-token';
    public const APM_APPLICATION = 'apm-application';
    public const APP = 'app';
    public const APP_ENGINE_SERVICE = 'app-engine-service';
    public const APP_SECRET = 'app-secret';
    public const APPLICATION_KEY = 'application-key';
    public const APPRUNNER_SERVICE = 'apprunner-service';
    public const ARTIFACT_REGISTRY_REPO = 'artifact-registry-repo';
    public const AUDIT_EVENT = 'audit-event';
    public const AUTO_SCALING_GROUP = 'auto-scaling-group';
    public const AUTOMATION = 'automation';
    public const AUTONOMOUS_DATABASE = 'autonomous-database';
    public const AUTOSCALE_POOL = 'autoscale-pool';
    public const AZURE_AI_SERVICES = 'azure-ai-services';
    public const AZURE_AKS_CLUSTER = 'azure-aks-cluster';
    public const AZURE_APP_GATEWAY = 'azure-app-gateway';
    public const AZURE_APP_REGISTRATION = 'azure-app-registration';
    public const AZURE_APP_SERVICE = 'azure-app-service';
    public const AZURE_APP_SERVICE_PLAN = 'azure-app-service-plan';
    public const AZURE_CONTAINER_APP = 'azure-container-app';
    public const AZURE_CONTAINER_APP_ENVIRONMENT = 'azure-container-app-environment';
    public const AZURE_CONTAINER_APP_JOB = 'azure-container-app-job';
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
    public const AZURE_MANAGED_REDIS = 'azure-managed-redis';
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
    public const BACKEND = 'backend';
    public const BACKEND_SERVICE = 'backend-service';
    public const BACKUP_POLICY = 'backup-policy';
    public const BACKUP_SNAPSHOT = 'backup-snapshot';
    public const BACKUP_VAULT = 'backup-vault';
    public const BALANCE = 'balance';
    public const BASIN_CATALOG = 'basin-catalog';
    public const BASIN_PIPELINE = 'basin-pipeline';
    public const BASIN_SINK = 'basin-sink';
    public const BASIN_STREAM = 'basin-stream';
    public const BASIN_TABLE = 'basin-table';
    public const BATCH = 'batch';
    public const BATCH_INFERENCE_JOB = 'batch-inference-job';
    public const BATCH_JOB_QUEUE = 'batch-job-queue';
    public const BEDROCK_MODEL = 'bedrock-model';
    public const BIGQUERY_DATASET = 'bigquery-dataset';
    public const BIGQUERY_TABLE = 'bigquery-table';
    public const BIGTABLE_INSTANCE = 'bigtable-instance';
    public const BILLING_ACCOUNT = 'billing-account';
    public const BILLING_GROUP = 'billing-group';
    public const BLOCK_VOLUME = 'block-volume';
    public const BOOT_VOLUME = 'boot-volume';
    public const BROWSER_APPLICATION = 'browser-application';
    public const BUCKET = 'bucket';
    public const BUDGET = 'budget';
    public const BUDGET_ALERT_RULE = 'budget-alert-rule';
    public const BYOK_CREDENTIAL = 'byok-credential';
    public const CACHE_RULE = 'cache-rule';
    public const CACHED_CONTENT = 'cached-content';
    public const CDN_ENDPOINT = 'cdn-endpoint';
    public const CERTIFICATE = 'certificate';
    public const CH_API_KEY = 'ch-api-key';
    public const CH_BACKUP = 'ch-backup';
    public const CH_CLICKPIPE = 'ch-clickpipe';
    public const CH_DATABASE = 'ch-database';
    public const CH_MEMBER = 'ch-member';
    public const CH_POSTGRES = 'ch-postgres';
    public const CH_SERVICE = 'ch-service';
    public const CHAIN = 'chain';
    public const CKS_CLUSTER = 'cks-cluster';
    public const CLIENT_KEY = 'client-key';
    public const CLOUD = 'cloud';
    public const CLOUD_ARMOR_POLICY = 'cloud-armor-policy';
    public const CLOUD_BUILD_TRIGGER = 'cloud-build-trigger';
    public const CLOUD_DEPLOY_PIPELINE = 'cloud-deploy-pipeline';
    public const CLOUD_DNS_RECORD_SET = 'cloud-dns-record-set';
    public const CLOUD_DNS_ZONE = 'cloud-dns-zone';
    public const CLOUD_FUNCTION = 'cloud-function';
    public const CLOUD_NAT = 'cloud-nat';
    public const CLOUD_ROUTER = 'cloud-router';
    public const CLOUD_RUN_JOB = 'cloud-run-job';
    public const CLOUD_RUN_SERVICE = 'cloud-run-service';
    public const CLOUD_SCHEDULER_JOB = 'cloud-scheduler-job';
    public const CLOUD_TASKS_QUEUE = 'cloud-tasks-queue';
    public const CLOUDFORMATION_STACK = 'cloudformation-stack';
    public const CLOUDFRONT_DISTRIBUTION = 'cloudfront-distribution';
    public const CLOUDSQL_INSTANCE = 'cloudsql-instance';
    public const CLOUDTRAIL_TRAIL = 'cloudtrail-trail';
    public const CLOUDWATCH_ALARM = 'cloudwatch-alarm';
    public const CLOUDWATCH_LOG_GROUP = 'cloudwatch-log-group';
    public const CLUSTER = 'cluster';
    public const CODEBUILD_PROJECT = 'codebuild-project';
    public const CODEPIPELINE_PIPELINE = 'codepipeline-pipeline';
    public const CODESPACE = 'codespace';
    public const COGNITO_USER_POOL = 'cognito-user-pool';
    public const COLLECTION = 'collection';
    public const COLLECTION_DOCUMENT = 'collection-document';
    public const COMPARTMENT = 'compartment';
    public const COMPOSER_ENVIRONMENT = 'composer-environment';
    public const COMPUTE_CONFIG = 'compute-config';
    public const CONFIG_STORE = 'config-store';
    public const CONNECTION = 'connection';
    public const CONNECTIVITY_RULE = 'connectivity-rule';
    public const CONNECTOR = 'connector';
    public const CONTACT_POINT = 'contact-point';
    public const CONTAINER = 'container';
    public const CONTAINER_REGISTRY = 'container-registry';
    public const CONTEXT = 'context';
    public const CONTEXT_VARIABLE = 'context-variable';
    public const COPILOT_SEAT = 'copilot-seat';
    public const COST_CENTER = 'cost-center';
    public const CRON_MONITOR = 'cron-monitor';
    public const CUSTOM_ENRICHMENT = 'custom-enrichment';
    public const CUSTOM_HOSTNAME = 'custom-hostname';
    public const CUSTOM_VOICE = 'custom-voice';
    public const D1_DATABASE = 'd1-database';
    public const DASHBOARD = 'dashboard';
    public const DATABASE = 'database';
    public const DATABASE_USER = 'database-user';
    public const DATABRICKS_APP = 'databricks-app';
    public const DATABRICKS_CATALOG = 'databricks-catalog';
    public const DATABRICKS_CLUSTER = 'databricks-cluster';
    public const DATABRICKS_CLUSTER_POLICY = 'databricks-cluster-policy';
    public const DATABRICKS_DASHBOARD = 'databricks-dashboard';
    public const DATABRICKS_FUNCTION = 'databricks-function';
    public const DATABRICKS_JOB = 'databricks-job';
    public const DATABRICKS_LAKEBASE_BRANCH = 'databricks-lakebase-branch';
    public const DATABRICKS_LAKEBASE_PROJECT = 'databricks-lakebase-project';
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
    public const DATASOURCE = 'datasource';
    public const DB_SUBNET_GROUP = 'db-subnet-group';
    public const DB_USER = 'db-user';
    public const DEDICATED_INFERENCE = 'dedicated-inference';
    public const DEPLOYED_MODEL = 'deployed-model';
    public const DEPLOYMENT = 'deployment';
    public const DEPOT_ACTIONS_REPO = 'depot-actions-repo';
    public const DEPOT_BUILD = 'depot-build';
    public const DEPOT_PROJECT = 'depot-project';
    public const DEPOT_REGISTRY_IMAGE = 'depot-registry-image';
    public const DEPOT_TOKEN = 'depot-token';
    public const DEPOT_TRUST_POLICY = 'depot-trust-policy';
    public const DEVICE = 'device';
    public const DICT = 'dict';
    public const DICTIONARY = 'dictionary';
    public const DIRECTORY = 'directory';
    public const DIRECTORY_GROUP = 'directory-group';
    public const DIRECTORY_USER = 'directory-user';
    public const DISK = 'disk';
    public const DISTRIBUTION_CREDENTIAL = 'distribution-credential';
    public const DNS_RECORD = 'dns-record';
    public const DNS_ZONE = 'dns-zone';
    public const DOCKER_CONTAINER = 'docker-container';
    public const DOCKER_IMAGE = 'docker-image';
    public const DOCKER_NETWORK = 'docker-network';
    public const DOCKER_VOLUME = 'docker-volume';
    public const DOCUMENTDB_CLUSTER = 'documentdb-cluster';
    public const DOKS_CLUSTER = 'doks-cluster';
    public const DOMAIN = 'domain';
    public const DOMAIN_RECORD = 'domain-record';
    public const DOWNTIME = 'downtime';
    public const DPO_JOB = 'dpo-job';
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
    public const ELASTICACHE_SERVERLESS_CACHE = 'elasticache-serverless-cache';
    public const EMAIL_ROUTING_RULE = 'email-routing-rule';
    public const EMBED_JOB = 'embed-job';
    public const ENCRYPTION_KEY = 'encryption-key';
    public const ENDPOINT = 'endpoint';
    public const ENRICHMENT = 'enrichment';
    public const ENVIRONMENT = 'environment';
    public const EVAL = 'eval';
    public const EVALUATION = 'evaluation';
    public const EVALUATION_JOB = 'evaluation-job';
    public const EVALUATOR = 'evaluator';
    public const EVENTBRIDGE_RULE = 'eventbridge-rule';
    public const EVENTS2METRICS = 'events2metrics';
    public const EXPORT_SINK = 'export-sink';
    public const EXTENSION = 'extension';
    public const FEATURE_FLAG = 'feature-flag';
    public const FILE = 'file';
    public const FILE_SEARCH_DOCUMENT = 'file-search-document';
    public const FILE_SEARCH_STORE = 'file-search-store';
    public const FINE_TUNE = 'fine-tune';
    public const FINE_TUNING_JOB = 'fine-tuning-job';
    public const FINETUNED_MODEL = 'finetuned-model';
    public const FIRESTORE_DATABASE = 'firestore-database';
    public const FIREWALL = 'firewall';
    public const FIREWALL_RULE = 'firewall-rule';
    public const FLEX_CLUSTER = 'flex-cluster';
    public const FLEXIBLE_IP = 'flexible-ip';
    public const FLINK_COMPUTE_POOL = 'flink-compute-pool';
    public const FLOATING_IP = 'floating-ip';
    public const FOLDER = 'folder';
    public const FORWARDING_RULE = 'forwarding-rule';
    public const FUNCTION = 'function';
    public const GATEWAY = 'gateway';
    public const GCE_DISK = 'gce-disk';
    public const GCE_INSTANCE = 'gce-instance';
    public const GCP_PROJECT = 'gcp-project';
    public const GCP_SERVICE_ACCOUNT = 'gcp-service-account';
    public const GCS_BUCKET = 'gcs-bucket';
    public const GEN_AI_AGENT = 'gen-ai-agent';
    public const GEN_AI_KNOWLEDGE_BASE = 'gen-ai-knowledge-base';
    public const GEN_AI_MODEL_ROUTER = 'gen-ai-model-router';
    public const GKE_CLUSTER = 'gke-cluster';
    public const GLUE_DATABASE = 'glue-database';
    public const GPU_CLUSTER = 'gpu-cluster';
    public const GROQ_BATCH = 'groq-batch';
    public const GROQ_FILE = 'groq-file';
    public const GROQ_FINE_TUNING = 'groq-fine-tuning';
    public const GROQ_MODEL = 'groq-model';
    public const GROUP = 'group';
    public const GUARDRAIL = 'guardrail';
    public const HARDWARE = 'hardware';
    public const HEALTH_CHECK = 'health-check';
    public const HEALTHCHECK = 'healthcheck';
    public const HISTORY_ITEM = 'history-item';
    public const HOST = 'host';
    public const HOSTED_RUNNER = 'hosted-runner';
    public const HYPERDRIVE = 'hyperdrive';
    public const IAM_ROLE = 'iam-role';
    public const IAM_USER = 'iam-user';
    public const IMAGE = 'image';
    public const INFERENCE_BATCH = 'inference-batch';
    public const INSTANCE = 'instance';
    public const INSTANCE_GROUP = 'instance-group';
    public const INSTANCE_TEMPLATE = 'instance-template';
    public const INSTANCE_TYPE = 'instance-type';
    public const INTERNET_GATEWAY = 'internet-gateway';
    public const INVITATION = 'invitation';
    public const INVITE = 'invite';
    public const INVOICE = 'invoice';
    public const IP_ACCESS_ENTRY = 'ip-access-entry';
    public const IP_ACCESS_RULE = 'ip-access-rule';
    public const IP_ALLOCATION = 'ip-allocation';
    public const ISSUE = 'issue';
    public const JOB = 'job';
    public const K8S_CLUSTER = 'k8s-cluster';
    public const K8S_CONFIGMAP = 'k8s-configmap';
    public const K8S_CRONJOB = 'k8s-cronjob';
    public const K8S_DAEMONSET = 'k8s-daemonset';
    public const K8S_DEPLOYMENT = 'k8s-deployment';
    public const K8S_INGRESS = 'k8s-ingress';
    public const K8S_JOB = 'k8s-job';
    public const K8S_NAMESPACE = 'k8s-namespace';
    public const K8S_NODE = 'k8s-node';
    public const K8S_POD = 'k8s-pod';
    public const K8S_SECRET = 'k8s-secret';
    public const K8S_SERVICE = 'k8s-service';
    public const K8S_STATEFULSET = 'k8s-statefulset';
    public const KAFKA_CLUSTER = 'kafka-cluster';
    public const KAFKA_CONSUMER_GROUP = 'kafka-consumer-group';
    public const KAFKA_TOPIC = 'kafka-topic';
    public const KAPSULE_CLUSTER = 'kapsule-cluster';
    public const KEY = 'key';
    public const KINESIS_STREAM = 'kinesis-stream';
    public const KMS_KEY = 'kms-key';
    public const KMS_KEY_RING = 'kms-key-ring';
    public const KNOWLEDGE_BASE_DOCUMENT = 'knowledge-base-document';
    public const KNOWLEDGE_NOTE = 'knowledge-note';
    public const KSQLDB_CLUSTER = 'ksqldb-cluster';
    public const KUBERNETES_CLUSTER = 'kubernetes-cluster';
    public const KV_NAMESPACE = 'kv-namespace';
    public const KV_STORE = 'kv-store';
    public const LAMBDA_FUNCTION = 'lambda-function';
    public const LANGUAGE_ID_JOB = 'language-id-job';
    public const LINODE = 'linode';
    public const LIVE_SESSION = 'live-session';
    public const LKE_CLUSTER = 'lke-cluster';
    public const LKE_NODE_POOL = 'lke-node-pool';
    public const LLM_MODEL = 'llm-model';
    public const LOAD_BALANCER = 'load-balancer';
    public const LOG_SINK = 'log-sink';
    public const LOGGING_ENDPOINT = 'logging-endpoint';
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
    public const MEMORYSTORE_VALKEY = 'memorystore-valkey';
    public const MESSAGE_BATCH = 'message-batch';
    public const MESSAGING_SERVICE = 'messaging-service';
    public const MISTRAL_AGENT = 'mistral-agent';
    public const MISTRAL_API_KEY = 'mistral-api-key';
    public const MISTRAL_BATCH_JOB = 'mistral-batch-job';
    public const MISTRAL_FILE = 'mistral-file';
    public const MISTRAL_FINE_TUNING_JOB = 'mistral-fine-tuning-job';
    public const MISTRAL_LIBRARY = 'mistral-library';
    public const MISTRAL_MODEL = 'mistral-model';
    public const MISTRAL_VOICE = 'mistral-voice';
    public const MODEL = 'model';
    public const MODEL_API = 'model-api';
    public const MODEL_API_KEY = 'model-api-key';
    public const MODEL_ENDPOINT = 'model-endpoint';
    public const MODEL_VERSION = 'model-version';
    public const MONGODB_DATABASE = 'mongodb-database';
    public const MONITOR = 'monitor';
    public const MQ_BROKER = 'mq-broker';
    public const MSK_CLUSTER = 'msk-cluster';
    public const MSSQL_DATABASE = 'mssql-database';
    public const MYSQL_DATABASE = 'mysql-database';
    public const NAMESPACE = 'namespace';
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
    public const NETLIFY_DATABASE = 'netlify-database';
    public const NETLIFY_DEPLOY = 'netlify-deploy';
    public const NETLIFY_DNS_RECORD = 'netlify-dns-record';
    public const NETLIFY_DNS_ZONE = 'netlify-dns-zone';
    public const NETLIFY_ENV_VAR = 'netlify-env-var';
    public const NETLIFY_FORM = 'netlify-form';
    public const NETLIFY_NOTIFICATION_HOOK = 'netlify-notification-hook';
    public const NETLIFY_SITE = 'netlify-site';
    public const NETLIFY_SNIPPET = 'netlify-snippet';
    public const NETWORK = 'network';
    public const NETWORK_CONNECTION = 'network-connection';
    public const NEXUS_ENDPOINT = 'nexus-endpoint';
    public const NFS_SHARE = 'nfs-share';
    public const NODE_POOL = 'node-pool';
    public const NODEBALANCER = 'nodebalancer';
    public const NOTIFICATION_POLICY = 'notification-policy';
    public const OBJECT_STORAGE_BUCKET = 'object-storage-bucket';
    public const OCTAVIA_LOAD_BALANCER = 'octavia-load-balancer';
    public const OKE_CLUSTER = 'oke-cluster';
    public const ONLINE_ARCHIVE = 'online-archive';
    public const OPENSEARCH_CLUSTER = 'opensearch-cluster';
    public const OPENSEARCH_DOMAIN = 'opensearch-domain';
    public const ORGANIZATION = 'organization';
    public const ORGANIZATION_API_KEY = 'organization-api-key';
    public const ORGANIZATION_DOMAIN = 'organization-domain';
    public const ORGANIZATION_MEMBERSHIP = 'organization-membership';
    public const ORGANIZATION_ROLE = 'organization-role';
    public const ORGANIZATION_USER = 'organization-user';
    public const OUTGOING_WEBHOOK = 'outgoing-webhook';
    public const PAGE_RULE = 'page-rule';
    public const PARSING_RULE_GROUP = 'parsing-rule-group';
    public const PERMISSION = 'permission';
    public const PG_DATABASE = 'pg-database';
    public const PG_SCHEMA = 'pg-schema';
    public const PHONE_NUMBER = 'phone-number';
    public const PIPELINE = 'pipeline';
    public const PLACEMENT_GROUP = 'placement-group';
    public const PLAYBOOK = 'playbook';
    public const POSTGRES_CLUSTER = 'postgres-cluster';
    public const POSTURE_INTEGRATION = 'posture-integration';
    public const PREDICTION = 'prediction';
    public const PRIMARY_IP = 'primary-ip';
    public const PRIVATE_ENDPOINT_SERVICE = 'private-endpoint-service';
    public const PRIVATE_NETWORK = 'private-network';
    public const PRODUCT_ENVIRONMENT = 'product-environment';
    public const PROJECT = 'project';
    public const PROJECT_API_KEY = 'project-api-key';
    public const PROJECT_RATE_LIMIT = 'project-rate-limit';
    public const PROJECT_SERVICE_ACCOUNT = 'project-service-account';
    public const PROJECT_USER = 'project-user';
    public const PROJECT_VARIABLE = 'project-variable';
    public const PRONUNCIATION_DICT = 'pronunciation-dict';
    public const PRONUNCIATION_DICTIONARY = 'pronunciation-dictionary';
    public const PROVIDER = 'provider';
    public const PS_BACKUP = 'ps-backup';
    public const PS_BRANCH = 'ps-branch';
    public const PS_DATABASE = 'ps-database';
    public const PS_DEPLOY_REQUEST = 'ps-deploy-request';
    public const PS_PASSWORD = 'ps-password';
    public const PS_ROLE = 'ps-role';
    public const PS_WEBHOOK = 'ps-webhook';
    public const PUBSUB_SUBSCRIPTION = 'pubsub-subscription';
    public const PUBSUB_TOPIC = 'pubsub-topic';
    public const PURCHASE = 'purchase';
    public const QUEUE = 'queue';
    public const QUOTA = 'quota';
    public const QUOTA_RULE = 'quota-rule';
    public const R2_BUCKET = 'r2-bucket';
    public const RATE_LIMIT = 'rate-limit';
    public const RATE_LIMIT_RULE = 'rate-limit-rule';
    public const RC_ACCOUNT = 'rc-account';
    public const RC_ACL_ROLE = 'rc-acl-role';
    public const RC_ACL_RULE = 'rc-acl-rule';
    public const RC_ACL_USER = 'rc-acl-user';
    public const RC_CLOUD_ACCOUNT = 'rc-cloud-account';
    public const RC_DATABASE = 'rc-database';
    public const RC_PSC_ENDPOINT = 'rc-psc-endpoint';
    public const RC_SUBSCRIPTION = 'rc-subscription';
    public const RC_TRANSIT_GATEWAY = 'rc-transit-gateway';
    public const RC_VPC_PEERING = 'rc-vpc-peering';
    public const RDB_INSTANCE = 'rdb-instance';
    public const RDS_CLUSTER = 'rds-cluster';
    public const RDS_INSTANCE = 'rds-instance';
    public const REDIRECT_RULE = 'redirect-rule';
    public const REDIS_INSTANCE = 'redis-instance';
    public const REDSHIFT_CLUSTER = 'redshift-cluster';
    public const REGISTRY_NAMESPACE = 'registry-namespace';
    public const REINFORCEMENT_FINE_TUNING_JOB = 'reinforcement-fine-tuning-job';
    public const RELEASE = 'release';
    public const REPO_BLOCKLIST = 'repo-blocklist';
    public const RESERVATION = 'reservation';
    public const RESERVED_IP = 'reserved-ip';
    public const ROLE = 'role';
    public const ROUTE_TABLE = 'route-table';
    public const ROUTE53_HEALTH_CHECK = 'route53-health-check';
    public const ROUTE53_HOSTED_ZONE = 'route53-hosted-zone';
    public const ROUTE53_RECORD_SET = 'route53-record-set';
    public const ROUTER = 'router';
    public const RUNNER = 'runner';
    public const RUNNER_RESOURCE_CLASS = 'runner-resource-class';
    public const S3_BUCKET = 's3-bucket';
    public const SAGEMAKER_ENDPOINT = 'sagemaker-endpoint';
    public const SCHEDULE = 'schedule';
    public const SCHEDULED_FUNCTION = 'scheduled-function';
    public const SCHEMA_REGISTRY = 'schema-registry';
    public const SEARCH_INDEX = 'search-index';
    public const SECRET = 'secret';
    public const SECRET_MANAGER_SECRET = 'secret-manager-secret';
    public const SECRET_STORE = 'secret-store';
    public const SECRETS_MANAGER_SECRET = 'secrets-manager-secret';
    public const SECRETS_STORE_SECRET = 'secrets-store-secret';
    public const SECURITY_GROUP = 'security-group';
    public const SECURITY_LIST = 'security-list';
    public const SENTIMENT_JOB = 'sentiment-job';
    public const SERVER = 'server';
    public const SERVERLESS_CONTAINER = 'serverless-container';
    public const SERVERLESS_FUNCTION = 'serverless-function';
    public const SERVERLESS_INSTANCE = 'serverless-instance';
    public const SERVERLESS_TRAFFIC_FILTER = 'serverless-traffic-filter';
    public const SERVICE = 'service';
    public const SERVICE_ACCOUNT = 'service-account';
    public const SERVICE_VERSION = 'service-version';
    public const SESSION = 'session';
    public const SHARED_VOLUME = 'shared-volume';
    public const SKILL = 'skill';
    public const SLO = 'slo';
    public const SNAPSHOT = 'snapshot';
    public const SNOWFLAKE_ACCOUNT = 'snowflake-account';
    public const SNOWFLAKE_DATABASE = 'snowflake-database';
    public const SNOWFLAKE_DYNAMIC_TABLE = 'snowflake-dynamic-table';
    public const SNOWFLAKE_PIPE = 'snowflake-pipe';
    public const SNOWFLAKE_RESOURCE_MONITOR = 'snowflake-resource-monitor';
    public const SNOWFLAKE_ROLE = 'snowflake-role';
    public const SNOWFLAKE_SCHEMA = 'snowflake-schema';
    public const SNOWFLAKE_TASK = 'snowflake-task';
    public const SNOWFLAKE_USER = 'snowflake-user';
    public const SNOWFLAKE_WAREHOUSE = 'snowflake-warehouse';
    public const SNS_TOPIC = 'sns-topic';
    public const SPACES_BUCKET = 'spaces-bucket';
    public const SPANNER_BACKUP = 'spanner-backup';
    public const SPANNER_DATABASE = 'spanner-database';
    public const SPANNER_INSTANCE = 'spanner-instance';
    public const SPECTRUM_APPLICATION = 'spectrum-application';
    public const SPEND_ALERT = 'spend-alert';
    public const SPEND_LIMIT = 'spend-limit';
    public const SPENDING_LIMIT = 'spending-limit';
    public const SQS_QUEUE = 'sqs-queue';
    public const SSH_KEY = 'ssh-key';
    public const SSH_TARGET = 'ssh-target';
    public const SSL_CERTIFICATE = 'ssl-certificate';
    public const SSM_PARAMETER = 'ssm-parameter';
    public const STACK = 'stack';
    public const STACK_PLUGIN = 'stack-plugin';
    public const STACKSCRIPT = 'stackscript';
    public const STATIC_IP = 'static-ip';
    public const STEP_FUNCTION = 'step-function';
    public const STORAGE_BOX = 'storage-box';
    public const SUBACCOUNT = 'subaccount';
    public const SUBNET = 'subnet';
    public const SUPERVISED_FINE_TUNING_JOB = 'supervised-fine-tuning-job';
    public const SYNTHETIC_CHECK = 'synthetic-check';
    public const SYNTHETIC_MONITOR = 'synthetic-monitor';
    public const SYNTHETICS_TEST = 'synthetics-test';
    public const TAILNET = 'tailnet';
    public const TARGET_GROUP = 'target-group';
    public const TCO_POLICY = 'tco-policy';
    public const TEAM = 'team';
    public const TEAM_MEMBER = 'team-member';
    public const TENANCY = 'tenancy';
    public const TLS_CERTIFICATE = 'tls-certificate';
    public const TLS_SUBSCRIPTION = 'tls-subscription';
    public const TOPIC_JOB = 'topic-job';
    public const TRAFFIC_FILTER = 'traffic-filter';
    public const TRAINING = 'training';
    public const TRAINING_JOB = 'training-job';
    public const TRAINING_PROJECT = 'training-project';
    public const TRANSCRIPT = 'transcript';
    public const TRANSCRIPTION = 'transcription';
    public const TRANSFORMATION = 'transformation';
    public const TRIGGER = 'trigger';
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
    public const TWIML_APP = 'twiml-app';
    public const UPLOAD_MAPPING = 'upload-mapping';
    public const UPLOAD_PRESET = 'upload-preset';
    public const UPTIME_CHECK = 'uptime-check';
    public const UPTIME_MONITOR = 'uptime-monitor';
    public const USAGE_TRIGGER = 'usage-trigger';
    public const USER = 'user';
    public const USER_INVITE = 'user-invite';
    public const UT_APP = 'ut-app';
    public const UT_FILE = 'ut-file';
    public const VCN = 'vcn';
    public const VECTOR_STORE = 'vector-store';
    public const VECTORIZE_INDEX = 'vectorize-index';
    public const VERCEL_DEPLOYMENT = 'vercel-deployment';
    public const VERCEL_DNS_RECORD = 'vercel-dns-record';
    public const VERCEL_DOMAIN = 'vercel-domain';
    public const VERCEL_ENV_VAR = 'vercel-env-var';
    public const VERCEL_PROJECT = 'vercel-project';
    public const VERCEL_TEAM = 'vercel-team';
    public const VERCEL_WEBHOOK = 'vercel-webhook';
    public const VERIFY_SERVICE = 'verify-service';
    public const VERTEX_AI_ENDPOINT = 'vertex-ai-endpoint';
    public const VERTEX_GEMINI_MODEL = 'vertex-gemini-model';
    public const VM = 'vm';
    public const VOCABULARY = 'vocabulary';
    public const VOICE = 'voice';
    public const VOICE_AGENT = 'voice-agent';
    public const VOLUME = 'volume';
    public const VOLUME_SNAPSHOT = 'volume-snapshot';
    public const VPC = 'vpc';
    public const VPC_NAT_GATEWAY = 'vpc-nat-gateway';
    public const VPC_NETWORK = 'vpc-network';
    public const VPC_PEERING = 'vpc-peering';
    public const VPC_SUBNET = 'vpc-subnet';
    public const WAF_WEB_ACL = 'waf-web-acl';
    public const WAITING_ROOM = 'waiting-room';
    public const WEBHOOK = 'webhook';
    public const WEBHOOK_ENDPOINT = 'webhook-endpoint';
    public const WEBHOOK_SUBSCRIPTION = 'webhook-subscription';
    public const WORKER = 'worker';
    public const WORKER_ROUTE = 'worker-route';
    public const WORKERS_AI_MODEL = 'workers-ai-model';
    public const WORKFLOW = 'workflow';
    public const WORKLOAD = 'workload';
    public const WORKSPACE = 'workspace';
    public const WORKSPACE_MEMBER = 'workspace-member';
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
            self::ACCESS_KEY,
            self::ACCESS_POLICY,
            self::ACCESS_POLICY_TOKEN,
            self::ACCOUNT,
            self::ACM_CERTIFICATE,
            self::ACTIONS_CACHE,
            self::ADMIN_API_KEY,
            self::AGENT,
            self::AGENT_API_KEY,
            self::AGENT_CONFIG,
            self::AGENT_SESSION,
            self::AGENT_VARIABLE,
            self::AI_GATEWAY,
            self::AI_SEARCH,
            self::ALB,
            self::ALERT,
            self::ALERT_CONDITION,
            self::ALERT_CONFIGURATION,
            self::ALERT_POLICY,
            self::ALERT_RULE,
            self::ALIGNMENT_JOB,
            self::ALLOYDB_CLUSTER,
            self::ALLOYDB_INSTANCE,
            self::ANALYTICS_ENGINE_DATASET,
            self::API_GATEWAY,
            self::API_KEY,
            self::API_TOKEN,
            self::APM_APPLICATION,
            self::APP,
            self::APP_ENGINE_SERVICE,
            self::APP_SECRET,
            self::APPLICATION_KEY,
            self::APPRUNNER_SERVICE,
            self::ARTIFACT_REGISTRY_REPO,
            self::AUDIT_EVENT,
            self::AUTO_SCALING_GROUP,
            self::AUTOMATION,
            self::AUTONOMOUS_DATABASE,
            self::AUTOSCALE_POOL,
            self::AZURE_AI_SERVICES,
            self::AZURE_AKS_CLUSTER,
            self::AZURE_APP_GATEWAY,
            self::AZURE_APP_REGISTRATION,
            self::AZURE_APP_SERVICE,
            self::AZURE_APP_SERVICE_PLAN,
            self::AZURE_CONTAINER_APP,
            self::AZURE_CONTAINER_APP_ENVIRONMENT,
            self::AZURE_CONTAINER_APP_JOB,
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
            self::AZURE_MANAGED_REDIS,
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
            self::BACKEND,
            self::BACKEND_SERVICE,
            self::BACKUP_POLICY,
            self::BACKUP_SNAPSHOT,
            self::BACKUP_VAULT,
            self::BALANCE,
            self::BASIN_CATALOG,
            self::BASIN_PIPELINE,
            self::BASIN_SINK,
            self::BASIN_STREAM,
            self::BASIN_TABLE,
            self::BATCH,
            self::BATCH_INFERENCE_JOB,
            self::BATCH_JOB_QUEUE,
            self::BEDROCK_MODEL,
            self::BIGQUERY_DATASET,
            self::BIGQUERY_TABLE,
            self::BIGTABLE_INSTANCE,
            self::BILLING_ACCOUNT,
            self::BILLING_GROUP,
            self::BLOCK_VOLUME,
            self::BOOT_VOLUME,
            self::BROWSER_APPLICATION,
            self::BUCKET,
            self::BUDGET,
            self::BUDGET_ALERT_RULE,
            self::BYOK_CREDENTIAL,
            self::CACHE_RULE,
            self::CACHED_CONTENT,
            self::CDN_ENDPOINT,
            self::CERTIFICATE,
            self::CH_API_KEY,
            self::CH_BACKUP,
            self::CH_CLICKPIPE,
            self::CH_DATABASE,
            self::CH_MEMBER,
            self::CH_POSTGRES,
            self::CH_SERVICE,
            self::CHAIN,
            self::CKS_CLUSTER,
            self::CLIENT_KEY,
            self::CLOUD,
            self::CLOUD_ARMOR_POLICY,
            self::CLOUD_BUILD_TRIGGER,
            self::CLOUD_DEPLOY_PIPELINE,
            self::CLOUD_DNS_RECORD_SET,
            self::CLOUD_DNS_ZONE,
            self::CLOUD_FUNCTION,
            self::CLOUD_NAT,
            self::CLOUD_ROUTER,
            self::CLOUD_RUN_JOB,
            self::CLOUD_RUN_SERVICE,
            self::CLOUD_SCHEDULER_JOB,
            self::CLOUD_TASKS_QUEUE,
            self::CLOUDFORMATION_STACK,
            self::CLOUDFRONT_DISTRIBUTION,
            self::CLOUDSQL_INSTANCE,
            self::CLOUDTRAIL_TRAIL,
            self::CLOUDWATCH_ALARM,
            self::CLOUDWATCH_LOG_GROUP,
            self::CLUSTER,
            self::CODEBUILD_PROJECT,
            self::CODEPIPELINE_PIPELINE,
            self::CODESPACE,
            self::COGNITO_USER_POOL,
            self::COLLECTION,
            self::COLLECTION_DOCUMENT,
            self::COMPARTMENT,
            self::COMPOSER_ENVIRONMENT,
            self::COMPUTE_CONFIG,
            self::CONFIG_STORE,
            self::CONNECTION,
            self::CONNECTIVITY_RULE,
            self::CONNECTOR,
            self::CONTACT_POINT,
            self::CONTAINER,
            self::CONTAINER_REGISTRY,
            self::CONTEXT,
            self::CONTEXT_VARIABLE,
            self::COPILOT_SEAT,
            self::COST_CENTER,
            self::CRON_MONITOR,
            self::CUSTOM_ENRICHMENT,
            self::CUSTOM_HOSTNAME,
            self::CUSTOM_VOICE,
            self::D1_DATABASE,
            self::DASHBOARD,
            self::DATABASE,
            self::DATABASE_USER,
            self::DATABRICKS_APP,
            self::DATABRICKS_CATALOG,
            self::DATABRICKS_CLUSTER,
            self::DATABRICKS_CLUSTER_POLICY,
            self::DATABRICKS_DASHBOARD,
            self::DATABRICKS_FUNCTION,
            self::DATABRICKS_JOB,
            self::DATABRICKS_LAKEBASE_BRANCH,
            self::DATABRICKS_LAKEBASE_PROJECT,
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
            self::DATASOURCE,
            self::DB_SUBNET_GROUP,
            self::DB_USER,
            self::DEDICATED_INFERENCE,
            self::DEPLOYED_MODEL,
            self::DEPLOYMENT,
            self::DEPOT_ACTIONS_REPO,
            self::DEPOT_BUILD,
            self::DEPOT_PROJECT,
            self::DEPOT_REGISTRY_IMAGE,
            self::DEPOT_TOKEN,
            self::DEPOT_TRUST_POLICY,
            self::DEVICE,
            self::DICT,
            self::DICTIONARY,
            self::DIRECTORY,
            self::DIRECTORY_GROUP,
            self::DIRECTORY_USER,
            self::DISK,
            self::DISTRIBUTION_CREDENTIAL,
            self::DNS_RECORD,
            self::DNS_ZONE,
            self::DOCKER_CONTAINER,
            self::DOCKER_IMAGE,
            self::DOCKER_NETWORK,
            self::DOCKER_VOLUME,
            self::DOCUMENTDB_CLUSTER,
            self::DOKS_CLUSTER,
            self::DOMAIN,
            self::DOMAIN_RECORD,
            self::DOWNTIME,
            self::DPO_JOB,
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
            self::ELASTICACHE_SERVERLESS_CACHE,
            self::EMAIL_ROUTING_RULE,
            self::EMBED_JOB,
            self::ENCRYPTION_KEY,
            self::ENDPOINT,
            self::ENRICHMENT,
            self::ENVIRONMENT,
            self::EVAL,
            self::EVALUATION,
            self::EVALUATION_JOB,
            self::EVALUATOR,
            self::EVENTBRIDGE_RULE,
            self::EVENTS2METRICS,
            self::EXPORT_SINK,
            self::EXTENSION,
            self::FEATURE_FLAG,
            self::FILE,
            self::FILE_SEARCH_DOCUMENT,
            self::FILE_SEARCH_STORE,
            self::FINE_TUNE,
            self::FINE_TUNING_JOB,
            self::FINETUNED_MODEL,
            self::FIRESTORE_DATABASE,
            self::FIREWALL,
            self::FIREWALL_RULE,
            self::FLEX_CLUSTER,
            self::FLEXIBLE_IP,
            self::FLINK_COMPUTE_POOL,
            self::FLOATING_IP,
            self::FOLDER,
            self::FORWARDING_RULE,
            self::FUNCTION,
            self::GATEWAY,
            self::GCE_DISK,
            self::GCE_INSTANCE,
            self::GCP_PROJECT,
            self::GCP_SERVICE_ACCOUNT,
            self::GCS_BUCKET,
            self::GEN_AI_AGENT,
            self::GEN_AI_KNOWLEDGE_BASE,
            self::GEN_AI_MODEL_ROUTER,
            self::GKE_CLUSTER,
            self::GLUE_DATABASE,
            self::GPU_CLUSTER,
            self::GROQ_BATCH,
            self::GROQ_FILE,
            self::GROQ_FINE_TUNING,
            self::GROQ_MODEL,
            self::GROUP,
            self::GUARDRAIL,
            self::HARDWARE,
            self::HEALTH_CHECK,
            self::HEALTHCHECK,
            self::HISTORY_ITEM,
            self::HOST,
            self::HOSTED_RUNNER,
            self::HYPERDRIVE,
            self::IAM_ROLE,
            self::IAM_USER,
            self::IMAGE,
            self::INFERENCE_BATCH,
            self::INSTANCE,
            self::INSTANCE_GROUP,
            self::INSTANCE_TEMPLATE,
            self::INSTANCE_TYPE,
            self::INTERNET_GATEWAY,
            self::INVITATION,
            self::INVITE,
            self::INVOICE,
            self::IP_ACCESS_ENTRY,
            self::IP_ACCESS_RULE,
            self::IP_ALLOCATION,
            self::ISSUE,
            self::JOB,
            self::K8S_CLUSTER,
            self::K8S_CONFIGMAP,
            self::K8S_CRONJOB,
            self::K8S_DAEMONSET,
            self::K8S_DEPLOYMENT,
            self::K8S_INGRESS,
            self::K8S_JOB,
            self::K8S_NAMESPACE,
            self::K8S_NODE,
            self::K8S_POD,
            self::K8S_SECRET,
            self::K8S_SERVICE,
            self::K8S_STATEFULSET,
            self::KAFKA_CLUSTER,
            self::KAFKA_CONSUMER_GROUP,
            self::KAFKA_TOPIC,
            self::KAPSULE_CLUSTER,
            self::KEY,
            self::KINESIS_STREAM,
            self::KMS_KEY,
            self::KMS_KEY_RING,
            self::KNOWLEDGE_BASE_DOCUMENT,
            self::KNOWLEDGE_NOTE,
            self::KSQLDB_CLUSTER,
            self::KUBERNETES_CLUSTER,
            self::KV_NAMESPACE,
            self::KV_STORE,
            self::LAMBDA_FUNCTION,
            self::LANGUAGE_ID_JOB,
            self::LINODE,
            self::LIVE_SESSION,
            self::LKE_CLUSTER,
            self::LKE_NODE_POOL,
            self::LLM_MODEL,
            self::LOAD_BALANCER,
            self::LOG_SINK,
            self::LOGGING_ENDPOINT,
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
            self::MEMORYSTORE_VALKEY,
            self::MESSAGE_BATCH,
            self::MESSAGING_SERVICE,
            self::MISTRAL_AGENT,
            self::MISTRAL_API_KEY,
            self::MISTRAL_BATCH_JOB,
            self::MISTRAL_FILE,
            self::MISTRAL_FINE_TUNING_JOB,
            self::MISTRAL_LIBRARY,
            self::MISTRAL_MODEL,
            self::MISTRAL_VOICE,
            self::MODEL,
            self::MODEL_API,
            self::MODEL_API_KEY,
            self::MODEL_ENDPOINT,
            self::MODEL_VERSION,
            self::MONGODB_DATABASE,
            self::MONITOR,
            self::MQ_BROKER,
            self::MSK_CLUSTER,
            self::MSSQL_DATABASE,
            self::MYSQL_DATABASE,
            self::NAMESPACE,
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
            self::NETLIFY_DATABASE,
            self::NETLIFY_DEPLOY,
            self::NETLIFY_DNS_RECORD,
            self::NETLIFY_DNS_ZONE,
            self::NETLIFY_ENV_VAR,
            self::NETLIFY_FORM,
            self::NETLIFY_NOTIFICATION_HOOK,
            self::NETLIFY_SITE,
            self::NETLIFY_SNIPPET,
            self::NETWORK,
            self::NETWORK_CONNECTION,
            self::NEXUS_ENDPOINT,
            self::NFS_SHARE,
            self::NODE_POOL,
            self::NODEBALANCER,
            self::NOTIFICATION_POLICY,
            self::OBJECT_STORAGE_BUCKET,
            self::OCTAVIA_LOAD_BALANCER,
            self::OKE_CLUSTER,
            self::ONLINE_ARCHIVE,
            self::OPENSEARCH_CLUSTER,
            self::OPENSEARCH_DOMAIN,
            self::ORGANIZATION,
            self::ORGANIZATION_API_KEY,
            self::ORGANIZATION_DOMAIN,
            self::ORGANIZATION_MEMBERSHIP,
            self::ORGANIZATION_ROLE,
            self::ORGANIZATION_USER,
            self::OUTGOING_WEBHOOK,
            self::PAGE_RULE,
            self::PARSING_RULE_GROUP,
            self::PERMISSION,
            self::PG_DATABASE,
            self::PG_SCHEMA,
            self::PHONE_NUMBER,
            self::PIPELINE,
            self::PLACEMENT_GROUP,
            self::PLAYBOOK,
            self::POSTGRES_CLUSTER,
            self::POSTURE_INTEGRATION,
            self::PREDICTION,
            self::PRIMARY_IP,
            self::PRIVATE_ENDPOINT_SERVICE,
            self::PRIVATE_NETWORK,
            self::PRODUCT_ENVIRONMENT,
            self::PROJECT,
            self::PROJECT_API_KEY,
            self::PROJECT_RATE_LIMIT,
            self::PROJECT_SERVICE_ACCOUNT,
            self::PROJECT_USER,
            self::PROJECT_VARIABLE,
            self::PRONUNCIATION_DICT,
            self::PRONUNCIATION_DICTIONARY,
            self::PROVIDER,
            self::PS_BACKUP,
            self::PS_BRANCH,
            self::PS_DATABASE,
            self::PS_DEPLOY_REQUEST,
            self::PS_PASSWORD,
            self::PS_ROLE,
            self::PS_WEBHOOK,
            self::PUBSUB_SUBSCRIPTION,
            self::PUBSUB_TOPIC,
            self::PURCHASE,
            self::QUEUE,
            self::QUOTA,
            self::QUOTA_RULE,
            self::R2_BUCKET,
            self::RATE_LIMIT,
            self::RATE_LIMIT_RULE,
            self::RC_ACCOUNT,
            self::RC_ACL_ROLE,
            self::RC_ACL_RULE,
            self::RC_ACL_USER,
            self::RC_CLOUD_ACCOUNT,
            self::RC_DATABASE,
            self::RC_PSC_ENDPOINT,
            self::RC_SUBSCRIPTION,
            self::RC_TRANSIT_GATEWAY,
            self::RC_VPC_PEERING,
            self::RDB_INSTANCE,
            self::RDS_CLUSTER,
            self::RDS_INSTANCE,
            self::REDIRECT_RULE,
            self::REDIS_INSTANCE,
            self::REDSHIFT_CLUSTER,
            self::REGISTRY_NAMESPACE,
            self::REINFORCEMENT_FINE_TUNING_JOB,
            self::RELEASE,
            self::REPO_BLOCKLIST,
            self::RESERVATION,
            self::RESERVED_IP,
            self::ROLE,
            self::ROUTE_TABLE,
            self::ROUTE53_HEALTH_CHECK,
            self::ROUTE53_HOSTED_ZONE,
            self::ROUTE53_RECORD_SET,
            self::ROUTER,
            self::RUNNER,
            self::RUNNER_RESOURCE_CLASS,
            self::S3_BUCKET,
            self::SAGEMAKER_ENDPOINT,
            self::SCHEDULE,
            self::SCHEDULED_FUNCTION,
            self::SCHEMA_REGISTRY,
            self::SEARCH_INDEX,
            self::SECRET,
            self::SECRET_MANAGER_SECRET,
            self::SECRET_STORE,
            self::SECRETS_MANAGER_SECRET,
            self::SECRETS_STORE_SECRET,
            self::SECURITY_GROUP,
            self::SECURITY_LIST,
            self::SENTIMENT_JOB,
            self::SERVER,
            self::SERVERLESS_CONTAINER,
            self::SERVERLESS_FUNCTION,
            self::SERVERLESS_INSTANCE,
            self::SERVERLESS_TRAFFIC_FILTER,
            self::SERVICE,
            self::SERVICE_ACCOUNT,
            self::SERVICE_VERSION,
            self::SESSION,
            self::SHARED_VOLUME,
            self::SKILL,
            self::SLO,
            self::SNAPSHOT,
            self::SNOWFLAKE_ACCOUNT,
            self::SNOWFLAKE_DATABASE,
            self::SNOWFLAKE_DYNAMIC_TABLE,
            self::SNOWFLAKE_PIPE,
            self::SNOWFLAKE_RESOURCE_MONITOR,
            self::SNOWFLAKE_ROLE,
            self::SNOWFLAKE_SCHEMA,
            self::SNOWFLAKE_TASK,
            self::SNOWFLAKE_USER,
            self::SNOWFLAKE_WAREHOUSE,
            self::SNS_TOPIC,
            self::SPACES_BUCKET,
            self::SPANNER_BACKUP,
            self::SPANNER_DATABASE,
            self::SPANNER_INSTANCE,
            self::SPECTRUM_APPLICATION,
            self::SPEND_ALERT,
            self::SPEND_LIMIT,
            self::SPENDING_LIMIT,
            self::SQS_QUEUE,
            self::SSH_KEY,
            self::SSH_TARGET,
            self::SSL_CERTIFICATE,
            self::SSM_PARAMETER,
            self::STACK,
            self::STACK_PLUGIN,
            self::STACKSCRIPT,
            self::STATIC_IP,
            self::STEP_FUNCTION,
            self::STORAGE_BOX,
            self::SUBACCOUNT,
            self::SUBNET,
            self::SUPERVISED_FINE_TUNING_JOB,
            self::SYNTHETIC_CHECK,
            self::SYNTHETIC_MONITOR,
            self::SYNTHETICS_TEST,
            self::TAILNET,
            self::TARGET_GROUP,
            self::TCO_POLICY,
            self::TEAM,
            self::TEAM_MEMBER,
            self::TENANCY,
            self::TLS_CERTIFICATE,
            self::TLS_SUBSCRIPTION,
            self::TOPIC_JOB,
            self::TRAFFIC_FILTER,
            self::TRAINING,
            self::TRAINING_JOB,
            self::TRAINING_PROJECT,
            self::TRANSCRIPT,
            self::TRANSCRIPTION,
            self::TRANSFORMATION,
            self::TRIGGER,
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
            self::TWIML_APP,
            self::UPLOAD_MAPPING,
            self::UPLOAD_PRESET,
            self::UPTIME_CHECK,
            self::UPTIME_MONITOR,
            self::USAGE_TRIGGER,
            self::USER,
            self::USER_INVITE,
            self::UT_APP,
            self::UT_FILE,
            self::VCN,
            self::VECTOR_STORE,
            self::VECTORIZE_INDEX,
            self::VERCEL_DEPLOYMENT,
            self::VERCEL_DNS_RECORD,
            self::VERCEL_DOMAIN,
            self::VERCEL_ENV_VAR,
            self::VERCEL_PROJECT,
            self::VERCEL_TEAM,
            self::VERCEL_WEBHOOK,
            self::VERIFY_SERVICE,
            self::VERTEX_AI_ENDPOINT,
            self::VERTEX_GEMINI_MODEL,
            self::VM,
            self::VOCABULARY,
            self::VOICE,
            self::VOICE_AGENT,
            self::VOLUME,
            self::VOLUME_SNAPSHOT,
            self::VPC,
            self::VPC_NAT_GATEWAY,
            self::VPC_NETWORK,
            self::VPC_PEERING,
            self::VPC_SUBNET,
            self::WAF_WEB_ACL,
            self::WAITING_ROOM,
            self::WEBHOOK,
            self::WEBHOOK_ENDPOINT,
            self::WEBHOOK_SUBSCRIPTION,
            self::WORKER,
            self::WORKER_ROUTE,
            self::WORKERS_AI_MODEL,
            self::WORKFLOW,
            self::WORKLOAD,
            self::WORKSPACE,
            self::WORKSPACE_MEMBER,
            self::ZONE,
        ];
    }
}
