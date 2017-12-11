/* globals requirejs */

requirejs(['jquery', 'app', 'moment', 'flot', 'flot-resize', 'flot-categories', 'flot-stack', 'flot-crosshair', 'bootstrap-daterangepicker'], function ($, App, moment) {
  'use strict';

  var d1 = [];
  for (var i = 0; i <= 10; i += 1) {
    d1.push([i, parseInt(Math.random() * 30)]);
  }

  var d2 = [];
  for (var j = 0; j <= 10; j += 1) {
    d2.push([j, parseInt(Math.random() * 30)]);
  }
  var stack = 0,
      bars = true,
      lines = false,
      steps = false;

  var banners = $.plot($('.banners'), [{ label: 'Views', backgroundColor: null, data: d1 }, { label: 'Clicks', data: d2 }], {
    series: {
      stack: stack,
      bars: {
        show: bars,
        barWidth: 0.4,
        fill: 0.9
      }
    },
    colors: ['#212d41', '#17c4bb'],
    grid: {
      show: true,
      aboveData: false,
      color: '#696969',
      backgroundColor: null,
      borderWidth: 1,
      borderColor: '#969696'
    },
    yaxis: {
      show: true,
      color: '#eef1f5',
      axisLabel: 'no of',
      position: 'left'
    },
    xaxis: {
      show: true,
      color: '#eef1f5',
      fill: 0.1,
      axisLabel: 'banner'
    }
  });

  $('#banner-report-daterange input').daterangepicker({
    opens: App.isRTL() ? 'left' : 'right',
    format: 'MM/DD/YYYY',
    separator: ' to ',
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    minDate: '01/01/2012',
    maxDate: '12/31/2018'
  }, function (start, end) {
    d1 = [];
    d2 = [];
    for (var i = 0; i <= 10; i += 1) {
      d1.push([i, parseInt(Math.random() * 30)]);
      d2.push([i, parseInt(Math.random() * 30)]);
    }
    var newData = [{ label: 'coupons', data: d1 }, { label: 'issues', data: d2 }];
    banners.setData(newData);
    banners.setupGrid(); //only necessary if your new data will change the axes or grid
    banners.draw();
    $('#banner-report-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });
  var offers = $.plot($('.offers'), [{ label: 'Views', data: d1 }, { label: 'Clicks', data: d2 }], {
    series: {
      stack: stack,
      bars: {
        show: bars,
        barWidth: 0.4,
        fill: 0.9
      }
    },
    colors: ['#212d41', '#17c4bb'],
    grid: {
      show: true,
      aboveData: false,
      color: '#696969',
      backgroundColor: null,
      borderWidth: 1,
      borderColor: '#969696'
    },
    yaxis: {
      show: true,
      color: '#eef1f5',
      axisLabel: 'no of',
      position: 'left'
    },
    xaxis: {
      show: true,
      color: '#eef1f5',
      fill: 0.1,
      axisLabel: 'banner'
    }
  });
  $('#offer-report-daterange input').daterangepicker({
    opens: App.isRTL() ? 'left' : 'right',
    format: 'MM/DD/YYYY',
    separator: ' to ',
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    minDate: '01/01/2012',
    maxDate: '12/31/2018'
  }, function (start, end) {
    d1 = [];
    d2 = [];
    for (var i = 0; i <= 10; i += 1) {
      d1.push([i, parseInt(Math.random() * 30)]);
      d2.push([i, parseInt(Math.random() * 30)]);
    }
    var newData = [{ label: 'Views', data: d1 }, { label: 'Clicks', data: d2 }];
    offers.setData(newData);
    offers.setupGrid(); //only necessary if your new data will change the axes or grid
    offers.draw();
    $('#offer-report-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });

  var locations = $.plot($('.locations'), [{ label: 'Views', data: d1 }, { label: 'Clicks', data: d2 }], {
    series: {
      stack: stack,
      bars: {
        show: bars,
        barWidth: 0.4,
        fill: 0.9
      }
    },
    colors: ['#212d41', '#17c4bb'],
    grid: {
      show: true,
      aboveData: false,
      color: '#696969',
      backgroundColor: null,
      borderWidth: 1,
      borderColor: '#969696'
    },
    yaxis: {
      show: true,
      color: '#eef1f5',
      axisLabel: 'no of',
      position: 'left'
    },
    xaxis: {
      show: true,
      color: '#eef1f5',
      fill: 0.1,
      axisLabel: 'banner'
    }
  });
  $('#location-report-daterange input').daterangepicker({
    opens: App.isRTL() ? 'left' : 'right',
    format: 'MM/DD/YYYY',
    separator: ' to ',
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    minDate: '01/01/2012',
    maxDate: '12/31/2018'
  }, function (start, end) {
    d1 = [];
    d2 = [];
    for (var i = 0; i <= 10; i += 1) {
      d1.push([i, parseInt(Math.random() * 30)]);
      d2.push([i, parseInt(Math.random() * 30)]);
    }
    var newData = [{ label: 'Devices', data: d1 }, { label: 'Clicks', data: d2 }];
    offers.setData(newData);
    offers.setupGrid(); //only necessary if your new data will change the axes or grid
    offers.draw();
    $('#location-report-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });
});
