$(document).ready(() => {
    var showAlert = (message, type) => {
        return `<div class="alert alert-${type} alert-dismissible">
            <p>${message}</p>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>`;
    }

    //summernote editor
    $('.summernote').summernote({
        height: 150,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']]
          ]
    });

    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']]
          ]
    });

    //toggle admin dashboard nav
    var navIcon = $('.nav-icon');
    navIcon.on('click', () => {
        $('.sidenav').toggleClass('active');
    });
   
});