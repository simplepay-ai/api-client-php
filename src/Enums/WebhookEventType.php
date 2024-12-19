<?php

declare(strict_types=1);

namespace SimplePay\ApiClient\Enums;

enum WebhookEventType: string
{
    /**
     * Invoice created
     */
    case InvoiceCreated = 'invoice.created';

    /**
     * Invoice succeeded
     *
     * Paid service may be granted to end customer on this event
     */
    case InvoiceSuccess = 'invoice.success';

    /**
     * Invoice canceled
     *
     * By end customer or merchant
     */
    case InvoiceCanceled = 'invoice.canceled';

    /**
     * Transaction created and preparing for future processing
     */
    case TransactionCreated = 'transaction.created';

    /**
     * System is ready for accepting payment
     *
     * End customer allowed to send cryptocurrency
     */
    case TransactionProcessing = 'transaction.processing';

    /**
     * Transaction found in blockchain
     *
     * System awaiting for some amount of new blocks to be mined for safety
     *
     * `hash` and `block` fields in transaction was filled on this status
     */
    case TransactionConfirming = 'transaction.confirming';

    /**
     * Transaction succeeded
     */
    case TransactionSuccess = 'transaction.success';

    /**
     * Transaction rejected
     *
     * Transaction was failed, or another issue was happen
     */
    case TransactionRejected = 'transaction.rejected';

    /**
     * Transaction canceled
     */
    case TransactionCanceled = 'transaction.canceled';

    /**
     * Transaction expired
     *
     * End customer does not send transaction in time
     */
    case TransactionExpired = 'transaction.expired';
}
