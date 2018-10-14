SELECT DATE(start_date) AS date,
  SUM(hours) AS WorkHoursReport
  FROM Work, Tasks
  WHERE Work.task_id = Tasks.id
  AND Tasks.project_id = 1
  GROUP BY DATE(start_date)
  ORDER BY date;
