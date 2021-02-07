$(function() {


    tinymce.init({
        selector: '.editor',
        width: '1000px'
    });



    $('#myDataTable').DataTable({
        ordering: false
    });
    //=======Sweetalart gloval setup
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    //=======  / Sweetalart gloval setup


    //======= ajax csrf token
    $.ajaxSetup({
            headers: {
                'X_CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        //======= / ajax csrf token

    //===== form submit through ajax
    $('body').on('submit', '.create-product', function(e) {
        e.preventDefault();
        //let token = $('input[name="_token"]').val();
        // let token = $('meta[name="csrf-token"]').attr('content');
        // alert(token);

        $.ajax({
            url: '/staff/product',
            method: 'POST',
            contentType: false,
            processData: false,
            data: new FormData(this), //$(this).serialize()
            success: function(data) {

                if ($.isEmptyObject(data.error)) {

                    if (data.success) {
                        // $('.show-error-msg').css('display', 'none');
                        //$('.show-success-msg').css('display', 'block').append(data.success) //showing error through custom function ,but here  we are using toaster for message

                        toastr.success(data.success); // toaster message success


                        /*    Toast.fire({ //sweetalart success message in top right
                                icon: 'success',
                                title: data.success //title: 'Signed in successfully' //we can pass string for specific perpose
                            })
                        */
                        $('.create-product')[0].reset();
                        $('#specialPriceBox').css('display', 'none');
                        $('#warrantyBox').css('display', 'none');

                    } else {
                        toastr.error(data.unable);
                    }


                } else {
                    //showErrorMsg(data.error); //showing error through custom function ,but here  we are using toaster for message
                    $.each(data.error, function(key, value) {
                        toastr.error(value); // toaster message error
                    })

                    /* Toast.fire({ //sweetalart error message in top right
                         icon: 'error',
                         title: data.error
                     })*/
                }


            }


        })

    });

    //showing error through custom function ,but here  we are using toaster for message
    function showErrorMsg(message) {
        $('.show-error-msg').find('ul').html('');
        $('.show-error-msg').css('display', 'block');
        //$('.show-error-msg').css('display', 'block').find('ul').html(''); we can chain above two line

        $.each(message, function(key, value) {
            $('.show-error-msg').find('ul').append('<li>' + value + '</li>')
        })
    }





    $('#specialPrice').click(function() {
        $('#specialPriceBox').slideToggle();
    })

    /*
    function convartToSlug(text, place) {
        text = text.toLowerCase();
        text = text.replace(/[^a-zA-Z0-9]+/g, '-');
        $(place).val(text);
    }*/

    //mySlug
    $("#name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });

    $('#wYes').change(function() {
        $('#warrantyBox').slideDown('slow');
    })
    $('#wNo').change(function() {
        $('#warrantyBox').slideUp('slow');
    })
    $('.datePicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm'
    });





    //Multiple Images Prewiew

    function imagesPreview(input, place) {
        if (input.files) {
            $(place).html('');
            let filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-fluid img-thumbnail" style="height: 100px;width:100px" alt="">')).attr('src', event.target.result);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $('body').on('change', '#images', function() {
        imagesPreview(this, '.product_gallery');
    });
    $('body').on('change', '#thumbnail', function() {
        imagesPreview(this, '.thumbnail');
    });

    /* // Multiple images preview in browser
     var imagesPreview = function(input, placeToInsertImagePreview) {

         if (input.files) {
             var filesAmount = input.files.length;

             for (i = 0; i < filesAmount; i++) {
                 var reader = new FileReader();

                 reader.onload = function(event) {
                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                 }

                 reader.readAsDataURL(input.files[i]);
             }
         }

     }; */

    $('#thumb').on('change', function() {
        imagesPreview(this, '.thumbnail');
    });



})