<?php
class AboutData
{
    private QueryBuilder $metaQB;
	private QueryBuilder $qb;
    private QueryBuilder $reviewsQB;

	public function __construct()
	{
        $this->metaQB = new QueryBuilder('module_metadata');
		$this->qb = new QueryBuilder('module_about_page');
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
        return $this->qb->all();
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