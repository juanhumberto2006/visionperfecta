@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrar producto</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Registrar un producto</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ url('/admin/productos') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Categoria <b style="color: red">(*)</b></label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                            </div>
                                            <select name="categoria_id" id="" class="form-control" required>
                                                <option value="">Seleccione una categoría...</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}"
                                                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                                        {{ $categoria->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo">Codigo <b style="color: red">(*)</b></label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input type="text" value="{{ old('codigo') }}" class="form-control"
                                                id="codigo" name="codigo"
                                                placeholder="Ingrese el codigo del producto..." required>
                                        </div>
                                        @error('codigo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                </div>
                                                <input type="text" value="{{ old('nombre') }}" class="form-control"
                                                    id="nombre" name="nombre"
                                                    placeholder="Ingrese el nombre del producto..." required>
                                            </div>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion <b style="color: red">(*)</b></label>
                                            <div class="editor-wrapper">
                                                <textarea name="descripcion" id="descripcion" ></textarea>
                                            </div>
                                        </div>
                                        @error('descripcion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio compra <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="text" value="{{ old('precio_compra') }}" class="form-control"
                                                    id="precio_compra" name="precio_compra"
                                                    required>
                                            </div>
                                        @error('imagen')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio de venta <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="text" value="{{ old('precio_venta') }}" class="form-control"
                                                    id="precio_venta" name="precio_venta"
                                                    required>
                                            </div>
                                        @error('precio_venta')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock minimo <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="text" value="{{ old('stock_minimo') }}" class="form-control"
                                                    id="stock_minimo" name="stock_minimo"
                                                    required>
                                            </div>
                                        @error('stock_minimo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Stock maximo <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="text" value="{{ old('stock_maximo') }}" class="form-control"
                                                    id="stock_maximo" name="stock_maximo"
                                                    required>
                                            </div>
                                        @error('stock_maximo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Unidad de  medida <b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>
                                                <select name="unidad_medida" id="" class="form-control">
                                                    <option value="">Seleccione una unidad de medida</option>
                                                    <option value="unidad">Unidad</option>
                                                    <option value="kg">Kg</option>
                                                    <option value="litro">Litro</option>
                                                    <option value="paquete">Paquete</option>
                                                </select>
                                            </div>
                                        @error('stock_maximo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado">Estado <br><b style="color: red">(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                                </div>
                                                <select name="estado" id="" class="form-control">
                                                    <option value="">Seleccione una unidad de medida</option>
                                                    <option value="1" {{ old('activa') == 1 ? 'selected' : '' }}>Activo</option>
                                                    <option value="0" {{ old('activa') == 0 ? 'selected' : '' }}>Inactivo</option>
                                                </select>
                                            </div>
                                        @error('stock_maximo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen">Imagen del producto</label>
                                        <p class="text-muted small">Selecciona una opción:</p>
                                        
                                        <div class="mb-2">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="imagenTipoArchivo" name="imagen_tipo" value="archivo" class="custom-control-input" checked onchange="toggleImagenInput()">
                                                <label class="custom-control-label" for="imagenTipoArchivo">Subir archivo</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="imagenTipoUrl" name="imagen_tipo" value="url" class="custom-control-input" onchange="toggleImagenInput()">
                                                <label class="custom-control-label" for="imagenTipoUrl">URL externa</label>
                                            </div>
                                        </div>

                                        <div id="inputArchivo">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="file" class="form-control"
                                                    id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)"> 
                                            </div>
                                        </div>

                                        <div id="inputUrl" style="display: none;">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                                                </div>
                                                <input style="text-align: center;" type="text" class="form-control"
                                                    id="imagen_url" name="imagen_url" placeholder="https://images.unsplash.com/..."> 
                                            </div>
                                        </div>

                                        <br>
                                        <img id="ImgPreview" src="#" width="100%" height="auto" alt="Vista previa de la imagen" style="display: none;">
                                        <script>
                                            function previewImage(event) {
                                                var input = event.target;
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var ImgPreview = document.getElementById('ImgPreview');
                                                        ImgPreview.src = e.target.result;
                                                        ImgPreview.style.display = 'block';
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }

                                            function toggleImagenInput() {
                                                var tipoArchivo = document.getElementById('imagenTipoArchivo');
                                                var inputArchivo = document.getElementById('inputArchivo');
                                                var inputUrl = document.getElementById('inputUrl');
                                        
                                                if (tipoArchivo.checked) {
                                                    inputArchivo.style.display = 'block';
                                                    inputUrl.style.display = 'none';
                                                } else {
                                                    inputArchivo.style.display = 'none';
                                                    inputUrl.style.display = 'block';
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                   
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-4 px-3 py-3">
                        <a class="btn btn-secondary" href="{{ url('/admin/productos') }}" role="button">cancelar</a>
                        <button type="submit" class="btn btn-primary ">Registrar</button>
                    </div>
                </div>
            </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@stop

@section('css')
<style>
    .ck.ck-editor {
        width: 100% !important;
    }

    .ck-editor__editable {
        width: 100% !important;
        min-height: 300px;
        box-sizing: border-box;
    }

    .ck.ck-toolbar {
        flex-wrap: wrap;
    }

    @media (max-width: 768px) {
        .ck-editor__editable {
            min-height: 250px;
            padding: 10px;
        }
    }
</style>

@stop

@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#descripcion'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'alignment', '|',
                    'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'undo', 'redo', '|',
                    'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                    'code', 'codeBlock', 'htmlEmbed', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            language: 'es'
        })
        .then(editor => {
            // Forzar responsive después de crear el editor
            const editorEl = editor.ui.view.element;
            editorEl.style.width = '100%';
            editorEl.querySelector('.ck-editor__editable').style.width = '100%';
        })
        .catch(error => {
            console.error(error);
        });
</script>


@stop
