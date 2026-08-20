<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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
use Infrawrench\Sdk\Model\Invoice;
use Infrawrench\Sdk\Model\InvoiceInput;
use Infrawrench\Sdk\Model\InvoiceSendRequest;
use Infrawrench\Sdk\Model\InvoiceStatus;
use Infrawrench\Sdk\Model\InvoiceSummary;
use Infrawrench\Sdk\Model\InvoiceUpdate;
use Infrawrench\Sdk\Model\InvoiceVoidRequest;
use Infrawrench\Sdk\Model\InvoiceVoidResponse;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->invoices` */
final class InvoicesNamespace extends ApiNamespace
{
    /**
     * Approve an invoice — freeze its figures
     *
     * Computes the figures one last time and writes them onto the invoice together with the
     * exchange rates, the day they were read, the billing rules in force and the names everything
     * in scope had. From here the invoice is a document, not a query.
     *
     * A distinct act from generation, on a distinct permission (`invoices:issue`), with its own
     * audit entry recording who approved what.
     *
     * Refused with 409 when a currency in the invoice has no stated exchange rate: an approved
     * invoice has to be quotable as one number in the customer's currency.
     *
     * Refused with 409, too, when the draft or its customer changed while the figures were being
     * computed — a different period, scope, currency, cost basis or billing-rules setting. Nothing
     * is approved in that case: freezing figures that describe a different question would be worse
     * than making the caller look again.
     *
     * _Requires permission: `invoices:issue`._
     *
     * POST /api/org/{orgId}/invoices/{id}/approve
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(string $id, ?string $orgId = null, ?RequestOptions $options = null): Invoice
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/invoices/{id}/approve',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Invoice::fromArray(Coerce::toArray($data));
    }

    /**
     * Raise a draft invoice
     *
     * Always lands in `draft`. Generating and issuing are two acts on two permissions: a mistyped
     * period must not be able to reach a customer without anyone having read the numbers.
     *
     * _Requires permission: `invoices:write`._
     *
     * POST /api/org/{orgId}/invoices
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(InvoiceInput $body, ?string $orgId = null, ?RequestOptions $options = null): Invoice
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/invoices',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Invoice::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a draft invoice
     *
     * Draft only, and refused with 409 otherwise. An issued invoice is voided; deleting one would
     * erase a document a customer holds a copy of.
     *
     * _Requires permission: `invoices:write`._
     *
     * DELETE /api/org/{orgId}/invoices/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/invoices/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Download an invoice as CSV
     *
     * The derivation, not a rendered document: what was collected, what the rules added, the rate
     * and the day it was read, and the final figure — every column an accounts-payable clerk needs
     * to check the arithmetic. Same RFC 4180 quoting as the scheduled cost exports.
     *
     * _Requires permission: `invoices:read`._
     *
     * GET /api/org/{orgId}/invoices/{id}/export
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(string $id, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/invoices/{id}/export',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Get an invoice
     *
     * **A draft recomputes from live spend; an approved, sent or void invoice does not.** `live`
     * says which happened. A frozen invoice returns the figures written at approval and does not
     * read cost data at all.
     *
     * _Requires permission: `invoices:read`._
     *
     * GET /api/org/{orgId}/invoices/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): Invoice
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/invoices/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Invoice::fromArray(Coerce::toArray($data));
    }

    /**
     * List invoices
     *
     * Summaries, newest period first. A draft's `totals` is null here rather than recomputed —
     * recomputing every draft would make opening the list one cost-data scan per draft, and zero
     * would be a lie the reader cannot detect.
     *
     * _Requires permission: `invoices:read`._
     *
     * GET /api/org/{orgId}/invoices
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param InvoiceStatus::*|null $status
     * @return list<InvoiceSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $managedAccountId = null, ?string $status = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/invoices',
                pathParams: ['orgId' => $orgId],
                query: ['managedAccountId' => $managedAccountId, 'status' => $status],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): InvoiceSummary => InvoiceSummary::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send an invoice to its customer
     *
     * Changes no figure — the document was frozen at approval. It records the **release** (this
     * may go to the customer, and this person said so), then emails the invoice to the customer's
     * contact addresses with the CSV attached.
     *
     * **200 even when delivery failed.** The release happened and is recorded either way;
     * `delivery` says what became of the transport. An error status would leave the caller unable
     * to tell which of the two failed. A failed delivery is visible, and re-sending retries it.
     *
     * Sending again needs `resend: true` only when the last attempt reached somebody — see
     * `InvoiceSendRequest`. The body may be omitted entirely for a first send.
     *
     * _Requires permission: `invoices:issue`._
     *
     * POST /api/org/{orgId}/invoices/{id}/send
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function send(string $id, ?string $orgId = null, ?InvoiceSendRequest $body = null, ?RequestOptions $options = null): Invoice
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/invoices/{id}/send',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Invoice::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit a draft invoice
     *
     * Draft only. An approved, sent or void invoice is refused with 409 by the service, not merely
     * hidden by the UI — an issued invoice that silently changed after the customer received it is
     * the worst outcome this feature could produce.
     *
     * _Requires permission: `invoices:write`._
     *
     * PUT /api/org/{orgId}/invoices/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, InvoiceUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): Invoice
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/invoices/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Invoice::fromArray(Coerce::toArray($data));
    }

    /**
     * Void an issued invoice
     *
     * The only correction there is. The original keeps every figure it was sent with — “we billed
     * you this, it was wrong, here is the corrected one” is a story a customer can follow, and “we
     * changed the invoice” is not.
     *
     * With `supersede`, the void, the corrective draft and both directions of the link between
     * them are one transaction. Void is irreversible, so a half-applied correction would leave a
     * withdrawn invoice with no way forward; this call either applies whole or not at all.
     *
     * _Requires permission: `invoices:issue`._
     *
     * POST /api/org/{orgId}/invoices/{id}/void
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function void(string $id, InvoiceVoidRequest $body, ?string $orgId = null, ?RequestOptions $options = null): InvoiceVoidResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/invoices/{id}/void',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return InvoiceVoidResponse::fromArray(Coerce::toArray($data));
    }
}
