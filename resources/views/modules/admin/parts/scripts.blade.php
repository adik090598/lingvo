<script src="{{asset('modules/admin/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/sidebar-nav.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/main.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/toastr.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/ou58zm6rwxtnq8stxacj2cvblckxfdh191buiafnhwirnn54/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    toastr.options.closeButton = true;
    @if(session()->has('success'))
    toastr.success("{!! session()->get('success') !!}");
    @endif

    @if(session()->has('info'))
    toastr.info("{!! session()->get('info') !!}");
    @endif

    @if(session()->has('error'))
    toastr.error("{!! session()->get('error') !!}");
    @endif

    @if(session()->has('warning'))
    toastr.warning("{!!session()->get('warning') !!}");
    @endif
    // tinymce.init({
    //     selector: '#description',
    //     plugins: 'image code',
    //     height: 300,
    //     toolbar: 'undo redo | link image | code',
    //     /* enable title field in the Image dialog*/
    //     image_title: true,
    //     /* enable automatic uploads of images represented by blob or data URIs*/
    //     automatic_uploads: true,
    //     /*
    //       URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    //       images_upload_url: 'postAcceptor.php',
    //       here we add custom filepicker only to Image dialog
    //     */
    //     file_picker_types: 'image',
    //     /* and here's our custom image picker*/
    //     file_picker_callback: function (cb, value, meta) {
    //         var input = document.createElement('input');
    //         input.setAttribute('type', 'file');
    //         input.setAttribute('accept', 'image/*');
    //
    //         /*
    //           Note: In modern browsers input[type="file"] is functional without
    //           even adding it to the DOM, but that might not be the case in some older
    //           or quirky browsers like IE, so you might want to add it to the DOM
    //           just in case, and visually hide it. And do not forget do remove it
    //           once you do not need it anymore.
    //         */
    //
    //         input.onchange = function () {
    //             var file = this.files[0];
    //
    //             var reader = new FileReader();
    //             reader.onload = function () {
    //                 /*
    //                   Note: Now we need to register the blob in TinyMCEs image blob
    //                   registry. In the next release this part hopefully won't be
    //                   necessary, as we are looking to handle it internally.
    //                 */
    //                 var id = 'blobid' + (new Date()).getTime();
    //                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
    //                 var base64 = reader.result.split(',')[1];
    //                 var blobInfo = blobCache.create(id, file, base64);
    //                 blobCache.add(blobInfo);
    //
    //                 /* call the callback and populate the Title field with the file name */
    //                 cb(blobInfo.blobUri(), { title: file.name });
    //             };
    //             reader.readAsDataURL(file);
    //         };
    //
    //         input.click();
    //     },
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    // });
    // tinymce.init({
    //     selector: 'textarea.description',
    //     file_picker_callback: function(callback, value, meta) {
    //         // Provide file and text for the link dialog
    //         if (meta.filetype == 'file') {
    //             callback('mypage.html', {text: 'My text'});
    //         }
    //
    //         // Provide image and alt text for the image dialog
    //         if (meta.filetype == 'image') {
    //             callback('myimage.jpg', {alt: 'My alt text'});
    //         }
    //
    //         // Provide alternative source and posted for the media dialog
    //         if (meta.filetype == 'media') {
    //             callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    //         }
    //     },
    //     height: 300,
    //     // images_upload_url: '/images/questions',
    //     // automatic_uploads: false,
    //     menubar: 'insert',
    //     plugins: [
    //         'advlist autolink lists link image charmap print preview anchor',
    //         'searchreplace visualblocks code fullscreen',
    //         'insertdatetime media table paste code help wordcount', 'image'
    //     ],
    //     toolbar: 'undo redo | formatselect | ' +
    //         'bold italic backcolor | alignleft aligncenter ' +
    //         'alignright alignjustify | bullist numlist outdent indent | ' +
    //         'removeformat | help | image',
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    //
    // });
</script>
