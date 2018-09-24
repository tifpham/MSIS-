<?php

class Work
{
    public $work_id;
    public $team_id;
    public $task_id;
    public $start_date; //'YYY-MM-DD'
    public $end_date;   //'YYY-MM-DD'
    public $hours;

    public function __construct($data){
      $this->id = $row['id'];

      $this->start_date = $row['start_date'];
      $this->end_date = $row['end_date'];

      $this->hours =0;

      // TODO: Where should this be calculted? $this->hours = 0;

    }

    public static getAllWorkByTask(int $taskId) {
      //1. Connect to the database
      $db = new PDO(DB_SERVER, DB_USER, DB_PW);
      var_dump($db);

      die;
      //2. Run a query
      //3. Read the results
      //4. For each row, make a new work object
      //5. return the array of work objects
      return [];
    }
}
