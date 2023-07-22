// ###################### WINDOW LOAD #################################
$("img").attr({
  draggable: false,
  loading: "lazy",
});
$(window).on("load", function () {
  $(".preloader").delay(2000).fadeOut(500);
});
// ###################### SIMPLE DATATABLE #################################
$(".datatable").DataTable({
  // responsive: true,
  responsive: true,
  scrollX: false,
  language: {
    sLengthMenu: "Show _MENU_",
  },
  order: [[1, "asc"]],
  initComplete: function (settings, json) {
    $(".datatable").wrap(
      "<div class='drag mb-4 user-select-none' style='overflow:auto; width:100%;'></div>"
    );
  },
});
// ###################### CHECKBOX DATATABLE #################################
$("#datatableCheckbox").DataTable({
  // responsive: true,
  responsive: false,
  scrollX: false,
  language: {
    sLengthMenu: "Show _MENU_",
  },
  columnDefs: [
    {
      // className: "select-checkbox",
      targets: 0,
      checkboxes: {
        selectRow: true,
      },
    },
  ],
  select: {
    style: "multi",
    // selector: "td:first-child",
  },
  order: [[1, "asc"]],
  initComplete: function (settings, json) {
    $("#datatableCheckbox").wrap(
      "<div class='drag mb-4 user-select-none' style='overflow:auto; width:100%;'></div>"
    );
  },
});

var drag = 0;
$(".drag").on({
  mousemove: function (e) {
    var drag2 = e.pageX - this.offsetLeft;
    if (drag) this.scrollLeft = this.sx + drag - drag2;
  },
  mousedown: function (e) {
    this.sx = this.scrollLeft;
    drag = e.pageX - this.offsetLeft;
  },
});

$(document).on("mouseup", function () {
  drag = 0;
});

// $("#datatableFilter1").on("input", function (e) {
//   e.preventDefault();
//   $(".datatable").DataTable().search($(this).val()).draw();
// });

// ###################### DASHBOARD TOGGLER #################################
window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

// ###################### CK EDITOR #################################
var allEditors = document.querySelectorAll(".editor");
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i]);
}

// ###################### MULTI DATE PICKER #################################
//########### single data
const todaydatetime = new Date().toLocaleDateString().slice(0, 10);
jQuery(".selectDate").datetimepicker({
  format: "d/m/Y",
  datepicker: true,
  viewMode: "months",
  timepicker: false,
});
jQuery(".selectTime").datetimepicker({
  datepicker: false,
  timepicker: true,
  format: "H:i",
  step: 5,
});

$(".selectDate").attr("value", todaydatetime);

//############### multi date
jQuery(".startDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      maxDate: jQuery(".endDate").val() ? jQuery(".endDate").val() : false,
    });
  },
  timepicker: false,
});
jQuery(".endDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      minDate: jQuery(".startDate").val() ? jQuery(".startDate").val() : false,
    });
  },
  timepicker: false,
});
