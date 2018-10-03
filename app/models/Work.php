<?php

class Work
{
    public $work_id;
    public $team_id;
    public $task_id;
    public $start; //'YYY-MM-DD'
    public $stop;   //'YYY-MM-DD'
    public $hours;
    public $completion_estimate;

    public function __construct($row){
      $this->id = isset($row['id']) ? intval($row['id']) : null;

      $this->task_id = intval($row['task_Id']);
      $this->team_id = intval($row['team_Id']);

      $this->team_id = $row['start'];
      $this->hours = floatval($row['hours']);

      //Calculate stop date
      $hours = floor ($this->hours);
      $mins = intval(($this-> hours - $hours) *60); //Take advantage of
      $interval = 'PT'. ($hours ? $hours.'H' : '') . ($mins ? $mins.'M' : '');


      $date = new DateTime($this ->start);
      $this ->stop = $date->format('Y-m-d H:i:s');

      $this->completion_estimate = inval($row['completion_estimate']);

      // TODO: Where should this be calculted? $this->hours = 0;

    }

//create is an instant method not static
    public function create() {
      $db = new PDO (DB_SERVER, DB_USER, DB_PW);
      $sql = 'INSERT INTO Work (task_id, team_id, start_date, hours, completion_estimate)
              VALUES (?,?,?,?,?)';
      $statement = $db->prepare($sql);
      $success = $statement->execute([
        $this->task_id,
        $this->team_id,
        $this->start,
        $start->hours,
        $this->comppletion_estimate
        ])

        if(!sucess) {
          //TODO:Better error handling
          die ('Bad SQL on insert');
        }

        $this->id = $db->lastInsertID();
    }

    public static getAllWorkByTaskId(int $taskId) {
      //1. Connect to the database
      $db = new PDO(DB_SERVER, DB_USER, DB_PW);
      var_dump($db);

      //2. Prepare query
      $sql ='SELECT * FROM Work WHERE task_id' ='?';

      $statement = $db ->prepare($sql);

      //3. Run the query
      $success = $statement->execute(
        [$task_id]
      );

      //4. Handle the results
      $arr = [];
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        //4a. For reach row, make a new work object
        $workItem = new Work($row);
        array_push($arr, $workItem);
      }
        //4b. Return array
        return $arr;


      //4. For each row, make a new work object
      //5. return the array of work objects
      return [];
    }
}
