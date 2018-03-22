function sendComment(id, level, rank) {

    var text;

    if (!id) {
        text = $('#newComment').val();

        if (!text) {
            alert('Введите сообщение');
            return;
        }
    } else {
         text = prompt('Введите сообщени');
    }


    $.ajax({
        url: '/tree-comments/send-comment',
        data: {
            text: text,
            parentId: id,
            parentLevel: level,
            parentRank: rank
        },
        success: function (data) {
            if (data != "OK") {
                console.log(data);
                alert(data);

            }

            location.href = location.href;
        }
    })
}