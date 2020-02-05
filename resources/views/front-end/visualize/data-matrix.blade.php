@extends('front-end.main-layout')

@section('content')

<link rel="stylesheet" href="/plugin/SlickGrid-2.4.18/slick.grid.css" type="text/css"/>
  <link rel="stylesheet" href="/plugin/SlickGrid-2.4.18/controls/slick.pager.css" type="text/css"/>
  <link rel="stylesheet" href="/plugin/SlickGrid-2.4.18/css/smoothness/jquery-ui.css" type="text/css"/>
  <link rel="stylesheet" href="/plugin/SlickGrid-2.4.18/examples/examples.css" type="text/css"/>
  <link rel="stylesheet" href="/plugin/SlickGrid-2.4.18/controls/slick.columnpicker.css" type="text/css"/>
  <style>
    .cell-effort-driven {
      text-align: center;
    }

    .slick-group-title[level='0'] {
      font-weight: bold;
    }

    .slick-group-title[level='1'] {
      text-decoration: underline;
    }

    .slick-group-title[level='2'] {
      font-style: italic;
    }
  </style>
<div class="the-data-grid" style="position:relative">
  <div style="width:100%;">
    <div class="grid-header" style="width:100%">
      <label>Data Matrix</label>
    </div>
    <div id="myGrid" style="width:100%;height:500px;"></div>
    <div id="pager" style="width:100%;height:20px;"></div>
  </div>
</div>

@endsection

@section('scripts')
<script src="/plugin/SlickGrid-2.4.18/lib/firebugx.js"></script>

<script src="/plugin/SlickGrid-2.4.18/lib/jquery-1.12.4.min.js"></script>
<script src="/plugin/SlickGrid-2.4.18/lib/jquery-ui.min.js"></script>
<script src="/plugin/SlickGrid-2.4.18/lib/jquery.event.drag-2.3.0.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.core.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.formatters.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.editors.js"></script>
<script src="/plugin/SlickGrid-2.4.18/plugins/slick.cellrangedecorator.js"></script>
<script src="/plugin/SlickGrid-2.4.18/plugins/slick.cellrangeselector.js"></script>
<script src="/plugin/SlickGrid-2.4.18/plugins/slick.cellselectionmodel.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.grid.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.groupitemmetadataprovider.js"></script>
<script src="/plugin/SlickGrid-2.4.18/slick.dataview.js"></script>
<script src="/plugin/SlickGrid-2.4.18/controls/slick.pager.js"></script>
<script src="/plugin/SlickGrid-2.4.18/controls/slick.columnpicker.js"></script>

<script>
function isIEPreVer9() { var v = navigator.appVersion.match(/MSIE ([\d.]+)/i); return (v ? v[1] < 9 : false); }

var dataView;
var grid;
var data = [];
var columns = [
  // {id: "sel", name: "", field: "num", cssClass: "cell-selection", width: 40, resizable: false, selectable: false, focusable: false },
  {id: "title", name: "Title", field: "title", width: 200, minWidth: 50, cssClass: "cell-title", sortable: true, editor: Slick.Editors.Text},
  {id: "duration", name: "LTP", field: "duration", width: 70, sortable: true},
  {id: "duration", name: "YCP", field: "duration", width: 70, sortable: true},
  {id: "cost", name: "Pub%", field: "cost", width: 90, sortable: true},
  {id: "start", name: "Volume", field: "cost", width: 90, sortable: true},
  {id: "finish", name: "Value", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Trade", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "P/E", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "EPS", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "P/E", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "EPS", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Paid Up", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Dir%", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Pub%", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Inst%", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "For%", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "Gov%", field: "cost", width: 90, sortable: true},
  {id: "cost", name: "NAV", field: "cost", width: 90, sortable: true},
 
];

var options = {
  enableCellNavigation: true,
  editable: true
};

var sortcol = "title";
var sortdir = 1;
var percentCompleteThreshold = 0;
var prevPercentCompleteThreshold = 0;

function avgTotalsFormatter(totals, columnDef, grid) {
  var val = totals.avg && totals.avg[columnDef.field];
  if (val != null) {
    return "avg: " + Math.round(val) + "%";
  }
  return "";
}

function sumTotalsFormatter(totals, columnDef, grid) {
  var val = totals.sum && totals.sum[columnDef.field];
  if (val != null) {
    return "total: " + ((Math.round(parseFloat(val)*100)/100));
  }
  return "";
}

function myFilter(item, args) {
  return item["percentComplete"] >= args.percentComplete;
}

function percentCompleteSort(a, b) {
  return a["percentComplete"] - b["percentComplete"];
}

function comparer(a, b) {
  var x = a[sortcol], y = b[sortcol];
  return (x == y ? 0 : (x > y ? 1 : -1));
}

function groupByDuration() {
  dataView.setGrouping({
    getter: "duration",
    formatter: function (g) {
      return "Sector:  " + g.value + "  <span style='color:green'>(" + g.count + " items)</span>";
    },
    aggregators: [
      new Slick.Data.Aggregators.Avg("percentComplete"),
      new Slick.Data.Aggregators.Sum("cost")
    ],
    aggregateCollapsed: false,
    lazyTotalsCalculation: true
  });
}

function groupByDurationOrderByCount(aggregateCollapsed) {
  dataView.setGrouping({
    getter: "duration",
    formatter: function (g) {
      return "Duration:  " + g.value + "  <span style='color:green'>(" + g.count + " items)</span>";
    },
    comparer: function (a, b) {
      return a.count - b.count;
    },
    aggregators: [
      new Slick.Data.Aggregators.Avg("percentComplete"),
      new Slick.Data.Aggregators.Sum("cost")
    ],
    aggregateCollapsed: aggregateCollapsed,
    lazyTotalsCalculation: true
  });
}

function groupByDurationEffortDriven() {
  dataView.setGrouping([
    {
      getter: "duration",
      formatter :function (g) {
        return "Duration:  " + g.value + "  <span style='color:green'>(" + g.count + " items)</span>";
      },
      aggregators: [
        new Slick.Data.Aggregators.Sum("duration"),
        new Slick.Data.Aggregators.Sum("cost")
      ],
      aggregateCollapsed: true,
      lazyTotalsCalculation: true
    },
    {
      getter: "effortDriven",
      formatter :function (g) {
        return "Effort-Driven:  " + (g.value ? "True" : "False") + "  <span style='color:green'>(" + g.count + " items)</span>";
      },
      aggregators: [
        new Slick.Data.Aggregators.Avg("percentComplete"),
        new Slick.Data.Aggregators.Sum("cost")
      ],
      collapsed: true,
      lazyTotalsCalculation: true
    }
  ]);
}

function groupByDurationEffortDrivenPercent() {
  dataView.setGrouping([
    {
      getter: "duration",
      formatter: function (g) {
        return "Duration:  " + g.value + "  <span style='color:green'>(" + g.count + " items)</span>";
      },
      aggregators: [
        new Slick.Data.Aggregators.Sum("duration"),
        new Slick.Data.Aggregators.Sum("cost")
      ],
      aggregateCollapsed: true,
      lazyTotalsCalculation: true
    },
    {
      getter: "effortDriven",
      formatter: function (g) {
        return "Effort-Driven:  " + (g.value ? "True" : "False") + "  <span style='color:green'>(" + g.count + " items)</span>";
      },
      aggregators :[
        new Slick.Data.Aggregators.Sum("duration"),
        new Slick.Data.Aggregators.Sum("cost")
      ],
      lazyTotalsCalculation: true
    },
    {
      getter: "percentComplete",
      formatter: function (g) {
        return "% Complete:  " + g.value + "  <span style='color:green'>(" + g.count + " items)</span>";
      },
      aggregators: [
        new Slick.Data.Aggregators.Avg("percentComplete")
      ],
      aggregateCollapsed: true,
      collapsed: true,
      lazyTotalsCalculation: true
    }
  ]);
}

function loadData(count) {
  var someDates = ["01/01/2009", "02/02/2009", "03/03/2009"];
  data = [];
  // prepare the data
  for (var i = 0; i < count; i++) {
    var d = (data[i] = {});

    d["id"] = "id_" + i;
    d["num"] = i;
    d["title"] = "Company " + i;
    d["duration"] = Math.round(Math.random() * 30);
    d["percentComplete"] = Math.round(Math.random() * 100);
    d["start"] = someDates[ Math.floor((Math.random()*2)) ];
    d["finish"] = someDates[ Math.floor((Math.random()*2)) ];
    d["cost"] = Math.round(Math.random() * 10000) / 100;
    d["effortDriven"] = (i % 5 == 0);
  }
  dataView.setItems(data);
}


$(".grid-header .ui-icon")
    .addClass("ui-state-default ui-corner-all")
    .mouseover(function (e) {
      $(e.target).addClass("ui-state-hover")
    })
    .mouseout(function (e) {
      $(e.target).removeClass("ui-state-hover")
    });

$(function () {
  var groupItemMetadataProvider = new Slick.Data.GroupItemMetadataProvider();
  dataView = new Slick.Data.DataView({
    groupItemMetadataProvider: groupItemMetadataProvider,
    inlineFilters: true
  });
  grid = new Slick.Grid("#myGrid", dataView, columns, options);

  // register the group item metadata provider to add expand/collapse group handlers
  grid.registerPlugin(groupItemMetadataProvider);
  grid.setSelectionModel(new Slick.CellSelectionModel());

  var pager = new Slick.Controls.Pager(dataView, grid, $("#pager"));
  var columnpicker = new Slick.Controls.ColumnPicker(columns, grid, options);


  grid.onSort.subscribe(function (e, args) {
    sortdir = args.sortAsc ? 1 : -1;
    sortcol = args.sortCol.field;

    if (isIEPreVer9()) {
      // using temporary Object.prototype.toString override
      // more limited and does lexicographic sort only by default, but can be much faster

      var percentCompleteValueFn = function () {
        var val = this["percentComplete"];
        if (val < 10) {
          return "00" + val;
        } else if (val < 100) {
          return "0" + val;
        } else {
          return val;
        }
      };

      // use numeric sort of % and lexicographic for everything else
      dataView.fastSort((sortcol == "percentComplete") ? percentCompleteValueFn : sortcol, args.sortAsc);
    }
    else {
      // using native sort with comparer
      // preferred method but can be very slow in IE with huge datasets
      dataView.sort(comparer, args.sortAsc);
    }
  });

  // wire up model events to drive the grid
  dataView.onRowCountChanged.subscribe(function (e, args) {
    grid.updateRowCount();
    grid.render();
  });

  dataView.onRowsChanged.subscribe(function (e, args) {
    grid.invalidateRows(args.rows);
    grid.render();
  });


  var h_runfilters = null;

  // wire up the slider to apply the filter to the model
  $("#pcSlider,#pcSlider2").slider({
    "range": "min",
    "slide": function (event, ui) {
      Slick.GlobalEditorLock.cancelCurrentEdit();

      if (percentCompleteThreshold != ui.value) {
        window.clearTimeout(h_runfilters);
        h_runfilters = window.setTimeout(filterAndUpdate, 10);
        percentCompleteThreshold = ui.value;
      }
    }
  });


  function filterAndUpdate() {
    var isNarrowing = percentCompleteThreshold > prevPercentCompleteThreshold;
    var isExpanding = percentCompleteThreshold < prevPercentCompleteThreshold;
    var renderedRange = grid.getRenderedRange();

    dataView.setFilterArgs({
      percentComplete: percentCompleteThreshold
    });
    dataView.setRefreshHints({
      ignoreDiffsBefore: renderedRange.top,
      ignoreDiffsAfter: renderedRange.bottom + 1,
      isFilterNarrowing: isNarrowing,
      isFilterExpanding: isExpanding
    });
    dataView.refresh();

    prevPercentCompleteThreshold = percentCompleteThreshold;
  }

  // initialize the model after all the events have been hooked up
  dataView.beginUpdate();
  dataView.setFilter(myFilter);
  dataView.setFilterArgs({
    percentComplete: percentCompleteThreshold
  });
  loadData(50);
  groupByDuration();
  dataView.endUpdate();

  $("#gridContainer").resizable();
})
</script>


@endsection