<x-app-layout>
  {{-- Aset untuk Trix Editor (CSS & JS) --}}
  <x-slot name="header">
    {{-- CSS Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    {{-- JS Trix Editor --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Article') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

        @if($errors->any())
        <div class="alert alert-danger mb-4">
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.artikels.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Judul Artikel --}}
          <div>
            <x-input-label for="tittle" :value="__('Judul Artikel')" required />
            <x-text-input id="tittle" class="block mt-1 w-full" type="text" name="tittle" :value="old('tittle')" required autofocus />
          </div>

          {{-- Slug Artikel --}}
          <div class="mt-4">
            <x-input-label for="slug" :value="__('Slug Artikel')" required />
            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
          </div>

          {{-- Writer --}}
          <div class="mt-4">
            <x-input-label for="writer" :value="__('Penulis Artikel')" required />
            <x-text-input id="wiriter" class="block mt-1 w-full" type="text" name="writer" :value="old('writer')" required />
          </div>

          
          {{-- Content (Trix Editor) --}}
          <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" required />
            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
            <trix-editor input="content" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></trix-editor>
          </div>

          {{-- Upload Thumbnail --}}
          <div class="mt-4">
            <x-input-label for="thumbnail" :value="__('Upload Thumbnail')" required />
            <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required />
          </div>

          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
              Publish Article
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script>
    // Script untuk slug otomatis
    const tittleInput = document.querySelector('#tittle');
    const slugInput = document.querySelector('#slug');

    tittleInput.addEventListener('input', function() {
      // Konversi judul menjadi slug
      let slug = tittleInput.value.toLowerCase(); // ke huruf kecil
      slug = slug.replace(/ /g, '-'); // ganti spasi dengan -
      slug = slug.replace(/[^\w-]+/g, ''); // hapus karakter aneh

      slugInput.value = slug;
    });

    // Script untuk mencegah Trix Editor menimpa input value 'old'
    document.addEventListener('trix-before-initialize', () => {
      const editor = document.querySelector('trix-editor');
      const hiddenInput = document.querySelector('#content');

      if (hiddenInput.value) {
        editor.editor.loadHTML(hiddenInput.value);
      }
    });

    // URL endpoint yang kita buat di routes/web.php
    const TRIX_UPLOAD_URL = "{{ route('admin.trix.attachments.store') }}";
    const TRIX_DESTROY_URL = "{{ route('admin.trix.attachments.destroy') }}";

    // Cegat event saat file ditambahkan ke Trix
    document.addEventListener("trix-attachment-add", function(event) {
        // Cek jika yang ditambahkan adalah file
        if (event.attachment.file) {
            // Jalankan fungsi upload
            uploadTrixFile(event.attachment);
        }
    });

    // Cegat event saat file dihapus dari Trix
    document.addEventListener("trix-attachment-remove", function(event) {
        // Jalankan fungsi hapus
        deleteTrixFile(event.attachment);
    });

    function uploadTrixFile(attachment) {
        // Buat FormData untuk dikirim via AJAX
        const formData = new FormData();
        formData.append("attachment", attachment.file);

        // Kirim file ke server
        fetch(TRIX_UPLOAD_URL, {
            method: "POST",
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
        .then(response => response.json())
        .then(data => {
            // Jika berhasil, Trix akan menggunakan URL yang dikembalikan server
            attachment.setAttributes({
                url: data.url,
                href: data.url,
            });
        })
        .catch(error => console.error('Trix upload error:', error));
    }

    function deleteTrixFile(attachment) {
        fetch(TRIX_DESTROY_URL, {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ 'attachment_url': attachment.attachment.attributes.values.url })
        })
        .then(response => {
            if (response.ok) {
                console.log('Attachment deleted successfully');
            }
        })
        .catch(error => console.error('Trix deletion error:', error));
    }
  </script>
</x-app-layout>