function uploadPhoto(id,idCard,userType,group,urlUpload,urlCrop, dir ){

        $(id).pekeUpload({
        theme:'bootstrap', 
        allowedExtensions:"jpeg|jpg|png|gif", 
        btnText: "Upload Photo",
        url:  urlUpload,
        maxSize: 2,
        onFileSuccess: function(file,data){ 
            var ext = file.name.split('.').pop();           
            $('.modal-body').html('<center><img id="target" src="'+dir+'/'+group+'/'+file.name+'" width="640"></center><br><br>');
            $('#myModal').modal('show');
            $('#myModal').css({
                  width:'800px',
                  height:'auto',
		  'margin-left': function () {
		  return -($(this).width() / 2 );
		  }
             });
            
             var api;
             $('#target').Jcrop({
                   // start off with jcrop-light class
                   bgOpacity: 0.5,
                   bgColor: 'white',
                   addClass: 'jcrop-light',
                   allowResize: false,
                   onSelect: updateCoords
              },function(){
                    api = this;
                    api.setSelect([160, 10, 480, 430]);
                    //api.setSelect([0, 0, 320, 380]);
                    api.setOptions({ bgFade: true });
                    api.ui.selection.addClass('jcrop-selection');
              });
              $('#icrop').click(function() {
                   $.post(urlCrop, { 
                                x:$("#x").val(),
                                y:$("#y").val(),
                                w:$("#w").val(),
                                h:$("#h").val(),
                                user_id:$("#user_id").val(),
                                img: file.name,
                                folder: userType,
                                subfolder: group
                            }).done(function(data) {
			    $('#myModal').modal('hide');
		    });
                    setTimeout(function(){
                        
                     $('#imgMember').html('');
                     $('#imgMember').html('<img class="img-polaroid" width="120" height="180" src="'+dir+'/'+group+'/'+idCard+'.'+ext+'"><br>');
                    }, 2000);
              });
            
              $('#buttonbar').on('click','button',function(e){
                    var $t = $(this), $g = $t.closest('.btn-group');
                    $g.find('button.active').removeClass('active');
                    $t.addClass('active');
                    $g.find('[data-setclass]').each(function(){
                    var $th = $(this), c = $th.data('setclass'),
                    a = $th.hasClass('active');
                    if (a) {
                        api.ui.holder.addClass(c);
                        switch(c){
                          case 'jcrop-light':
                              api.setOptions({ bgColor: 'white', bgOpacity: 0.5 });
                              break;
                          case 'jcrop-dark':
                              api.setOptions({ bgColor: 'black', bgOpacity: 0.4 });
                              break;
                          case 'jcrop-normal':
                              api.setOptions({
                              bgColor: $.Jcrop.defaults.bgColor,
                              bgOpacity: $.Jcrop.defaults.bgOpacity
                         });
                         break;
                        }
                      }
                      else api.ui.holder.removeClass(c);
                     });
              });
                },
        onFileError:function(file,error){
             //alert(""+error+"\nError on file: "+file.name+" ");
            }
        });

    
}

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);   
  }

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  }