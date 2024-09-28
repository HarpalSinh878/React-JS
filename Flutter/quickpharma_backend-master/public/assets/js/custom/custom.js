$(".menu-item a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];
    //console.log(this.href);
    if (this.href == pageUrl) {
        $(this).parent().addClass("here"); // add active to li of the current link
        // $(this).addClass("here");
        // $(this).parent().parent().prev().addClass("here"); // add active class to an anchor
    }
});


function Request() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;



    var dt = new Date();
    var h = dt.getHours(),
        m = dt.getMinutes();
    var time = (h > 12) ? (h - 12 + ':' + m + ' PM') : (h + ':' + m + ' AM');


    $("#current_date").text(today);
    $("#current_time").text(time);
    $("#hiddentime").css("display", "block");
    $('#callback_model').modal('toggle');

}


$(function () {
    // First register any plugins
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateSize, FilePondPluginFileValidateType);
    // Turn input element into a pond
    $('.filepond').filepond({
        credits: null,
        allowFileSizeValidation: "true",
        maxFileSize: '1MB',
        labelMaxFileSizeExceeded: 'File is too large',
        labelMaxFileSize: 'Maximum file size is {filesize}',
        allowFileTypeValidation: true,
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        labelFileTypeNotAllowed: 'File of invalid type',
        fileValidateTypeLabelExpectedTypes: 'Expects {allButLastType} or {lastType}',
        storeAsFile: true
    });
});



function confirmationDelete(e) {
    var url = e.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty

    $('#form-del').attr('action', url);
    Swal.fire({
        title: 'Are You Sure Want to Delete This Record??',
        icon: 'error',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyCanceButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $("#form-del").submit();
        } else {
            $('#form-del').attr('action', '');
        }
    })
    return false;
}


$(".flatpickr").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});


/// START :: TinyMCE
document.addEventListener("DOMContentLoaded", () => {
    tinymce.init({
        selector: '#tinymce_editor',
        height: 400,
        menubar: true,
        plugins: [
            'advlist autolink lists link charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime table contextmenu paste code help wordcount'
        ],

        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        setup: function (editor) {
            editor.on("change keyup", function (e) {
                //tinyMCE.triggerSave(); // updates all instances
                editor.save(); // updates this instance's textarea
                $(editor.getElement()).trigger('change'); // for garlic to detect change
            });
        }
    });
});
/// END :: TinyMCE