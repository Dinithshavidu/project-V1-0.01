<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/appointment.css"/>

  <!-- DayPilot library -->
  <script src="<?php echo base_url(); ?>externalServices/js/daypilot/daypilot-all.min.js"></script>
</head>
<body>


<div class="main">
  <div class="parent">
    <div class="left">
      <button id="addToQueue">Add task...</button>
      <div id="unscheduled"></div>
    </div>
    <div class="right">
      <div id="scheduler"></div>
    </div>
  </div>

</div>

<script>
  const scheduler = new DayPilot.Scheduler("scheduler", {
    cellDuration: 15,
    cellWidth: 60,
    days: DayPilot.Date.today().daysInMonth(),
    dragOutAllowed: true,
    durationBarHeight: 5,
    eventHeight: 45,
    // rowHeaderColumns: [
    //   {name: "Name"},
    //   {name: "Can drive", display: "driving"}
    // ],
    rowHeaderColumns: [
      {name: "Name"}
    ],
    scale: "CellDuration",
    showNonBusiness: false,
    startDate: DayPilot.Date.today().firstDayOfMonth(),
    timeHeaders: [{groupBy: "Day"}, {groupBy: "Hour"}, {groupBy: "Cell"}],
    timeRangeSelectedHandling: "Enabled",
    treeEnabled: true,
    treePreventParentUsage: true,
    onBeforeEventRender: args => {

      const text = DayPilot.Util.escapeHtml(args.data.text);
      const hours = new DayPilot.Duration(args.data.start, args.data.end).totalHours();

      // let hoursMinText = "";
      // if(hours=="0.25"){
      //   hoursMinText = "15";
      // }else if(hours=="0.5"){
      //   hoursMinText = "30";
      // }else if(hours=="0.75"){
      //   hoursMinText= "45";
      // }else {
      //   hoursMinText= "00";
      // }
      //  const hoursTxtHValue = hours.toString().split(".")?.[0] || "00";
      //  const hoursTxt = `${hoursTxtHValue}.${hoursMinText}`;

      // styling
      args.data.barColor = args.data.color;
      if (!args.data.barColor) {
        args.data.barColor = "#6aa84f";
      }

      // content
      args.data.html = `<div><b>${text}</b><br><span class='task-duration'>${hours} hours</span></div>`;

      // context menu icon
      args.data.areas = [
        {
          top: 15,
          right: 5,
          height: 16,
          width: 16,
          fontColor: "#666",
          symbol: "<?php echo base_url(); ?>externalServices/icons/daypilot.svg#minichevron-down-4",
          visibility: "Hover",
          action: "ContextMenu",
          style: "background-color: rgba(255, 255, 255, .5); border: 1px solid #666; box-sizing: border-box; cursor:pointer;"
        },
      ];
    },
    onBeforeCellRender: args => {
      if (args.cell.isParent) {
        args.cell.properties.backColor = "#eee";
      }
    },
    onTimeRangeSelected: args => {
      workOrderApp.schedulerTaskAdd(args.start, args.end, args.resource);
    },
    onEventClick: args => {
      workOrderApp.schedulerTaskEdit(args.e);
    },
    onEventMove: args => {
      workOrderApp.schedulerTaskMove(args.e.id(), args.newStart, args.newEnd, args.newResource, args.external);
    },
    onEventResize: args => {
      workOrderApp.schedulerTaskMove(args.e.id(), args.newStart, args.newEnd, args.e.resource(), false);
    },
    onEventResizing: args => {
      let duration = new DayPilot.Duration(args.start, args.end);
      if (duration.totalHours() > 8) {
        args.allowed = false;
      }
    },
    onTimeRangeSelecting: args => {
      let duration = new DayPilot.Duration(args.start, args.end);
      if (duration.totalHours() > 8) {
        args.allowed = false;
      }
    },
    contextMenu: new DayPilot.Menu({
      items: [
        {
          text: "Edit...",
          onClick: args => {
            workOrderApp.schedulerTaskEdit(args.source);
          }
        },
        {
          text: "-",
        },
        {
          text: "Unschedule",
          onClick: async args => {
            const ev = args.source;
            const {data: item} = await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_unschedule.php", {
              id: ev.data.id
            });

            scheduler.events.remove(ev);
            unscheduled.events.add(item);
          }
        },
        {
          text: "-",
        },
        {
          text: "Delete",
          onClick: args => {
            workOrderApp.schedulerClickDelete(args.source.id());
          }
        },
      ],
    })
  });
  scheduler.init();


  const unscheduled = new DayPilot.Queue("unscheduled", {

    eventHeight: 45,
    contextMenu: new DayPilot.Menu({
      items: [
        {
          text: "Edit...",
          onClick: args => {
            workOrderApp.queueTaskEdit(args.source);
          }
        },
        {
          text: "-",
        },
        {
          text: "Delete",
          onClick: args => {
            workOrderApp.queueTaskDelete(args.source.id());
          }
        },
      ]
    }),
    onEventClick: args => {
      workOrderApp.queueTaskEdit(args.e);
    },
    onEventMove: args => {
      workOrderApp.queueTaskMove(args.e, args.position, args.external, args.source);
    },
    onBeforeEventRender: args => {
      const duration = new DayPilot.Duration(args.data.start, args.data.end);

      args.data.html = "";

      args.data.barColor = args.data.color;
      if (!args.data.barColor) {
        args.data.barColor = "#6aa84f";
      }

      args.data.areas = [
        {
          top: 15,
          right: 5,
          height: 16,
          width: 16,
          fontColor: "#666",
          symbol: "<?php echo base_url(); ?>externalServices/icons/daypilot.svg#minichevron-down-4",
          visibility: "Hover",
          action: "ContextMenu",
          style: "background-color: rgba(255, 255, 255, .5); border: 1px solid #666; box-sizing: border-box; cursor:pointer;"
        },
        {
          top: 0,
          left: 10,
          bottom: 0,
          width: 12,
          fontColor: "#666",
          symbol: "<?php echo base_url(); ?>externalServices/icons/daypilot.svg#move-vertical",
          style: "cursor: move",
          visibility: "Hover",
          toolTip: "Drag task to the scheduler"
        },
        {
          top: 5,
          left: 30,
          text: args.data.text,
          fontColor: "#666",
        },
        {
          bottom: 5,
          left: 30,
          fontColor: "#666",
          text: workOrderApp.formatDuration(duration)
        }
      ];
    }
  });
  unscheduled.init();

  const workOrderApp = {
    elements: {
      addToQueue: document.querySelector("#addToQueue")
    },
    colors: [
      {name: "Green", id: null},
      {name: "Blue", id: "#3c78d8"},
      {name: "Red", id: "#cc4125"},
      {name: "Yellow", id: "#f1c232"},
    ],
    async schedulerClickDelete(id) {
      await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_delete.php", {id});
      scheduler.events.remove(id);
    },
    async schedulerLoad() {     
      const start = scheduler.visibleStart();
      const end = scheduler.visibleEnd();    
      const resources = JSON.parse(`<?php echo $usersdata; ?>`);      
      const promiseEvents = DayPilot.Http.get(`<?php echo base_url(); ?>externalServices/api/work_order_list.php?start=${start}&end=${end}`);
      const [{data: events}] = await Promise.all([promiseEvents]);   
      scheduler.update({resources, events});      
    },
    async queueLoad() {
      const {data} = await DayPilot.Http.get("<?php echo base_url(); ?>externalServices/api/work_order_unscheduled_list.php");
      const events = data.map(item => ({...item, duration: DayPilot.Duration.ofMinutes(item.duration)}));
      unscheduled.update({events});
    },
    async queueTaskDelete(id) {
      await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_delete.php", {id});
      unscheduled.events.remove(id);
    },
    queueTaskForm() {
      const durations = [
        {id: 60, name: "1 hour"},
        {id: 90, name: "1.5 hours"},
        {id: 120, name: "2 hours"},
        {id: 150, name: "2.5 hours"},
        {id: 180, name: "3 hours"},
        {id: 210, name: "3.5 hours"},
        {id: 240, name: "4 hours"},
        {id: 270, name: "4.5 hours"},
        {id: 300, name: "5 hours"},
        {id: 330, name: "5.5 hours"},
        {id: 360, name: "6 hours"},
        {id: 390, name: "6.5 hours"},
        {id: 420, name: "7 hours"},
        {id: 450, name: "7.5 hours"},
        {id: 480, name: "8 hours"},
      ];

      const form = [
        {name: 'Description', id: 'text', type: 'text',},
        {type: 'select', id: 'duration', name: 'Duration', options: durations,},
        {
          type: 'select',
          id: 'color',
          name: 'Color',
          options: workOrderApp.colors
        },
      ];

      return form;
    },

    startEndFromMinutes(minutes) {
      const start = new DayPilot.Date("2000-01-01");
      const end = start.addMinutes(minutes);
      return {start, end};
    },
    async queueTaskAdd() {

      const form = workOrderApp.queueTaskForm();

      const data = {
        text: "Task",
        duration: 60
      };

      const modal = await DayPilot.Modal.form(form, data);

      if (modal.canceled) {
        return;
      }

      const params = {
        ...modal.result,
        ...workOrderApp.startEndFromMinutes(modal.result.duration)
      };

      const {data: created} = await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_unscheduled_create.php", params);

      unscheduled.events.add(created);

    },
    formatDuration(duration) {
      let result = duration.hours() + "h ";

      if (duration.minutes() > 0) {
        result += duration.minutes() + "m";
      }

      return result;
    },
    async queueTaskEdit(e) {
      const item = e.data;
      const form = workOrderApp.queueTaskForm();

      const data = {
        ...item,
        duration: new DayPilot.Duration(item.start, item.end).totalMinutes()
      };

      const modal = await DayPilot.Modal.form(form, data);

      if (modal.canceled) {
        return;
      }

      const params = {
        ...modal.result,
        ...workOrderApp.startEndFromMinutes(modal.result.duration)
      }

      console.log("params", params);

      const {data: updated} = await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_unscheduled_update.php", params);

      unscheduled.events.update(updated);

    },
    async queueTaskMove(e, position, external, source) {
      const id = e.id();
      const {data: item} = await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_move.php", {id, position});
      if (external) {
        source.events.remove(e);
      }
    },
    async schedulerTaskAdd(start, end, resource) {
      const modal = await DayPilot.Modal.prompt("Create a new task:", "Task 1");

      scheduler.clearSelection();
      if (!modal.result) {
        return;
      }

      let params = {
        text: modal.result,
        start: start,
        end: end,
        resource: resource
      };

      const {data: result} = await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_create.php", params);

      scheduler.events.add(result);

    },
    async schedulerTaskEdit(e) {
     
      const {data: resources} = await DayPilot.Http.get("<?php echo base_url(); ?>externalServices/api/work_order_resources_flat.php");

      const form = [
        {
          id: 'text',
          name: 'Name',
        },
        {
          name: 'Start',
          id: 'start',
          dateFormat: 'd/M/yyyy h:mm tt',
          disabled: true
        },
        {
          id: 'end',
          name: 'End',
          dateFormat: 'd/M/yyyy h:mm tt',
          disabled: true
        },
        {
          type: 'select',
          id: 'resource',
          name: 'Employee',
          options: resources,
          disabled: true
        },
        {
          type: 'select',
          id: 'color',
          name: 'Color',
          options: workOrderApp.colors
        },
      ];

      const modal = await DayPilot.Modal.form(form, e.data);

      if (modal.canceled) {
        return;
      }

      await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_update.php", modal.result);

      const data = {
        ...e.data,
        text: modal.result.text,
        color: modal.result.color
      };

      scheduler.events.update(data);

    },
    async schedulerTaskMove(id, start, end, resource, external) {
      let params = {
        id,
        start,
        end,
        resource
      };

      await DayPilot.Http.post("<?php echo base_url(); ?>externalServices/api/work_order_move.php", params);

      if (external) {
        unscheduled.events.remove(id);
      }
    },
    init() {
      workOrderApp.elements.addToQueue.addEventListener("click", () => {
        workOrderApp.queueTaskAdd();
      });

      workOrderApp.queueLoad();
      workOrderApp.schedulerLoad();
    }
  };


  workOrderApp.init();


</script>

</body>
</html>
