<?php if (count($urlHistory) > 0): ?>
    <table class="table responsive">
        <tr>
            <th>Long Url</th>
            <th>Short Url</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>

        <tbody id="tableBody">
        <?php foreach ($urlHistory as $history): ?>
            <tr>
                <td title="<?= $history['original_url'] ?>">
                    <a href="<?= $history['original_url'] ?>">
                        <?= strlen($history['original_url']) > 20 ? substr($history['original_url'], 0, 20) . '...' . substr($history['original_url'], -20) : $history['original_url'] ?>
                    </a>
                </td>
                <td title="<?= base_url('url-app/url/r/' . $history['short_url']) ?>">
                    <a href="<?= base_url('url-app/url/r/' . $history['short_url']) ?>">
                        <?= '/url-app/url/r/' . $history['short_url'] ?>
                    </a>
                </td>
                <td><?= $history['created_at'] ?></td>
                <td><?= $history['updated_at'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
    <div id="moreDiv">
        <button id="more" class="btn btn-primary">More</button>
    </div>

    <script>
        $('#more').click(function () {
            var offset = $('#tableBody tr').length;

            $.ajax({
                url: '/url-app/history/getMore',
                data: {
                    offset: offset
                },
                success: function (response) {

                    if (response === false) {
                        $('#more').hide();

                        $('#moreDiv').html('<i class="small">End of records</i>');

                    } else {
                        response.forEach(function (r) {

                                var url = r.original_url.toString().length > 20 ? (r.original_url.toString().substr(0, 20) + '...' + r.original_url.toString().substr(-20)) : r.original_url;

                                $('#tableBody').append("<tr>" +
                                    "<td title='" + r.original_url + "'>" + "<a href='" + r.original_url + "'>" + url + "</a>" + "</td>" +
                                    "<td title='" + r.short_url + "'><a href='/url-app/url/r/" + r.short_url + "'>" + '/url-app/url/r/' + r.short_url + "</a></td>" +
                                    "<td>" + r.created_at + "</td>" +
                                    "<td>" + r.updated_at + "</td>" +
                                    "</tr>"
                                );
                            }
                        );
                        $('body').scrollTop($('#tableBody')[0].scrollHeight);
                    }


                }
            })
            ;
        })
        ;
    </script>

<?php else: ?>

    <div class="alert alert-danger">
        <p>No Urls found in your history! </p>
    </div>
<?php endif; ?>