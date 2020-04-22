$('#add-music').click(function(){
    const index = +$('#widgets_counter').val();
    console.log(index);
    const tmpl = $('#album_musics').data('prototype').replace(/__name__/g, index);

    $('#album_musics').append(tmpl);

    $('#widgets_counter').val(index + 1);

    handleDeleteAction()
});
function handleDeleteAction(){
    $('button[data-action="delete"]').click(function(){
        const target = this.dataset.target;
        console.log(target);
        $(target).remove();
    });
}
function updateCounter(){
    const count = +$('#ad_images div.form-group').length;

    $('#widgets_counter').val(count);
}

updateCounter();
handleDeleteAction();