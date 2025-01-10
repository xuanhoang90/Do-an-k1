import $ from 'jquery';
window.$ = window.jQuery = $;
import 'datatables.net-bs5/css/dataTables.bootstrap5.css';
import DataTable from 'datatables.net-bs5';

export default (function () {
  $('#dataTable').DataTable({
    order: [[1, 'asc']], // Sắp xếp cột thứ hai (Age) theo thứ tự tăng dần
  });
}());
