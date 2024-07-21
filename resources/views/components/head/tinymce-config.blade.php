<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
      selector: 'textarea#editor',
      plugins: 'table lists wordcount image link media emoticons preview',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline | alignleft aligncenter alignright | lineheight indent outdent | align bullist numlist | preview | table media | link image | forecolor backcolor removeformat | charmap emoticons pagebreak anchor codesample blockquote | ltr rtl',
      toolbar_mode: 'sliding',
      content_style: 'body { font-family:Montserrat; font-size:12px }',
      file_picker_types: 'image',
      file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },
    });
  </script>
