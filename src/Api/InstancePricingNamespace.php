<?php

/*
 * infrawrench/sdk v1.101.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.101.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Model\AwsPricingQueryRequest;
use Infrawrench\Sdk\Model\AwsPricingQueryResult;
use Infrawrench\Sdk\Model\AwsPricingSchema;
use Infrawrench\Sdk\RequestOptions;

/** `$client->instancePricing` */
final class InstancePricingNamespace extends ApiNamespace
{
    /**
     * Run a read-only SQL query over instance pricing data
     *
     * Runs one read-only ClickHouse statement against the instance pricing warehouse: every
     * instance type's specs and every price its provider has listed for it (on demand, committed
     * terms and EC2 spot), in every region, with history. It covers AWS EC2, RDS, ElastiCache,
     * OpenSearch, Redshift, DocumentDB, Neptune, MemoryDB, DAX, SageMaker, EMR and GameLift,
     * RunPod GPU types and CPU pods, Alibaba Cloud ECS, Azure virtual machines, Google Cloud
     * Compute Engine, Hetzner cloud servers and Server Auction listings, OVHcloud Public Cloud and
     * eco servers, Oracle Cloud compute and IBM Cloud Virtual Servers for VPC. It is the data
     * behind instances.infrawrench.com. Needs no scope. Use `GET /api/v1/instance-pricing/schema`
     * for the columns, or the tables below; filter `prices` on `platform` and `current`. The
     * Infrawrench web and desktop apps call this path with a key built into them; that key is
     * licensed for those apps only, so your own code should use an API key.
     *
     * - `prices`: Every price the provider has listed for an instance type, one row per period a
     * price held. `current = true` (equivalently `valid_to IS NULL`) is the price on offer now;
     * filter on it unless the question is about history. A product's price is identified by
     * (platform, instance_type, region, pricing, lease, offering_class, purchase_option) plus its
     * variant columns, so always fix the variant columns that matter for the platform (see the
     * defaults in the notes) or you will mix e.g. Windows and Linux prices.
     * - `instance_types`: One row per instance type per platform with its current specs. EC2 spot
     * prices use the `ec2` rows. Specs the provider does not list are NULL or `''`; `attributes`
     * has every attribute it publishes, as strings (AWS's price list keys, Alibaba's
     * DescribeInstanceTypes fields such as `CpuCoreCount` and `CpuOptions.ThreadsPerCore`, Azure's
     * pricing calculator fields such as `cores`, `ram` and `series`, Google Cloud's Compute Engine
     * machine type fields such as `guestCpus`, `memoryMb` and `zones`, RunPod's GraphQL fields
     * such as `maxGpuCountSecureCloud` and `dataCenters`).
     * - `attribute_changes`: History of instance attributes: the values each type was first listed
     * with, then every change. Use it for questions like when a spec changed.
     * - `regions`: Region codes and the names the provider gives them, per source. Use it to turn
     * a city or country into a region code. Codes repeat across clouds (Alibaba also has
     * `us-east-1`), so filter on source. Google Cloud's names are the city, state or country from
     * its regions page (`Council Bluffs, Iowa` for us-central1).
     * - `sync_state`: When each bundle was loaded and which price lists it covers;
     * `max(price_list_to)` is how fresh the data is.
     * - `service_events`: Every incident AWS posted on its public Health Dashboard (status page),
     * 2008 to now: one row per event, with when it was posted, when AWS says the impact began and
     * ended, and every update AWS wrote. Only events AWS chose to post publicly; account-specific
     * issues never appear, so no event does not prove no impact. Use it for questions about
     * outages, incidents and how reliable a service or region has been.
     *
     * POST /api/v1/instance-pricing/query
     *
     * Raises on 400: The query was refused: not read-only, more than one statement, or
     * ClickHouse's own error (unknown column, syntax), with its message
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 502: The warehouse could not answer; try again shortly
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on 504: The query ran longer than 30 seconds
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(AwsPricingQueryRequest $body, ?RequestOptions $options = null): AwsPricingQueryResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/v1/instance-pricing/query',
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AwsPricingQueryResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Describe the instance pricing tables
     *
     * Every table and column of the instance pricing warehouse with what it holds, the notes a
     * correct query depends on, and how fresh each source is. Needs no scope.
     *
     * Tables:
     *
     * - `prices`: Every price the provider has listed for an instance type, one row per period a
     * price held. `current = true` (equivalently `valid_to IS NULL`) is the price on offer now;
     * filter on it unless the question is about history. A product's price is identified by
     * (platform, instance_type, region, pricing, lease, offering_class, purchase_option) plus its
     * variant columns, so always fix the variant columns that matter for the platform (see the
     * defaults in the notes) or you will mix e.g. Windows and Linux prices.
     * - `instance_types`: One row per instance type per platform with its current specs. EC2 spot
     * prices use the `ec2` rows. Specs the provider does not list are NULL or `''`; `attributes`
     * has every attribute it publishes, as strings (AWS's price list keys, Alibaba's
     * DescribeInstanceTypes fields such as `CpuCoreCount` and `CpuOptions.ThreadsPerCore`, Azure's
     * pricing calculator fields such as `cores`, `ram` and `series`, Google Cloud's Compute Engine
     * machine type fields such as `guestCpus`, `memoryMb` and `zones`, RunPod's GraphQL fields
     * such as `maxGpuCountSecureCloud` and `dataCenters`).
     * - `attribute_changes`: History of instance attributes: the values each type was first listed
     * with, then every change. Use it for questions like when a spec changed.
     * - `regions`: Region codes and the names the provider gives them, per source. Use it to turn
     * a city or country into a region code. Codes repeat across clouds (Alibaba also has
     * `us-east-1`), so filter on source. Google Cloud's names are the city, state or country from
     * its regions page (`Council Bluffs, Iowa` for us-central1).
     * - `sync_state`: When each bundle was loaded and which price lists it covers;
     * `max(price_list_to)` is how fresh the data is.
     * - `service_events`: Every incident AWS posted on its public Health Dashboard (status page),
     * 2008 to now: one row per event, with when it was posted, when AWS says the impact began and
     * ended, and every update AWS wrote. Only events AWS chose to post publicly; account-specific
     * issues never appear, so no event does not prove no impact. Use it for questions about
     * outages, incidents and how reliable a service or region has been.
     *
     * Notes:
     *
     * - All prices are USD (Alibaba's from its international site). Timestamps are UTC DateTime.
     * - Usual defaults when a question does not say otherwise: for ec2, operating_system =
     * 'Linux', tenancy = 'Shared', pre_installed_sw = 'NA', capacity_status = 'Used',
     * license_model = 'No License required' and pricing = 'on_demand'; for rds, deployment_option
     * = 'Single-AZ', one database_engine (PostgreSQL if unsaid) and usage_type NOT LIKE '%Unused%'
     * (those rows price unused capacity reservations); for elasticache and memorydb, cache_engine
     * = 'Redis' (or 'Valkey') and usage_type = 'NodeUsage'; region us-east-1.
     * - EC2 Windows: the price AWS quotes for Windows (license included) is license_model = 'No
     * License required'. The `License Included - Infrastructure` and `Bring your own license` rows
     * price only the compute, at the Linux rate, so never quote them as the Windows price unless
     * the question is about bringing a license. Windows with SQL Server is pre_installed_sw = 'SQL
     * Web', 'SQL Std' or 'SQL Ent'.
     * - "Cheapest" means the lowest effective_hourly_usd among current rows. Hourly to monthly: x
     * 730.
     * - Spot rows (pricing = 'spot') only exist for ec2 with operating_system 'Linux' or
     * 'Windows', and leave tenancy, license_model, pre_installed_sw and capacity_status as '':
     * drop those ec2 defaults for spot (pricing = 'spot' OR (tenancy = 'Shared' AND ...)). A spot
     * price is the lowest across the region's availability zones, as AWS's Spot pricing page shows
     * it. Spot history starts 2026-08-03 with a price every hour (for the 17 main regions; the
     * others and Local Zones start 2026-11-01), and has one every 6 hours since 2026-11-01, so
     * aggregate it (by day, say) rather than listing rows.
     * - Reserved rows: an All Upfront term has hourly_usd = 0 and the whole cost in upfront_usd;
     * compare reserved and on-demand on effective_hourly_usd.
     * - RunPod (platform = 'runpod'): GPU types are priced per GPU per hour (size and family are
     * '', gpus = 1, gpu_memory_gib is the GPU's memory) and CPU pods per pod per hour; tell them
     * apart with attributes['productFamily'] ('GPU' or 'CPU') on instance_types. Every price is
     * region = 'global'; pick a cloud with variant['cloudType'] = 'Secure Cloud' (the default) or
     * 'Community Cloud' (cheaper, community hosts). Savings plans are pricing = 'reserved',
     * offering_class = 'Savings Plan', lease '3mo' or '6mo', with hourly_usd the effective rate.
     * Which data centers stock a GPU is attributes['dataCenters'] (comma separated); stock levels
     * and spot prices are not included. History starts in November 2026.
     * - Alibaba Cloud ECS (platform = 'alibaba'): default to operating_system = 'Linux' and
     * variant['networkType'] = 'VPC' (Classic is retired). on_demand is pay-as-you-go.
     * Subscriptions are offering_class = 'Subscription' (lease '1mo' or '1yr' to '5yr', paid in
     * full: hourly_usd = 0, upfront_usd the price); reserved instances are offering_class =
     * 'Reserved Instance' (lease '1yr' or '3yr', with a purchase_option). Prices go back to May
     * 2018; specs (attributes) start in May 2023, so older retired types can have NULL vcpu and
     * memory_gib.
     * - Azure virtual machines (platform = 'azure'): default to operating_system = 'Linux',
     * variant['priority'] = 'Regular' and region 'eastus'. Spot and Low Priority prices are
     * on_demand rows with variant['priority'] = 'Spot' or 'Low Priority', so always fix priority.
     * Reservations are offering_class = 'Reserved Instance', All Upfront (hourly_usd = 0,
     * upfront_usd the whole term), lease '1yr', '3yr' and for some sizes '5yr' or '10yr'; Azure
     * lists them under operating_system = 'Linux' only, since a Windows license is billed on top.
     * Savings plans are offering_class = 'Savings Plan', No Upfront, '1yr' or '3yr', hourly_usd
     * the plan's rate. Specs come from Azure's pricing calculator (attributes 'cores', 'ram',
     * 'diskSize', 'gpu', 'series'); about a third of sizes, mostly the newest and retired series,
     * have none, so vcpu and memory_gib are NULL there: match on instance_type or family (the
     * series) for those. Dedicated hosts are not included. valid_from is when Azure says a price
     * took effect (back to 2017), but changes are tracked from November 2026.
     * - Google Cloud Compute Engine (platform = 'gcp'): default to variant['provisioningModel'] =
     * 'Standard' and region 'us-central1'; Spot prices are on_demand rows with provisioningModel =
     * 'Spot'. Google bills most machine types per vCPU and per GiB of memory at their series'
     * rates, plus their GPUs, so each price is worked out from those rates and the machine type's
     * shape. Prices leave out bundled Local SSD, OS licenses and sustained use discounts, and TPU,
     * X4, X5 and A4X machine types are not included. Committed use discounts are offering_class =
     * 'Committed Use', No Upfront, '1yr' or '3yr', hourly_usd the commitment's rate. Which zones
     * of a region offer a machine type is attributes['zones'] (comma separated), which differs by
     * region: read it from attribute_changes for the region (attribute = 'zones'), as
     * instance_types holds one region's value. History starts in November 2026.
     * - Comparing clouds: region codes are each provider's own, so join regions on source as well
     * as region and compare by location (Alibaba's us-east-1 is US (Virginia), the same area as
     * AWS's us-east-1, Azure's eastus and Google Cloud's us-east4). Compare on
     * effective_hourly_usd for similar vcpu and memory_gib, like for like (on demand against
     * pay-as-you-go and Standard; spot against Azure Spot and Google Spot), and say which cloud
     * each row is from.
     * - Use instance_types for specs and to list types; join prices on (platform, instance_type)
     * when you need specs it does not carry.
     * - prices is large (millions of rows for ec2): always filter on platform and current (or a
     * time range), and aggregate or LIMIT.
     * - service_events is AWS's public status page history, not a measured uptime: AWS publishes
     * no availability percentage. To estimate downtime, sum dateDiff('minute', impact_started_at,
     * impact_ended_at) (fall back to posted_at and resolved_at when those are NULL) over events
     * with severity 'degraded' or 'disrupted', and say that it covers only events AWS posted
     * publicly. An event filed under `multipleservices` or another service can still have hit the
     * one asked about: also match mapContains(impacted_services, '<service>-<region>').
     *
     * GET /api/v1/instance-pricing/schema
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function schema(?RequestOptions $options = null): AwsPricingSchema
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/v1/instance-pricing/schema',
            ),
            $options,
        );

        return AwsPricingSchema::fromArray(Coerce::toArray($data));
    }
}
