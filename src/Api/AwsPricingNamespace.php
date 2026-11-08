<?php

/*
 * infrawrench/sdk v1.99.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.99.0).
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
     * Run a read-only SQL query over instance pricing data (deprecated path)
     *
     * Deprecated alias of `POST /api/v1/instance-pricing/query`, its path before the warehouse
     * covered clouds other than AWS; it behaves identically. Use the new path.
     *
     * POST /api/v1/aws-pricing/query
     *
     * Deprecated.
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
     * Describe the instance pricing tables (deprecated path)
     *
     * Deprecated alias of `GET /api/v1/instance-pricing/schema`, its path before the warehouse
     * covered clouds other than AWS; it behaves identically. Use the new path.
     *
     * GET /api/v1/aws-pricing/schema
     *
     * Deprecated.
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
