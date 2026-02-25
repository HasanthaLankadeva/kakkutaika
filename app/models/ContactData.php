<?php
class ContactData
{
    private QueryBuilder $metaQB;
	private QueryBuilder $qb;

	public function __construct()
	{
        $this->metaQB = new QueryBuilder('module_metadata');
		$this->qb = new QueryBuilder('module_contact_page');
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

}
?>