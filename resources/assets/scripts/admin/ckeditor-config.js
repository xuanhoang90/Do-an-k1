class MyUploadAdapter {
  constructor(loader) {
    this.loader = loader;
  }

  upload() {
    return this.loader.file.then(file => {
      const data = new FormData();
      data.append('upload', file);

      return fetch("{{ route('admin.image.upload') }}", {
        method: 'POST',
        body: data,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
        .then(response => response.json())
        .then(result => {
            if (!result || !result.url) {
                return Promise.reject('Upload failed');
            }

            return {
                default: result.url
            };
        });
    });
  }

  abort() {
    // Xử lý khi hủy upload
  }
}

function MyCustomUploadAdapterPlugin(editor) {
  editor.plugins.get('FileRepository').createUploadAdapter = loader => {
      return new MyUploadAdapter(loader);
  };
}

const {
  ClassicEditor,
  Essentials,
  Bold,
  Italic,
  Font,
  Paragraph,
  Autoformat,
  AutoImage,
  Autosave,
  BlockQuote,
  CKBox,
  CKBoxImageEdit,
  CloudServices,
  Heading,
  ImageBlock,
  ImageCaption,
  ImageInline,
  ImageInsert,
  ImageInsertViaUrl,
  ImageResize,
  ImageStyle,
  ImageTextAlternative,
  ImageToolbar,
  ImageUpload,
  // SimpleUploadAdapter,
  Indent,
  IndentBlock,
  Link,
  LinkImage,
  List,
  ListProperties,
  MediaEmbed,
  PasteFromOffice,
  PictureEditing,
  Table,
  TableCaption,
  TableCellProperties,
  TableColumnResize,
  TableProperties,
  TableToolbar,
  TextTransformation,
  TodoList,
  Underline
} = CKEDITOR;

ClassicEditor
.create( document.querySelector( '#editor' ), {
  licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjYxODg3OTksImp0aSI6IjY3NWJhMjkyLTQ3NDktNGE1Ny05NGM1LWQ5YTRkMzExOTIyZiIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiZGY2YTRiNTcifQ.PENecmKLnriWaPmVaiBzy64EiV8dYujJzpkklwr7-_ystVV77cYfpJf-_riVZ2b4QBVA64N_L52RbOMhh2yqlA', // Create a free account on https://portal.ckeditor.com/checkout?plan=free
  plugins: [
    Autoformat,
    AutoImage,
    Autosave,
    BlockQuote,
    Bold,
    CKBoxImageEdit,
    CloudServices,
    Essentials,
    Heading,
    ImageBlock,
    ImageCaption,
    ImageInline,
    ImageInsert,
    ImageInsertViaUrl,
    ImageResize,
    ImageStyle,
    ImageTextAlternative,
    ImageToolbar,
    ImageUpload,
    Indent,
    IndentBlock,
    Italic,
    Link,
    LinkImage,
    List,
    ListProperties,
    MediaEmbed,
    Paragraph,
    PasteFromOffice,
    PictureEditing,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TextTransformation,
    TodoList,
    Underline,
  ],
  toolbar: [
    'heading',
    '|',
    'bold',
    'italic',
    'underline',
    '|',
    'link',
    'uploadImage',
    'mediaEmbed',
    'insertTable',
    'blockQuote',
    '|',
    'bulletedList',
    'numberedList',
    'todoList',
    'outdent',
    'indent'
  ],
  extraPlugins: [MyCustomUploadAdapterPlugin],
  mediaEmbed: {
    provider: 'youtube',
  }
} )
.then( editor => {
  window.editor = editor;
} )
.catch( error => {
  console.error( error );
} );
