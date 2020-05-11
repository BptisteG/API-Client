<?php

namespace TruckersMP\APIClient\Requests\Company;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Requests\Request;

class MemberIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new MemberIndexRequest instance.
     *
     * @param  int  $id
     * @return void
     */
    public function __construct(int $id)
    {
        parent::__construct();

        $this->companyId = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/members';
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyMemberIndex
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function get(): CompanyMemberIndex
    {
        return new CompanyMemberIndex(
            $this->send()['response']
        );
    }
}
