<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
      selector: 'textarea#editor',
      plugins: 'table lists wordcount image link media emoticons preview',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline | alignleft aligncenter alignright | lineheight indent outdent | align bullist numlist | preview | table media | link image | forecolor backcolor removeformat | charmap emoticons pagebreak anchor codesample | ltr rtl',
      toolbar_mode: 'sliding',
      content_style: 'body { font-family:Montserrat; font-size:12px }'
    });
  </script>
