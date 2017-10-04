<?php namespace EdmondsCommerce\Migrations\Helper;

use EdmondsCommerce\Migrations\Contracts\GlobalDatabaseContract;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Logger\Monolog;

class GlobalDatabase extends AbstractHelper implements GlobalDatabaseContract
{
    /**
     * @var Context
     */
    private $context;
    /**
     * @var Monolog
     */
    private $logger;
    /**
     * @var ResourceConnection
     */
    private $connection;

    public function __construct(Context $context, ResourceConnection $connection, Monolog $logger)
    {
        parent::__construct($context);
        $this->context = $context;
        $this->logger = $logger;
        $this->connection = $connection;
    }

    public function replaceHardcodedText(array $data)
    {
        $connection = $this->connection->getConnection();

        list($sql,$bind)= $this->buildUpdateQuery($data);
        $this->logger->addDebug($sql);

        $connection->query($sql,$bind);
    }

    private function buildUpdateQuery(array $data)
    {
        $sql = "UPDATE {$data['tableName']} SET ";

        $columns = $data['columns'];

        $arraySize = count($columns);
        $i = 1;
        $bind=[];
        foreach ($columns as $column) {
            $sql .= "{$column} = REPLACE({$column}, ?, ?)";
            if ($i != $arraySize) {
                $sql .= ", ";
            }
            $i++;
            $bind[]=$data['replaceText'];
            $bind[]=$data['replaceTextWith'];
        }
        if (isset($data['rows'])) {
            $inFieldId = current(array_keys($data['rows']));
            $inFieldValues = $data['rows'][$inFieldId];
            $sql .= "WHERE {$inFieldId} IN('".implode("','", $inFieldValues)."'";
        }

        return [$sql,$bind];
    }
}