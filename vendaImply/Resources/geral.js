function navigate(tela, filtro){
    $('#content').load('View/'+tela+'.php', {'filtro':filtro});  
    $('.nav-item').removeClass('active');
    $('#'+tela).addClass('active');
}