<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerbit".
 *
 * @property int $id
 * @property string $kode_penerbit
 * @property string $nama_penerbit
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penerbit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_penerbit', 'nama_penerbit'], 'required'],
            [['kode_penerbit'], 'string', 'max' => 45],
            [['nama_penerbit'], 'string', 'max' => 65],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_penerbit' => 'Kode Penerbit',
            'nama_penerbit' => 'Nama Penerbit',
        ];
    }

    public function getBuku()
    {
        return $this->hasMany(Buku::className(), ['id_penerbit' => 'id']);
    }
}
