<?php

/**
 * Description of BookingDao
 *
 * @author richard_lovell
 */
class CategoryDao {
    
    /** @var PDO */
    private $db = null;


    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    /**
     * Find all {@link Booking}s by search criteria.
     * @return array array of {@link Booking}s
     */
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $category = new Category();
            CategoryMapper::map($category, $row);
            $result[$category->getId()] = $category;
        }
       
        return $result;
    }

    /**
     * Find {@link Todo} by identifier.
     * @return Todo Todo or <i>null</i> if not found
     */
    public function findById($id) {
        $row = $this->query('SELECT * FROM category WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $category = new Category();
        CategoryMapper::map($category, $row);
        return $category;
    }

    /**
     * Save {@link Booking}.
     * @param Booking $booking {@link Booking} to be saved
     * @return Booking saved {@link Booking} instance
     */
    public function save(Category $category) {
        if ($category->getId() === null) {
            return $this->insert($category);
        }
        return $this->update($category);
    }

    /**
     * Delete {@link Booking} by identifier.
     * @param int $id {@link Booking} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
    public function delete($id) {
        $sql = '
            UPDATE Category SET
                status = :status
            WHERE
                id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':status' => 'deleted',
            ':id' => $id,
        ));
        return $statement->rowCount() == 1;
    }

    /**
     * @return PDO
     */
    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }

//    private function getFindSql(TodoSearchCriteria $search = null) {
//        $sql = 'SELECT * FROM todo WHERE deleted = 0 ';
//        $orderBy = ' priority, due_on';
//        if ($search !== null) {
//            if ($search->getStatus() !== null) {
//                $sql .= 'AND status = ' . $this->getDb()->quote($search->getStatus());
//                switch ($search->getStatus()) {
//                    case Todo::STATUS_PENDING:
//                        $orderBy = 'due_on, priority';
//                        break;
//                    case Todo::STATUS_DONE:
//                    case Todo::STATUS_VOIDED:
//                        $orderBy = 'due_on DESC, priority';
//                        break;
//                    default:
//                        throw new Exception('No order for status: ' . $search->getStatus());
//                }
//            }
//        }
//        $sql .= ' ORDER BY ' . $orderBy;
//        return $sql;
//    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function insert(Category $category) {
        
        $category->setId(null);
       
        $sql = '
            INSERT INTO category (id, name, descripton)
                VALUES (:id, :name, :description)';
        return $this->execute($sql, $category);
    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function update(Category $category) {
        $sql = '
            UPDATE Activity SET
                name = :name,
                description = :description
            WHERE
                id = :id';
        
        return $this->execute($sql, $category);
    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function execute($sql, Category $category) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($category));
        if (!$category->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
//        if (!$statement->rowCount()) {
//            throw new NotFoundException('Booking with ID "' . $booking->getId() . '" does not exist.');
//        }
        return $category;
    }

    private function getParams(Category $category) {
        $params = array(
            ':id' => $category->getId(),
            ':name' => $category->getName(),
         ':description' => $category->getDescription()
        );
//        var_dump($booking);
//        echo '<br>';
//        var_dump($params);
//        die();
        return $params;
    }

    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }

    /**
     * @return PDOStatement
     */
    private function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
    }

    private static function throwDbError(array $errorInfo) {
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

    
}
