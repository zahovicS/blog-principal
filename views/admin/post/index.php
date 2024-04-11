<?php

use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var string $content */

$this->title = "Posts";
?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Lista de Posts</h4>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="tblPosts">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="table-plus datatable-nosort">Titulo</th>
                    <th class="table-plus datatable-nosort">Autor</th>
                    <th>Categoría</th>
                    <th class="datatable-nosort">Fecha de publicación</th>
                    <th class="datatable-nosort">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<?php $this->beginBlock('scripts'); ?>
<script>
    $('document').ready(function() {
        $('#tblPosts').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            destroy: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            ajax: {
                url: "/admin/post/list",
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "language": DATATABLE_ES_JSON,
            columns: [{
                    data: 'key',
                    className: "text-center",
                    responsivePriority: 9,
                },
                {
                    data: 'title',
                    responsivePriority: 1,
                },
                {
                    data: 'autor',
                    responsivePriority: 9,
                },
                {
                    data: 'category',
                    responsivePriority: 9,
                },
                {
                    data: 'publish_date',
                    responsivePriority: 1,
                },
                {
                    data: 'actions',
                    orderable: false,
                    className: "text-center",
                    responsivePriority: 1,
                },
            ],
            columnDefs: [{
                targets: [0],
                width: '50px'
            },{
                targets: [2,3,4],
                width: '120px'
            },{
                targets: [5],
                width: '150px'
            }, ],
        });
    });
</script>
<?php $this->endBlock(); ?>