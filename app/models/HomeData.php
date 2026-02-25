<?php
class HomeData
{
    private QueryBuilder $metaQB;
	private QueryBuilder $pageQB;
    private QueryBuilder $attachmentsQB;
    private QueryBuilder $featuredQB;
    private QueryBuilder $reviewsQB;

	public function __construct()
	{
		$this->metaQB = new QueryBuilder('module_metadata');
        $this->pageQB = new QueryBuilder('module_home_page');
        $this->attachmentsQB = new QueryBuilder('attachments');
        $this->featuredQB = new QueryBuilder('module_products_page');
        $this->reviewsQB = new QueryBuilder('module_reviews');
	}

    /**
    * Get meta
    */
    public function meta(string $column, $value): array
    {
        return $this->metaQB->where($column, $value);
    }

	/**
    * Get all posts
    */
    public function all(): array
    {
        return $this->pageQB->all();
    }

    /**
    * Get all attachments
    */
    public function attachments(string $column, $id): ?array
    {
        $results = $this->attachmentsQB->where($column, $id);
        return $results ?? [];
    }

    /**
    * Get featured products
    */
    public function featured(string $column, $value): array
    {
        $results = $this->featuredQB->whereLike($column, $value);
        return $results ?? [];
    }

    /**
    * Get all reviews
    */
    public function reviews(): array
    {
        return $this->reviewsQB->all();
    }

}
?>