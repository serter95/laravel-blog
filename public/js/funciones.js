$('.pagination li').addClass('page-item');
$('.pagination li a').addClass('page-link');
$('.pagination li span').addClass('page-link');

var formularioEliminar = function (id) {
  $('#nombreElimina').html($('#nombre'+id).val())
  let action = $('#FormEliminar').attr('action')
  let matriz = action.split('/')
  let longitud = matriz.length;
  matriz[longitud-1]=id;
  let nuevoAction = matriz.join("/");
  $('#FormEliminar').attr('action',nuevoAction)
}

if ($(".chosen-select").length > 0) {
  $(".chosen-select").chosen({
    max_selected_options: 3,
    no_results_text: "no se encuentra lo que usted busca:"
  });
}

if ($('textarea').length > 0) {
  $('textarea').trumbowyg({
    lang: 'es',
    mobile: true,
    fixedBtnPane: true,
    fixedFullWidth: true,
    semantic: true,
    resetCss: true,
    autoAjustHeight: true,
    autogrow: true,
    btnsAdd: ['close'],
    btns: [
      ['viewHTML'],
      ['undo'],
      ['redo'],
      ['formatting'],
      'btnGrp-semantic',
      ['superscript', 'subscript'],
      ['link'],
      //['insertImage'],
      'btnGrp-justify',
      'btnGrp-lists',
      ['horizontalRule'],
      ['removeformat'],
      ['fullscreen']
    ]
  });
}
