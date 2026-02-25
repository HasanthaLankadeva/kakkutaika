<?php
class Product
{
	private QueryBuilder $qb;
    private QueryBuilder $ordersqb;

	public function __construct()
	{
		$this->qb = new QueryBuilder('module_products_page');
        $this->attachmentsqb = new QueryBuilder('attachments');
        $this->reviewsqb = new QueryBuilder('module_reviews');
        $this->ordersqb = new QueryBuilder('module_orders');
	}

	/**
    * Get all posts
    */
    public function all(): array
    {
        return $this->qb->all();
    }
	
	/**
    * Find single post
    */
    public function find(int $id): ?array
    {
        return $this->qb->find($id);
    }

	/**
    * Create post
    */
    public function create(array $data): bool
    {
        return $this->ordersqb->insert([
            'productID' => $data['product_id'],
            'productName' => $data['product_name'],
            'size' => $data['size'],
			'quantity' => $data['quantity'],
            'price' => $data['price'],
			'name' => $data['name'],
			'email' => $data['email'],
			'phone' => $data['phone'],
			'duedate' => $data['duedate']
        ]);
    }

    /**
    * Update post
    */
    public function update(int $id, array $data): bool
    {
        return $this->qb->update($id, [
            'product_id'   => $data['product_id'],
            'product_name' => $data['product_name'],
            'price'   => $data['price'],
            'quantity' => $data['quantity'],
            'name'   => $data['name'],
            'email' => $data['email'],
            'phone'   => $data['phone'],
            'duedate' => $data['date']
        ]);
    }

    /**
    * Delete post
    */
    public function delete(int $id): bool
    {
        return $this->qb->delete($id);
    }

    /**
    * Get all attachments
    */
    public function attachments(int $id): ?array
    {
        $results = $this->attachmentsqb->where('itemID', $id);
        return $results ?? [];
    }

    /**
    * Get all related products
    */
    public function relproducts(string $column, string $value): ?array
    {
        $results = $this->qb->category($column, $value);
        return $results ?? [];
    }

    /**
    * Get all related reviews
    */
    public function relreviews(string $column, string $value): ?array
    {
        $results = $this->reviewsqb->mapping($column, $value);
        return $results ?? [];
    }
}

?>