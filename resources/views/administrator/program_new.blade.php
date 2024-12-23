@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'Menambahkan program')

@section('content')
    <form action="{{ route('mutate_admin_program_create') }}" method="post" enctype="multipart/form-data" id="myform">
        @csrf
        @error('program')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Program</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="program" @error('program') is-invalid @enderror
                value="{{ old('program') }}">
        </div>

        @error('gambar')
            <div class=" alert alert-danger">{{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label class="exampleInputEmail1" for="inputGroupFile01">Gambar</label>
            <img id="imagePreview" src="#" alt="Image Preview"
                style="display: none; height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" required name="gambar"
                value="{{ old('gambar') }}" accept="image/png, image/jpeg, image/jpg">
        </div>

        @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thumbnail</label>
            <img id="imagePreview2" src="#" alt="Image Preview"
                style="display: none; height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile02" required name="thumbnail"
                accept="image/png, image/jpg, image/jpeg">
        </div>

        @error('kategori')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kategori</label>
            <select class="form-select" id="dropwown-kategori" aria-label="Floating label disabled select example"
                name="id_categori" required value="{{ old('id_category') }}">
                <option selected value="">Daftar Kategori</option>
                @foreach ($programCategorisList as $item)
                    <option value="{{ $item->id }}" {{ old('id_categori') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        @error('tag')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tag</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="tag" @error('tag') is-invalid @enderror
                value="{{ old('tag') }}">
        </div>

        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">harga</label>
            <input type="number" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="harga" @error('harga') is-invalid @enderror
                value="{{ old('harga') }}">
        </div>

        @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">URL</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="url" @error('url') is-invalid @enderror
                value="{{ old('url') }}">
        </div>

        @error('des_variable')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>



        <section class="section">
            <div class="row">
                <div class="col-lg-6" style="width:100%">
                    <div class="card" style="height:500px;">
                        <!-- Quill Editor Default -->
                        {{-- <div id="editor" style="overflow:hidden"></div> --}}
                        <textarea name="editor" id="editor"></textarea>
                    </div>
                </div>
        </section>

        @error('call_center')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">call center</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="call_center"
                @error('call_center') is-invalid
            @enderror value="{{ old('call_center') }}">
        </div>

        @if (Auth::user()->role == '')
            <label for="floatingSelectDisabled">Instansi</label>
            <div class="form-floating">
                <select class="form-select" id="dropwown-instansi" aria-label="Floating label disabled select example"
                    name="instansi" required value="{{ old('instansi') }}">
                    <option selected value="">Daftar Instansi</option>
                    @foreach ($instansiList as $item)
                        <option value="{{ $item->id }}" {{ old('instansi') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                    {{-- {{{ old('instansi') }}} --}}
                </select>
            </div>
        @else
            <input type="hidden" name="instansi" value="{{ Auth::user()->instansi_id }}">
        @endif
        <br>
        {{-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="fitur">
        <label class="form-check-label" for="flexCheckDefault">
            FITUR
        </label>
    </div> --}}
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="fitur">
            <label class="form-check-label" for="flexCheckDefault">
                Jadikan sebagai program unggulan
            </label>
        </div>
        <br>
        <input type="hidden" id="des_variable" name="des_variable">
        <input class="btn btn-primary" type="submit" value="Kirim" id="kirim">
    </form>

    {{-- <script src="{{statics('js/markdown_editor.js?v=0.0.1')}}"></script> --}}
    <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
    <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat',
                    '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', '|',
                    //   'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    //   'textPartLanguage', '|',
                    //   'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Masukkan program detail',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true,
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: false
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });
    </script>

    {{-- <script>
  var inputHidden = document.getElementById('des_variable');
    document.querySelector("#kirim").addEventListener("click", function(event) {
        // Lakukan skrip JavaScript Anda di sini
        var nilaiP = document.querySelector('.quill-editor-default').innerHTML;
        nilaiP = nilaiP.split('</div>');
        //get hidden text and remove it
        inputHidden.value = nilaiP[0].replace(/<div.*?>/g, "");
        console.log(inputHidden.value)

        // Mencegah perilaku default dari form submit
        event.preventDefault();

        // Jalankan submit form secara manual setelah menjalankan skrip JavaScript
        document.getElementById("myform").submit();
    });
</script> --}}

    {{-- <script>
    document.getElementById('inputGroupFile01').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('imagePreview').setAttribute('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

</script> --}}
@endsection
