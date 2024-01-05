<style>
    .type-item {
        display: block;
        margin: 3px 6px;
    }

    .types,
    .news-list {
        display: inline-block;
        vertical-align: top;
    }

    .news-list {
        width: 600px;
    }
</style>
<div class="nav">目前位置：首頁 > 分類網誌 > <span class="type">健康新知</span></div>

<fieldset class="types">
    <legend>分類網誌</legend>
    <a class="type-item" data-id="1">健康新知</a>
    <a class="type-item" data-id="2">菸害防治</a>
    <a class="type-item" data-id="3">癌症防治</a>
    <a class="type-item" data-id="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list">
    <legend>文章列表</legend>
    <div class="list-items">

    </div>
    <div class="article"></div>

</fieldset>
<script>
    getList(1);

    $('.type-item').on('click', function() {
        $('.type').text($(this).text())
        let type = $(this).data('id') //date() 拿到資料，有可能是 數字 或 字串
        getList(type)
    })

    function getList(type) {
        // {type:type} , {name:type} , {name:type,...,...,}, 如果key與valuet相同，可以只寫一次
        $.get("./api/get_list.php", {type}, (list) => {
            $('.list-items').html(list)
        })
    }
</script>