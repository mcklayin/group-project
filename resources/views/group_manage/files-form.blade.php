@extends('...layouts.app')



@section('content')
<link href="{{ asset('css/fine-uploader-new.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.fine-uploader.min.js') }}"></script>
<h1>Керування файлами</h1>

 <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Перемістіть файли сюда">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>Вибрати файли</div>
                </div>

            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Обробка даних</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Відмінити</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Повторити</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Видалити</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Закрити</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Ні</button>
                    <button type="button" class="qq-ok-button-selector">Так</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Відмінити</button>
                    <button type="button" class="qq-ok-button-selector">Ок</button>
                </div>
            </dialog>
        </div>
    </script>


<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Додавання файлів</h3>
                                </div>
                                <div class="panel-body">


						{!! Form::open(array('url' => '/group/manage/files/add', 'method'=>"POST", 'class'=>'ls_form', 'files' => true,'id'=>'f-form')) !!}

							 <div class="form-group">
									<div id="fine-uploader-manual-trigger"></div>
								@if($errors->has('files'))
												<span class="has-error"><small class="help-block">{{$errors->first('files')}}</small></span>
											@endif
                             </div>


										{!! Form::close() !!}
                                </div>
                            </div>
                        </div>
</div>

<script>

     $(document).ready(function(){

    	  $('#fine-uploader-manual-trigger').fineUploader({
                template: 'qq-template-manual-trigger',
                request: {
                    endpoint: '/group/manage/files/add'
                },
    			params: {
                    'csrftoken': '{!! csrf_token() !!}'
    			},
                thumbnails: {
                    placeholders: {
                        waitingPath: '/img/waiting-generic.png',
                        notAvailablePath: '/img/not_available-generic.png'
                    }
                },
                autoUpload: true,
    			forceMultipart: true,
    			validation: {
                  //  allowedExtensions: ['jpeg', 'jpg', 'gif','png','bmp'],
                    itemLimit: 100,
                    sizeLimit: 26214400 //25mb

                }

            }).on('complete', function(event, id, fileName, responseJSON) {
    			if(responseJSON.message)
    			{
    			    $('.error-file-upload').remove();
    			    $('.panel-body').append("<div style='color:red;' class='error-file-upload'>"+responseJSON.message+"</div>");
    			}
    		});



            $('#trigger-upload').click(function() {
                $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
            });




      })
</script>
@stop

