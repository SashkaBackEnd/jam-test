<?php

declare(strict_types=1);

namespace api\modules\graphql\errors;

use api\exceptions\IContextableException;

class GraphqlError extends ErrorClientAware
{
    private string $categoryName;

    public function __construct(IContextableException $exception)
    {
        $this->setCategory($exception->getCode());
        parent::__construct($exception->getMessage(), null, null, [], null, null, $exception->getContext());
    }

    private function setCategory(int $code)
    {
        $this->categoryName = GraphqlCategory::get($code);
    }

    public function getCategory()
    {
        return $this->categoryName;
    }
}
