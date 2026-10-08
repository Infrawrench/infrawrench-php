<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
 * Resource type id. Note: not every plugin exposes every type; see the plugin's `resourceTypes`
 * for the valid (pluginId, typeId) pairs.
 *
 * The values `ResourceTypeId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ResourceTypeId
{
    public const AB_TEST = 'ab-test';
    public const ACCESS_APPLICATION = 'access-application';
    public const ACCESS_KEY = 'access-key';
    public const ACCESS_POLICY = 'access-policy';
    public const ACCESS_POLICY_TOKEN = 'access-policy-token';
    public const ACCESS_TOKEN = 'access-token';
    public const ACCOUNT = 'account';
    public const ACK_CLUSTER = 'ack-cluster';
    public const ACK_NODE_POOL = 'ack-node-pool';
    public const ACM_CERTIFICATE = 'acm-certificate';
    public const ACTION = 'action';
    public const ACTIONS_CACHE = 'actions-cache';
    public const ADD_ON = 'add-on';
    public const ADMIN_API_KEY = 'admin-api-key';
    public const AGENT = 'agent';
    public const AGENT_API_KEY = 'agent-api-key';
    public const AGENT_CONFIG = 'agent-config';
    public const AGENT_POOL = 'agent-pool';
    public const AGENT_SESSION = 'agent-session';
    public const AGENT_TOKEN = 'agent-token';
    public const AGENT_VARIABLE = 'agent-variable';
    public const AI_GATEWAY = 'ai-gateway';
    public const AI_SEARCH = 'ai-search';
    public const AIVEN_BILLING_GROUP = 'aiven-billing-group';
    public const AIVEN_CONNECTION_POOL = 'aiven-connection-pool';
    public const AIVEN_DATABASE = 'aiven-database';
    public const AIVEN_INTEGRATION = 'aiven-integration';
    public const AIVEN_KAFKA_ACL = 'aiven-kafka-acl';
    public const AIVEN_KAFKA_CONNECTOR = 'aiven-kafka-connector';
    public const AIVEN_KAFKA_TOPIC = 'aiven-kafka-topic';
    public const AIVEN_PROJECT = 'aiven-project';
    public const AIVEN_SCHEMA_SUBJECT = 'aiven-schema-subject';
    public const AIVEN_SERVICE = 'aiven-service';
    public const AIVEN_SERVICE_USER = 'aiven-service-user';
    public const AIVEN_VPC = 'aiven-vpc';
    public const AIVEN_VPC_PEERING = 'aiven-vpc-peering';
    public const ALB = 'alb';
    public const ALERT = 'alert';
    public const ALERT_CHANNEL = 'alert-channel';
    public const ALERT_CONDITION = 'alert-condition';
    public const ALERT_CONFIGURATION = 'alert-configuration';
    public const ALERT_POLICY = 'alert-policy';
    public const ALERT_RULE = 'alert-rule';
    public const ALERTING_PROFILE = 'alerting-profile';
    public const ALIAS = 'alias';
    public const ALIGNMENT_JOB = 'alignment-job';
    public const ALLOWLIST_IDENTIFIER = 'allowlist-identifier';
    public const ALLOYDB_CLUSTER = 'alloydb-cluster';
    public const ALLOYDB_INSTANCE = 'alloydb-instance';
    public const ANALYTICS_ENGINE_DATASET = 'analytics-engine-dataset';
    public const ANNOTATION = 'annotation';
    public const ANTI_AFFINITY_GROUP = 'anti-affinity-group';
    public const API = 'api';
    public const API_GATEWAY = 'api-gateway';
    public const API_KEY = 'api-key';
    public const API_TOKEN = 'api-token';
    public const APM_APPLICATION = 'apm-application';
    public const APP = 'app';
    public const APP_ENGINE_SERVICE = 'app-engine-service';
    public const APP_SECRET = 'app-secret';
    public const APPLICATION = 'application';
    public const APPLICATION_KEY = 'application-key';
    public const APPRUNNER_SERVICE = 'apprunner-service';
    public const ARTIFACT_REGISTRY_REPO = 'artifact-registry-repo';
    public const ASSISTANT = 'assistant';
    public const ASTRA_ACCESS_ENTRY = 'astra-access-entry';
    public const ASTRA_CDC = 'astra-cdc';
    public const ASTRA_COLLECTION = 'astra-collection';
    public const ASTRA_DATABASE = 'astra-database';
    public const ASTRA_KEYSPACE = 'astra-keyspace';
    public const ASTRA_PCU_GROUP = 'astra-pcu-group';
    public const ASTRA_PRIVATE_ENDPOINT = 'astra-private-endpoint';
    public const ASTRA_REGION = 'astra-region';
    public const ASTRA_ROLE = 'astra-role';
    public const ASTRA_SNAPSHOT = 'astra-snapshot';
    public const ASTRA_STREAMING_TENANT = 'astra-streaming-tenant';
    public const ASTRA_TOKEN = 'astra-token';
    public const ASTRA_USER = 'astra-user';
    public const AUDIT_EVENT = 'audit-event';
    public const AUTHORIZATION_SERVER = 'authorization-server';
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
    public const BACKUP = 'backup';
    public const BACKUP_POLICY = 'backup-policy';
    public const BACKUP_RESTORE = 'backup-restore';
    public const BACKUP_SCHEDULE = 'backup-schedule';
    public const BACKUP_SNAPSHOT = 'backup-snapshot';
    public const BACKUP_VAULT = 'backup-vault';
    public const BALANCE = 'balance';
    public const BARE_METAL = 'bare-metal';
    public const BASIN_CATALOG = 'basin-catalog';
    public const BASIN_PIPELINE = 'basin-pipeline';
    public const BASIN_SINK = 'basin-sink';
    public const BASIN_STREAM = 'basin-stream';
    public const BASIN_TABLE = 'basin-table';
    public const BATCH = 'batch';
    public const BATCH_EXPORT = 'batch-export';
    public const BATCH_INFERENCE_JOB = 'batch-inference-job';
    public const BATCH_JOB_QUEUE = 'batch-job-queue';
    public const BEDROCK_MODEL = 'bedrock-model';
    public const BIGQUERY_DATASET = 'bigquery-dataset';
    public const BIGQUERY_TABLE = 'bigquery-table';
    public const BIGTABLE_INSTANCE = 'bigtable-instance';
    public const BILLABLE_METRIC = 'billable-metric';
    public const BILLING_ACCOUNT = 'billing-account';
    public const BILLING_GROUP = 'billing-group';
    public const BLOCK_STORAGE = 'block-storage';
    public const BLOCK_STORAGE_SNAPSHOT = 'block-storage-snapshot';
    public const BLOCK_VOLUME = 'block-volume';
    public const BLOCKLIST_IDENTIFIER = 'blocklist-identifier';
    public const BLUEPRINT = 'blueprint';
    public const BOARD = 'board';
    public const BOARD_VIEW = 'board-view';
    public const BOOT_VOLUME = 'boot-volume';
    public const BRANCH_RESTRICTION = 'branch-restriction';
    public const BROWSER_APPLICATION = 'browser-application';
    public const BUCKET = 'bucket';
    public const BUDGET = 'budget';
    public const BUDGET_ALERT_RULE = 'budget-alert-rule';
    public const BUILD = 'build';
    public const BURN_ALERT = 'burn-alert';
    public const BYOK_CREDENTIAL = 'byok-credential';
    public const CACHE_RULE = 'cache-rule';
    public const CACHED_CONTENT = 'cached-content';
    public const CAPELLA_ALLOWED_CIDR = 'capella-allowed-cidr';
    public const CAPELLA_API_KEY = 'capella-api-key';
    public const CAPELLA_APP_SERVICE = 'capella-app-service';
    public const CAPELLA_BACKUP = 'capella-backup';
    public const CAPELLA_BUCKET = 'capella-bucket';
    public const CAPELLA_CLUSTER = 'capella-cluster';
    public const CAPELLA_COLLECTION = 'capella-collection';
    public const CAPELLA_DB_CREDENTIAL = 'capella-db-credential';
    public const CAPELLA_NETWORK_PEER = 'capella-network-peer';
    public const CAPELLA_PRIVATE_ENDPOINT = 'capella-private-endpoint';
    public const CAPELLA_PROJECT = 'capella-project';
    public const CAPELLA_REPLICATION = 'capella-replication';
    public const CAPELLA_SCOPE = 'capella-scope';
    public const CAPELLA_USER = 'capella-user';
    public const CDN_ENDPOINT = 'cdn-endpoint';
    public const CEREBRAS_BATCH = 'cerebras-batch';
    public const CEREBRAS_ENDPOINT = 'cerebras-endpoint';
    public const CEREBRAS_FILE = 'cerebras-file';
    public const CEREBRAS_MODEL = 'cerebras-model';
    public const CEREBRAS_MODEL_VERSION = 'cerebras-model-version';
    public const CERTIFICATE = 'certificate';
    public const CERTIFICATE_AUTHORITY = 'certificate-authority';
    public const CH_API_KEY = 'ch-api-key';
    public const CH_BACKUP = 'ch-backup';
    public const CH_CLICKPIPE = 'ch-clickpipe';
    public const CH_DATABASE = 'ch-database';
    public const CH_MEMBER = 'ch-member';
    public const CH_POSTGRES = 'ch-postgres';
    public const CH_SERVICE = 'ch-service';
    public const CHAIN = 'chain';
    public const CHART = 'chart';
    public const CHECK = 'check';
    public const CHECK_GROUP = 'check-group';
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
    public const CLUSTER_SECRET = 'cluster-secret';
    public const CODE_ENGINE_APP = 'code-engine-app';
    public const CODE_ENGINE_PROJECT = 'code-engine-project';
    public const CODEBUILD_PROJECT = 'codebuild-project';
    public const CODEPIPELINE_PIPELINE = 'codepipeline-pipeline';
    public const CODESPACE = 'codespace';
    public const COGNITO_USER_POOL = 'cognito-user-pool';
    public const COHORT = 'cohort';
    public const COLLECTION = 'collection';
    public const COLLECTION_DOCUMENT = 'collection-document';
    public const COLUMN = 'column';
    public const COMPARTMENT = 'compartment';
    public const COMPOSER_ENVIRONMENT = 'composer-environment';
    public const COMPUTE_CONFIG = 'compute-config';
    public const CONFIG_STORE = 'config-store';
    public const CONFIG_VAR = 'config-var';
    public const CONNECTION = 'connection';
    public const CONNECTIVITY_RULE = 'connectivity-rule';
    public const CONNECTOR = 'connector';
    public const CONSUL_ACL_POLICY = 'consul-acl-policy';
    public const CONSUL_ACL_ROLE = 'consul-acl-role';
    public const CONSUL_ACL_TOKEN = 'consul-acl-token';
    public const CONSUL_CHECK = 'consul-check';
    public const CONSUL_CLUSTER = 'consul-cluster';
    public const CONSUL_CONFIG_ENTRY = 'consul-config-entry';
    public const CONSUL_INTENTION = 'consul-intention';
    public const CONSUL_NAMESPACE = 'consul-namespace';
    public const CONSUL_NODE = 'consul-node';
    public const CONSUL_PARTITION = 'consul-partition';
    public const CONSUL_PEERING = 'consul-peering';
    public const CONSUL_SERVICE = 'consul-service';
    public const CONSUL_SESSION = 'consul-session';
    public const CONTACT_POINT = 'contact-point';
    public const CONTAINER = 'container';
    public const CONTAINER_APP = 'container-app';
    public const CONTAINER_REGISTRY = 'container-registry';
    public const CONTAINER_REGISTRY_AUTH = 'container-registry-auth';
    public const CONTAINER_REPOSITORY = 'container-repository';
    public const CONTEXT = 'context';
    public const CONTEXT_VARIABLE = 'context-variable';
    public const CONVEX_ACCESS_TOKEN = 'convex-access-token';
    public const CONVEX_CUSTOM_DOMAIN = 'convex-custom-domain';
    public const CONVEX_CUSTOM_ROLE = 'convex-custom-role';
    public const CONVEX_DEFAULT_ENV_VAR = 'convex-default-env-var';
    public const CONVEX_DEPLOY_KEY = 'convex-deploy-key';
    public const CONVEX_DEPLOYMENT = 'convex-deployment';
    public const CONVEX_ENV_VAR = 'convex-env-var';
    public const CONVEX_INVITE = 'convex-invite';
    public const CONVEX_LOG_STREAM = 'convex-log-stream';
    public const CONVEX_MEMBER = 'convex-member';
    public const CONVEX_PREVIEW_DEPLOY_KEY = 'convex-preview-deploy-key';
    public const CONVEX_PROJECT = 'convex-project';
    public const CONVEX_TEAM = 'convex-team';
    public const CONVEX_USAGE_LIMIT = 'convex-usage-limit';
    public const COPILOT_SEAT = 'copilot-seat';
    public const CORS_RULE = 'cors-rule';
    public const COS_BUCKET = 'cos-bucket';
    public const COST_CENTER = 'cost-center';
    public const CRAWLER = 'crawler';
    public const CRDB_ALLOWLIST_ENTRY = 'crdb-allowlist-entry';
    public const CRDB_API_KEY = 'crdb-api-key';
    public const CRDB_BACKUP = 'crdb-backup';
    public const CRDB_BLACKOUT_WINDOW = 'crdb-blackout-window';
    public const CRDB_CLUSTER = 'crdb-cluster';
    public const CRDB_DATABASE = 'crdb-database';
    public const CRDB_EGRESS_RULE = 'crdb-egress-rule';
    public const CRDB_FOLDER = 'crdb-folder';
    public const CRDB_LOG_EXPORT = 'crdb-log-export';
    public const CRDB_METRIC_EXPORT = 'crdb-metric-export';
    public const CRDB_ORGANIZATION = 'crdb-organization';
    public const CRDB_RESTORE = 'crdb-restore';
    public const CRDB_SERVICE_ACCOUNT = 'crdb-service-account';
    public const CRDB_SQL_USER = 'crdb-sql-user';
    public const CRON_MONITOR = 'cron-monitor';
    public const CUSTOM_DOMAIN = 'custom-domain';
    public const CUSTOM_ENRICHMENT = 'custom-enrichment';
    public const CUSTOM_HOSTNAME = 'custom-hostname';
    public const CUSTOM_TEMPLATE = 'custom-template';
    public const CUSTOM_VOICE = 'custom-voice';
    public const CUSTOMER = 'customer';
    public const D1_DATABASE = 'd1-database';
    public const DASHBOARD = 'dashboard';
    public const DASHBOARD_GROUP = 'dashboard-group';
    public const DATABASE = 'database';
    public const DATABASE_API_KEY = 'database-api-key';
    public const DATABASE_BACKUP = 'database-backup';
    public const DATABASE_DB = 'database-db';
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
    public const DBAAS = 'dbaas';
    public const DBAAS_DATABASE = 'dbaas-database';
    public const DBAAS_USER = 'dbaas-user';
    public const DEDICATED_INFERENCE = 'dedicated-inference';
    public const DEPLOY = 'deploy';
    public const DEPLOY_KEY = 'deploy-key';
    public const DEPLOY_TOKEN = 'deploy-token';
    public const DEPLOYED_MODEL = 'deployed-model';
    public const DEPLOYMENT = 'deployment';
    public const DEPLOYMENT_VARIABLE = 'deployment-variable';
    public const DEPOT_ACTIONS_REPO = 'depot-actions-repo';
    public const DEPOT_BUILD = 'depot-build';
    public const DEPOT_PROJECT = 'depot-project';
    public const DEPOT_REGISTRY_IMAGE = 'depot-registry-image';
    public const DEPOT_TOKEN = 'depot-token';
    public const DEPOT_TRUST_POLICY = 'depot-trust-policy';
    public const DERIVED_COLUMN = 'derived-column';
    public const DETECTOR = 'detector';
    public const DEVICE = 'device';
    public const DICT = 'dict';
    public const DICTIONARY = 'dictionary';
    public const DIRECTORY = 'directory';
    public const DIRECTORY_GROUP = 'directory-group';
    public const DIRECTORY_USER = 'directory-user';
    public const DISK = 'disk';
    public const DISTRIBUTION_CREDENTIAL = 'distribution-credential';
    public const DNS_DOMAIN = 'dns-domain';
    public const DNS_RECORD = 'dns-record';
    public const DNS_ZONE = 'dns-zone';
    public const DOCKER_CONTAINER = 'docker-container';
    public const DOCKER_IMAGE = 'docker-image';
    public const DOCKER_NETWORK = 'docker-network';
    public const DOCKER_VOLUME = 'docker-volume';
    public const DOCKERHUB_ACCESS_TOKEN = 'dockerhub-access-token';
    public const DOCKERHUB_INVITE = 'dockerhub-invite';
    public const DOCKERHUB_MEMBER = 'dockerhub-member';
    public const DOCKERHUB_NAMESPACE = 'dockerhub-namespace';
    public const DOCKERHUB_ORG_ACCESS_TOKEN = 'dockerhub-org-access-token';
    public const DOCKERHUB_REPOSITORY = 'dockerhub-repository';
    public const DOCKERHUB_TAG = 'dockerhub-tag';
    public const DOCKERHUB_TEAM = 'dockerhub-team';
    public const DOCUMENTDB_CLUSTER = 'documentdb-cluster';
    public const DOKS_CLUSTER = 'doks-cluster';
    public const DOMAIN = 'domain';
    public const DOMAIN_RECORD = 'domain-record';
    public const DOPPLER_CONFIG = 'doppler-config';
    public const DOPPLER_ENVIRONMENT = 'doppler-environment';
    public const DOPPLER_GROUP = 'doppler-group';
    public const DOPPLER_INTEGRATION = 'doppler-integration';
    public const DOPPLER_PROJECT = 'doppler-project';
    public const DOPPLER_SECRET = 'doppler-secret';
    public const DOPPLER_SERVICE_ACCOUNT = 'doppler-service-account';
    public const DOPPLER_SERVICE_ACCOUNT_TOKEN = 'doppler-service-account-token';
    public const DOPPLER_SERVICE_TOKEN = 'doppler-service-token';
    public const DOPPLER_SYNC = 'doppler-sync';
    public const DOPPLER_USER = 'doppler-user';
    public const DOPPLER_WEBHOOK = 'doppler-webhook';
    public const DOPPLER_WORKPLACE = 'doppler-workplace';
    public const DOWNTIME = 'downtime';
    public const DPO_JOB = 'dpo-job';
    public const DROP_RULE = 'drop-rule';
    public const DROPLET = 'droplet';
    public const DURABLE_OBJECT_NAMESPACE = 'durable-object-namespace';
    public const DYNAMIC_SECRET = 'dynamic-secret';
    public const DYNAMODB_TABLE = 'dynamodb-table';
    public const DYNO = 'dyno';
    public const EBS_VOLUME = 'ebs-volume';
    public const EC2_INSTANCE = 'ec2-instance';
    public const ECR_REPOSITORY = 'ecr-repository';
    public const ECS_INSTANCE = 'ecs-instance';
    public const ECS_SERVICE = 'ecs-service';
    public const EDGE_RULE = 'edge-rule';
    public const EDGE_SCRIPT = 'edge-script';
    public const EFS_FILE_SYSTEM = 'efs-file-system';
    public const EIP = 'eip';
    public const EKS_CLUSTER = 'eks-cluster';
    public const ELASTIC_IP = 'elastic-ip';
    public const ELASTICACHE_CLUSTER = 'elasticache-cluster';
    public const ELASTICACHE_SERVERLESS_CACHE = 'elasticache-serverless-cache';
    public const EMAIL_ROUTING_RULE = 'email-routing-rule';
    public const EMBED_JOB = 'embed-job';
    public const ENCRYPTION_KEY = 'encryption-key';
    public const ENDPOINT = 'endpoint';
    public const ENRICHMENT = 'enrichment';
    public const ENTERPRISE_CONNECTION = 'enterprise-connection';
    public const ENV_GROUP = 'env-group';
    public const ENV_GROUP_VAR = 'env-group-var';
    public const ENV_VAR = 'env-var';
    public const ENVIRONMENT = 'environment';
    public const ESCALATION_POLICY = 'escalation-policy';
    public const EVAL = 'eval';
    public const EVALUATION = 'evaluation';
    public const EVALUATION_JOB = 'evaluation-job';
    public const EVALUATOR = 'evaluator';
    public const EVENT_HOOK = 'event-hook';
    public const EVENTBRIDGE_RULE = 'eventbridge-rule';
    public const EVENTS2METRICS = 'events2metrics';
    public const EXPERIMENT = 'experiment';
    public const EXPORT_SINK = 'export-sink';
    public const EXTENSION = 'extension';
    public const FAL_API_KEY = 'fal-api-key';
    public const FAL_APP = 'fal-app';
    public const FAL_COMPUTE_INSTANCE = 'fal-compute-instance';
    public const FAL_MODEL = 'fal-model';
    public const FAL_WORKFLOW = 'fal-workflow';
    public const FC_FUNCTION = 'fc-function';
    public const FEATURE_FLAG = 'feature-flag';
    public const FIELD = 'field';
    public const FILE = 'file';
    public const FILE_SEARCH_DOCUMENT = 'file-search-document';
    public const FILE_SEARCH_STORE = 'file-search-store';
    public const FILESYSTEM = 'filesystem';
    public const FINE_TUNE = 'fine-tune';
    public const FINE_TUNING_JOB = 'fine-tuning-job';
    public const FINETUNED_MODEL = 'finetuned-model';
    public const FIRESTORE_DATABASE = 'firestore-database';
    public const FIREWALL = 'firewall';
    public const FIREWALL_GROUP = 'firewall-group';
    public const FIREWALL_RULE = 'firewall-rule';
    public const FIREWALL_RULESET = 'firewall-ruleset';
    public const FLEX_CLUSTER = 'flex-cluster';
    public const FLEXIBLE_IP = 'flexible-ip';
    public const FLINK_COMPUTE_POOL = 'flink-compute-pool';
    public const FLOATING_IP = 'floating-ip';
    public const FOLDER = 'folder';
    public const FORMATION = 'formation';
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
    public const GLOBAL_FIREWALL = 'global-firewall';
    public const GLUE_DATABASE = 'glue-database';
    public const GPU_CLUSTER = 'gpu-cluster';
    public const GROQ_BATCH = 'groq-batch';
    public const GROQ_FILE = 'groq-file';
    public const GROQ_FINE_TUNING = 'groq-fine-tuning';
    public const GROQ_MODEL = 'groq-model';
    public const GROUP = 'group';
    public const GROUP_DEPLOY_TOKEN = 'group-deploy-token';
    public const GROUP_MEMBER = 'group-member';
    public const GROUP_VARIABLE = 'group-variable';
    public const GROUP_WEBHOOK = 'group-webhook';
    public const GUARDRAIL = 'guardrail';
    public const HARDWARE = 'hardware';
    public const HEALTH_CHECK = 'health-check';
    public const HEALTHCHECK = 'healthcheck';
    public const HEARTBEAT = 'heartbeat';
    public const HEARTBEAT_GROUP = 'heartbeat-group';
    public const HF_DATASET = 'hf-dataset';
    public const HF_INFERENCE_ENDPOINT = 'hf-inference-endpoint';
    public const HF_JOB = 'hf-job';
    public const HF_MEMBER_TOKEN = 'hf-member-token';
    public const HF_MODEL = 'hf-model';
    public const HF_PROVIDER_MODEL = 'hf-provider-model';
    public const HF_SCHEDULED_JOB = 'hf-scheduled-job';
    public const HF_SERVICE_ACCOUNT = 'hf-service-account';
    public const HF_SPACE = 'hf-space';
    public const HF_WEBHOOK = 'hf-webhook';
    public const HISTORY_ITEM = 'history-item';
    public const HOG_FUNCTION = 'hog-function';
    public const HOST = 'host';
    public const HOSTED_RUNNER = 'hosted-runner';
    public const HOSTNAME = 'hostname';
    public const HYBRID_ENVIRONMENT = 'hybrid-environment';
    public const HYPERDRIVE = 'hyperdrive';
    public const IAM_ROLE = 'iam-role';
    public const IAM_USER = 'iam-user';
    public const IMAGE = 'image';
    public const INCIDENT = 'incident';
    public const INCIDENT_IO_ALERT_ROUTE = 'incident-io-alert-route';
    public const INCIDENT_IO_ALERT_SOURCE = 'incident-io-alert-source';
    public const INCIDENT_IO_CATALOG_TYPE = 'incident-io-catalog-type';
    public const INCIDENT_IO_ESCALATION = 'incident-io-escalation';
    public const INCIDENT_IO_ESCALATION_PATH = 'incident-io-escalation-path';
    public const INCIDENT_IO_INCIDENT = 'incident-io-incident';
    public const INCIDENT_IO_MAINTENANCE_WINDOW = 'incident-io-maintenance-window';
    public const INCIDENT_IO_SCHEDULE = 'incident-io-schedule';
    public const INCIDENT_IO_SEVERITY = 'incident-io-severity';
    public const INCIDENT_IO_STATUS = 'incident-io-status';
    public const INCIDENT_IO_STATUS_PAGE = 'incident-io-status-page';
    public const INCIDENT_IO_TEAM = 'incident-io-team';
    public const INCIDENT_IO_USER = 'incident-io-user';
    public const INCIDENT_IO_WORKFLOW = 'incident-io-workflow';
    public const INDEX = 'index';
    public const INFERENCE_BATCH = 'inference-batch';
    public const INFLUX_BUCKET = 'influx-bucket';
    public const INFLUX_CHECK = 'influx-check';
    public const INFLUX_DASHBOARD = 'influx-dashboard';
    public const INFLUX_DEDICATED_DATABASE = 'influx-dedicated-database';
    public const INFLUX_DEDICATED_TOKEN = 'influx-dedicated-token';
    public const INFLUX_NOTIFICATION_ENDPOINT = 'influx-notification-endpoint';
    public const INFLUX_NOTIFICATION_RULE = 'influx-notification-rule';
    public const INFLUX_ORG = 'influx-org';
    public const INFLUX_TASK = 'influx-task';
    public const INFLUX_TELEGRAF = 'influx-telegraf';
    public const INFLUX_TOKEN = 'influx-token';
    public const INSIGHT = 'insight';
    public const INSTANCE = 'instance';
    public const INSTANCE_GROUP = 'instance-group';
    public const INSTANCE_POOL = 'instance-pool';
    public const INSTANCE_SNAPSHOT = 'instance-snapshot';
    public const INSTANCE_TEMPLATE = 'instance-template';
    public const INSTANCE_TYPE = 'instance-type';
    public const INTEGRATION = 'integration';
    public const INTERNET_GATEWAY = 'internet-gateway';
    public const INVITATION = 'invitation';
    public const INVITE = 'invite';
    public const INVOICE = 'invoice';
    public const IP_ACCESS_ENTRY = 'ip-access-entry';
    public const IP_ACCESS_RULE = 'ip-access-rule';
    public const IP_ALLOCATION = 'ip-allocation';
    public const ISSUE = 'issue';
    public const JFROG_ACCESS_TOKEN = 'jfrog-access-token';
    public const JFROG_BUILD = 'jfrog-build';
    public const JFROG_BUILD_RUN = 'jfrog-build-run';
    public const JFROG_GROUP = 'jfrog-group';
    public const JFROG_PERMISSION = 'jfrog-permission';
    public const JFROG_PLATFORM = 'jfrog-platform';
    public const JFROG_REPOSITORY = 'jfrog-repository';
    public const JFROG_USER = 'jfrog-user';
    public const JFROG_XRAY_POLICY = 'jfrog-xray-policy';
    public const JFROG_XRAY_VIOLATION = 'jfrog-xray-violation';
    public const JFROG_XRAY_WATCH = 'jfrog-xray-watch';
    public const JOB = 'job';
    public const JWT_TEMPLATE = 'jwt-template';
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
    public const KEY_VALUE = 'key-value';
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
    public const LIFECYCLE_RULE = 'lifecycle-rule';
    public const LINODE = 'linode';
    public const LIVE_SESSION = 'live-session';
    public const LKE_CLUSTER = 'lke-cluster';
    public const LKE_NODE_POOL = 'lke-node-pool';
    public const LLM_MODEL = 'llm-model';
    public const LOAD_BALANCER = 'load-balancer';
    public const LOG_DRAIN = 'log-drain';
    public const LOG_SINK = 'log-sink';
    public const LOG_STREAM = 'log-stream';
    public const LOGGING_ENDPOINT = 'logging-endpoint';
    public const LOGPUSH_JOB = 'logpush-job';
    public const MACHINE = 'machine';
    public const MACHINE_IDENTITY = 'machine-identity';
    public const MAILGUN_ACCOUNT = 'mailgun-account';
    public const MAILGUN_ACCOUNT_WEBHOOK = 'mailgun-account-webhook';
    public const MAILGUN_API_KEY = 'mailgun-api-key';
    public const MAILGUN_DNS_RECORD = 'mailgun-dns-record';
    public const MAILGUN_DOMAIN = 'mailgun-domain';
    public const MAILGUN_IP = 'mailgun-ip';
    public const MAILGUN_IP_POOL = 'mailgun-ip-pool';
    public const MAILGUN_MAILING_LIST = 'mailgun-mailing-list';
    public const MAILGUN_ROUTE = 'mailgun-route';
    public const MAILGUN_SMTP_CREDENTIAL = 'mailgun-smtp-credential';
    public const MAILGUN_SUBACCOUNT = 'mailgun-subaccount';
    public const MAILGUN_TAG = 'mailgun-tag';
    public const MAILGUN_WEBHOOK = 'mailgun-webhook';
    public const MAINTENANCE = 'maintenance';
    public const MAINTENANCE_WINDOW = 'maintenance-window';
    public const MANAGED_DATABASE = 'managed-database';
    public const MANAGED_DB = 'managed-db';
    public const MANAGED_ENDPOINT = 'managed-endpoint';
    public const MANAGED_KUBE = 'managed-kube';
    public const MARKER = 'marker';
    public const MARKER_SETTING = 'marker-setting';
    public const MEDIA_ASSET = 'media-asset';
    public const MEMBER = 'member';
    public const MEMCACHED_INSTANCE = 'memcached-instance';
    public const MEMORYSTORE_MEMCACHED = 'memorystore-memcached';
    public const MEMORYSTORE_REDIS = 'memorystore-redis';
    public const MEMORYSTORE_VALKEY = 'memorystore-valkey';
    public const MESSAGE_BATCH = 'message-batch';
    public const MESSAGING_SERVICE = 'messaging-service';
    public const MINIO_SERVER = 'minio-server';
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
    public const MODULE = 'module';
    public const MONGODB_DATABASE = 'mongodb-database';
    public const MONITOR = 'monitor';
    public const MONITOR_GROUP = 'monitor-group';
    public const MQ_BROKER = 'mq-broker';
    public const MSK_CLUSTER = 'msk-cluster';
    public const MSSQL_DATABASE = 'mssql-database';
    public const MUTING_RULE = 'muting-rule';
    public const MYSQL_DATABASE = 'mysql-database';
    public const NAMESPACE = 'namespace';
    public const NAT_GATEWAY = 'nat-gateway';
    public const NATS_ACCOUNT = 'nats-account';
    public const NATS_CONNECTION = 'nats-connection';
    public const NATS_CONSUMER = 'nats-consumer';
    public const NATS_KV_BUCKET = 'nats-kv-bucket';
    public const NATS_OBJECT_STORE = 'nats-object-store';
    public const NATS_PEER = 'nats-peer';
    public const NATS_SERVER = 'nats-server';
    public const NATS_STREAM = 'nats-stream';
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
    public const NETWORK_VOLUME = 'network-volume';
    public const NETWORK_ZONE = 'network-zone';
    public const NEXUS_ENDPOINT = 'nexus-endpoint';
    public const NF_ACCOUNT = 'nf-account';
    public const NF_ADDON = 'nf-addon';
    public const NF_CLUSTER = 'nf-cluster';
    public const NF_DOMAIN = 'nf-domain';
    public const NF_JOB = 'nf-job';
    public const NF_PIPELINE = 'nf-pipeline';
    public const NF_PROJECT = 'nf-project';
    public const NF_SECRET_GROUP = 'nf-secret-group';
    public const NF_SERVICE = 'nf-service';
    public const NF_SUBDOMAIN = 'nf-subdomain';
    public const NF_VOLUME = 'nf-volume';
    public const NFS_SHARE = 'nfs-share';
    public const NLB = 'nlb';
    public const NODE_GROUP = 'node-group';
    public const NODE_POOL = 'node-pool';
    public const NODEBALANCER = 'nodebalancer';
    public const NOMAD_ACL_POLICY = 'nomad-acl-policy';
    public const NOMAD_ACL_TOKEN = 'nomad-acl-token';
    public const NOMAD_ALLOCATION = 'nomad-allocation';
    public const NOMAD_CLUSTER = 'nomad-cluster';
    public const NOMAD_CSI_PLUGIN = 'nomad-csi-plugin';
    public const NOMAD_DEPLOYMENT = 'nomad-deployment';
    public const NOMAD_JOB = 'nomad-job';
    public const NOMAD_NAMESPACE = 'nomad-namespace';
    public const NOMAD_NODE = 'nomad-node';
    public const NOMAD_NODE_POOL = 'nomad-node-pool';
    public const NOMAD_SERVICE = 'nomad-service';
    public const NOMAD_VARIABLE = 'nomad-variable';
    public const NOMAD_VOLUME = 'nomad-volume';
    public const NOTIFICATION_POLICY = 'notification-policy';
    public const NOTIFICATION_RULE = 'notification-rule';
    public const NOTIFIER = 'notifier';
    public const OAUTH_APPLICATION = 'oauth-application';
    public const OBJECT_STORAGE = 'object-storage';
    public const OBJECT_STORAGE_BUCKET = 'object-storage-bucket';
    public const OBJECT_STORAGE_USER = 'object-storage-user';
    public const OBJECT_STORE = 'object-store';
    public const OBJECT_STORE_CREDENTIAL = 'object-store-credential';
    public const OCTAVIA_LOAD_BALANCER = 'octavia-load-balancer';
    public const OKE_CLUSTER = 'oke-cluster';
    public const ON_CALL_CALENDAR = 'on-call-calendar';
    public const ONLINE_ARCHIVE = 'online-archive';
    public const OPENSEARCH_CLUSTER = 'opensearch-cluster';
    public const OPENSEARCH_DOMAIN = 'opensearch-domain';
    public const ORG = 'org';
    public const ORG_TOKEN = 'org-token';
    public const ORGANIZATION = 'organization';
    public const ORGANIZATION_API_KEY = 'organization-api-key';
    public const ORGANIZATION_DOMAIN = 'organization-domain';
    public const ORGANIZATION_MEMBERSHIP = 'organization-membership';
    public const ORGANIZATION_ROLE = 'organization-role';
    public const ORGANIZATION_USER = 'organization-user';
    public const OS_CONTAINER = 'os-container';
    public const OS_DNS_RECORDSET = 'os-dns-recordset';
    public const OS_DNS_ZONE = 'os-dns-zone';
    public const OS_FLAVOR = 'os-flavor';
    public const OS_FLOATING_IP = 'os-floating-ip';
    public const OS_IMAGE = 'os-image';
    public const OS_KEYPAIR = 'os-keypair';
    public const OS_LB_LISTENER = 'os-lb-listener';
    public const OS_LB_POOL = 'os-lb-pool';
    public const OS_LOADBALANCER = 'os-loadbalancer';
    public const OS_NETWORK = 'os-network';
    public const OS_ROUTER = 'os-router';
    public const OS_SECURITY_GROUP = 'os-security-group';
    public const OS_SECURITY_GROUP_RULE = 'os-security-group-rule';
    public const OS_SERVER = 'os-server';
    public const OS_STACK = 'os-stack';
    public const OS_SUBNET = 'os-subnet';
    public const OS_VOLUME = 'os-volume';
    public const OS_VOLUME_BACKUP = 'os-volume-backup';
    public const OS_VOLUME_SNAPSHOT = 'os-volume-snapshot';
    public const OSS_BUCKET = 'oss-bucket';
    public const OUTGOING_WEBHOOK = 'outgoing-webhook';
    public const PACKAGE = 'package';
    public const PAGE_RULE = 'page-rule';
    public const PAGERDUTY_BUSINESS_SERVICE = 'pagerduty-business-service';
    public const PAGERDUTY_ESCALATION_POLICY = 'pagerduty-escalation-policy';
    public const PAGERDUTY_EVENT_ORCHESTRATION = 'pagerduty-event-orchestration';
    public const PAGERDUTY_INCIDENT = 'pagerduty-incident';
    public const PAGERDUTY_MAINTENANCE_WINDOW = 'pagerduty-maintenance-window';
    public const PAGERDUTY_SCHEDULE = 'pagerduty-schedule';
    public const PAGERDUTY_SERVICE = 'pagerduty-service';
    public const PAGERDUTY_TEAM = 'pagerduty-team';
    public const PAGERDUTY_USER = 'pagerduty-user';
    public const PARSING_RULE_GROUP = 'parsing-rule-group';
    public const PERMISSION = 'permission';
    public const PERPLEXITY_AGENT_MODEL = 'perplexity-agent-model';
    public const PERPLEXITY_ASYNC_REQUEST = 'perplexity-async-request';
    public const PERPLEXITY_ROUTER_MODEL = 'perplexity-router-model';
    public const PERPLEXITY_SKILL = 'perplexity-skill';
    public const PERPLEXITY_SONAR_MODEL = 'perplexity-sonar-model';
    public const PG_DATABASE = 'pg-database';
    public const PG_SCHEMA = 'pg-schema';
    public const PHONE_NUMBER = 'phone-number';
    public const PIPELINE = 'pipeline';
    public const PIPELINE_CACHE = 'pipeline-cache';
    public const PIPELINE_COUPLING = 'pipeline-coupling';
    public const PIPELINE_SCHEDULE = 'pipeline-schedule';
    public const PIPELINE_TEMPLATE = 'pipeline-template';
    public const PLACEMENT_GROUP = 'placement-group';
    public const PLAYBOOK = 'playbook';
    public const POD = 'pod';
    public const POLICY = 'policy';
    public const POLICY_GROUP = 'policy-group';
    public const POLICY_PACK = 'policy-pack';
    public const POLICY_SET = 'policy-set';
    public const POSTGRES = 'postgres';
    public const POSTGRES_CLUSTER = 'postgres-cluster';
    public const POSTMARK_DNS_RECORD = 'postmark-dns-record';
    public const POSTMARK_DOMAIN = 'postmark-domain';
    public const POSTMARK_INBOUND_RULE = 'postmark-inbound-rule';
    public const POSTMARK_MESSAGE_STREAM = 'postmark-message-stream';
    public const POSTMARK_SENDER_SIGNATURE = 'postmark-sender-signature';
    public const POSTMARK_SERVER = 'postmark-server';
    public const POSTMARK_TEMPLATE = 'postmark-template';
    public const POSTMARK_WEBHOOK = 'postmark-webhook';
    public const POSTURE_INTEGRATION = 'posture-integration';
    public const PREDICTION = 'prediction';
    public const PRIMARY_IP = 'primary-ip';
    public const PRIVATE_ENDPOINT_SERVICE = 'private-endpoint-service';
    public const PRIVATE_LOCATION = 'private-location';
    public const PRIVATE_NETWORK = 'private-network';
    public const PROBLEM = 'problem';
    public const PROCESS_GROUP = 'process-group';
    public const PRODUCT_ENVIRONMENT = 'product-environment';
    public const PROJECT = 'project';
    public const PROJECT_API_KEY = 'project-api-key';
    public const PROJECT_DEPLOY_KEY = 'project-deploy-key';
    public const PROJECT_MEMBER = 'project-member';
    public const PROJECT_RATE_LIMIT = 'project-rate-limit';
    public const PROJECT_SERVICE_ACCOUNT = 'project-service-account';
    public const PROJECT_USER = 'project-user';
    public const PROJECT_VARIABLE = 'project-variable';
    public const PROJECT_WEBHOOK = 'project-webhook';
    public const PROMETHEUS_ALERT = 'prometheus-alert';
    public const PROMETHEUS_ALERTMANAGER = 'prometheus-alertmanager';
    public const PROMETHEUS_AM_ALERT = 'prometheus-am-alert';
    public const PROMETHEUS_RECEIVER = 'prometheus-receiver';
    public const PROMETHEUS_RULE = 'prometheus-rule';
    public const PROMETHEUS_RULE_GROUP = 'prometheus-rule-group';
    public const PROMETHEUS_SCRAPE_POOL = 'prometheus-scrape-pool';
    public const PROMETHEUS_SERVER = 'prometheus-server';
    public const PROMETHEUS_SILENCE = 'prometheus-silence';
    public const PROMETHEUS_TARGET = 'prometheus-target';
    public const PRONUNCIATION_DICT = 'pronunciation-dict';
    public const PRONUNCIATION_DICTIONARY = 'pronunciation-dictionary';
    public const PROTECTED_BRANCH = 'protected-branch';
    public const PROVIDER = 'provider';
    public const PS_BACKUP = 'ps-backup';
    public const PS_BRANCH = 'ps-branch';
    public const PS_DATABASE = 'ps-database';
    public const PS_DEPLOY_REQUEST = 'ps-deploy-request';
    public const PS_PASSWORD = 'ps-password';
    public const PS_ROLE = 'ps-role';
    public const PS_WEBHOOK = 'ps-webhook';
    public const PUBLIC_IP = 'public-ip';
    public const PUBSUB_SUBSCRIPTION = 'pubsub-subscription';
    public const PUBSUB_TOPIC = 'pubsub-topic';
    public const PULL_ZONE = 'pull-zone';
    public const PURCHASE = 'purchase';
    public const PVE_BACKUP = 'pve-backup';
    public const PVE_BACKUP_JOB = 'pve-backup-job';
    public const PVE_CLUSTER = 'pve-cluster';
    public const PVE_CT = 'pve-ct';
    public const PVE_FIREWALL_ALIAS = 'pve-firewall-alias';
    public const PVE_FIREWALL_RULE = 'pve-firewall-rule';
    public const PVE_HA_RESOURCE = 'pve-ha-resource';
    public const PVE_HA_RULE = 'pve-ha-rule';
    public const PVE_IPSET = 'pve-ipset';
    public const PVE_NODE = 'pve-node';
    public const PVE_POOL = 'pve-pool';
    public const PVE_SECURITY_GROUP = 'pve-security-group';
    public const PVE_STORAGE = 'pve-storage';
    public const PVE_VM = 'pve-vm';
    public const QUEUE = 'queue';
    public const QUOTA = 'quota';
    public const QUOTA_RULE = 'quota-rule';
    public const R2_BUCKET = 'r2-bucket';
    public const RABBITMQ_BINDING = 'rabbitmq-binding';
    public const RABBITMQ_CHANNEL = 'rabbitmq-channel';
    public const RABBITMQ_CLUSTER = 'rabbitmq-cluster';
    public const RABBITMQ_CONNECTION = 'rabbitmq-connection';
    public const RABBITMQ_EXCHANGE = 'rabbitmq-exchange';
    public const RABBITMQ_FEDERATION_UPSTREAM = 'rabbitmq-federation-upstream';
    public const RABBITMQ_NODE = 'rabbitmq-node';
    public const RABBITMQ_OPERATOR_POLICY = 'rabbitmq-operator-policy';
    public const RABBITMQ_PERMISSION = 'rabbitmq-permission';
    public const RABBITMQ_POLICY = 'rabbitmq-policy';
    public const RABBITMQ_QUEUE = 'rabbitmq-queue';
    public const RABBITMQ_SHOVEL = 'rabbitmq-shovel';
    public const RABBITMQ_TOPIC_PERMISSION = 'rabbitmq-topic-permission';
    public const RABBITMQ_USER = 'rabbitmq-user';
    public const RABBITMQ_VHOST = 'rabbitmq-vhost';
    public const RAM_USER = 'ram-user';
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
    public const RECIPIENT = 'recipient';
    public const RECORDING_RULE = 'recording-rule';
    public const REDIRECT_RULE = 'redirect-rule';
    public const REDIRECT_URL = 'redirect-url';
    public const REDIS_INSTANCE = 'redis-instance';
    public const REDSHIFT_CLUSTER = 'redshift-cluster';
    public const REGISTRY_MODULE = 'registry-module';
    public const REGISTRY_NAMESPACE = 'registry-namespace';
    public const REGISTRY_PROVIDER = 'registry-provider';
    public const REINFORCEMENT_FINE_TUNING_JOB = 'reinforcement-fine-tuning-job';
    public const RELEASE = 'release';
    public const REPLICATION_RULE = 'replication-rule';
    public const REPO_BLOCKLIST = 'repo-blocklist';
    public const REPOSITORY = 'repository';
    public const REPOSITORY_VARIABLE = 'repository-variable';
    public const REPOSITORY_WEBHOOK = 'repository-webhook';
    public const RESEND_ACCOUNT = 'resend-account';
    public const RESEND_API_KEY = 'resend-api-key';
    public const RESEND_AUTOMATION = 'resend-automation';
    public const RESEND_BROADCAST = 'resend-broadcast';
    public const RESEND_CONTACT = 'resend-contact';
    public const RESEND_CONTACT_PROPERTY = 'resend-contact-property';
    public const RESEND_DNS_RECORD = 'resend-dns-record';
    public const RESEND_DOMAIN = 'resend-domain';
    public const RESEND_EMAIL = 'resend-email';
    public const RESEND_OAUTH_GRANT = 'resend-oauth-grant';
    public const RESEND_SEGMENT = 'resend-segment';
    public const RESEND_SUPPRESSION = 'resend-suppression';
    public const RESEND_TEMPLATE = 'resend-template';
    public const RESEND_TOPIC = 'resend-topic';
    public const RESEND_WEBHOOK = 'resend-webhook';
    public const RESERVATION = 'reservation';
    public const RESERVED_IP = 'reserved-ip';
    public const RESOURCE_GROUP = 'resource-group';
    public const RESTORE_JOB = 'restore-job';
    public const REVIEW_APP = 'review-app';
    public const ROLE = 'role';
    public const ROLLUP_RULE = 'rollup-rule';
    public const ROUTE_TABLE = 'route-table';
    public const ROUTE53_HEALTH_CHECK = 'route53-health-check';
    public const ROUTE53_HOSTED_ZONE = 'route53-hosted-zone';
    public const ROUTE53_RECORD_SET = 'route53-record-set';
    public const ROUTER = 'router';
    public const RUN = 'run';
    public const RUN_TASK = 'run-task';
    public const RUNNER = 'runner';
    public const RUNNER_RESOURCE_CLASS = 'runner-resource-class';
    public const S3_BUCKET = 's3-bucket';
    public const SAGEMAKER_ENDPOINT = 'sagemaker-endpoint';
    public const SAMBANOVA_MODEL = 'sambanova-model';
    public const SAVED_QUERY = 'saved-query';
    public const SCHEDULE = 'schedule';
    public const SCHEDULED_FUNCTION = 'scheduled-function';
    public const SCHEMA_REGISTRY = 'schema-registry';
    public const SEARCH_INDEX = 'search-index';
    public const SECRET = 'secret';
    public const SECRET_MANAGER_SECRET = 'secret-manager-secret';
    public const SECRET_STORE = 'secret-store';
    public const SECRET_SYNC = 'secret-sync';
    public const SECRETS_MANAGER_SECRET = 'secrets-manager-secret';
    public const SECRETS_STORE_SECRET = 'secrets-store-secret';
    public const SECURITY_GROUP = 'security-group';
    public const SECURITY_LIST = 'security-list';
    public const SENDGRID_ACCOUNT = 'sendgrid-account';
    public const SENDGRID_ALERT = 'sendgrid-alert';
    public const SENDGRID_API_KEY = 'sendgrid-api-key';
    public const SENDGRID_DNS_RECORD = 'sendgrid-dns-record';
    public const SENDGRID_DOMAIN = 'sendgrid-domain';
    public const SENDGRID_EVENT_WEBHOOK = 'sendgrid-event-webhook';
    public const SENDGRID_INBOUND_PARSE = 'sendgrid-inbound-parse';
    public const SENDGRID_IP = 'sendgrid-ip';
    public const SENDGRID_IP_POOL = 'sendgrid-ip-pool';
    public const SENDGRID_LINK_BRANDING = 'sendgrid-link-branding';
    public const SENDGRID_REVERSE_DNS = 'sendgrid-reverse-dns';
    public const SENDGRID_SUBUSER = 'sendgrid-subuser';
    public const SENDGRID_TEMPLATE = 'sendgrid-template';
    public const SENDGRID_UNSUBSCRIBE_GROUP = 'sendgrid-unsubscribe-group';
    public const SENDGRID_VERIFIED_SENDER = 'sendgrid-verified-sender';
    public const SENTIMENT_JOB = 'sentiment-job';
    public const SERVER = 'server';
    public const SERVERLESS_CONTAINER = 'serverless-container';
    public const SERVERLESS_ENDPOINT = 'serverless-endpoint';
    public const SERVERLESS_FUNCTION = 'serverless-function';
    public const SERVERLESS_INSTANCE = 'serverless-instance';
    public const SERVERLESS_TRAFFIC_FILTER = 'serverless-traffic-filter';
    public const SERVICE = 'service';
    public const SERVICE_ACCOUNT = 'service-account';
    public const SERVICE_INSTANCE = 'service-instance';
    public const SERVICE_VERSION = 'service-version';
    public const SESSION = 'session';
    public const SHARED_DRIVE = 'shared-drive';
    public const SHARED_VARIABLE = 'shared-variable';
    public const SHARED_VOLUME = 'shared-volume';
    public const SIGNAL = 'signal';
    public const SKILL = 'skill';
    public const SKS_CLUSTER = 'sks-cluster';
    public const SKS_NODEPOOL = 'sks-nodepool';
    public const SLB = 'slb';
    public const SLO = 'slo';
    public const SNAPSHOT = 'snapshot';
    public const SNI_ENDPOINT = 'sni-endpoint';
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
    public const SOURCE = 'source';
    public const SOURCE_GROUP = 'source-group';
    public const SPACE = 'space';
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
    public const STACK_OUTPUT = 'stack-output';
    public const STACK_PLUGIN = 'stack-plugin';
    public const STACKSCRIPT = 'stackscript';
    public const STARRED_QUERY = 'starred-query';
    public const STARTUP_SCRIPT = 'startup-script';
    public const STATE_OUTPUT = 'state-output';
    public const STATIC_IP = 'static-ip';
    public const STATUS_PAGE = 'status-page';
    public const STATUS_PAGE_RESOURCE = 'status-page-resource';
    public const STATUS_PAGE_SECTION = 'status-page-section';
    public const STATUS_REPORT = 'status-report';
    public const STEP_FUNCTION = 'step-function';
    public const STORAGE = 'storage';
    public const STORAGE_BOX = 'storage-box';
    public const STORAGE_ZONE = 'storage-zone';
    public const STRIPE_ACCOUNT = 'stripe-account';
    public const STRIPE_CONNECTED_ACCOUNT = 'stripe-connected-account';
    public const STRIPE_EVENT_DESTINATION = 'stripe-event-destination';
    public const STRIPE_METER = 'stripe-meter';
    public const STRIPE_PAYOUT = 'stripe-payout';
    public const STRIPE_PRICE = 'stripe-price';
    public const STRIPE_PRODUCT = 'stripe-product';
    public const STRIPE_REPORT_RUN = 'stripe-report-run';
    public const STRIPE_SIGMA_QUERY_RUN = 'stripe-sigma-query-run';
    public const STRIPE_WEBHOOK_ENDPOINT = 'stripe-webhook-endpoint';
    public const SUB_ACCOUNT = 'sub-account';
    public const SUBACCOUNT = 'subaccount';
    public const SUBNET = 'subnet';
    public const SUPABASE_API_KEY = 'supabase-api-key';
    public const SUPABASE_AUTH = 'supabase-auth';
    public const SUPABASE_BACKUP = 'supabase-backup';
    public const SUPABASE_BRANCH = 'supabase-branch';
    public const SUPABASE_BUCKET = 'supabase-bucket';
    public const SUPABASE_FUNCTION = 'supabase-function';
    public const SUPABASE_ORGANIZATION = 'supabase-organization';
    public const SUPABASE_PROJECT = 'supabase-project';
    public const SUPABASE_READ_REPLICA = 'supabase-read-replica';
    public const SUPABASE_SECRET = 'supabase-secret';
    public const SUPABASE_SIGNING_KEY = 'supabase-signing-key';
    public const SUPABASE_SSO_PROVIDER = 'supabase-sso-provider';
    public const SUPABASE_THIRD_PARTY_AUTH = 'supabase-third-party-auth';
    public const SUPERVISED_FINE_TUNING_JOB = 'supervised-fine-tuning-job';
    public const SYNTHETIC_CHECK = 'synthetic-check';
    public const SYNTHETIC_MONITOR = 'synthetic-monitor';
    public const SYNTHETIC_TEST = 'synthetic-test';
    public const SYNTHETICS_TEST = 'synthetics-test';
    public const TAILNET = 'tailnet';
    public const TARGET_GROUP = 'target-group';
    public const TCO_POLICY = 'tco-policy';
    public const TCP_PROXY = 'tcp-proxy';
    public const TEAM = 'team';
    public const TEAM_MEMBER = 'team-member';
    public const TELEMETRY_ALERT = 'telemetry-alert';
    public const TEMPLATE = 'template';
    public const TENANCY = 'tenancy';
    public const TENANT = 'tenant';
    public const TEST = 'test';
    public const TEST_SUITE = 'test-suite';
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
    public const TRUSTED_ORIGIN = 'trusted-origin';
    public const TS_ALLOW_LIST = 'ts-allow-list';
    public const TS_BACKUP = 'ts-backup';
    public const TS_EXPORTER = 'ts-exporter';
    public const TS_PROJECT = 'ts-project';
    public const TS_READ_REPLICA = 'ts-read-replica';
    public const TS_SERVICE = 'ts-service';
    public const TS_VPC = 'ts-vpc';
    public const TS_VPC_PEERING = 'ts-vpc-peering';
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
    public const UPSTASH_ACCOUNT = 'upstash-account';
    public const UPSTASH_QSTASH = 'upstash-qstash';
    public const UPSTASH_QSTASH_QUEUE = 'upstash-qstash-queue';
    public const UPSTASH_QSTASH_SCHEDULE = 'upstash-qstash-schedule';
    public const UPSTASH_QSTASH_URL_GROUP = 'upstash-qstash-url-group';
    public const UPSTASH_REDIS = 'upstash-redis';
    public const UPSTASH_SEARCH = 'upstash-search';
    public const UPSTASH_TEAM = 'upstash-team';
    public const UPSTASH_VECTOR = 'upstash-vector';
    public const UPTIME_CHECK = 'uptime-check';
    public const UPTIME_MONITOR = 'uptime-monitor';
    public const USAGE_TRIGGER = 'usage-trigger';
    public const USER = 'user';
    public const USER_INVITE = 'user-invite';
    public const UT_APP = 'ut-app';
    public const UT_FILE = 'ut-file';
    public const VARIABLE = 'variable';
    public const VARIABLE_SET = 'variable-set';
    public const VARSET_VARIABLE = 'varset-variable';
    public const VAULT_AUDIT_DEVICE = 'vault-audit-device';
    public const VAULT_AUTH_METHOD = 'vault-auth-method';
    public const VAULT_CLUSTER = 'vault-cluster';
    public const VAULT_KV_SECRET = 'vault-kv-secret';
    public const VAULT_LEASE = 'vault-lease';
    public const VAULT_MOUNT = 'vault-mount';
    public const VAULT_PKI_CERT = 'vault-pki-cert';
    public const VAULT_PKI_ROLE = 'vault-pki-role';
    public const VAULT_POLICY = 'vault-policy';
    public const VAULT_TOKEN = 'vault-token';
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
    public const VIDEO_LIBRARY = 'video-library';
    public const VIEW = 'view';
    public const VIRTUAL_FIELD = 'virtual-field';
    public const VM = 'vm';
    public const VOCABULARY = 'vocabulary';
    public const VOICE = 'voice';
    public const VOICE_AGENT = 'voice-agent';
    public const VOLUME = 'volume';
    public const VOLUME_SNAPSHOT = 'volume-snapshot';
    public const VOYAGE_BATCH = 'voyage-batch';
    public const VOYAGE_FILE = 'voyage-file';
    public const VOYAGE_MODEL = 'voyage-model';
    public const VPC = 'vpc';
    public const VPC_NAT_GATEWAY = 'vpc-nat-gateway';
    public const VPC_NETWORK = 'vpc-network';
    public const VPC_PEERING = 'vpc-peering';
    public const VPC_SUBNET = 'vpc-subnet';
    public const VSPHERE_CLUSTER = 'vsphere-cluster';
    public const VSPHERE_CONTENT_LIBRARY = 'vsphere-content-library';
    public const VSPHERE_CUSTOMIZATION_SPEC = 'vsphere-customization-spec';
    public const VSPHERE_DATACENTER = 'vsphere-datacenter';
    public const VSPHERE_DATASTORE = 'vsphere-datastore';
    public const VSPHERE_FOLDER = 'vsphere-folder';
    public const VSPHERE_HOST = 'vsphere-host';
    public const VSPHERE_LIBRARY_ITEM = 'vsphere-library-item';
    public const VSPHERE_NETWORK = 'vsphere-network';
    public const VSPHERE_RESOURCE_POOL = 'vsphere-resource-pool';
    public const VSPHERE_TAG = 'vsphere-tag';
    public const VSPHERE_TAG_CATEGORY = 'vsphere-tag-category';
    public const VSPHERE_VCENTER = 'vsphere-vcenter';
    public const VSPHERE_VM = 'vsphere-vm';
    public const VSWITCH = 'vswitch';
    public const WAF_WEB_ACL = 'waf-web-acl';
    public const WAITING_ROOM = 'waiting-room';
    public const WEBHOOK = 'webhook';
    public const WEBHOOK_ENDPOINT = 'webhook-endpoint';
    public const WEBHOOK_SUBSCRIPTION = 'webhook-subscription';
    public const WORKER = 'worker';
    public const WORKER_POOL = 'worker-pool';
    public const WORKER_ROUTE = 'worker-route';
    public const WORKERGROUP = 'workergroup';
    public const WORKERS_AI_MODEL = 'workers-ai-model';
    public const WORKFLOW = 'workflow';
    public const WORKLOAD = 'workload';
    public const WORKSPACE = 'workspace';
    public const WORKSPACE_MEMBER = 'workspace-member';
    public const WORKSPACE_VARIABLE = 'workspace-variable';
    public const WORKSPACE_WEBHOOK = 'workspace-webhook';
    public const XATA_API_KEY = 'xata-api-key';
    public const XATA_BACKUP = 'xata-backup';
    public const XATA_BRANCH = 'xata-branch';
    public const XATA_INVITATION = 'xata-invitation';
    public const XATA_MEMBER = 'xata-member';
    public const XATA_ORGANIZATION = 'xata-organization';
    public const XATA_PROJECT = 'xata-project';
    public const ZONE = 'zone';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::AB_TEST,
            self::ACCESS_APPLICATION,
            self::ACCESS_KEY,
            self::ACCESS_POLICY,
            self::ACCESS_POLICY_TOKEN,
            self::ACCESS_TOKEN,
            self::ACCOUNT,
            self::ACK_CLUSTER,
            self::ACK_NODE_POOL,
            self::ACM_CERTIFICATE,
            self::ACTION,
            self::ACTIONS_CACHE,
            self::ADD_ON,
            self::ADMIN_API_KEY,
            self::AGENT,
            self::AGENT_API_KEY,
            self::AGENT_CONFIG,
            self::AGENT_POOL,
            self::AGENT_SESSION,
            self::AGENT_TOKEN,
            self::AGENT_VARIABLE,
            self::AI_GATEWAY,
            self::AI_SEARCH,
            self::AIVEN_BILLING_GROUP,
            self::AIVEN_CONNECTION_POOL,
            self::AIVEN_DATABASE,
            self::AIVEN_INTEGRATION,
            self::AIVEN_KAFKA_ACL,
            self::AIVEN_KAFKA_CONNECTOR,
            self::AIVEN_KAFKA_TOPIC,
            self::AIVEN_PROJECT,
            self::AIVEN_SCHEMA_SUBJECT,
            self::AIVEN_SERVICE,
            self::AIVEN_SERVICE_USER,
            self::AIVEN_VPC,
            self::AIVEN_VPC_PEERING,
            self::ALB,
            self::ALERT,
            self::ALERT_CHANNEL,
            self::ALERT_CONDITION,
            self::ALERT_CONFIGURATION,
            self::ALERT_POLICY,
            self::ALERT_RULE,
            self::ALERTING_PROFILE,
            self::ALIAS,
            self::ALIGNMENT_JOB,
            self::ALLOWLIST_IDENTIFIER,
            self::ALLOYDB_CLUSTER,
            self::ALLOYDB_INSTANCE,
            self::ANALYTICS_ENGINE_DATASET,
            self::ANNOTATION,
            self::ANTI_AFFINITY_GROUP,
            self::API,
            self::API_GATEWAY,
            self::API_KEY,
            self::API_TOKEN,
            self::APM_APPLICATION,
            self::APP,
            self::APP_ENGINE_SERVICE,
            self::APP_SECRET,
            self::APPLICATION,
            self::APPLICATION_KEY,
            self::APPRUNNER_SERVICE,
            self::ARTIFACT_REGISTRY_REPO,
            self::ASSISTANT,
            self::ASTRA_ACCESS_ENTRY,
            self::ASTRA_CDC,
            self::ASTRA_COLLECTION,
            self::ASTRA_DATABASE,
            self::ASTRA_KEYSPACE,
            self::ASTRA_PCU_GROUP,
            self::ASTRA_PRIVATE_ENDPOINT,
            self::ASTRA_REGION,
            self::ASTRA_ROLE,
            self::ASTRA_SNAPSHOT,
            self::ASTRA_STREAMING_TENANT,
            self::ASTRA_TOKEN,
            self::ASTRA_USER,
            self::AUDIT_EVENT,
            self::AUTHORIZATION_SERVER,
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
            self::BACKUP,
            self::BACKUP_POLICY,
            self::BACKUP_RESTORE,
            self::BACKUP_SCHEDULE,
            self::BACKUP_SNAPSHOT,
            self::BACKUP_VAULT,
            self::BALANCE,
            self::BARE_METAL,
            self::BASIN_CATALOG,
            self::BASIN_PIPELINE,
            self::BASIN_SINK,
            self::BASIN_STREAM,
            self::BASIN_TABLE,
            self::BATCH,
            self::BATCH_EXPORT,
            self::BATCH_INFERENCE_JOB,
            self::BATCH_JOB_QUEUE,
            self::BEDROCK_MODEL,
            self::BIGQUERY_DATASET,
            self::BIGQUERY_TABLE,
            self::BIGTABLE_INSTANCE,
            self::BILLABLE_METRIC,
            self::BILLING_ACCOUNT,
            self::BILLING_GROUP,
            self::BLOCK_STORAGE,
            self::BLOCK_STORAGE_SNAPSHOT,
            self::BLOCK_VOLUME,
            self::BLOCKLIST_IDENTIFIER,
            self::BLUEPRINT,
            self::BOARD,
            self::BOARD_VIEW,
            self::BOOT_VOLUME,
            self::BRANCH_RESTRICTION,
            self::BROWSER_APPLICATION,
            self::BUCKET,
            self::BUDGET,
            self::BUDGET_ALERT_RULE,
            self::BUILD,
            self::BURN_ALERT,
            self::BYOK_CREDENTIAL,
            self::CACHE_RULE,
            self::CACHED_CONTENT,
            self::CAPELLA_ALLOWED_CIDR,
            self::CAPELLA_API_KEY,
            self::CAPELLA_APP_SERVICE,
            self::CAPELLA_BACKUP,
            self::CAPELLA_BUCKET,
            self::CAPELLA_CLUSTER,
            self::CAPELLA_COLLECTION,
            self::CAPELLA_DB_CREDENTIAL,
            self::CAPELLA_NETWORK_PEER,
            self::CAPELLA_PRIVATE_ENDPOINT,
            self::CAPELLA_PROJECT,
            self::CAPELLA_REPLICATION,
            self::CAPELLA_SCOPE,
            self::CAPELLA_USER,
            self::CDN_ENDPOINT,
            self::CEREBRAS_BATCH,
            self::CEREBRAS_ENDPOINT,
            self::CEREBRAS_FILE,
            self::CEREBRAS_MODEL,
            self::CEREBRAS_MODEL_VERSION,
            self::CERTIFICATE,
            self::CERTIFICATE_AUTHORITY,
            self::CH_API_KEY,
            self::CH_BACKUP,
            self::CH_CLICKPIPE,
            self::CH_DATABASE,
            self::CH_MEMBER,
            self::CH_POSTGRES,
            self::CH_SERVICE,
            self::CHAIN,
            self::CHART,
            self::CHECK,
            self::CHECK_GROUP,
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
            self::CLUSTER_SECRET,
            self::CODE_ENGINE_APP,
            self::CODE_ENGINE_PROJECT,
            self::CODEBUILD_PROJECT,
            self::CODEPIPELINE_PIPELINE,
            self::CODESPACE,
            self::COGNITO_USER_POOL,
            self::COHORT,
            self::COLLECTION,
            self::COLLECTION_DOCUMENT,
            self::COLUMN,
            self::COMPARTMENT,
            self::COMPOSER_ENVIRONMENT,
            self::COMPUTE_CONFIG,
            self::CONFIG_STORE,
            self::CONFIG_VAR,
            self::CONNECTION,
            self::CONNECTIVITY_RULE,
            self::CONNECTOR,
            self::CONSUL_ACL_POLICY,
            self::CONSUL_ACL_ROLE,
            self::CONSUL_ACL_TOKEN,
            self::CONSUL_CHECK,
            self::CONSUL_CLUSTER,
            self::CONSUL_CONFIG_ENTRY,
            self::CONSUL_INTENTION,
            self::CONSUL_NAMESPACE,
            self::CONSUL_NODE,
            self::CONSUL_PARTITION,
            self::CONSUL_PEERING,
            self::CONSUL_SERVICE,
            self::CONSUL_SESSION,
            self::CONTACT_POINT,
            self::CONTAINER,
            self::CONTAINER_APP,
            self::CONTAINER_REGISTRY,
            self::CONTAINER_REGISTRY_AUTH,
            self::CONTAINER_REPOSITORY,
            self::CONTEXT,
            self::CONTEXT_VARIABLE,
            self::CONVEX_ACCESS_TOKEN,
            self::CONVEX_CUSTOM_DOMAIN,
            self::CONVEX_CUSTOM_ROLE,
            self::CONVEX_DEFAULT_ENV_VAR,
            self::CONVEX_DEPLOY_KEY,
            self::CONVEX_DEPLOYMENT,
            self::CONVEX_ENV_VAR,
            self::CONVEX_INVITE,
            self::CONVEX_LOG_STREAM,
            self::CONVEX_MEMBER,
            self::CONVEX_PREVIEW_DEPLOY_KEY,
            self::CONVEX_PROJECT,
            self::CONVEX_TEAM,
            self::CONVEX_USAGE_LIMIT,
            self::COPILOT_SEAT,
            self::CORS_RULE,
            self::COS_BUCKET,
            self::COST_CENTER,
            self::CRAWLER,
            self::CRDB_ALLOWLIST_ENTRY,
            self::CRDB_API_KEY,
            self::CRDB_BACKUP,
            self::CRDB_BLACKOUT_WINDOW,
            self::CRDB_CLUSTER,
            self::CRDB_DATABASE,
            self::CRDB_EGRESS_RULE,
            self::CRDB_FOLDER,
            self::CRDB_LOG_EXPORT,
            self::CRDB_METRIC_EXPORT,
            self::CRDB_ORGANIZATION,
            self::CRDB_RESTORE,
            self::CRDB_SERVICE_ACCOUNT,
            self::CRDB_SQL_USER,
            self::CRON_MONITOR,
            self::CUSTOM_DOMAIN,
            self::CUSTOM_ENRICHMENT,
            self::CUSTOM_HOSTNAME,
            self::CUSTOM_TEMPLATE,
            self::CUSTOM_VOICE,
            self::CUSTOMER,
            self::D1_DATABASE,
            self::DASHBOARD,
            self::DASHBOARD_GROUP,
            self::DATABASE,
            self::DATABASE_API_KEY,
            self::DATABASE_BACKUP,
            self::DATABASE_DB,
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
            self::DBAAS,
            self::DBAAS_DATABASE,
            self::DBAAS_USER,
            self::DEDICATED_INFERENCE,
            self::DEPLOY,
            self::DEPLOY_KEY,
            self::DEPLOY_TOKEN,
            self::DEPLOYED_MODEL,
            self::DEPLOYMENT,
            self::DEPLOYMENT_VARIABLE,
            self::DEPOT_ACTIONS_REPO,
            self::DEPOT_BUILD,
            self::DEPOT_PROJECT,
            self::DEPOT_REGISTRY_IMAGE,
            self::DEPOT_TOKEN,
            self::DEPOT_TRUST_POLICY,
            self::DERIVED_COLUMN,
            self::DETECTOR,
            self::DEVICE,
            self::DICT,
            self::DICTIONARY,
            self::DIRECTORY,
            self::DIRECTORY_GROUP,
            self::DIRECTORY_USER,
            self::DISK,
            self::DISTRIBUTION_CREDENTIAL,
            self::DNS_DOMAIN,
            self::DNS_RECORD,
            self::DNS_ZONE,
            self::DOCKER_CONTAINER,
            self::DOCKER_IMAGE,
            self::DOCKER_NETWORK,
            self::DOCKER_VOLUME,
            self::DOCKERHUB_ACCESS_TOKEN,
            self::DOCKERHUB_INVITE,
            self::DOCKERHUB_MEMBER,
            self::DOCKERHUB_NAMESPACE,
            self::DOCKERHUB_ORG_ACCESS_TOKEN,
            self::DOCKERHUB_REPOSITORY,
            self::DOCKERHUB_TAG,
            self::DOCKERHUB_TEAM,
            self::DOCUMENTDB_CLUSTER,
            self::DOKS_CLUSTER,
            self::DOMAIN,
            self::DOMAIN_RECORD,
            self::DOPPLER_CONFIG,
            self::DOPPLER_ENVIRONMENT,
            self::DOPPLER_GROUP,
            self::DOPPLER_INTEGRATION,
            self::DOPPLER_PROJECT,
            self::DOPPLER_SECRET,
            self::DOPPLER_SERVICE_ACCOUNT,
            self::DOPPLER_SERVICE_ACCOUNT_TOKEN,
            self::DOPPLER_SERVICE_TOKEN,
            self::DOPPLER_SYNC,
            self::DOPPLER_USER,
            self::DOPPLER_WEBHOOK,
            self::DOPPLER_WORKPLACE,
            self::DOWNTIME,
            self::DPO_JOB,
            self::DROP_RULE,
            self::DROPLET,
            self::DURABLE_OBJECT_NAMESPACE,
            self::DYNAMIC_SECRET,
            self::DYNAMODB_TABLE,
            self::DYNO,
            self::EBS_VOLUME,
            self::EC2_INSTANCE,
            self::ECR_REPOSITORY,
            self::ECS_INSTANCE,
            self::ECS_SERVICE,
            self::EDGE_RULE,
            self::EDGE_SCRIPT,
            self::EFS_FILE_SYSTEM,
            self::EIP,
            self::EKS_CLUSTER,
            self::ELASTIC_IP,
            self::ELASTICACHE_CLUSTER,
            self::ELASTICACHE_SERVERLESS_CACHE,
            self::EMAIL_ROUTING_RULE,
            self::EMBED_JOB,
            self::ENCRYPTION_KEY,
            self::ENDPOINT,
            self::ENRICHMENT,
            self::ENTERPRISE_CONNECTION,
            self::ENV_GROUP,
            self::ENV_GROUP_VAR,
            self::ENV_VAR,
            self::ENVIRONMENT,
            self::ESCALATION_POLICY,
            self::EVAL,
            self::EVALUATION,
            self::EVALUATION_JOB,
            self::EVALUATOR,
            self::EVENT_HOOK,
            self::EVENTBRIDGE_RULE,
            self::EVENTS2METRICS,
            self::EXPERIMENT,
            self::EXPORT_SINK,
            self::EXTENSION,
            self::FAL_API_KEY,
            self::FAL_APP,
            self::FAL_COMPUTE_INSTANCE,
            self::FAL_MODEL,
            self::FAL_WORKFLOW,
            self::FC_FUNCTION,
            self::FEATURE_FLAG,
            self::FIELD,
            self::FILE,
            self::FILE_SEARCH_DOCUMENT,
            self::FILE_SEARCH_STORE,
            self::FILESYSTEM,
            self::FINE_TUNE,
            self::FINE_TUNING_JOB,
            self::FINETUNED_MODEL,
            self::FIRESTORE_DATABASE,
            self::FIREWALL,
            self::FIREWALL_GROUP,
            self::FIREWALL_RULE,
            self::FIREWALL_RULESET,
            self::FLEX_CLUSTER,
            self::FLEXIBLE_IP,
            self::FLINK_COMPUTE_POOL,
            self::FLOATING_IP,
            self::FOLDER,
            self::FORMATION,
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
            self::GLOBAL_FIREWALL,
            self::GLUE_DATABASE,
            self::GPU_CLUSTER,
            self::GROQ_BATCH,
            self::GROQ_FILE,
            self::GROQ_FINE_TUNING,
            self::GROQ_MODEL,
            self::GROUP,
            self::GROUP_DEPLOY_TOKEN,
            self::GROUP_MEMBER,
            self::GROUP_VARIABLE,
            self::GROUP_WEBHOOK,
            self::GUARDRAIL,
            self::HARDWARE,
            self::HEALTH_CHECK,
            self::HEALTHCHECK,
            self::HEARTBEAT,
            self::HEARTBEAT_GROUP,
            self::HF_DATASET,
            self::HF_INFERENCE_ENDPOINT,
            self::HF_JOB,
            self::HF_MEMBER_TOKEN,
            self::HF_MODEL,
            self::HF_PROVIDER_MODEL,
            self::HF_SCHEDULED_JOB,
            self::HF_SERVICE_ACCOUNT,
            self::HF_SPACE,
            self::HF_WEBHOOK,
            self::HISTORY_ITEM,
            self::HOG_FUNCTION,
            self::HOST,
            self::HOSTED_RUNNER,
            self::HOSTNAME,
            self::HYBRID_ENVIRONMENT,
            self::HYPERDRIVE,
            self::IAM_ROLE,
            self::IAM_USER,
            self::IMAGE,
            self::INCIDENT,
            self::INCIDENT_IO_ALERT_ROUTE,
            self::INCIDENT_IO_ALERT_SOURCE,
            self::INCIDENT_IO_CATALOG_TYPE,
            self::INCIDENT_IO_ESCALATION,
            self::INCIDENT_IO_ESCALATION_PATH,
            self::INCIDENT_IO_INCIDENT,
            self::INCIDENT_IO_MAINTENANCE_WINDOW,
            self::INCIDENT_IO_SCHEDULE,
            self::INCIDENT_IO_SEVERITY,
            self::INCIDENT_IO_STATUS,
            self::INCIDENT_IO_STATUS_PAGE,
            self::INCIDENT_IO_TEAM,
            self::INCIDENT_IO_USER,
            self::INCIDENT_IO_WORKFLOW,
            self::INDEX,
            self::INFERENCE_BATCH,
            self::INFLUX_BUCKET,
            self::INFLUX_CHECK,
            self::INFLUX_DASHBOARD,
            self::INFLUX_DEDICATED_DATABASE,
            self::INFLUX_DEDICATED_TOKEN,
            self::INFLUX_NOTIFICATION_ENDPOINT,
            self::INFLUX_NOTIFICATION_RULE,
            self::INFLUX_ORG,
            self::INFLUX_TASK,
            self::INFLUX_TELEGRAF,
            self::INFLUX_TOKEN,
            self::INSIGHT,
            self::INSTANCE,
            self::INSTANCE_GROUP,
            self::INSTANCE_POOL,
            self::INSTANCE_SNAPSHOT,
            self::INSTANCE_TEMPLATE,
            self::INSTANCE_TYPE,
            self::INTEGRATION,
            self::INTERNET_GATEWAY,
            self::INVITATION,
            self::INVITE,
            self::INVOICE,
            self::IP_ACCESS_ENTRY,
            self::IP_ACCESS_RULE,
            self::IP_ALLOCATION,
            self::ISSUE,
            self::JFROG_ACCESS_TOKEN,
            self::JFROG_BUILD,
            self::JFROG_BUILD_RUN,
            self::JFROG_GROUP,
            self::JFROG_PERMISSION,
            self::JFROG_PLATFORM,
            self::JFROG_REPOSITORY,
            self::JFROG_USER,
            self::JFROG_XRAY_POLICY,
            self::JFROG_XRAY_VIOLATION,
            self::JFROG_XRAY_WATCH,
            self::JOB,
            self::JWT_TEMPLATE,
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
            self::KEY_VALUE,
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
            self::LIFECYCLE_RULE,
            self::LINODE,
            self::LIVE_SESSION,
            self::LKE_CLUSTER,
            self::LKE_NODE_POOL,
            self::LLM_MODEL,
            self::LOAD_BALANCER,
            self::LOG_DRAIN,
            self::LOG_SINK,
            self::LOG_STREAM,
            self::LOGGING_ENDPOINT,
            self::LOGPUSH_JOB,
            self::MACHINE,
            self::MACHINE_IDENTITY,
            self::MAILGUN_ACCOUNT,
            self::MAILGUN_ACCOUNT_WEBHOOK,
            self::MAILGUN_API_KEY,
            self::MAILGUN_DNS_RECORD,
            self::MAILGUN_DOMAIN,
            self::MAILGUN_IP,
            self::MAILGUN_IP_POOL,
            self::MAILGUN_MAILING_LIST,
            self::MAILGUN_ROUTE,
            self::MAILGUN_SMTP_CREDENTIAL,
            self::MAILGUN_SUBACCOUNT,
            self::MAILGUN_TAG,
            self::MAILGUN_WEBHOOK,
            self::MAINTENANCE,
            self::MAINTENANCE_WINDOW,
            self::MANAGED_DATABASE,
            self::MANAGED_DB,
            self::MANAGED_ENDPOINT,
            self::MANAGED_KUBE,
            self::MARKER,
            self::MARKER_SETTING,
            self::MEDIA_ASSET,
            self::MEMBER,
            self::MEMCACHED_INSTANCE,
            self::MEMORYSTORE_MEMCACHED,
            self::MEMORYSTORE_REDIS,
            self::MEMORYSTORE_VALKEY,
            self::MESSAGE_BATCH,
            self::MESSAGING_SERVICE,
            self::MINIO_SERVER,
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
            self::MODULE,
            self::MONGODB_DATABASE,
            self::MONITOR,
            self::MONITOR_GROUP,
            self::MQ_BROKER,
            self::MSK_CLUSTER,
            self::MSSQL_DATABASE,
            self::MUTING_RULE,
            self::MYSQL_DATABASE,
            self::NAMESPACE,
            self::NAT_GATEWAY,
            self::NATS_ACCOUNT,
            self::NATS_CONNECTION,
            self::NATS_CONSUMER,
            self::NATS_KV_BUCKET,
            self::NATS_OBJECT_STORE,
            self::NATS_PEER,
            self::NATS_SERVER,
            self::NATS_STREAM,
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
            self::NETWORK_VOLUME,
            self::NETWORK_ZONE,
            self::NEXUS_ENDPOINT,
            self::NF_ACCOUNT,
            self::NF_ADDON,
            self::NF_CLUSTER,
            self::NF_DOMAIN,
            self::NF_JOB,
            self::NF_PIPELINE,
            self::NF_PROJECT,
            self::NF_SECRET_GROUP,
            self::NF_SERVICE,
            self::NF_SUBDOMAIN,
            self::NF_VOLUME,
            self::NFS_SHARE,
            self::NLB,
            self::NODE_GROUP,
            self::NODE_POOL,
            self::NODEBALANCER,
            self::NOMAD_ACL_POLICY,
            self::NOMAD_ACL_TOKEN,
            self::NOMAD_ALLOCATION,
            self::NOMAD_CLUSTER,
            self::NOMAD_CSI_PLUGIN,
            self::NOMAD_DEPLOYMENT,
            self::NOMAD_JOB,
            self::NOMAD_NAMESPACE,
            self::NOMAD_NODE,
            self::NOMAD_NODE_POOL,
            self::NOMAD_SERVICE,
            self::NOMAD_VARIABLE,
            self::NOMAD_VOLUME,
            self::NOTIFICATION_POLICY,
            self::NOTIFICATION_RULE,
            self::NOTIFIER,
            self::OAUTH_APPLICATION,
            self::OBJECT_STORAGE,
            self::OBJECT_STORAGE_BUCKET,
            self::OBJECT_STORAGE_USER,
            self::OBJECT_STORE,
            self::OBJECT_STORE_CREDENTIAL,
            self::OCTAVIA_LOAD_BALANCER,
            self::OKE_CLUSTER,
            self::ON_CALL_CALENDAR,
            self::ONLINE_ARCHIVE,
            self::OPENSEARCH_CLUSTER,
            self::OPENSEARCH_DOMAIN,
            self::ORG,
            self::ORG_TOKEN,
            self::ORGANIZATION,
            self::ORGANIZATION_API_KEY,
            self::ORGANIZATION_DOMAIN,
            self::ORGANIZATION_MEMBERSHIP,
            self::ORGANIZATION_ROLE,
            self::ORGANIZATION_USER,
            self::OS_CONTAINER,
            self::OS_DNS_RECORDSET,
            self::OS_DNS_ZONE,
            self::OS_FLAVOR,
            self::OS_FLOATING_IP,
            self::OS_IMAGE,
            self::OS_KEYPAIR,
            self::OS_LB_LISTENER,
            self::OS_LB_POOL,
            self::OS_LOADBALANCER,
            self::OS_NETWORK,
            self::OS_ROUTER,
            self::OS_SECURITY_GROUP,
            self::OS_SECURITY_GROUP_RULE,
            self::OS_SERVER,
            self::OS_STACK,
            self::OS_SUBNET,
            self::OS_VOLUME,
            self::OS_VOLUME_BACKUP,
            self::OS_VOLUME_SNAPSHOT,
            self::OSS_BUCKET,
            self::OUTGOING_WEBHOOK,
            self::PACKAGE,
            self::PAGE_RULE,
            self::PAGERDUTY_BUSINESS_SERVICE,
            self::PAGERDUTY_ESCALATION_POLICY,
            self::PAGERDUTY_EVENT_ORCHESTRATION,
            self::PAGERDUTY_INCIDENT,
            self::PAGERDUTY_MAINTENANCE_WINDOW,
            self::PAGERDUTY_SCHEDULE,
            self::PAGERDUTY_SERVICE,
            self::PAGERDUTY_TEAM,
            self::PAGERDUTY_USER,
            self::PARSING_RULE_GROUP,
            self::PERMISSION,
            self::PERPLEXITY_AGENT_MODEL,
            self::PERPLEXITY_ASYNC_REQUEST,
            self::PERPLEXITY_ROUTER_MODEL,
            self::PERPLEXITY_SKILL,
            self::PERPLEXITY_SONAR_MODEL,
            self::PG_DATABASE,
            self::PG_SCHEMA,
            self::PHONE_NUMBER,
            self::PIPELINE,
            self::PIPELINE_CACHE,
            self::PIPELINE_COUPLING,
            self::PIPELINE_SCHEDULE,
            self::PIPELINE_TEMPLATE,
            self::PLACEMENT_GROUP,
            self::PLAYBOOK,
            self::POD,
            self::POLICY,
            self::POLICY_GROUP,
            self::POLICY_PACK,
            self::POLICY_SET,
            self::POSTGRES,
            self::POSTGRES_CLUSTER,
            self::POSTMARK_DNS_RECORD,
            self::POSTMARK_DOMAIN,
            self::POSTMARK_INBOUND_RULE,
            self::POSTMARK_MESSAGE_STREAM,
            self::POSTMARK_SENDER_SIGNATURE,
            self::POSTMARK_SERVER,
            self::POSTMARK_TEMPLATE,
            self::POSTMARK_WEBHOOK,
            self::POSTURE_INTEGRATION,
            self::PREDICTION,
            self::PRIMARY_IP,
            self::PRIVATE_ENDPOINT_SERVICE,
            self::PRIVATE_LOCATION,
            self::PRIVATE_NETWORK,
            self::PROBLEM,
            self::PROCESS_GROUP,
            self::PRODUCT_ENVIRONMENT,
            self::PROJECT,
            self::PROJECT_API_KEY,
            self::PROJECT_DEPLOY_KEY,
            self::PROJECT_MEMBER,
            self::PROJECT_RATE_LIMIT,
            self::PROJECT_SERVICE_ACCOUNT,
            self::PROJECT_USER,
            self::PROJECT_VARIABLE,
            self::PROJECT_WEBHOOK,
            self::PROMETHEUS_ALERT,
            self::PROMETHEUS_ALERTMANAGER,
            self::PROMETHEUS_AM_ALERT,
            self::PROMETHEUS_RECEIVER,
            self::PROMETHEUS_RULE,
            self::PROMETHEUS_RULE_GROUP,
            self::PROMETHEUS_SCRAPE_POOL,
            self::PROMETHEUS_SERVER,
            self::PROMETHEUS_SILENCE,
            self::PROMETHEUS_TARGET,
            self::PRONUNCIATION_DICT,
            self::PRONUNCIATION_DICTIONARY,
            self::PROTECTED_BRANCH,
            self::PROVIDER,
            self::PS_BACKUP,
            self::PS_BRANCH,
            self::PS_DATABASE,
            self::PS_DEPLOY_REQUEST,
            self::PS_PASSWORD,
            self::PS_ROLE,
            self::PS_WEBHOOK,
            self::PUBLIC_IP,
            self::PUBSUB_SUBSCRIPTION,
            self::PUBSUB_TOPIC,
            self::PULL_ZONE,
            self::PURCHASE,
            self::PVE_BACKUP,
            self::PVE_BACKUP_JOB,
            self::PVE_CLUSTER,
            self::PVE_CT,
            self::PVE_FIREWALL_ALIAS,
            self::PVE_FIREWALL_RULE,
            self::PVE_HA_RESOURCE,
            self::PVE_HA_RULE,
            self::PVE_IPSET,
            self::PVE_NODE,
            self::PVE_POOL,
            self::PVE_SECURITY_GROUP,
            self::PVE_STORAGE,
            self::PVE_VM,
            self::QUEUE,
            self::QUOTA,
            self::QUOTA_RULE,
            self::R2_BUCKET,
            self::RABBITMQ_BINDING,
            self::RABBITMQ_CHANNEL,
            self::RABBITMQ_CLUSTER,
            self::RABBITMQ_CONNECTION,
            self::RABBITMQ_EXCHANGE,
            self::RABBITMQ_FEDERATION_UPSTREAM,
            self::RABBITMQ_NODE,
            self::RABBITMQ_OPERATOR_POLICY,
            self::RABBITMQ_PERMISSION,
            self::RABBITMQ_POLICY,
            self::RABBITMQ_QUEUE,
            self::RABBITMQ_SHOVEL,
            self::RABBITMQ_TOPIC_PERMISSION,
            self::RABBITMQ_USER,
            self::RABBITMQ_VHOST,
            self::RAM_USER,
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
            self::RECIPIENT,
            self::RECORDING_RULE,
            self::REDIRECT_RULE,
            self::REDIRECT_URL,
            self::REDIS_INSTANCE,
            self::REDSHIFT_CLUSTER,
            self::REGISTRY_MODULE,
            self::REGISTRY_NAMESPACE,
            self::REGISTRY_PROVIDER,
            self::REINFORCEMENT_FINE_TUNING_JOB,
            self::RELEASE,
            self::REPLICATION_RULE,
            self::REPO_BLOCKLIST,
            self::REPOSITORY,
            self::REPOSITORY_VARIABLE,
            self::REPOSITORY_WEBHOOK,
            self::RESEND_ACCOUNT,
            self::RESEND_API_KEY,
            self::RESEND_AUTOMATION,
            self::RESEND_BROADCAST,
            self::RESEND_CONTACT,
            self::RESEND_CONTACT_PROPERTY,
            self::RESEND_DNS_RECORD,
            self::RESEND_DOMAIN,
            self::RESEND_EMAIL,
            self::RESEND_OAUTH_GRANT,
            self::RESEND_SEGMENT,
            self::RESEND_SUPPRESSION,
            self::RESEND_TEMPLATE,
            self::RESEND_TOPIC,
            self::RESEND_WEBHOOK,
            self::RESERVATION,
            self::RESERVED_IP,
            self::RESOURCE_GROUP,
            self::RESTORE_JOB,
            self::REVIEW_APP,
            self::ROLE,
            self::ROLLUP_RULE,
            self::ROUTE_TABLE,
            self::ROUTE53_HEALTH_CHECK,
            self::ROUTE53_HOSTED_ZONE,
            self::ROUTE53_RECORD_SET,
            self::ROUTER,
            self::RUN,
            self::RUN_TASK,
            self::RUNNER,
            self::RUNNER_RESOURCE_CLASS,
            self::S3_BUCKET,
            self::SAGEMAKER_ENDPOINT,
            self::SAMBANOVA_MODEL,
            self::SAVED_QUERY,
            self::SCHEDULE,
            self::SCHEDULED_FUNCTION,
            self::SCHEMA_REGISTRY,
            self::SEARCH_INDEX,
            self::SECRET,
            self::SECRET_MANAGER_SECRET,
            self::SECRET_STORE,
            self::SECRET_SYNC,
            self::SECRETS_MANAGER_SECRET,
            self::SECRETS_STORE_SECRET,
            self::SECURITY_GROUP,
            self::SECURITY_LIST,
            self::SENDGRID_ACCOUNT,
            self::SENDGRID_ALERT,
            self::SENDGRID_API_KEY,
            self::SENDGRID_DNS_RECORD,
            self::SENDGRID_DOMAIN,
            self::SENDGRID_EVENT_WEBHOOK,
            self::SENDGRID_INBOUND_PARSE,
            self::SENDGRID_IP,
            self::SENDGRID_IP_POOL,
            self::SENDGRID_LINK_BRANDING,
            self::SENDGRID_REVERSE_DNS,
            self::SENDGRID_SUBUSER,
            self::SENDGRID_TEMPLATE,
            self::SENDGRID_UNSUBSCRIBE_GROUP,
            self::SENDGRID_VERIFIED_SENDER,
            self::SENTIMENT_JOB,
            self::SERVER,
            self::SERVERLESS_CONTAINER,
            self::SERVERLESS_ENDPOINT,
            self::SERVERLESS_FUNCTION,
            self::SERVERLESS_INSTANCE,
            self::SERVERLESS_TRAFFIC_FILTER,
            self::SERVICE,
            self::SERVICE_ACCOUNT,
            self::SERVICE_INSTANCE,
            self::SERVICE_VERSION,
            self::SESSION,
            self::SHARED_DRIVE,
            self::SHARED_VARIABLE,
            self::SHARED_VOLUME,
            self::SIGNAL,
            self::SKILL,
            self::SKS_CLUSTER,
            self::SKS_NODEPOOL,
            self::SLB,
            self::SLO,
            self::SNAPSHOT,
            self::SNI_ENDPOINT,
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
            self::SOURCE,
            self::SOURCE_GROUP,
            self::SPACE,
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
            self::STACK_OUTPUT,
            self::STACK_PLUGIN,
            self::STACKSCRIPT,
            self::STARRED_QUERY,
            self::STARTUP_SCRIPT,
            self::STATE_OUTPUT,
            self::STATIC_IP,
            self::STATUS_PAGE,
            self::STATUS_PAGE_RESOURCE,
            self::STATUS_PAGE_SECTION,
            self::STATUS_REPORT,
            self::STEP_FUNCTION,
            self::STORAGE,
            self::STORAGE_BOX,
            self::STORAGE_ZONE,
            self::STRIPE_ACCOUNT,
            self::STRIPE_CONNECTED_ACCOUNT,
            self::STRIPE_EVENT_DESTINATION,
            self::STRIPE_METER,
            self::STRIPE_PAYOUT,
            self::STRIPE_PRICE,
            self::STRIPE_PRODUCT,
            self::STRIPE_REPORT_RUN,
            self::STRIPE_SIGMA_QUERY_RUN,
            self::STRIPE_WEBHOOK_ENDPOINT,
            self::SUB_ACCOUNT,
            self::SUBACCOUNT,
            self::SUBNET,
            self::SUPABASE_API_KEY,
            self::SUPABASE_AUTH,
            self::SUPABASE_BACKUP,
            self::SUPABASE_BRANCH,
            self::SUPABASE_BUCKET,
            self::SUPABASE_FUNCTION,
            self::SUPABASE_ORGANIZATION,
            self::SUPABASE_PROJECT,
            self::SUPABASE_READ_REPLICA,
            self::SUPABASE_SECRET,
            self::SUPABASE_SIGNING_KEY,
            self::SUPABASE_SSO_PROVIDER,
            self::SUPABASE_THIRD_PARTY_AUTH,
            self::SUPERVISED_FINE_TUNING_JOB,
            self::SYNTHETIC_CHECK,
            self::SYNTHETIC_MONITOR,
            self::SYNTHETIC_TEST,
            self::SYNTHETICS_TEST,
            self::TAILNET,
            self::TARGET_GROUP,
            self::TCO_POLICY,
            self::TCP_PROXY,
            self::TEAM,
            self::TEAM_MEMBER,
            self::TELEMETRY_ALERT,
            self::TEMPLATE,
            self::TENANCY,
            self::TENANT,
            self::TEST,
            self::TEST_SUITE,
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
            self::TRUSTED_ORIGIN,
            self::TS_ALLOW_LIST,
            self::TS_BACKUP,
            self::TS_EXPORTER,
            self::TS_PROJECT,
            self::TS_READ_REPLICA,
            self::TS_SERVICE,
            self::TS_VPC,
            self::TS_VPC_PEERING,
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
            self::UPSTASH_ACCOUNT,
            self::UPSTASH_QSTASH,
            self::UPSTASH_QSTASH_QUEUE,
            self::UPSTASH_QSTASH_SCHEDULE,
            self::UPSTASH_QSTASH_URL_GROUP,
            self::UPSTASH_REDIS,
            self::UPSTASH_SEARCH,
            self::UPSTASH_TEAM,
            self::UPSTASH_VECTOR,
            self::UPTIME_CHECK,
            self::UPTIME_MONITOR,
            self::USAGE_TRIGGER,
            self::USER,
            self::USER_INVITE,
            self::UT_APP,
            self::UT_FILE,
            self::VARIABLE,
            self::VARIABLE_SET,
            self::VARSET_VARIABLE,
            self::VAULT_AUDIT_DEVICE,
            self::VAULT_AUTH_METHOD,
            self::VAULT_CLUSTER,
            self::VAULT_KV_SECRET,
            self::VAULT_LEASE,
            self::VAULT_MOUNT,
            self::VAULT_PKI_CERT,
            self::VAULT_PKI_ROLE,
            self::VAULT_POLICY,
            self::VAULT_TOKEN,
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
            self::VIDEO_LIBRARY,
            self::VIEW,
            self::VIRTUAL_FIELD,
            self::VM,
            self::VOCABULARY,
            self::VOICE,
            self::VOICE_AGENT,
            self::VOLUME,
            self::VOLUME_SNAPSHOT,
            self::VOYAGE_BATCH,
            self::VOYAGE_FILE,
            self::VOYAGE_MODEL,
            self::VPC,
            self::VPC_NAT_GATEWAY,
            self::VPC_NETWORK,
            self::VPC_PEERING,
            self::VPC_SUBNET,
            self::VSPHERE_CLUSTER,
            self::VSPHERE_CONTENT_LIBRARY,
            self::VSPHERE_CUSTOMIZATION_SPEC,
            self::VSPHERE_DATACENTER,
            self::VSPHERE_DATASTORE,
            self::VSPHERE_FOLDER,
            self::VSPHERE_HOST,
            self::VSPHERE_LIBRARY_ITEM,
            self::VSPHERE_NETWORK,
            self::VSPHERE_RESOURCE_POOL,
            self::VSPHERE_TAG,
            self::VSPHERE_TAG_CATEGORY,
            self::VSPHERE_VCENTER,
            self::VSPHERE_VM,
            self::VSWITCH,
            self::WAF_WEB_ACL,
            self::WAITING_ROOM,
            self::WEBHOOK,
            self::WEBHOOK_ENDPOINT,
            self::WEBHOOK_SUBSCRIPTION,
            self::WORKER,
            self::WORKER_POOL,
            self::WORKER_ROUTE,
            self::WORKERGROUP,
            self::WORKERS_AI_MODEL,
            self::WORKFLOW,
            self::WORKLOAD,
            self::WORKSPACE,
            self::WORKSPACE_MEMBER,
            self::WORKSPACE_VARIABLE,
            self::WORKSPACE_WEBHOOK,
            self::XATA_API_KEY,
            self::XATA_BACKUP,
            self::XATA_BRANCH,
            self::XATA_INVITATION,
            self::XATA_MEMBER,
            self::XATA_ORGANIZATION,
            self::XATA_PROJECT,
            self::ZONE,
        ];
    }
}
