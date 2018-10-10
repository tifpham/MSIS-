<?php
class WorkHoursReport
{
  public function getWorkByProjectId(int $projectId)
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    $sql = 'SELECT DATE(start_date) AS date,
      SUM(hours) AS hours
      FROM Work, Tasks
      WHERE Work.task_id = Tasks.id
      AND Tasks.project_id = ?
      GROUP BY DATE(start_date)
      ORDER BY date';

    $statement = $db->prepare($sql);

    $success = $statement->execute(
        [$projectId]
      );
  
    // 4. Handle the results
    //give array of all rows back
    $arr = $statement->fetchAll(PDO::FETCH_ASSOC)) {


    // 4.b. return the array of work objects
    return $arr;
  }
}
