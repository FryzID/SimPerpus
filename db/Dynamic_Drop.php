 <!-- DynamicForm -->
 <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Data Peminjaman</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsDataPeminjaman[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_rak',
                    'id_buku',
                ],
            ]); ?>
 
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsDataPeminjaman as $i => $modelsDataPeminjaman): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Data Peminjaman</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsDataPeminjaman->isNewRecord) {
                                echo Html::activeHiddenInput($modelsDataPeminjaman, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                            <?= $form->field($modelsDataPeminjaman, "[{$i}]id_buku")->dropDownList(
                                arrayHelper::map(Buku::find()->all(),'id','judul'),
                                ['prompt'=>'Pilih Buku']
                            ) ?>

                            </div>
                        </div><!-- .row --><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
