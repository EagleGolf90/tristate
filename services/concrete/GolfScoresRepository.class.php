<?php
interface IGolfScoresRepository {
    public function load($method, $params);
    public function execute($method, $params);
}

class GolfScoresRepository implements IGolfScoresRepository
{
    private SQLTable $sqlTable;

    public function __construct(SQLTable $sqlTable)
    {
        $this->sqlTable = $sqlTable;
    }

    public function load(string $method, array $params)
    {
        return $this->sqlTable->load($method, $params);
    }

    public function execute(string $method, array $params)
    {
        return $this->sqlTable->execute($method, $params);
    }
}
?>
