<?php

class Work
{
    public $id;
    public $start_date; //'YYY-MM-DD'
    public $end_date;   //'YYY-MM-DD'

    public function __construct($row){
      $this->id = $row['id'];

      $this->start_date = $row['start_date'];
      $this->end_date = $row['end_date'];

      $this->hours =0;

      // TODO: Where should this be calculted? $this->hours = 0;

    }

    public static getAllWorkByTask(int $taskId) {
      //1. Connect to the database
      //2. Run a query
      //3. Read the results
      //4. For each row, make a new work object
      //5. return the array of work objects
      return [];
    }
}
