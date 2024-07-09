$(function () {
    $('.sidebar-menu a').each(function () {
        let location = window.location.origin + window.location.pathname;
        let link = this.href;
        if (link === location) {
            $('.sidebar-menu li').removeClass('active');
            $(this).closest('li').addClass('active');
            $(this).closest('.treeview').addClass('active');
        }
    });
});
