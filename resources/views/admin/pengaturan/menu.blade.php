@extends('backend.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/nestable2/jquery.nestable.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="content">
    <div class="block">
        <div class="block-content">
            <form method="get" action="{{ $currentUrl }}">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="example-hf-email">Pilih menu yang akan diubah</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="menu">
                            @foreach ($menulist as $key => $val) {
                            @php
                            $active = '';
                            if (request()->input('menu') == $key) {
                            $active = 'selected="selected"';
                            }
                            @endphp
                            <option {{ $active }} value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-alt-primary" type="submit">Pilih</button>
                        <span>atau</span>
                        <a class="btn btn-alt-primary" href="{{ $currentUrl }}?action=edit&menu=0">Buat menu baru</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            @if(request()->has('menu') && !empty(request()->input("menu")))
            <div class="block">
                <div class="block-content bg-body-light p-3">
                    Custom Link
                </div>
                <div class="block-content">
                    <form id="form-customMenu" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="menu_id" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                        <input type="hidden" name="tipe" value="link" />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="custom-menu-url">URL</label>
                                    <input id="custom-menu-url" name="url" type="text" class="form-control"
                                        placeholder="Masukan URL menu">
                                    <div class="invalid-feedback" id="custom-menu-url">Invalid feedback</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="custom-menu-label">Nama</label>
                                    <input id="custom-menu-label" name="label" type="text" class="form-control" placeholder="Masukan Label menu">
                                    <div class="invalid-feedback" id="custom-menu-label">Invalid feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit"  class="btn btn-alt-primary btn-block">
                                    <i class="si si-check mr-1"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content bg-body-light p-3">
                    Halaman
                </div>
                <div class="block-content">
                    <form id="form-pageMenu" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="menu_id" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                        <input type="hidden" name="tipe" value="halaman" />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="field-pageMenu">Halaman</label>
                                    <select class="form-control" id="field-pageMenu" name="pageMenu"></select>
                                    <div class="invalid-feedback" id="error-pageMenu">Invalid feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit"  class="btn btn-alt-primary btn-block">
                                    <i class="si si-check mr-1"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content bg-body-light p-3">
                    Modules
                </div>
                <div class="block-content">
                    <form id="form-modulesMenu" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="menu_id" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                        <input type="hidden" name="tipe" value="modules" />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="field-modulesMenu">Modules</label>
                                    <select class="form-control" id="field-modulesMenu" name="modulesMenu"></select>
                                    <div class="invalid-feedback" id="error-modulesMenu">Invalid feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit"  class="btn btn-alt-primary btn-block">
                                    <i class="si si-check mr-1"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-8">
            <div class="block">
                <div class="block-content bg-body-light p-3">
                    <div class="form-group row mb-0">
                        <label class="col-lg-1 col-form-label">Nama</label>
                        <div class="col-lg-3">
                            <input name="menu-name" id="menu-name" type="text" class="menu-name form-control menu-item-textbox" title="Masukan Nama Menu" value="@if( isset($indmenu)){{ $indmenu->name}} @endif">
                            <input type="hidden" id="idmenu" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                        </div>
                        <div class="col-3 ml-auto">
                            @if(request()->has('action'))
                            <div class="publishing-action">
                                <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary menu-save mr-3">Buat menu</a>
                                <div class="spinner-border spinner-border-sm text-primary" style="display: none;" id="loading-spin">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            @elseif(request()->has("menu"))
                            <div class="publishing-action">
                                <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary menu-save mr-3">Simpan menu</a>
                                <div class="spinner-border spinner-border-sm text-primary" style="display: none;" id="loading-spin">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            @else
                            <div class="publishing-action">
                                <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary menu-save mr-3">Buat menu</a>
                                <div class="spinner-border spinner-border-sm text-primary" style="display: none;" id="loading-spin">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="block-content pb-15" id="hwpwrap">
                    <div id="post-body">
                        <div id="post-body-content dd">

                            @if(request()->has("menu"))
                            <h3>Struktur Menu</h3>
                            <div class="drag-instructions post-body-plain" style="">
                                <p>
                                    Place each item in the order you prefer. Click on the arrow to the right of the item
                                    to display more configuration options.
                                </p>
                            </div>

                            @else
                            <h3>Tambahkan Menu</h3>
                            <div class="drag-instructions post-body-plain" style="">
                                <p>
                                    Masukan nama menu dan tekan tombol "Buat menu" untuk menambahkan menu
                                </p>
                            </div>
                            @endif
                            <ul class="menu ui-sortable" id="menu-to-edit">
                                @if(isset($menus))
                                @foreach($menus as $m)
                                <li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
                                    <dl class="menu-item-bar">
                                        <dt class="menu-item-handle">
                                            <span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>
                                            <span class="item-controls">
                                                <span class="item-type">{{ ucwords($m->tipe) }}</span>
                                                <span class="item-order hide-if-js">
                                                    <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up">
                                                        <abbr title="Move Up">↑</abbr></a> |
                                                    <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down">
                                                        <abbr title="Move Down">↓</abbr>
                                                    </a>
                                                </span>
                                                <a class="item-edit" data-toggle="collapse" href="#menu-item-settings-{{$m->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                                                {{-- <a data-toggle="collapse" href="#menu-item-settings-{{$m->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <
                                                </a> --}}
                                            </span>
                                        </dt>
                                    </dl>

                                    <div class="collapse" id="menu-item-settings-{{$m->id}}">
                                        <div class="menu-item-ubah">
                                            <input type="hidden" class="edit-menu-item-id" name="menuid_{{$m->id}}" value="{{$m->id}}" />
                                            <input type="hidden" class="edit-menu-item-tipe" name="tipe_menu_{{$m->tipe}}" value="{{$m->tipe}}" />
                                            <div class="form-group">
                                                <label for="edit-menu-item-title-{{$m->id}}">Label</label>
                                                <input type="text" id="idlabelmenu_{{$m->id}}" class="form-control edit-menu-item-title" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}">
                                            </div>
                                            @if($m->tipe == 'link')
                                            <div class="form-group">
                                                <label for="edit-menu-item-title-{{$m->id}}">URL</label>
                                                <input type="text" id="url_menu_{{$m->id}}" class="form-control edit-menu-item-url" id="url_menu_{{$m->id}}" value="{{$m->link}}">
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <p class="field-move hide-if-no-js description description-wide">
                                                    <label>
                                                        <span>Move</span>
                                                        <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">Move up</a> <a
                                                            href="{{ $currentUrl }}"
                                                            class="menus-move-down"
                                                            title="Mover uno abajo"
                                                            style="display: inline;">Move Down</a>
                                                        <a href="{{ $currentUrl }}"
                                                            class="menus-move-left"
                                                            style="display: none;"></a> <a
                                                            href="{{ $currentUrl }}"
                                                            class="menus-move-right"
                                                            style="display: none;"></a> <a
                                                            href="{{ $currentUrl }}"
                                                            class="menus-move-top"
                                                            style="display: none;">Top</a> </label>
                                                </p>
                                            </div>
                                            <div class="">
                                                <a class="btn btn-alt-danger btn-sm mr-1" id="delete-{{$m->id}}" onclick="deleteitem({{$m->id}})">Hapus</a>
                                                <a class="btn btn-alt-warning btn-sm mr-1" data-toggle="collapse" data-target="#menu-item-settings-{{$m->id}}" aria-expanded="false" aria-controls="menu-item-settings-{{$m->id}}">Cancel</a>
                                                <a onclick="getmenus()" class="btn btn-alt-primary btn-sm updatemenu" id="update-{{$m->id}}" href="javascript:void(0)">Ubah</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="menu-item-transport"></ul>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="block-content bg-body-light p-3">
                    <div class="form-group row mb-0">
                        @if(request()->has('action'))
                        <div class="col-3 ml-auto">
                            <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary  menu-save">Create menu</a>
                        </div>
                        @elseif(request()->has("menu"))
                        <div class="col-3">
                            <button class="btn btn-alt-danger deletion menu-delete" onclick="deletemenu()" type="button">Delete menu</button>
                        </div>
                        <div class="col-3 ml-auto">
                            <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary  menu-save">Save menu</a>
                            <span class="spinner" id="spincustomu2"></span>
                        </div>

                        @else
                        <div class="col-3 ml-auto">
                            <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-alt-primary  menu-save">Create menu</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {!! Menu::render() !!} --}}
    <!-- END Update Product -->
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/plugins/nestable2/jquery.nestable.min.js') }}"></script>
<script>
	var menus = {
		"oneThemeLocationNoMenus" : "",
		"moveUp" : "Move up",
		"moveDown" : "Mover down",
		"moveToTop" : "Move top",
		"moveUnder" : "Move under of %s",
		"moveOutFrom" : "Out from under  %s",
		"under" : "Under %s",
		"outFrom" : "Out from %s",
		"menuFocus" : "%1$s. Element menu %2$d of %3$d.",
		"subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
	};
	var arraydata = [];
	var addcustommenur= '{{ route("haddcustommenu") }}';
	var updateitemr= '{{ route("hupdateitem")}}';
	var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
	var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
	var deletemenugr= '{{ route("hdeletemenug") }}';
	var createnewmenur= '{{ route("hcreatenewmenu") }}';
	var csrftoken="{{ csrf_token() }}";
	var menuwr = "{{ url()->current() }}";
</script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/harimayco-menu/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/harimayco-menu/scripts2.js')}}"></script>
<script src="{{ asset('assets/js/pages/menu.js') }}"></script>
{{-- <script type="text/javascript" src="{{asset('assets/harimayco-menu/menu.js')}}"></script> --}}
@endpush
