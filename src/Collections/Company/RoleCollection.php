<?php

namespace TruckersMP\APIClient\Collections\Company;

use Exception;
use TruckersMP\APIClient\Collections\Collection;
use TruckersMP\APIClient\Models\CompanyRole;

class RoleCollection extends Collection
{
    /**
     * Create a new RoleCollection instance.
     *
     * @param  array  $response
     * @return void
     *
     * @throws Exception
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response['roles'] as $key => $role) {
            $this->items[$key] = new CompanyRole($role);
        }
    }
}
