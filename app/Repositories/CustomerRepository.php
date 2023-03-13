<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerRepository implements CustomerRepositoryInterface
{
    protected $model;

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $customer = $this->model->find($id)) {
            throw new ModelNotFoundException("Customer not found", 404);
        }

        return $customer;
    }
}