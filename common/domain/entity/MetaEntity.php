<?php

namespace common\domain\entity;

class MetaEntity
{
    public function __construct(
        public int $count = 0,
        public int $limit = 0,
        public int $offset = 0,
        public bool $has_previous_page = false,
        public bool $has_next_page = false,
    ) {
        ($offset > 0) and $this->has_previous_page = true;
        ($limit && $count > $limit + $offset) and $this->has_next_page = true;
    }
}