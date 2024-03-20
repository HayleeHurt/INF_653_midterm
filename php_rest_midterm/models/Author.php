<?php 
  class Author {
    // DB stuff
    private $conn;
    private $table = 'author';

    public $id;
    public $author;

    public function __construct($db) {
        $this->conn = $db;
       }
    public function read($db){
        $query = 'SELECT * FROM' . $this->table;

          $stmt = $this->conn->prepare($query);

          
          $stmt->execute();

          return $stmt;
        }
      public function read_single(){
          $query = 'SELECT 
            id, 
            author,
          FROM
          ' . $this->table .'
          WHERE
          id = ?
          LIMIT 0,1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

          
        $this->author = $row['author'];
        $this->id = $row['id'];
        

      }
    }

   