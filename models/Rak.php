<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rak".
 *
 * @property int $id
 * @property string $nama_rak
 *
 * @property Buku[] $bukus
 */
class Rak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_rak'], 'required'],
            [['nama_rak'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_rak' => 'Nama Rak',
        ];
    }

    /**
     * Gets query for [[Bukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBukus()
    {
        return $this->hasMany(Buku::className(), ['id_rak' => 'id']);
    }

    public function getPeminjaman()
    {
        return $this->hasMany(Peminjaman::className(), ['id_rak' => 'id']);
    }
}
