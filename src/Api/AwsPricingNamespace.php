<?php

/*
 * infrawrench/sdk v1.86.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.86.0).
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

/** `$client->awsPricing` */
final class AwsPricingNamespace extends ApiNamespace
{
    /**
     * Run a read-only SQL query over AWS pricing data
     *
     * Runs one read-only ClickHouse statement against the AWS pricing warehouse: every instance
     * type's specs and every price AWS has listed for it (on demand, reserved and EC2 spot), in
     * every region, with history, for EC2, RDS, ElastiCache, OpenSearch, Redshift, DocumentDB,
     * Neptune, MemoryDB, DAX, SageMaker, EMR and GameLift. It is the data behind
     * instances.infrawrench.com. Needs no scope. Use `GET /api/v1/aws-pricing/schema` for the
     * columns, or the tables below; filter `prices` on `platform` and `current`.
     *
     * - `prices`: Every price AWS has listed for an instance type, one row per period a price
     * held. `current = true` (equivalently `valid_to IS NULL`) is the price on offer now; filter
     * on it unless the question is about history. A product's price is identified by (platform,
     * instance_type, region, pricing, lease, offering_class, purchase_option) plus its variant
     * columns, so always fix the variant columns that matter for the platform (see the defaults in
     * the notes) or you will mix e.g. Windows and Linux prices.
     * - `instance_types`: One row per instance type per platform with its current specs. EC2 spot
     * prices use the `ec2` rows. Specs AWS does not list are NULL or `''`; `attributes` has every
     * attribute AWS publishes, as strings.
     * - `attribute_changes`: History of instance attributes: the values each type was first listed
     * with, then every change. Use it for questions like when a spec changed.
     * - `regions`: Region codes and the names AWS gives them, per platform's price list. Use it to
     * turn a city or country into a region code.
     * - `sync_state`: When each bundle was loaded and which AWS price lists it covers;
     * `max(price_list_to)` is how fresh the data is.
     *
     * POST /api/v1/aws-pricing/query
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
                path: '/api/v1/aws-pricing/query',
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AwsPricingQueryResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Describe the AWS pricing tables
     *
     * Every table and column of the AWS pricing warehouse with what it holds, the notes a correct
     * query depends on, and how fresh each source is. Needs no scope.
     *
     * Tables:
     *
     * - `prices`: Every price AWS has listed for an instance type, one row per period a price
     * held. `current = true` (equivalently `valid_to IS NULL`) is the price on offer now; filter
     * on it unless the question is about history. A product's price is identified by (platform,
     * instance_type, region, pricing, lease, offering_class, purchase_option) plus its variant
     * columns, so always fix the variant columns that matter for the platform (see the defaults in
     * the notes) or you will mix e.g. Windows and Linux prices.
     * - `instance_types`: One row per instance type per platform with its current specs. EC2 spot
     * prices use the `ec2` rows. Specs AWS does not list are NULL or `''`; `attributes` has every
     * attribute AWS publishes, as strings.
     * - `attribute_changes`: History of instance attributes: the values each type was first listed
     * with, then every change. Use it for questions like when a spec changed.
     * - `regions`: Region codes and the names AWS gives them, per platform's price list. Use it to
     * turn a city or country into a region code.
     * - `sync_state`: When each bundle was loaded and which AWS price lists it covers;
     * `max(price_list_to)` is how fresh the data is.
     *
     * Notes:
     *
     * - All prices are USD. Timestamps are UTC DateTime.
     * - Usual defaults when a question does not say otherwise: for ec2, operating_system =
     * 'Linux', tenancy = 'Shared', pre_installed_sw = 'NA', capacity_status = 'Used',
     * license_model = 'No License required' and pricing = 'on_demand'; for rds, deployment_option
     * = 'Single-AZ', one database_engine (PostgreSQL if unsaid) and usage_type NOT LIKE '%Unused%'
     * (those rows price unused capacity reservations); for elasticache and memorydb, cache_engine
     * = 'Redis' (or 'Valkey') and usage_type = 'NodeUsage'; region us-east-1.
     * - "Cheapest" means the lowest effective_hourly_usd among current rows. Hourly to monthly: x
     * 730.
     * - Spot rows (pricing = 'spot') only exist for ec2 with operating_system 'Linux' or
     * 'Windows'; spot prices move often, so their history is dense.
     * - Reserved rows: an All Upfront term has hourly_usd = 0 and the whole cost in upfront_usd;
     * compare reserved and on-demand on effective_hourly_usd.
     * - Use instance_types for specs and to list types; join prices on (platform, instance_type)
     * when you need specs it does not carry.
     * - prices is large (millions of rows for ec2): always filter on platform and current (or a
     * time range), and aggregate or LIMIT.
     *
     * GET /api/v1/aws-pricing/schema
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
                path: '/api/v1/aws-pricing/schema',
            ),
            $options,
        );

        return AwsPricingSchema::fromArray(Coerce::toArray($data));
    }
}
