<?php

namespace common\domain\entity;

use yii\db\ActiveRecord;

class ArrayEntity
{
    /**
     * @param MetaEntity $meta
     * @param ActiveRecord[] $list
     * @param ?array $info
     */
    public function __construct(
        public MetaEntity $meta,
        public array $list,
        public ?array $info = null,
    ) {
    }

    /**
     * @return MetaEntity|null
     */
    public function getMeta(): ?MetaEntity
    {
        return $this->meta;
    }

    /**
     * @return ActiveRecord[]|null
     */
    public function getList(): ?array
    {
        return $this->list;
    }

    /**
     * @return void
     */
    public function setInfo(array $info): void
    {
        $this->info = $info;
    }

    /**
     * @return array|null
     */
    public function getInfo(): ?array
    {
        return $this->info;
    }
}