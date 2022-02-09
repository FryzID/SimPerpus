public function actionCreate()
    {
        $model = new Buku();

        if ($model->load(Yii::$app->request->post())) {
            
            $gambar = UploadedFile::getInstance($model, 'gambar_buku');
 
            if($model->validate()){
                $model->save();
                if (!empty($gambar)) {
                    $gambar->saveAs(Yii::getAlias('@app/web/uploads/') . 'gambar.' . $gambar->extension);
                    $model->gambar_buku = 'gambar.' . $gambar->extension;
                    $model->save(FALSE);
                }
            }
 
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }








 
    