
<?php $baseUrl = Yii::app()->theme->baseUrl; ?>  

<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bimp/css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bimp/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bimp/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bimp/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bimp/css/jquery.fileupload-ui-noscript.css"></noscript>

<section class="slice bg-white">
    <div class="wp-section user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile-img">
                        <?php if (empty($user->user_image)): ?>
                            <img src="<?php echo base_url(); ?>/assets/images/default_user.png" alt="">
                            <?php
                        else :
                            $fname = $user->user_image;
                            $furl = "http://tbrs3.s3.amazonaws.com/" . $fname;
                            ?>
                            <img src="<?php echo $furl; ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <ul class="categories mt-20">
                        <li><a href="<?php echo base_url() . '/user/myaccount' ?>">Personal informations</a></li>
                        <li><a href="<?php echo base_url() . '/user/changepassword' ?>">Change Password</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-9">                     
                    <div class="tabs-framed">
                        <ul class="tabs clearfix">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Add Property</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <div class="col-md-12 pad-top-10">
                                    <div class="block-heading" id="additionalinfo">
                                        <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-plus"></i></span>Upload Property Image</h4>
                                    </div>
                                    <div class="padding-as25 margin-30 lgray-bg">
                                        <div class="row" id="image_holder">
                                            <?php
                                            foreach ($property_gallery as $val) {
                                                ?>    
                                                <div style='margin:20px;float:left'>
                                                    <img  src="http://tbrs3.s3.amazonaws.com/thumb_<?php echo $val['image']; ?>" >
                                                    <div><input type='radio' id='<?php echo $val['property']; ?>' value='<?php echo $val['id']; ?>'  class='main'  name='main'>
                                                        <span id="<?php echo $val['id']; ?>" class="remove_img" style="margin-left:20px;"><img src="<?php echo base_url(); ?>/images/remove.png" ></span>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <?php //pre($property_gallery,true);   ?>
                                        </div>
                                        <div class="row">
                                            <div class="container" style="width:100% !important;">
                                                <!-- The file upload form used as target for the file upload widget -->
                                                <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">

                                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="row fileupload-buttonbar">
                                                        <div class="col-lg-7">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                                <span>Add files...</span>
                                                                <input type="file" name="files[]" multiple>
                                                            </span>
                                                            <button type="submit" class="btn btn-primary start">
                                                                <i class="glyphicon glyphicon-upload"></i>
                                                                <span>Start upload</span>
                                                            </button>
                                                            <button type="reset" class="btn btn-warning cancel">
                                                                <i class="glyphicon glyphicon-ban-circle"></i>
                                                                <span>Cancel upload</span>
                                                            </button>
                                                            <!-- button type="button" class="btn btn-danger delete">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                                <span>Delete</span>
                                                            </button -->
                                                            <!-- <input type="checkbox" class="toggle"> -->
                                                            <!-- The global file processing state -->
                                                            <span class="fileupload-process"></span>
                                                        </div>
                                                        <!-- The global progress state -->
                                                        <div class="col-lg-5 fileupload-progress fade">
                                                            <!-- The global progress bar -->
                                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                            </div>
                                                            <!-- The extended global progress state -->
                                                            <div class="progress-extended">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                                    <input type="hidden" name="prop" id="prop" value="<?php echo $property ?>" >
                                                </form>
                                                <br>
                                                <!-- The blueimp Gallery widget -->
                                                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                                    <div class="slides"></div>
                                                    <h3 class="title"></h3>
                                                    <a class="prev">â€¹</a>
                                                    <a class="next">â€º</a>
                                                    <a class="close">Ã—</a>
                                                    <a class="play-pause"></a>
                                                    <ol class="indicator"></ol>
                                                </div>
                                                <!-- The template to display files available for upload -->
                                                <script id="template-upload" type="text/x-tmpl">
                                                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                    <tr class="template-upload fade">
                                                    <td>
                                                    <span class="preview"></span>
                                                    </td>
                                                    <td>
                                                    <p class="name">{%=file.name%}</p>
                                                    <strong class="error text-danger"></strong>
                                                    </td>
                                                    <td>
                                                    <p class="size">Processing...</p>
                                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                                    </td>
                                                    <td>
                                                    {% if (!i && !o.options.autoUpload) { %}
                                                    <button class="btn btn-primary start" disabled>
                                                    <i class="glyphicon glyphicon-upload"></i>
                                                    <span>Start</span>
                                                    </button>
                                                    {% } %}
                                                    {% if (!i) { %}
                                                    <button class="btn btn-warning cancel">
                                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                                    <span>Cancel</span>
                                                    </button>
                                                    {% } %}
                                                    </td>
                                                    </tr>
                                                    {% } %}
                                                </script>
                                                <!-- The template to display files available for download -->
                                                <script id="template-download" type="text/x-tmpl">
                                                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                    <tr class="template-download fade">
                                                    <td>
                                                    <span class="preview">
                                                    {% if (file.thumbnailUrl) { %}
                                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                                                    {% } %}
                                                    </span>
                                                    </td>
                                                    <td>
                                                    <p class="name">
                                                    {% if (file.url) { %}
                                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                                    {% } else { %}
                                                    <span>{%=file.name%}</span>
                                                    {% } %}
                                                    </p>
                                                    {% if (file.error) { %}
                                                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                                    {% } %}
                                                    </td>
                                                    <td>
                                                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                                    </td>
                                                    <td>
                                                    {% if (file.deleteUrl) { %}
                                                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>Delete</span>
                                                    </button>
                                                    <input type="checkbox" name="delete" value="1" class="toggle">
                                                    {% } else { %}
                                                    <button class="btn btn-warning cancel">
                                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                                    <span>Cancel</span>
                                                    </button>
                                                    {% } %}
                                                    </td>
                                                    </tr>
                                                    {% } %}
                                                </script>
                                                <div class="text-align-center" id="submit-property">
                                                    <button type="button" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> Submit Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/vendor/jquery.ui.widget.js"></script>
                                <!-- The Templates plugin is included to render the upload/download listings -->
                                <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
                                <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                                <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
                                <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                                <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
                                <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                                <!-- blueimp Gallery script -->
                                <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                                <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.iframe-transport.js"></script>
                                <!-- The basic File Upload plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload.js"></script>
                                <!-- The File Upload processing plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-process.js"></script>
                                <!-- The File Upload image preview & resize plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-image.js"></script>
                                <!-- The File Upload audio preview plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-audio.js"></script>
                                <!-- The File Upload video preview plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-video.js"></script>
                                <!-- The File Upload validation plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-validate.js"></script>
                                <!-- The File Upload user interface plugin -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/jquery.fileupload-ui.js"></script>
                                <!-- The main application script -->
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/main.js"></script>
                                <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
                                <!--[if (gte IE 8)&(lt IE 10)]>
                                <script src="<?php echo base_url(); ?>/assets/bimp/js/cors/jquery.xdr-transport.js"></script>
                                <![endif]-->
                                <script>



                                    $(document).ready(function() {
                                        $('body').on("click", ".main", function() {
                                            var id = $(this).val();
                                            var p_id = $(this).attr('id');
                                            $.ajax({
                                                url: base_url + "/properties/MakeMainImage",
                                                type: 'POST',
                                                data: {'id': id, 'p_id': p_id},
                                                success: function() {
                                                },
                                            });
                                        });

                                        $("#submit-property").click(function() {
                                            if (!$('.main').is(':checked'))
                                            {
                                                alert("Please select any image.");
                                            }
                                            else
                                            {
                                                var p_id = $("input[type='radio']:checked").attr("id");
                                                var slug =   $("#prop").val();
                                                $.ajax({
                                                url: base_url + "/properties/PropertySubmit",
                                                type: 'POST',
                                                data: {'p_id': p_id},
                                                success: function() {
                                                    window.location.href = base_url+ "/properties/view?property="+slug;
                                                },
                                            });
                                                
                                            }    
                                            
                                        });
                                        
                                        $('body').on("click", ".remove_img", function() {
                                            var id = $(this).attr("id");
                                            var div_obj = $(this).parent("div").parent("div");
                                            $(".loader").show();
                                            $.ajax({
                                                url: base_url + "/properties/RemoveImage",
                                                type: 'POST',
                                                data: {'id': id},
                                                success: function(data) {
                                                    $(".loader").hide(); 
                                                   if(data=="success")
                                                   {    
                                                        div_obj.remove();  
                                                   }
                                                   else
                                                   {
                                                       alert("Main Image cannot be deleted");
                                                   }    
                                               
                                                },
                                            });
                                        });

                                    });
                                </script>    


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>