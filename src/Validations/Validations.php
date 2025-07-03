<?php

namespace DazzaDev\LaravelFeco\Validations;

class Validations
{
    protected $commonRules;

    protected $companyRules;

    protected $customerRules;

    protected $totalsRules;

    protected $taxesRules;

    protected $numberingRangeRules;

    protected $billingReferenceRules;

    protected $lineItemsRules;

    public function __construct()
    {
        $this->commonRules = new Common;
        $this->companyRules = new Company;
        $this->customerRules = new Customer;
        $this->totalsRules = new Totals;
        $this->taxesRules = new Taxes;
        $this->numberingRangeRules = new NumberingRange;
        $this->billingReferenceRules = new BillingReference;
        $this->lineItemsRules = new LineItems;
    }

    /**
     * Common rules.
     */
    public function commonRules(): array
    {
        return $this->commonRules->rules();
    }

    /**
     * Company rules.
     */
    public function companyRules(): array
    {
        return $this->companyRules->rules();
    }

    /**
     * Customer rules.
     */
    public function customerRules(): array
    {
        return $this->customerRules->rules();
    }

    /**
     * Totals rules.
     */
    public function totalsRules(): array
    {
        return $this->totalsRules->rules();
    }

    /**
     * Taxes rules.
     */
    public function taxesRules(): array
    {
        return $this->taxesRules->rules();
    }

    /**
     * Numbering range rules.
     */
    public function numberingRangeRules(): array
    {
        return $this->numberingRangeRules->rules();
    }

    /**
     * Invoice rules.
     */
    public function invoiceRules(): array
    {
        return array_merge($this->basicRules(), $this->numberingRangeRules());
    }

    /**
     * Credit and debit note rules.
     */
    public function creditAndDebitNoteRules(): array
    {
        return array_merge($this->basicRules(), $this->billingReferenceRules->rules());
    }

    /**
     * Line items rules.
     */
    public function lineItemsRules(): array
    {
        return $this->lineItemsRules->rules();
    }

    /**
     * Get the basic rules.
     */
    public function basicRules(): array
    {
        return array_merge(
            $this->commonRules(),
            $this->companyRules(),
            $this->customerRules(),
            $this->totalsRules(),
            $this->taxesRules(),
            $this->lineItemsRules()
        );
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        $commonMessages = $this->commonRules->messages();
        $companyMessages = $this->companyRules->messages();
        $customerMessages = $this->customerRules->messages();
        $totalsMessages = $this->totalsRules->messages();
        $taxesMessages = $this->taxesRules->messages();
        $numberingRangeMessages = $this->numberingRangeRules->messages();
        $billingReferenceMessages = $this->billingReferenceRules->messages();
        $lineItemsMessages = $this->lineItemsRules->messages();

        return [
            ...$commonMessages,
            ...$companyMessages,
            ...$customerMessages,
            ...$totalsMessages,
            ...$taxesMessages,
            ...$numberingRangeMessages,
            ...$billingReferenceMessages,
            ...$lineItemsMessages,
        ];
    }
}
