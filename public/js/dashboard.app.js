var dashboardApp = new Vue({
  el: '#dashboard',
  data: {
    name : "Tapestry",
    "short_description": "Build a visualization layer for the project dashboard",
    "start_date" : "2018-07-01",
    "target_date" : "2018-11-03",
    "budget" : "4950000",
    "spent" : "3456700",
    "projected_spend": "4740500",
    "weekly_effort_target": 400,
    project: {
      name : '',
      short_description: '',
      start_date : '',
      target_date : '',
      budget : '',
      spent : '',
      projected_spend: '',
      weekly_effort_target: ''
    },
    tasks: [
      {
        id: 0,
        title: '',
        type : '',
        size : '',
        team : '',
        status: '',
        start_date: '',
        close_date: null,
        hours_worked: '',
        perc_complete: '',
        current_sprint : ''
      }
    ]
  },
  computed: {
    days_left: function () {
      return moment(this.target_date).diff(moment(), 'days');
    },
    pretty_target_date: function () {
      return this.pretty_date(this.target_date)
      return moment(this.project.target_date).diff(moment(), 'days');
    }
  },
  methods: {
    pretty_date: function (d) {
      return moment(d).format('l')
    },
    pretty_currency: function (val) {
      if (val < 1e3) {
        return '$ ' + val
      }

      if (val < 1e6) {
        return '$ ' + (val/1e3).toFixed(1) + ' k'
      }

      return '$ ' + (val/1e6).toFixed(1) + ' M'
    },
    completeClass: function(task) {
      if (task.perc_complete == 100 ) {
        return 'alert-success'
      }
      if (task.current_sprint && task.hours_worked == 0 ) {
        return 'alert-warning'
      }
    },
    fetchTasks () {
      fetch('https://raw.githubusercontent.com/tag/iu-msis/dev/public/p1-tasks.json')
      .then( response => response.json() )
      .then( json => {dashboardApp.tasks = json} )
      .catch( function(err) {
        .catch( err => {
          console.log('TASK FETCH ERROR:');
          console.log(err);
        })
      },
      fetchProject () {
        fetch('https://raw.githubusercontent.com/tag/iu-msis/dev/public/project1.json')
        .then( response => response.json() )
        .then( json => {dashboardApp.project = json} )
        .catch( err => {
          console.log('PROJECT FETCH ERROR:');
          console.log(err);
        })
      }
    },
    created () {
      this.fetchTasks()
      this.fetchProject();
      this.fetchTasks();
    }
  })
