window.onload = function () {

  $(function () {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar, #content').toggleClass('active');
    });
  });


}