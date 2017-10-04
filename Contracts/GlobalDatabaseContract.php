<?php namespace EdmondsCommerce\Migrations\Contracts;

interface GlobalDatabaseContract
{
    /**
     * $data = [
     *       'tableName' => '',
     *       'columns' => ['columnone', 'columntwo'], // more or one column
     *       'replaceText'   => '',
     *       'replaceTextWith' => '',
     *       'specificRowsOnly' => [  // zero
     *           'filterByField' => 'entity_id', // entity_id is an example
     *           'values' => [1, 2, 3...]'xxxxx' // all or specific rows
     *       ],
     *   ];
     * @param array $data
     * @return mixed
     */
    public function replaceHardcodedText(array $data);
}